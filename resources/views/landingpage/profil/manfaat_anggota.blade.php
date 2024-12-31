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
            style="background-image: url({{ asset('assets/images/frontend-pages/bg-sejarah2.jpg') }}); background-size: cover; background-position: center;">
            <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 20vh">
                <div class="text-center">
                    <h1 class="fw-bolder text-white fs-12">Manfaat Anggota</h1>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- banner End -->
        <!-- ------------------------------------- -->

        <!-- ------------------------------------- -->
        <!-- Visi & Misi Start -->
        <!-- ------------------------------------- -->
        <section class="pt-2 pt-md-14 pt-lg-8 pb-4 pb-md-5 pb-lg-14">
            <div class="container-fluid">
                <div class="card shadow-none border">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="card shadow-none w-100 bg-warning-subtle rounded-24">
                                    <div class="card-body text-center px-8 py-5">
                                        <img src="{{ asset('assets/images/frontend-pages/manfaat1.svg') }}" height="50px"
                                            alt="icon">
                                        <h5 class="my-3 fw-bolder fs-5">NETWORKING</h5>
                                        <p class="mb-0 fs-4">Memperluas dan menambah jaringan kemitraan dengan humas
                                            kementerian/lembaga/daerah</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="card shadow-none w-100 bg-secondary-subtle rounded-24">
                                    <div class="card-body text-center px-8 py-5">
                                        <img src="{{ asset('assets/images/frontend-pages/manfaat2.svg') }}" height="50px"
                                            alt="icon">
                                        <h5 class="my-3 fw-bolder fs-5">TAHU BANYAK INFORMASI</h5>
                                        <ul class="mb-0 fs-4">
                                            <li class="mb-3">Update informasi dari berbagai kementerian/lembaga/daerah
                                            </li>
                                            <li class="mb-3">Update kegiatan kehumasan</li>
                                            <li>Mendapatkan klarifikasi berita/isu dan bersama-sama menangkal <span
                                                    class="text-danger">HOAX</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="card shadow-none w-100 bg-danger-subtle rounded-24">
                                    <div class="card-body text-center px-8 py-5">
                                        <img src="{{ asset('assets/images/frontend-pages/manfaat3.svg') }}" height="50px"
                                            alt="icon">
                                        <h5 class="my-3 fw-bolder fs-5">SKILL IMPROVEMENT</h5>
                                        <p class="mb-0 fs-4">Kelas belajar/workshop/seminar dengan biaya khusus anggota dan
                                            mendapatkan sertifikat yang dapat diajukan sebagai AK 0,5 (unsur utama) atau AK1
                                            (unsur penunjang)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="card shadow-none w-100 bg-warning-subtle rounded-24">
                                    <div class="card-body text-center px-8 py-5">
                                        <img src="{{ asset('assets/images/frontend-pages/manfaat4.svg') }}" height="50px"
                                            alt="icon">
                                        <h5 class="my-3 fw-bolder fs-5">PELUANG KERJA SAMA</h5>
                                        <p class="mb-0 fs-4">Berpeluang menjalin kerja sama professional dalam
                                            menyelenggaarakan acara kehumasan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="card shadow-none w-100 bg-secondary-subtle rounded-24">
                                    <div class="card-body text-center px-8 py-5">
                                        <img src="{{ asset('assets/images/frontend-pages/manfaat5.svg') }}" height="50px"
                                            alt="icon">
                                        <h5 class="my-3 fw-bolder fs-5">JURNAL/ARTIKEL ILMIAH</h5>
                                        <p class="mb-0 fs-4">Memperoleh akses ke jurnal atau artikel ilmiah kehumasan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Visi & Misi End -->
        <!-- ------------------------------------- -->
    </div>
@endsection
