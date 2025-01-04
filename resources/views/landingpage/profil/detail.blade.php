@extends('landingpage.layouts.main')
@include('landingpage.layouts.header')
@include('landingpage.layouts.footer')


@section('contents')
    <div class="main-wrapper overflow-hidden">
        <!-- ------------------------------------- -->
        <!-- banner Start -->
        <!-- ------------------------------------- -->
        {{-- <section class="bg-primary-subtle py-14"> --}}
        <section class="py-14 section-dark"
            style="background-image: url({{ asset($page->p_image_url) }}); background-size: cover; background-position: center;">
            <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 30vh">
                <div class="text-center">
                    <h1 class="fw-bolder text-white fs-12">{{ $page->p_title }}</h1>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- banner End -->
        <!-- ------------------------------------- -->

        <!-- ------------------------------------- -->
        <!-- sejarah Start -->
        <!-- ------------------------------------- -->
        <section class="pt-2 pt-md-14 pt-lg-8 pb-4 pb-md-5 pb-lg-14">
            <div class="custom-container">
                <div class="card shadow-none">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-12" id="contain-editor">
                                {{ $page->p_content }}
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Sejarah End -->
        <!-- ------------------------------------- -->
    </div>
@endsection
