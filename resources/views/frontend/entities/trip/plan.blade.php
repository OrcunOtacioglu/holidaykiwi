@extends('layouts.frontend')

@section('title')
    Plan your trip to London
@stop

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/frontend/pages/planner.css') }}">
    <style>
        #map {
            width: 100%;
            height: 400px;
            border-radius: 6px;
            box-shadow: 0 1px 8px 0 rgba(28,35,43,.15);
        }
    </style>
    <link rel="stylesheet" href="{{ asset('js/frontend/plugins/slider/lightslider.min.css') }}">
@stop

@section('content')
    <section class="trip-header">
        <div class="container-fluid">
            <div class="row" style="padding-left: 50px; padding-right: 50px;">
                <div class="destinations col-9">
                    <div class="destination" style="background: center / cover no-repeat url(https://lonelyplanetimages.imgix.net/mastheads/55425108.jpg?sharp=10&vib=20&w=2000); width: 100%">
                        <div class="destination-name d-flex justify-content-center align-items-center">
                            <h1>London</h1>
                        </div>
                    </div>
                </div>
                <div class="trip-summary col-3">
                    <div class="card mv-10 b-none br-6 box-shadow">
                        <div class="card-body text-right pb-0">
                            <p class="card-text duration">7 Days</p>
                            <div class="travelers">
                                <div class="travelers-count">
                                    <p class="card-text travelers">2 Travelers</p>
                                </div>
                                <div class="travelers-icon">
                                    <i class="icon ti-user"></i>
                                    <i class="icon ti-user"></i>
                                </div>
                            </div>
                            <p class="card-text destination-count">1 Destination</p>
                        </div>
                        <div class="card-footer text-center bg-none b-none">
                            <a href="#" class="btn btn-block btn-outline btn-kiwi">Add more destinations</a>
                            <a href="#" class="need-help">
                                Need Help? <i class="icon ti-help-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="map-preview">
        <div class="container-fluid">
            <div class="row" style="padding-left: 50px; padding-right: 50px;">
                <div class="col-md-12">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="similar-destinations">
        <div class="container-fluid">
            <div class="row" style="margin-top: 20px; padding-left: 50px; padding-right: 50px;">
                <div class="col-12">
                    <h3 class="section-title">Add more destinations</h3>
                </div>

                <div class="destinations col-9">
                    <div class="destination sm" style="background: center / cover no-repeat url(https://lonelyplanetimages.imgix.net/mastheads/24006223.jpg?sharp=10&vib=20&w=2000)">
                        <div class="destination-name d-flex justify-content-center align-items-center">
                            <h1>Manchester</h1>
                        </div>
                    </div>
                    <div class="destination sm" style="background: center / cover no-repeat url(https://lonelyplanetimages.imgix.net/mastheads/GettyImages-538290541_super.jpg?sharp=10&vib=20&w=2000)">
                        <div class="destination-name d-flex justify-content-center align-items-center">
                            <h1>Oxford</h1>
                        </div>
                    </div>
                    <div class="destination sm" style="background: center / cover no-repeat url(https://lonelyplanetimages.imgix.net/mastheads/GettyImages-109253935_medium.jpg?sharp=10&vib=20&w=2000)">
                        <div class="destination-name d-flex justify-content-center align-items-center">
                            <h1>York</h1>
                        </div>
                    </div>
                    <div class="destination sm" style="background: center / cover no-repeat url(https://lonelyplanetimages.imgix.net/mastheads/GettyImages-537376341_super%20.jpg?sharp=10&vib=20&w=2000)">
                        <div class="destination-name d-flex justify-content-center align-items-center">
                            <h1>Bath</h1>
                        </div>
                    </div>
                    <div class="destination sm" style="background: center / cover no-repeat url(https://lonelyplanetimages.imgix.net/mastheads/103763623.jpg?sharp=10&vib=20&w=2000)">
                        <div class="destination-name d-flex justify-content-center align-items-center">
                            <h1>Cambridge</h1>
                        </div>
                    </div>
                </div>

                <div class="add-destination col-3">
                    <div class="form-group">
                        <input type="text" id="search" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('footer.scripts')
    <script>
        let map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 51.507351, lng: -0.127758},
                zoom: 7,
                mapTypeControl: false,
                streetViewControl: false,
                fullscreenControl: false,
                styles: [
                    {
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#f5f5f5"
                            }
                        ]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#616161"
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "color": "#f5f5f5"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.land_parcel",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#bdbdbd"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#eeeeee"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#757575"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#e5e5e5"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#9e9e9e"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#757575"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#dadada"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#616161"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#9e9e9e"
                            }
                        ]
                    },
                    {
                        "featureType": "transit.line",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#e5e5e5"
                            }
                        ]
                    },
                    {
                        "featureType": "transit.station",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#eeeeee"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#c9c9c9"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#d5e4f1"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#9e9e9e"
                            }
                        ]
                    }
                ]
            });
            let marker = '/img/marker.svg';
            let mapMarker = new google.maps.Marker({
                position: {lat: 51.507351, lng: -0.127758},
                map: map,
                icon: marker
            })
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdpMB_vp0CXlEy49kSEO42duzmTXbTMQw&callback=initMap"
            async defer></script>
    <script src="{{ asset('js/frontend/plugins/slider/lightslider.min.js') }}"></script>
@stop