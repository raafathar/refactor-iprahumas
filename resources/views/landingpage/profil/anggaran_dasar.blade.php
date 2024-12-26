@extends('frontend.layouts.main')
@include('frontend.layouts.header')
@include('frontend.layouts.footer')


@section('contents')
    <div class="main-wrapper overflow-hidden">
        <!-- ------------------------------------- -->
        <!-- banner Start -->
        <!-- ------------------------------------- -->
        <section class="py-14 section-dark"
            style="background-image: url({{ asset('assets/images/frontend-pages/bg-sejarah2.jpg') }}); background-size: cover; background-position: center;">
            <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 20vh">
                <div class="text-center">
                    <h1 class="fw-bolder text-white fs-12">Anggaran Dasar (AD/ART)</h1>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- banner End -->
        <!-- ------------------------------------- -->

        <!-- ------------------------------------- -->
        <!-- Anggaran Dasar (AD/ART) Start -->
        <!-- ------------------------------------- -->
        <section class="pt-4 pb-5">
            <div class="container-fluid">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0 d-flex justify-content-center align-items-center" style="min-height: 60vh;">
                        <iframe src="https://drive.google.com/file/d/151i7uLMlsbHCa4SrPhd2BYpU4QzLLov9/preview"
                            width="100%" height="100%"
                            style="max-width: 900px; aspect-ratio: 16 / 9; border: 1px solid black; border-radius: 12px;"
                            allow="autoplay">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Anggaran Dasar (AD/ART) End -->
        <!-- ------------------------------------- -->
    </div>
@endsection