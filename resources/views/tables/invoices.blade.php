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
                            <li class="breadcrumb-item active">Invoices</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Invoices</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Invoices</h4>
                    <p class="text-muted fs-14">
                        Here you can see all invoices of you.
                    </p>

                    <div class="table-responsive">
                        <table class="table table-striped mb-0 text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Issue Year</th>
                                <th scope="col">Issue Month</th>
                                <th scope="col">Issue Giver</th>
                                <th scope="col">Issue Receiver</th>
                                <th scope="col">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $contractStart = \Carbon\Carbon::create(Auth()->user()['contract_start']);
                                $now = \Carbon\Carbon::now();
                                $months = [];

                                while ($contractStart->lte($now)) {
                                    $months[] = [
                                        'start' => $contractStart->copy()->startOfMonth()->format('Y-m-d'),
                                        'end' => $contractStart->copy()->endOfMonth()->format('Y-m-d')
                                    ];
                                    $contractStart->addMonth();
                                }
                            @endphp
                            @foreach ($months as $month)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ \Carbon\Carbon::create($month['start'])->format('Y') }}</td>
                                    <td>{{ \Carbon\Carbon::create($month['end'])->format('M') }}</td>
                                    <td>Hosting Europe</td>
                                    <td>{{Auth()->user()['name']}}</td>
                                    <td><a type="button" class="btn btn-light text-sm-center"
                                           href="/pages/invoice?start={{$month['start']}}&end={{$month['end']}}">
                                            <i class="ri-article-line"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- container -->
@endsection
