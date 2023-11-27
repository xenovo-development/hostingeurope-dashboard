@extends('layouts.vertical', ['page_title' => 'Reservations', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
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
                            <li class="breadcrumb-item active">Reservations</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Reservations <span class="text-muted">(Beta)</span></h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">List of Reservations</h4>
                        <p class="text-muted fs-14">
                            Here you can see all reservations to your listed property.
                        </p>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Listing Adress</th>
                                    <th scope="col">Listing Title</th>
                                    <th scope="col">Booking Date</th>
                                    <th scope="col">Source</th>
                                    <th scope="col">Guest Name</th>
                                    <th scope="col">Check In</th>
                                    <th scope="col">Check Out</th>
                                    <th scope="col">Nights</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Revenue</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $perPage = $reservationsData['reservations']->perPage();
                                    $currentPage = $reservationsData['reservations']->currentPage();
                                    $counterStart = $perPage * ($currentPage - 1);
                                @endphp
                                @forelse($reservationsData['reservations'] as $reservation)
                                <tr>
                                    <th scope="row">{{$counterStart + $loop->iteration}}</th>
                                    <td>{{$reservation->listing->street}}</td>
                                    <td>{{$reservation->listing->name}}</td>
                                    <td>{{\Carbon\Carbon::parse($reservation['created_at'])->format('M d Y D')}}</td>
                                    <td>{{$reservation['source']}}</td>
                                    <td>{{$reservation['guest_name']}}</td>
                                    <td>{{ \Carbon\Carbon::parse($reservation['checkIn'])->format('M d Y D') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reservation['checkOut'])->format('M d Y D') }}</td>
                                    <td>{{$reservation['nights']}}</td>
                                    <td>{{ucfirst($reservation['status'])}}</td>
                                    <td>{{'€'.$reservation['net_revenue'] - ($reservation['net_revenue'] * Auth()->user()['commission'] / 100)}}</td>
                                </tr>
                                    @empty
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>No reservations found</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
            {{$reservationsData['reservations']->links('vendor.pagination.bootstrap-5')}}
    </div> <!-- container -->
@endsection
