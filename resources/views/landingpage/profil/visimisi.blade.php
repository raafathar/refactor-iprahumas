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
                    <h1 class="fw-bolder text-white fs-12">Visi & Misi</h1>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- banner End -->
        <!-- ------------------------------------- -->

        <!-- ------------------------------------- -->
        <!-- Visi & Misi Start -->
        <!-- ------------------------------------- -->
        <section class="visi-misi-section py-5">
            <div class="container">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6">
                        <h2 class="fw-bold mb-3">Visi Ikatan Pranata Humas</h2>
                        <p class="text-muted fs-5 mb-5">
                            Menjadi organisasi profesi Pranata Humas unggulan dalam mendukung pengelolaan komunikasi publik
                            yang efektif.
                        </p>

                        <h3 class="fw-semibold mb-4">Misi Ikatan Pranata Humas</h3>
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item">Meningkatkan citra dan reputasi positif Pemerintah</li>
                            <li class="list-group-item">Menyosialisasikan kebijakan dan program Pemerintah</li>
                            <li class="list-group-item">Membangun Sumber Daya Manusia Pranata Humas kompeten</li>
                            <li class="list-group-item">Memperkuat organisasi profesi Pranata Humas</li>
                        </ol>
                    </div>
                    <div class="col-lg-6">
                        <img src="../assets/images/logos/logo.png" alt="Visi Image" class="img-fluid rounded-4 shadow-sm">
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-lg-4">
                        <h4 class="fw-semibold mb-3">Core Values</h4>
                        <p class="text-muted">
                            <b>Berakhlak:</b> Berorientasi pelayanan, akuntabel, kompeten, harmonis, loyal, adaptif, dan
                            kolaboratif.
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="fw-semibold mb-3">Tagline</h4>
                        <p class="text-muted">
                            <b>Terpesona:</b> Terpercaya, Profesional, dan Bertalenta.
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="fw-semibold mb-3">Arti Logo</h4>
                        <p class="text-muted">
                            Logo menyimbolkan komunikasi antar manusia sebagai basis kerja JFPH dan keseimbangan sebagai
                            hasil aktivitas komunikasi.
                        </p>
                        <p class="text-muted"><b>Font:</b> Bersih, rapi, dan jernih.</p>
                        <p class="text-muted"><b>Warna:</b> Kontras dan berbobot.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Visi & Misi End -->
        <!-- ------------------------------------- -->
    </div>
@endsection
