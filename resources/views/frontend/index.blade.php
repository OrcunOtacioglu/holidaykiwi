@extends('layouts.frontend')

@section('title')
    Holidaykiwi
@stop

@section('custom.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop

@section('content')
    <section class="main-header">
        <div class="container">
            <div class="row">
                <div class="col">

                    <h1 class="motto">Travel planning evolved</h1>
                    <h2 class="motto-description">Choose your destination and start planning your trip</h2>

                    <!-- Destination -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="icon ti-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="city" placeholder="Enter city, region, country">
                        </div>
                    </div>
                    <!-- End Destination -->

                    <!-- Date Range picker -->
                    <div id="daterange" class="selectbox pull-right">
                        <span class="checkIn">
                            <span class="icon-wrapper">
                                <i class="icon ti-calendar"></i>
                            </span>
                            <span class="date" id="check-in" data-date="">July 10, 2018</span>
                        </span>
                        <span class="checkOut">
                            <span class="icon-wrapper">
                                <i class="icon ti-calendar"></i>
                            </span>
                            <span class="date" id="check-out" data-date="">July 18, 2018</span>
                        </span>
                    </div>
                    <!-- End Date Range picker -->

                    <!-- Number of travelers -->
                    <div class="traveler-dropdown">
                        <div class="icon-wrapper">
                            <i class="icon ti-user"></i>
                        </div>
                        <div class="value-wrapper">
                            <div class="placeholder">
                                <span id="total-travelers">2 adults</span>
                                <span id="travelers-text">Travelers</span>
                            </div>
                            <ul class="traveler-dropdown-menu">
                                <li data-traveler="1">
                                    <a href="javascript:void(0)">Solo traveler</a>
                                    <span>
                                        <i class="icon ti-user"></i>
                                    </span>
                                </li>
                                <li data-traveler="2">
                                    <a href="javascript:void(0)">Couple/Pair</a>
                                    <span>
                                        <i class="icon ti-user"></i>
                                        <i class="icon ti-user"></i>
                                    </span>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Family travelers</a>
                                    <span>
                                        <i class="icon ti-user"></i>
                                        <i class="icon ti-user"></i>
                                        <i class="icon ti-user"></i>
                                        <i class="icon ti-user"></i>
                                    </span>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Group travelers</a>
                                    <span>
                                        <i class="icon ti-user"></i>
                                        <i class="icon ti-user"></i>
                                        <i class="icon ti-user"></i>
                                        <i class="icon ti-user"></i>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End number of travelers -->
                    <form action="#" id="trip-details" method="get">
                        <input type="hidden" id="destination">
                        <input type="hidden" id="form-checkIn">
                        <input type="hidden" id="form-checkOut">
                        <input type="hidden" id="traveler-count">
                        <div class="searchbutton-wrapper">
                            <a href="javascript:void(0)" class="search-button" onclick="sendTripData()">
                                <i class="icon ti-ruler-pencil"></i> Start planning
                            </a>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <div class="travel-bg"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
        </div>
    </section>
@stop

@section('footer.scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $('#daterange').flatpickr({
            mode: "range",
            minDate: "today",
            dateFormat: "Y-m-d",
            showMonths: 2,
            onClose: function(selectedDates, dateStr, instance) {
                let humanReadable = parseHumanReadableDates(dateStr);
                $('#check-in').text(humanReadable['checkIn']);
                $('#check-out').text(humanReadable['checkOut']);
                $('#form-checkIn').val(humanReadable['checkIn']);
                $('#form-checkOut').val(humanReadable['checkOut']);
            },
        });

        function parseHumanReadableDates(dateStr) {
            let splitted = dateStr.split(' to ');

            let checkIn = new Date(Date.parse(splitted[0]));
            let checkInDate = checkIn.toDateString().split(' ');
            let readableCheckIn = checkInDate[1] + ' ' + checkInDate[2] + ',' + checkInDate[3];

            let checkOut = new Date(Date.parse(splitted[1]));
            let checkOutDate = checkOut.toDateString().split(' ');
            let readableCheckOut = checkOutDate[1] + ' ' + checkOutDate[2] + ',' + checkOutDate[3];

            return {
                checkIn: readableCheckIn,
                checkOut: readableCheckOut
            };
        }
    </script>
    <script>
        $(document).ready(function () {
            travelerDropdown();
        });
        function travelerDropdown() {
            let dropdown = $('.traveler-dropdown');

            dropdown.on('click', function (event) {
                $(this).toggleClass('active');
                return false;
            });

            let travelerOptions = $('.traveler-dropdown-menu').children();
            travelerOptions.on('click', function () {
                let opt = $(this);
                let count = opt.data('traveler');
                let adults = ' adult';
                let travelers = 'Traveler';

                if (count > 1) {
                    travelers = 'Travelers';
                    adults = ' adults'
                }

                $('#total-travelers').text(count + adults);
                $('#travelers-text').text(travelers);
                $('#traveler-count').val(count);
            })
        }

        function sendTripData() {
            let destination = $('#destination');
            destination.val($('#city').val());

            let data = {
                checkIn: $('#form-checkIn').val(),
                checkOut: $('#form-checkOut').val(),
                destination: destination.val(),
                travelers: $('#traveler-count').val()
            };

            axios.post('/trip', {
                data: data
            })
                .then(response => {
                    if (response.status === 200) {
                        window.setTimeout(function () {
                            location.href = response.data.next;
                        }, 1500);
                    }
                })
                .catch(error => {
                    console.log(error);
                })
        }
    </script>
@stop