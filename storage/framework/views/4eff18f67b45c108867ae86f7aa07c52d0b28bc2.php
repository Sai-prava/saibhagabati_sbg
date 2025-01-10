
<?php $__env->startSection('title'); ?>
    <?php echo e($settings->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="main-content-wrapper">
    <div class="row mb-3 justify-content-between">
        <div class="col-6">
            <div class="float-start">
                <div class="card radius-10 shadow border-0 border-start">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-primary">Online <span class="badge bg-success" id="online">0</span> </button>
                                    <button type="button" class="btn btn-outline-primary">Offline <span class="badge bg-danger" id="offline">0</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 align-self-center align-items-end ">             
            <a class="btn btn-outline-primary" href="<?php echo e(route('liveLocation')); ?>"><i class="bi bi-arrow-clockwise"></i> Refresh</a>
        </div>
    </div>

    <div class="card shadow">
        <div id="map" class="gmaps p-0 shadow" style="height:80vh">
        </div>
    </div>
</section>
    
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GOOGLE_MAPS_API_KEY')); ?>&callback=initMap&v=weekly"
        async defer></script>

    <script>
        let map, marker, infoWindow;
        const ltlng = [];
        const infoWindows = [];

        function initMap() {
            const latitude = parseFloat('<?php echo e($settings->center_latitude); ?>');
            const longitude = parseFloat('<?php echo e($settings->center_longitude); ?>');
            const center = new google.maps.LatLng(latitude, longitude);

            const mapOptions = {
                zoom: parseInt('<?php echo e($settings->map_zoom_level); ?>'),
                center: center,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: true,
                gestureHandling: 'greedy',
                streetViewControl: false,
            };

            const iconBase = `${window.location.origin}/img/map/`;

            const icons = {
                online: {
                    icon: iconBase + "green_circle.png"
                },
                offline: {
                    icon: iconBase + "red_circle.png"
                },
            };

            map = new google.maps.Map(document.getElementById('map'), mapOptions);

            fetchLocations(icons);
        }

        function fetchLocations(icons) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "<?php echo e(route('liveLocationAjax')); ?>",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    let active = 0,
                        offline = 0;

                    response.forEach(user => {
                        const markerIcon = user.status === 'online' ? icons.online.icon : icons.offline
                            .icon;

                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(user.latitude, user.longitude),
                            icon: {
                                url: markerIcon,
                                scaledSize: new google.maps.Size(32, 32),
                            },
                            map: map,
                            label: {
                                text: user.name,
                                color: '#1F1C1C',
                                fontWeight: 'bold',
                                fontSize: '16px',
                                className: 'card p-1',
                            },
                        });

                        infoWindow = new google.maps.InfoWindow({
                            maxWidth: 200
                        });

                        const content = `Last Update: ${user.updatedAt}`;
                        marker.addListener('click', function() {
                            infoWindow.setContent(content);
                            infoWindow.open(map, marker);
                        });

                        ltlng.push(new google.maps.LatLng(user.latitude, user.longitude));

                        user.status === 'online' ? active++ : offline++;
                    });

                    $('#online').text(active);
                    $('#offline').text(offline);
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sbg_product\resources\views/pages/liveLocation.blade.php ENDPATH**/ ?>