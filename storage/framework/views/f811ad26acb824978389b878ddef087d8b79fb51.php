<?php
    $title = 'Timeline';
    $settings = \App\Settings::first();
?>
<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
    <style>
        .wrapper {
            position: relative;
            width: 100%;
            height: 100%;
        }

        #map {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #eee;
        }

        .divcontent {
            position: absolute;
            padding: 50px;
            top: 100px;
            left: 100px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="main-content-wrapper">
        <div class="row mb-3">
            <div class="col">
                <div class="float-start">
                    <h4 class="mt-2"><?php echo e($title); ?></h4>
                </div>
            </div>
            <div class="col">
                <div class="float-end">
                    <div class="row">
                        <div class="col">
                            <input type="date" id="date" class="form-control form-control-sm float-end ps-2 pe-2"
                                value="<?php echo e(now()->format('Y-m-d')); ?>">
                        </div>
                        <div class="col">
                            <select class="form-select form-select-sm pe-2" aria-label=".form-select-sm example"
                                id="emp">
                                <option selected>Please select employee</option>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->user_name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper fs--1">
            <div id="map" class="row gmaps p-0 shadow" style="height:80vh;">
            </div>
            <div class="divcontent col-2 col-md-4" id="carddiv">
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GOOGLE_MAPS_API_KEY')); ?>&&libraries=geometry&callback=initMap&v=weekly"
        async defer></script>
    <script>
        $(document).ready(function() {
            $('#emp').on('change', function() {
                if (this.value !== '') {
                    getData();
                }
            });

            $('#date').change(function() {
                getData();
            });

        });
        var iconBase = window.location.origin + "/img/map/";

        var directionsDisplay,
            directionsService,
            map;
        var ltlng = [];
        var marker;
        var markers = [];

        function initMap() {
            var latitide = '<?php echo e($settings->center_latitude); ?>';
            var longitude = '<?php echo e($settings->center_longitude); ?>';
            var center = new google.maps.LatLng(latitide, longitude);

            var mapOptions = {
                zoom: parseInt('<?php echo e($settings->map_zoom_level); ?>'),
                center: center,
                scrollWheel: true,
                draggable: true,
                mapTypeControlOptions: {
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.HYBRID]
                },
                streetViewControl: false,
                scaleControl: true,
                zoomControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                gestureHandling: 'greedy'
            };
            map = new google.maps.Map(document.getElementById('map'), mapOptions);
            window.initMap = initMap;
        }

        function getData() {
            var userId = $('#emp').val();
            var date = $('#date').val();
            $.ajax({
                type: "POST",
                url: '<?php echo e(route('getTimeLineAjax')); ?>',
                data: {
                    "userId": userId,
                    "date": date,
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(response) {
                    console.log(response);

                    var data = response;
                    var timeLineItems = data.timeLineItems;
                    var contents = '';

                    //Reset markers
                    clearOverlays();

                    var infowindow = new google.maps.InfoWindow();
                    //Intialize the Path Array
                    var path = new google.maps.MVCArray();

                    //Intialize the Direction Service
                    directionsService = new google.maps.DirectionsService();
                    directionsDisplay = new google.maps.DirectionsRenderer();
                    //Set the Path Stroke Color.
                    var polyline = new google.maps.Polyline({
                        path: [],
                        strokeColor: '#0000FF',
                        strokeWeight: 3
                    });

                    polyline.setMap(null);

                    ltlng = [];
                    var finalDistance = '- KM';

                    var mainHeader = ` <div class="card radius-10 bg-primary mt-2 mb-3 shadow-lg">
                                                  <div class="card-header bg-primary text-white">${data.employeeName}
                                          </div>
                                                  <div class="card-body text-white">
                                             <dl class="row">
                                                  <dt class="col-sm-6">Total tracked time</dt>
                                                          <dd class="col-sm-6">${data.totalTrackedTime}</dd>
                                                  <dt class="col-sm-6">Total attendance time</dt>
                                                  <dd class="col-sm-6">${data.totalAttendanceTime}</dd>
                                                  <dt class="col-sm-6">Total travelled distance</dt>
                                                          <dd class="col-sm-6" id="distance">-</dd>
                                                  <dt class="col-sm-6">Device information</dt>
                                                  <dd class="col-sm-6">${data.deviceInfo}</dd>
                                             </dl>
                                          </div>
                                      </div>`;

                    //Main card in header
                    if (timeLineItems.length > 0) {

                        $("#carddiv").show();

                        var myTrip = new Array();

                        for (let i = 0; i < timeLineItems.length; i++) {
                            var item = timeLineItems[i];

                            myTrip.push({
                                location: new google.maps.LatLng(item.latitude, item.longitude),
                                stopover: false
                            });

                            if (item.latitude !== 0) {
                                //Map Setup
                                var markerIcon;

                                if (item.trackingType === 0 || item.trackingType === 3) {
                                    markerIcon = {
                                        url: iconBase + "location_pin_blue.png",
                                        scaledSize: new google.maps.Size(34, 34),
                                        labelOrigin: new google.maps.Point(15, 11)
                                    };
                                } else {
                                    markerIcon = {
                                        url: iconBase + "location_pin.png",
                                        // url: "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png",
                                        scaledSize: new google.maps.Size(42, 42),
                                        labelOrigin: new google.maps.Point(21, 22)
                                    };
                                }


                                marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(item.latitude, item.longitude),
                                    map: map,
                                    icon: markerIcon,
                                    label: {
                                        text: `${i + 1}`,
                                        color: '#1F1C1C',
                                        fontWeight: "bold",
                                        fontSize: "16px",
                                        className: "card p-0"
                                    },
                                    draggable: false,
                                });
                                //   map.addListener("center_changed", () => {
                                // 3 seconds after the center of the map has changed, pan back to the
                                // marker.
                                //     window.setTimeout(() => {
                                //       map.panTo(new google.maps.LatLng(item.latitude, item.longitude));
                                //   }, 3000);
                                // });
                                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                    return function() {
                                        map.setZoom(15);
                                        map.setCenter({
                                            lat: item.latitude,
                                            lng: item.longitude
                                        });

                                    }
                                })(marker, i));

                                markers.push(marker);
                                ltlng.push(new google.maps.LatLng(item.latitude, item.longitude));
                                //Map Setup End
                            }


                            //If address is not set call maps and save to db
                            var address = "Unknown address!";

                            if (item.address === null) {
                                getReverseGeocodingData(item.latitude, item.longitude, item.id);
                            } else {
                                address = item.address;
                                address +=
                                    `</br><a href="javascript:void(0)" class="${item.id}aaf" data-lat="${item.latitude}" data-long="${item.longitude}">View in map</a>`
                                $(`.${item.id}aaf`).on("click", function() {
                                    console.log('click event');
                                    var lat = $(this).data("lat");
                                    var lng = $(this).data("long");
                                    map.setZoom(30);
                                    map.setCenter({
                                        lat: lat,
                                        lng: lng
                                    });

                                })
                            }

                            var activity = item.type;
                            var vehCount = 0;
                            if (activity === 'vehicle') {
                                contents += `<div class="time-label">
                                                                                <span class="bg-green">Travel ${item.startTime} - ${item.endTime} (${item.elapseTime}H)  ${item.distance} KM</span>
                                                                      </div>`;
                                vehCount + 1;
                            } else {
                                var battery = getBattery(item.batteryPercentage);
                                contents += `
                                             <div class="card ml-2 mr-2 mt-2">
                                                <div class="card-body">
                                                         <div class="timeline-item">
                                                             <div class="row justify-content-around mb-1">
                                                                        <div class="col">
                                                                         <span><i class="fas fa-clock"></i> ${item.startTime} - ${item.endTime} </span>
                                                                      </div>
                                                                      <div class="col align-self-end">
                                                                         ${battery}
                                                              </div>
                                                             </div>
                                                             <div class="row">
                                                             <div class="col">
                                                                 <h5 class="text-primary"> <span class="badge bg-primary">${i + 1}</span> ${item.type}</h5>
                                                             </div>
                                                             <div class="col">
                                                                   Accuracy ${item.accuracy}%
                                                             </div>
                                                             </div>
                                                             <div class="timeline-body" id='address${item.id}'>
                                                                 ${address}
                                                             </div>
                                                         </div>
                                                </div>
                                                 </div>`;
                                vehCount = 0;
                            }

                        }


                        //Poly Line
                        var firstItem = timeLineItems[0];

                        if (timeLineItems.length === 1) {
                            map.setCenter(new google.maps.LatLng(firstItem.latitude, firstItem.longitude));
                        } else {
                            var lastItem = timeLineItems.pop();
                            //Set Center
                            var middle = timeLineItems[Math.round((timeLineItems.length - 1) / 2)];
                            map.setCenter(new google.maps.LatLng(middle.latitude, middle.longitude));

                            //Polyline draw
                            directionsService.route({
                                origin: new google.maps.LatLng(firstItem.latitude, firstItem.longitude),
                                destination: new google.maps.LatLng(lastItem.latitude, lastItem
                                    .longitude),
                                waypoints: myTrip,
                                optimizeWaypoints: true,
                                travelMode: google.maps.TravelMode.DRIVING

                            }, function(response, status) {
                                if (status === google.maps.DirectionsStatus.OK) {
                                    // console.log('Routes'+JSON.stringify(response, null, 2));
                                    var bounds = new google.maps.LatLngBounds();
                                    var legs = response.routes[0].legs;

                                    for (i = 0; i < legs.length; i++) {
                                        var steps = legs[i].steps;
                                        for (j = 0; j < steps.length; j++) {
                                            var nextSegment = steps[j].path;
                                            for (k = 0; k < nextSegment.length; k++) {
                                                polyline.getPath().push(nextSegment[k]);
                                                bounds.extend(nextSegment[k]);
                                            }
                                        }
                                    }

                                    polyline.setMap(map);
                                } else {
                                    console.log('Directions request failed due to ' + status);
                                }
                            });
                        }

                        map.setZoom(11);

                        //// initialize services
                        //const geocoder = new google.maps.Geocoder();
                        //const service = new google.maps.DistanceMatrixService();

                        //// build request
                        //const origin1 = { lat: firstItem.latitude, lng: firstItem.longitude };
                        ////const origin2 = "Greenwich, England";
                        ////const destinationA = "Stockholm, Sweden";
                        //const destinationB = { lat: lastItem.latitude, lng: lastItem.longitude };

                        //const request = {
                        //    origins: [origin1],
                        //    destinations: [ destinationB],
                        //    travelMode: google.maps.TravelMode.DRIVING,
                        //    unitSystem: google.maps.UnitSystem.METRIC,
                        //    avoidHighways: false,
                        //    avoidTolls: false,
                        //};

                        //// get distance matrix response
                        //service.getDistanceMatrix(request).then((response) => {

                        //    var data = response;
                        //    console.log(JSON.stringify(response, null, 2));

                        //    $('#distance').text(data.rows[0].elements[0].distance.text);
                        //});


                        //Distance travel calculation
                        var result = google.maps.geometry.spherical.computeLength(ltlng)
                        var distance = Math.round((result / 1000) * 100) / 100;
                        finalDistance = distance + ' KM';
                        console.log(finalDistance);
                    } else {
                        contents = '<p> No data! </p>';
                    }
                    polyline.setMap(null);
                    var finalContent = `<div class="card"><div class="card-body">` +
                        `${mainHeader}<div class="timeline mt-1" style="overflow-y:scroll; max-height:350px">${contents}</div></div></div>`;

                    $('#carddiv').html(finalContent);


                    $('#distance').text(finalDistance);

                },
                failure: function(response) {
                    alert(response.responseText);
                },
                error: function(response) {
                    alert(response.responseText);
                }
            });
        }


        function generateLabel(time) {
            return time;
        }


        function clearOverlays() {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers.length = 0;
        }

        /* Battery */
        function getBattery(per) {

            var content = '';
            if (per >= 90) {
                content =
                    `<a href="javascript:;" class="text-success"><i class="bi bi-battery-full"></i></a>
                                                                                <span class="text-dark fs--1">${per}%</span>`;
            } else if (per >= 70) {
                content =
                    `<a href="javascript:;" class="text-success"><i class="bi bi-battery-full"></i></a>
                                                                                        <span class="text-dark fs--1">${per}%</span>`;
            } else if (per >= 40) {
                content =
                    `<a href="javascript:;" class="text-primary"><i class="bi bi-battery-half"></i></a>
                                                                                                        <span class="text-dark fs--1">${per}%</span>`;
            } else if (per >= 15) {
                content =
                    `<a href="javascript:;" class="text-warning"><i class="bi bi-battery-half"></i></a>
                                                                                        <span class="text-dark fs--1">${per}%</span>`;
            } else {
                content =
                    `<a href="javascript:;" class="text-danger"><i class="bi bi-battery"></i></a>
                                                                                                <span class="text-dark fs--1">${per}%</span>`;
            }

            return content;
        }

        function getActivity(trackType, trackActivity) {
            var activity = 'Still';

            if (trackType === 0) {
                activity = 'Check In';

            } else if (trackType === 3) {
                activity = 'Check Out';

            } else if (trackType === 4) {
                activity = 'Auto Check Out';

            } else {
                if (trackActivity === "ActivityType.STILL") {
                    activity = 'Still';
                } else if (trackActivity === "ActivityType.WALKING") {
                    activity = 'Walking'
                } else if (trackActivity === "ActivityType.UNKNOWN") {
                    activity = 'Unknown'
                } else if (trackActivity === "ActivityType.IN_VEHICLE") {
                    activity = 'In Vehicle';
                } else {
                    activity = trackActivity;
                }
            }

            return activity;
        }

        function getReverseGeocodingData(lat, lng, trackingId) {
            var selector = "#address" + trackingId;

            var latlng = new google.maps.LatLng(lat, lng);
            // This is making the Geocode request
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'latLng': latlng
            }, (results, status) => {
                var address = "";

                if (status !== google.maps.GeocoderStatus.OK) {
                    console.log(status);
                    address = 'Address not found';
                }
                // This is checking to see if the Geoeode Status is OK before proceeding
                if (status == google.maps.GeocoderStatus.OK) {
                    //console.log(results);
                    address = (results[0].formatted_address);

                    //Update address to db
                    updateAddressToDb(trackingId, address);

                    address +=
                        `</br><a href="javascript:void(0)" class="${trackingId}aaf" data-lat="${lat}" data-long="${lng}">View in map</a>`;
                    $(selector).html(address);
                    $(`.${trackingId}aaf`).on("click", function() {
                        var lat = $(this).data("lat");
                        var lng = $(this).data("long");
                        map.setZoom(30);
                        map.setCenter({
                            lat: lat,
                            lng: lng
                        });

                    });
                }

            });

        }

        function updateAddressToDb(trackingId, address) {
            $.ajax({
                type: "POST",
                url: '<?php echo e(route('timeLine.updateLocationAjax')); ?>',
                data: {
                    "trackingId": trackingId,
                    "address": address,
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(response) {
                    console.log(response);
                },
                failure: function(response) {
                    console.log(response.responseText);
                },
                error: function(response) {
                    console.log(response.responseText);
                }
            });
        }

        //This function takes in latitude and longitude of two location and returns the distance between them as the crow flies (in km)
        function calculateCenter(lat1, lon1, lat2, lon2) {
            var R = 6371; // km
            var dLat = toRad(lat2 - lat1);
            var dLon = toRad(lon2 - lon1);
            var lat1 = toRad(lat1);
            var lat2 = toRad(lat2);

            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.sin(dLon / 2) * Math.sin(dLon / 2) * Math.cos(lat1) * Math.cos(lat2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var d = R * c;
            return d;
        }

        // Converts numeric degrees to radians
        function toRad(Value) {
            return Value * Math.PI / 180;
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saibhagabati\resources\views/pages/time_line.blade.php ENDPATH**/ ?>