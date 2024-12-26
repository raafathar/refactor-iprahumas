@extends('frontend.layouts.main')
@include('frontend.layouts.header')
@include('frontend.layouts.footer')


@section('contents')
    <div class="main-wrapper overflow-hidden">
        <!-- ------------------------------------- -->
        <!-- banner Start -->
        <!-- ------------------------------------- -->
        {{-- <section class="bg-primary-subtle py-14"> --}}
        <section class="py-14 section-dark"
            style="background-image: url({{ asset('assets/images/frontend-pages/bg-sejarah2.jpg') }}); background-size: cover; background-position: center;">
            <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 20vh">
                <div class="text-center">
                    <h1 class="fw-bolder text-white fs-12">Struktur Organisasi</h1>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- banner End -->
        <!-- ------------------------------------- -->

        <!-- ------------------------------------- -->
        <!-- Struktur Organisasi Start -->
        <!-- ------------------------------------- -->
        <section class="pt-2 pt-md-14 pt-lg-8 pb-4 pb-md-5 pb-lg-14">
            <div class="container-fluid">
                <div class="card shadow-none border">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-lg-12 d-flex items-center justify-content-center pb-4 pb-md-5 pb-lg-14">
                                <div class="item rounded-4 overflow-hidden">
                                    <img src="{{ asset('assets/images/frontend-pages/struktur_organisasi.png') }}"
                                        alt="" class="img-fluid">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Struktur Organisasi End -->
        <!-- ------------------------------------- -->
    </div>
@endsection
