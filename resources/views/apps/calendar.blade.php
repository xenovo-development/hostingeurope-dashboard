@extends('layouts.vertical', ['page_title' => 'Calendar', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/fullcalendar/main.min.css'])
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
                <div class="alert alert-warning text-bg-warning border-0" role="alert">
                    <strong>Warning! - </strong> Dear host, you can follow all the booking processes of your property from the calendar below.
                    Our application under development will allow you to make your reservation from this calendar as soon as possible.
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="d-grid">
                                    <button class="btn btn-lg fs-16 btn-danger" id="btn-new-event">
                                        <i class="ri-add-circle-fill"></i> Make A Reservation
                                    </button>
                                </div>
                                <div id="external-events" class="mt-3">
                                    <p class="text-muted mt-3 mb-3"> From here you can make your reservations to your own apartment. Just simply drag and drop your apartment or click in the calendar</p>
                                    <h5 class=" mb-2">My Apartments</h5>
                                    @foreach($calendarData['listings'] as $listing)
                                        <div class="external-event bg-info-subtle text-info" data-class="bg-info"><i class="ri-focus-fill me-2 vertical-middle"></i>{{$listing['street']}}</div>
                                    @endforeach
                                </div>

                                <div class="mt-4 d-none d-xl-block">
                                    <h5 class="text-center">Rules</h5>

                                    <ul class="ps-3">
                                        <li class="text-muted mb-3">
                                            Rules are simple; yadee yadee yadaa, bla bla bla. This much days and that much days except the fact that this and that.
                                        </li>
                                    </ul>
                                    <div class="alert alert-warning mb-3">
                                            Until the short-term integration process of the application is completed, you can easily make your own reservation transactions from the following e-mail addresses: <strong>example@example.com</strong>
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
                            <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                <div class="modal-header py-3 px-4 border-bottom-0">
                                    <h5 class="modal-title" id="modal-title">Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body px-4 pb-4 pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="control-label form-label">Event Name</label>
                                                <input class="form-control" placeholder="Insert Event Name" type="text" name="title" id="event-title" required />
                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="control-label form-label">Category</label>
                                                <select class="form-select" name="category" id="event-category" required>
                                                    <option value="bg-danger" selected>Danger</option>
                                                    <option value="bg-success">Success</option>
                                                    <option value="bg-primary">Primary</option>
                                                    <option value="bg-info">Info</option>
                                                    <option value="bg-dark">Dark</option>
                                                    <option value="bg-warning">Warning</option>
                                                </select>
                                                <div class="invalid-feedback">Please select a valid event category</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- end modal-content-->
                    </div> <!-- end modal dialog-->
                </div>
                <!-- end modal-->
            </div>
            <!-- end col-12 -->
        </div> <!-- end row -->

    </div> <!-- container -->
@endsection

@section('script')
    @vite(['resources/js/pages/demo.calendar.js'])
    <script>
        let calendarReservations = @json($calendarData['reservations']);
        console.log(calendarReservations);
    </script>
@endsection
