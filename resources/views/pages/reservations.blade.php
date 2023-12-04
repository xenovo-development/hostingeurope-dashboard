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
            <div class="alert alert-warning text-bg-warning border-0" role="alert">
                    <span
                        style="color: #464f5b;"><strong>Warning! - </strong> Dear host, This page represents the <strong>beta</strong>
                        stage of its development. Please note that this page is in its early access phase and will be much improved in terms of design and functionality in the future.
                        Thank you for your patience.</span>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{$reservationsData['listing']['street']}}</h4>
                    <p class="text-muted fs-14">
                        Here you can see all reservations to your listed property.
                    </p>

                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th scope="col">ID #</th>
                                <th scope="col">Listing Adress</th>
                                <th scope="col">Booking Date</th>
                                <th scope="col">Source</th>
                                <th scope="col">Guest</th>
                                <th scope="col">Check In</th>
                                <th scope="col">Check Out</th>
                                <th scope="col">Nights</th>
                                <th scope="col">Status</th>
                                <th scope="col">Transaction</th>
                                <th scope="col">Profit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php

                            @endphp
                            @forelse($reservationsData['reservations'] as $reservation)
                                @if($reservation['status'] == 'accepted' || $reservation['status'] == 'cancelled')
                                    @php
                                        $netRevenue = $reservation['subtotal'] - $reservation['channel_commission'] - $reservation->listing['cleaning_fee'];
                                    @endphp
                                    <tr>
                                        <th scope="row">{{$reservation['id']}}</th>
                                        <td class="table-user"><img src="{{$reservation['listing_photo']}}"
                                                                    alt="listing-photo"
                                                                    class="me-2 rounded-circle">{{$reservation->listing->street}}
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($reservation['created_at'])->format('M d Y D')}}</td>
                                        <td>{{$reservation['source']}}</td>
                                        <td class="table-user"><img src="{{$reservation['guest_photo'] ?? 'images/Asset 14.png'}}"
                                                                    alt="guest-photo"
                                                                    class="me-2 rounded-circle">{{$reservation['guest_name']}}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($reservation['checkIn'])->format('M d Y D') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($reservation['checkOut'])->format('M d Y D') }}</td>
                                        <td>{{$reservation['nights']}}</td>
                                        <td>{{ucfirst($reservation['status'])}}</td>
                                        @if(!$reservation->transactions->isEmpty())
                                            <td>Done
                                                {{--                                                <a href="{{route('second',['pages','transaction']).'?reservationId='.$reservation['id']}}"--}}
                                                {{--                                                   class="text-info fs-16 px-1" ><i--}}
                                                {{--                                                        class="ri-exchange-line" style="font-size: 20px"></i></a>--}}
                                            </td>
                                        @elseif($reservation['subtotal'] == 0)
                                            <td>No transaction</td>
                                            @else
                                            <td>Pending</td>
                                        @endif
                                        @if($reservation['subtotal'] == 0)
                                            <td><span
                                                    class="badge bg-success">{{'€ 0,00'}}</span>
                                            </td>
                                        @else
                                        <td><span
                                                class="badge bg-success">{{'€'.round($netRevenue -
                                            ($netRevenue * Auth()->user()['commission'] / 100),2)}}</span>
                                        </td>
                                        @endif
                                    </tr>
                                @endif
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
