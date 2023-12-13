@extends('layouts.vertical', ['page_title' => 'Calendar', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/fullcalendar/main.min.css'])
    @vite(['node_modules/flatpickr/dist/flatpickr.min.css'])

@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hosting Europe</a></li>
                            <li class="breadcrumb-item active">Calendar</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Calendar</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                @if(!$calendarData['listings'])
                    <div class="alert alert-danger text-bg-danger border-0" role="alert">
                        <strong>Error! - </strong> No listings found.
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="d-grid">
                                    <button class="btn btn-lg fs-16 btn-danger" id="btn-new-event">
                                        <i class="ri-add-circle-fill"></i> Make A Reservation <br>
                                    </button>
                                </div>
                                <div id="external-events" class="mt-3">
                                    <p class="text-center"> Your remaining reservation days for this year: <strong
                                            class="p-1 text-bg-info rounded">{{Auth()->user()['days']}}</strong></p>
                                    <p></p>
                                    <h5 class=" mb-2">My Properties</h5>
                                    @forelse($calendarData['listings'] as $listing)
                                        <div class="external-event bg-info-subtle text-info" data-class="bg-info"><i
                                                class="ri-focus-fill me-2 vertical-middle"></i>{{$listing['street']}}
                                        </div>
                                    @empty
                                        <div class="external-event bg-info-subtle text-info" data-class="bg-info"><i
                                                class="ri-focus-fill me-2 vertical-middle"></i>No listings found
                                        </div>
                                    @endforelse
                                </div>
                                <div class="mt-4 d-none d-xl-block">
                                    <h5 class="text-center">Rules</h5>
                                    <ul class="ps-3">
                                        <li class="text-muted mb-3">From here you can make your reservations to your own
                                            apartment. Just simply drag and drop your apartment or click in the calendar
                                        </li>
                                        <li class="text-muted mb-3">
                                            It is not possible to make reservations for the next <strong>seven days</strong> from today's date.
                                        </li>
                                        <li class="text-muted mb-3">
                                            It is not possible to make more than <strong>forty</strong> reservations in a
                                            <strong>year.</strong>
                                        </li>
                                        <li class="text-muted mb-3">
                                            If you cancel your reservation <strong>two days </strong> or less before the
                                            check-in date, <strong>there will be no refund for the reservation
                                                fee.</strong>
                                        </li>
                                    </ul>

                                    <div class="alert alert-warning mb-3 text-center">
                                        Do you have any questions or any problems that you need to contact us about?
                                        Feel free to send a contact mail to us;
                                        <br><br>
                                        <a
                                            class="text-info" href="mailto:sm.sakarya@hostingeurope.info"><strong>sm.sakarya@hostingeurope.info</strong></a>
                                    </div>
                                </div>

                            </div> <!-- end col-->

                            <div class="col-lg-9">
                                <div class="mt-4 mt-lg-0">
                                    <div id="calendar"></div>
                                </div>
                            </div> <!-- end col -->

                        </div> <!-- end row -->
                    </div> <!-- end card body-->
                </div> <!-- end card -->

                <!-- Add New Event MODAL -->
                <div class="modal fade" id="event-modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="/reservations/store" method="POST" class="needs-validation" name="event-form"
                                  id="form-event" novalidate>
                                @csrf
                                <div class="modal-header py-3 px-4 border-bottom-0">
                                    <h5 class="modal-title" id="modal-title">Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body px-4 pb-4 pt-0">
                                    <div class="text-center">
                                        <img class="img-fluid" src="/images/Asset 14.png" alt="logo">
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="name">Name</label>
                                                <input class="form-control" type="text" name="name" id="name"
                                                       value="{{Auth()->user()['name']}}" required/>
                                                <div class="invalid-feedback">Invalid username</div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="listing-select">Property</label>
                                            <select class="form-select" id="listing-select" name="listing-select" required>
                                                <option value="" selected>Choose...</option>
                                                @foreach($calendarData['listings'] as $listing)
                                                    <option
                                                        value="{{$listing['street']}}">{{$listing['street']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                            <div class="mb-3">
                                                <label for="date">Check-in , Check-out</label>
                                                <input value="" class="form-control text" name="date" id="date"
                                                       required>
                                                <div class="invalid-feedback">Please select a valid check-in and check-out date
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <button type="button" class="btn btn-danger" id="btn-delete-event">Delete
                                            </button>
                                        </div>
                                        <div class="col-8 text-end">
                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="submit" class="btn btn-success" id="btn-save-event">Make
                                                Reservation
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- end modal-content-->
                    </div><!-- end modal dialog-->
                </div>
                <!-- end modal-->
                <div class="modal fade" id="loading-modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <h4 class="text-center mt-xxl-4">Sending reservation request...</h4>
                            <div class="text-center mb-3 mt-3">
                                <div class="spinner-border avatar-lg text-primary m-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="notice-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="text-center">
                                <i class="ri-alert-line h1 text-warning"></i>
                                <h4 class="mt-2">Are you sure?</h4>
                                <p class="mt-3">Are you sure you want to send a reservation request? <strong class="text-danger">You cant
                                        cancel once you make your reservation!</strong></p>
                                <div class="row col-sm-auto">
                                    <div class="col">
                                        <label class="" for="reservation-name">Name</label>
                                        <h5 class="text-info" id="reservation-name"></h5>
                                    </div>
                                    <div class="col">
                                        <label for="property-name">Property</label>
                                        <h5 class="text-info" id="property-name"></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="checkIn">Check-in</label>
                                        <h5 class="text-info " id="check-in"></h5>
                                    </div>
                                    <div class="col">
                                        <label for="checkIn">Check-out</label>
                                        <h5 class="text-info" id="check-out"></h5>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger my-2" data-bs-dismiss="modal"
                                        id="cancel-btn">Cancel
                                </button>
                                <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal"
                                        id="accept-btn">Accept
                                </button>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- end col-12 -->
        </div> <!-- end row -->

    </div> <!-- container -->
@endsection

@section('script')
    @vite(['resources/js/pages/demo.calendar.js'])
    <script>
        let calendarReservations = @json($calendarData['reservations']);
    </script>
@endsection
