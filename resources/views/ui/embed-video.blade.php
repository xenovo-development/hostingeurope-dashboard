@extends('layouts.vertical', ['page_title' => 'Embed Video', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Attex</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Base UI</a></li>
                            <li class="breadcrumb-item active">Embed Video</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Embed Video</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Responsive embed video 21:9</h4>
                        <p class="text-muted fs-14">Use class <code>.ratio-21x9</code></p>

                        <!-- 21:9 aspect ratio -->
                        <div class="ratio ratio-21x9">
                            <iframe src="https://www.youtube.com/embed/PrUxWZiQfy4?autohide=0&showinfo=0&controls=0"></iframe>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->

                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Responsive embed video 1:1</h4>
                        <p class="text-muted fs-14">Use class <code>.ratio-1x1</code></p>

                        <!-- 1:1 aspect ratio -->
                        <div class="ratio ratio-1x1">
                            <iframe src="https://www.youtube.com/embed/PrUxWZiQfy4?ecver=1"></iframe>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Responsive embed video 16:9</h4>
                        <p class="text-muted fs-14">Use class <code>.ratio-16x9</code></p>

                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/PrUxWZiQfy4?autohide=0&showinfo=0&controls=0"></iframe>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->

                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Responsive embed video 4:3</h4>
                        <p class="text-muted fs-14">Use class <code>.ratio-4x3</code></p>

                        <!-- 4:3 aspect ratio -->
                        <div class="ratio ratio-4x3">
                            <iframe src="https://www.youtube.com/embed/PrUxWZiQfy4?ecver=1"></iframe>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->

    <!-- End Content-->
@endsection
