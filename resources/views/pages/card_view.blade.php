@php
    use App\Settings;
    $title = 'Card View';
    $settings = Settings::first();
@endphp
@section('title')
    {{ $title }}
@endsection
@extends('layouts.app')
@section('content')
    <section class="main-content-wrapper">
        <div class="row justify-content-between mb-3">
            <div class="col-6">
                <div class="float-start">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-primary">All <span class="badge bg-secondary"
                                name="all">0</span>
                        </button>
                        <button type="button" class="btn btn-outline-primary">On Duty <span class="badge bg-success"
                                id="onlinecount">0</span>
                        </button>
                        <button type="button" class="btn btn-outline-primary">Inactive <span class="badge bg-warning"
                                id="inactivecount">0</span>
                        </button>
                        <button type="button" class="btn btn-outline-primary">Off Duty <span class="badge bg-danger"
                                id="offdutycount">0</span>
                        </button>
                        <button id="nw" name="nw" type="button" class="btn btn-outline-primary">Not working
                            <span class="badge bg-info">0</span></button>
                    </div>
                </div>
            </div>
            <div class="col-2 align-self-end align-items-end">
                <div class="form-group mt-2">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" checked id="autoRefreshSwitch">
                        <label class="custom-control-label" for="autoRefreshSwitch">Auto refresh</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                @foreach ($teams as $team)
                    <div class="card mt-2">
                        <div class="card-header bg-light">
                            <h6 class="card-title mb-0">{{ $team['name'] }} <span class="text-muted">(Total Employees:
                                    {{ $team['totalEmployees'] }})</span>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if (!$team['cardItems'])
                                <p>No checkins!</p>
                            @else
                                @foreach ($team['cardItems'] as $cardItem)
                                    <div
                                        class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 d-flex align-items-stretch flex-column">
                                        <div class="card radius-10 mb-3 shadow-lg" id="{{ $cardItem['id'] . 'card' }}">
                                            <div class="card-body">
                                                <div id="@(user.Id+nameof(user.IsOnline))"
                                                    class="d-flex flex-column flex-lg-row align-items-start justify-content-between gap-3 border-start border-success border-4">
                                                    <div class="d-flex align-items-center gap-3 ms-2 flex-shrink-0">
                                                        <div class="profile-circle">KP</div>
                                                        <div class="profile-info">
                                                            <h3 class="mb-1 fs-1 profile-name">{{ $cardItem['name'] }}</h3>
                                                            <p class="mb-0 profile-number">
                                                                {{ $settings->phone_country_code }}
                                                                -{{ $cardItem['phoneNumber'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="hstack gap-2 fs-2 align-self-start ms-2 ms-lg-0">
                                                        <div id="{{ $cardItem['id'] . 'IsWifiOn' }}">
                                                            <div class="placeholder-glow">
                                                                <span class="placeholder" style="width:25px;"></span>
                                                            </div>
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div class="d-flex gap-2 align-items-center"
                                                            id="{{ $cardItem['id'] . 'BatteryLevel' }}">
                                                            <div class="placeholder-glow">
                                                                <span class="placeholder" style="width:25px;"></span>
                                                            </div>
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div id="{{ $cardItem['id'] . 'IsGpsOn' }}">
                                                            <div class="placeholder-glow">
                                                                <span class="placeholder" style="width:25px;"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <ul class="list-group mt-4 radius-10">
                                                    <li class="list-group-item list-group-item-primary fs-01">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <p class="mb-0 text-primary">Attendance:
                                                                IN {{ $cardItem['attendanceInAt'] }}</p>
                                                            <a href="{{ route('timeLine') }}" class="mb-0"><span
                                                                    class="text-dark">Timeline</span> <span
                                                                    class="ms-2 text-primary"><i
                                                                        class="bi bi-calendar-check"></i></span></a>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item fs-01">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <p class="mb-0 text-secondary"><i
                                                                    class="bi bi-geo-alt-fill me-2"></i>Location</p>
                                                            <div class="text-dark text-end"
                                                                id="{{ $cardItem['id'] . 'location' }}">
                                                                <div class="placeholder-glow">
                                                                    <span class="placeholder" style="width:75px;"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item fs-01">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <p class="mb-0 text-secondary flex-grow-1"><i
                                                                    class="bi bi-clipboard2-check-fill me-2"></i>Last
                                                                updated on</p>
                                                            <p class="mb-0 text-truncate" style="max-width: 250px;">
                                                            <div class="text-dark text-end"
                                                                id="{{ $cardItem['id'] . 'UpdatedAt' }}">
                                                                <div class="placeholder-glow">
                                                                    <span class="placeholder" style="width:75px;"></span>
                                                                </div>
                                                            </div>
                                                            </p>
                                                            <button class="btn btn-sm" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseExample"><i
                                                                    class="bi bi-chevron-down ms-0"></i></button>
                                                        </div>

                                                        <div class="collapse" id="collapseExample">
                                                            <div
                                                                class="card card-body mb-0 border shadow-none mt-3 radius-10 bg-light">
                                                                <p><strong>Team : </strong> {{ $team['name'] }}</p>
                                                                <p><strong>Today's
                                                                        visits: {{ $cardItem['visitsCount'] }}</strong></p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </select>
    @endsection

    @section('script')
        <script>
            var x;
            // A $( document ).ready() block.
            $(document).ready(function() {
                countTimeStart();
                $("#autoRefreshSwitch").change(function(val) {
                    if ($('#autoRefreshSwitch').is(':checked')) {
                        //$('#autoRefreshSwitch').removeAttr('checked');
                        countTimeStart();

                    } else {
                        // $('#autoRefreshSwitch').attr('checked', 'checked');
                        countTimeStop();
                    }
                });
            });

            function initMap() {
                console.log('map initialized');
            }

            function getData() {
                $.ajax({
                    type: "GET",
                    url: '{{ route('dashboard.cardViewAjax') }}',
                    //data: { "name": $("#txtName").val() },
                    success: function(response) {
                        var onlineCount = 0;
                        var offlineCount = 0;
                        var inactiveCount = 0;
                        var offDutyCount = 0;
                        for (let i = 0; i < response.length; i++) {

                            var user = response[i];

                            console.log(user);
                            //Checkout out case
                            if (user.attendanceInAt.length !== 0 && user.attendanceOutAt.length !== 0) {
                                setCheckOut(user.id);
                                continue;
                            }
                            if (user.isOnline) {
                                setBattery(user.id, user.batteryLevel);
                                setGps(user.id, user.isGpsOn);
                                setWifi(user.id, user.isWifiOn);
                                onlineCount++;
                            } else {
                                clearBattery(user.id);
                                clearGps(user.id);
                                clearWifi(user.id);

                                //Checkedin only
                                if (user.attendanceInAt.length !== 0 && user.attendanceOutAt.length === 0) {
                                    inactiveCount++;

                                    //Not checkin
                                } else if (user.attendanceOutAt.length === 0 && user.attendanceInAt.length === 0) {
                                    offDutyCount++;

                                    //in and out
                                } else {
                                    offlineCount++;
                                }
                            }

                            setStatus(user.id, user.isOnline);

                            setLocation(user.id, user.latitude, user.longitude);

                            $("#" + user.id + "UpdatedAt").text(user.updatedAt);

                            // setInfo(user.id, user.attendanceInAt, user.attendanceOutAt, user.latitude, user.longitude);
                            //getReverseGeocodingData(user.latitude, user.longitude, user.id)
                        }

                        $('#onlinecount').text(onlineCount);
                        $('#offlinecount').text(offlineCount);
                        $('#inactivecount').text(inactiveCount);
                        $('#offdutycount').text(offDutyCount);
                        $('#allcount').text(onlineCount + offlineCount + offDutyCount + inactiveCount);
                    },
                    failure: function(response) {
                        console.log(response.responseText);
                    },
                    error: function(response) {
                        console.log(response.responseText);
                    }
                });
            }

            function setCheckOut(userId) {
                var locationSelector = $('#' + userId + 'location');
                locationSelector.html('');

                var batterySelector = $('#' + userId + 'BatteryLevel');
                batterySelector.html(`<a href="javascript:;" class="text-warning"><i class="bi bi-battery"></i></a>
                                   <span class="text-dark fs--1">-%</span>`);

                var gpsSelector = $("#" + userId + "IsGpsOn");
                gpsSelector.html('<a href="javascript:;" class="text-warning"><i class="bi bi-geo-alt"></i></a>');

                var wifiSelector = $("#" + userId + "IsWifiOn");

                wifiSelector.html('<a href="javascript:;" class="text-warning"><i class="bi bi-wifi"></i></a>');
            }

            function setLocation(userId, lat, lng) {
                var selector = $('#' + userId + 'location');

                selector.html(`<a href="http://www.google.com/maps/place/${lat},${lng}" target="_blank" class="text-primary"><i class="fas fa-location-arrow"></i>
                                                                                        Open in maps</a>`);
            }

            /* Info */
            function setInfo(userId, attIn, attOut, lat, lon) {
                var selector = '#' + userId + 'Info';
                var content = '';

                if (attIn.length === 0 && attOut.length === 0) {
                    content +=
                        ` <li class="small"><span class="fa-li"><i class="fas fa-window-close"></i></span> <b>Not checked in!</b></li>`;
                }

                if (attIn.length !== 0) {
                    content +=
                        `<li class="small"><span class="fa-li"><i class="fas fa-sign-in-alt"></i></span> <b>AttendanceIn:</b> ${attIn}</li>`
                }

                if (attOut.length !== 0) {
                    content +=
                        ` <li class="small" ><span class="fa-li"><i class="fas fa-sign-out-alt"></i></span> <b>AttendanceOut:</b> ${attOut}</li>`;
                }

                if (lat != 0 && lon != 0) {
                    content += `<li class="small" id="${userId + "location"}"></li>`
                }
                $(selector).html(content);
            }


            /* Battery */
            function setBattery(userId, per) {
                var selector = "#" + userId + "BatteryLevel";
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

                $(selector).html(content);
            }

            function clearBattery(userId) {
                var selector = "#" + userId + "BatteryLevel";
                $(selector).html(
                    `<a href="javascript:;" class="text-danger"><i class="bi bi-battery"></i></a>
                                                                                                                        <span class="text-dark fs--1">-%</span>`
                );
            }

            /* GPS */
            function setGps(userId, status) {
                var selector = "#" + userId + "IsGpsOn";
                var content = '';
                if (status) {
                    content = `<a href="javascript:;" class="text-success"><i class="bi bi-geo-alt"></i></a>`;
                } else {
                    content = `<a href="javascript:;" class="text-danger"><i class="bi bi-geo-alt"></i></a>`;
                }
                $(selector).html(content);
            }

            function clearGps(userId) {
                var selector = "#" + userId + "IsGpsOn";
                $(selector).html('');
            }

            /* Wifi */
            function setWifi(userId, status) {
                var selector = "#" + userId + "IsWifiOn";
                var content = '';
                if (status) {
                    content = ` <a href="javascript:;" class="text-success"><i class="bi bi-wifi"></i></a>`;
                } else {
                    content = ` <a href="javascript:;" class="text-danger"><i class="bi bi-wifi"></i></a>`;
                }
                $(selector).html(content);
            }

            function clearWifi(userId) {
                var selector = "#" + userId + "IsWifiOn";
                $(selector).html('');
            }

            /* Online Status */
            function setStatus(userId, status) {
                var selector = "#" + userId + "IsOnline";
                if (status) {
                    $(selector).removeClass('border-danger');
                    $(selector).addClass('border-success');
                } else {
                    $(selector).removeClass('border-success');
                    $(selector).addClass('border-danger');
                }

            }

            function countTimeStart() {
                x = setInterval(function() {
                    console.log("Timer called")
                    getData();
                }, 2000);
            }

            function countTimeStop() {
                if (x != undefined) {
                    clearInterval(x);
                }
            }

            function getReverseGeocodingData(lat, lng, id) {
                var selector = '#' + id + 'location';

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

                        address +=
                            `<span class="fa-li"><i class="fas fa-location-arrow"></i></span> <b>Last location: ${address}</b> `;
                        $(selector).html(address);

                    }
                });
            }
        </script>
    @endsection
