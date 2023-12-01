@extends('layouts.vertical', ['page_title' => 'Invoice', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reservations</a></li>
                            <li class="breadcrumb-item active">Transaction</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Transaction</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Invoice Logo-->
                        <div class="clearfix">
                            <div class="float-start mb-3">
                                <img src="/images/logo-dark.png" alt="dark logo" height="60">
                            </div>
                            <div class="float-end">
                                <h4 class="m-0 d-print-none">Transaction</h4>
                            </div>
                        </div>

                        <!-- Invoice Detail-->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="float-start mt-3">
                                    <p><b>Hosting Europe</b></p>
                                    <address>
                                        Hosting Europe Şirket Resmi Ünvan<br>
                                        Hosting Europe Şirket Resmi Adres<br>
                                        <abbr title="Phone">Phone:</abbr> (123) 456-7890
                                    </address>
                                </div>

                            </div><!-- end col -->
                            <div class="col-sm-4 offset-sm-2">
                                <div class="mt-3 float-sm-end">
                                    <p class="fs-13"><strong>Issue Date: </strong>
                                        &nbsp;&nbsp;&nbsp; {{\Carbon\Carbon::now()->format('m/d/Y')}}</p>
                                    <p class="fs-13"><strong>Transaction Status: </strong> <span class="badge bg-success float-end">Paid</span></p>
                                    <p class="fs-13"><strong>Reservation ID: </strong> <span class="float-end">#{{$transactionData['reservation']['hostify_id']}}</span></p>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row mt-4">
                            <div class="col-4">
                                <h6>Billing Address</h6>
                                <address>
                                    {{Auth()->user()['name']}}<br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    <abbr title="Phone">Phone:</abbr> (123) 456-7890
                                </address>
                            </div> <!-- end col-->

                            <div class="col-4">
                                <h6>Shipping Address</h6>
                                <address>
                                    {{Auth()->user()['name']}}<br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    <abbr title="Phone">Phone:</abbr> (123) 456-7890
                                </address>
                            </div> <!-- end col-->

                            <div class="col-4">
                                <div class="text-sm-end">
                                    {!! QrCode::size(100)->generate(Request::fullUrl()); !!}
                                </div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-sm table-centered table-hover table-borderless mb-0 mt-3">
                                        <thead class="border-top border-bottom bg-light-subtle border-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Service</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th class="text-end">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <b>Reservation</b> <br />
                                                    {{$transactionData['details']}}
                                                </td>
                                                <td>1</td>
                                                <td>{{$transactionData['currency'] . $transactionData['without_tax']}}</td>
                                                <td class="text-end">{{$transactionData['currency'] . $transactionData['without_tax']}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="clearfix pt-3">
                                    <h6 class="text-muted">Notes:</h6>
                                    <small>
                                        All accounts are to be paid within 7 days from receipt of
                                        invoice. To be paid by cheque or credit card or direct payment
                                        online. If account is not paid within 7 days the credits details
                                        supplied as confirmation of work undertaken will be charged the
                                        agreed quoted fee noted above.
                                    </small>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-sm-6">
                                <div class="float-end mt-3 mt-sm-0">
                                    <p><b>Sub-total:</b> <span class="float-end">{{$transactionData['currency'] .$transactionData['without_tax']}}</span></p>
                                    <p><b>VAT (12.5):</b> <span class="float-end">{{$transactionData['currency'] . $transactionData['tax_subtract']}}</span></p>
                                    <h3>{{$transactionData['currency'] . $transactionData['without_cleaning']}}
                                        {{$transactionData['currency']}}</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                        <div class="d-print-none mt-4">
                            <div class="text-end">
                                <a href="javascript:window.print()" class="btn btn-primary"><i class="ri-printer-line"></i> Print</a>
                                <a href="javascript:void(0);" class="btn btn-info">Download</a>
                            </div>
                        </div>
                        <!-- end buttons -->

                    </div> <!-- end card-body-->
                </div> <!-- end card -->
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div> <!-- container -->
@endsection
