@extends('landingpage.layouts.main')
@include('landingpage.layouts.header')
@include('landingpage.layouts.footer')

@section('contents')
    <div class="main-wrapper overflow-hidden">
        <!-- banner Start -->
        <!-- ------------------------------------- -->
        <section class="pt-7 py-lg-0">
            <div id="carouselHero" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://web.komdigi.go.id/resource/dXBsb2Fkcy8yMDI0LzEwLzIxLzc5MDljY2NhLWYzNGMtNDE5YS05YWM4LTM0OWY2YjliODUxMC5wbmc"
                            class="d-block w-100 object-fit-cover" alt="..." style="height: 80vh;">
                        <div class="carousel-caption d-none d-md-block custom-caption">
                            <h5 class="text-white">First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://web.komdigi.go.id/resource/dXBsb2Fkcy8yMDI0LzExLzAzLzY4YTQ0ZDVkLWIxMjMtNDBhMy04ZjU2LTQxMTY1ODBhMzJkZi5qcGVn"
                            class="d-block w-100 object-fit-cover" alt="..." style="height: 80vh;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white">Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselHero" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselHero" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- banner End -->
        <!-- ------------------------------------- -->
        <!-- notify start -->
        <section class="bg-primary py-9">
            <div class="container-fluid">
                <div class="d-flex gap-3 justify-content-center align-items-center flex-md-nowrap flex-wrap">
                    <span class="badge text-black bg-white p-2">Informasi Terbaru</span>
                    <p class="text-white fs-4 mb-0 text-md-start text-center">Lorem ipsum dolor sit amet consectetur,
                        adipisicing elit.</p>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- notify end -->
        <!-- Service Start -->
        <!-- ------------------------------------- -->
        <section class="pt-5 pt-md-14 pt-lg-12 pb-3 pb-md-7 pb-lg-14">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card shadow-none border-2 rounded-24">
                            <div class="card-body text-center py-14">
                                <img src="../assets/images/frontend-pages/icon-member.svg" alt="icon">
                                <h5 class="my-3 fw-bolder fs-5">Bergabung Menjadi Anggota</h5>
                                <p class="mb-0 fs-4">Daftar menjadi anggota dan jadilah bagian dari Pranata Humas
                                    Profesional</p>
                            </div>
                        </div>
                        <div class="card shadow-none border-2 rounded-24">
                            <div class="card-body text-center py-14">
                                <img src="../assets/images/frontend-pages/icon-media.svg" alt="icon" height="220"
                                    width="220">
                                <h5 class="my-3 fw-bolder fs-5">Rilis Media</h5>
                                <p class="mb-0 fs-4">Informasi atau pernyataan resmi terkait isu yang berkembang di
                                    masyarakat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card shadow-none border-2 rounded-24">
                            <div class="card-body text-center py-14">
                                <img src="../assets/images/frontend-pages/icon-credit.svg" alt="icon">
                                <h5 class="my-3 fw-bolder fs-5">Klinik Angkat Kredit</h5>
                                <p class="mb-0 fs-4">Cari peraturan dan konsultasi terkait angka kreditmu</p>
                            </div>
                        </div>
                        <div class="card shadow-none border-2 rounded-24">
                            <div class="card-body text-center py-14">
                                <img src="../assets/images/frontend-pages/icon-hoax.svg" alt="icon" height="220">
                                <h5 class="my-3 fw-bolder fs-5">Tangkal Informasi Hoax</h5>
                                <p class="mb-0 fs-4">Klarifikasi dan berantas informasi hoax yang beredar di masyarakat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card shadow-none border-2 rounded-24">
                            <div class="card-body text-center py-14">
                                <img src="../assets/images/frontend-pages/icon-reading.svg" alt="icon">
                                <h5 class="my-3 fw-bolder fs-5">Literasi untuk Profesi Humas</h5>
                                <p class="mb-0 fs-4">Kenali dan pahami lebih jauh terkait kehumasan dan komunikasi</p>
                            </div>
                        </div>
                        <div class="card shadow-none border-2 rounded-24">
                            <div class="card-body text-center py-14">
                                <img src="../assets/images/frontend-pages/icon-class.svg" alt="icon" height="220">
                                <h5 class="my-3 fw-bolder fs-5">Kelas Belajar Kehumasan</h5>
                                <p class="mb-0 fs-4">Tingkatkan kemampuan dan kehumasanmu melalui kelas belajar kami</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Service End -->

        <!-- ------------------------------------- -->
        <!-- Statistik Start -->
        <!-- ------------------------------------- -->
        <section class="pb-5 pb-md-14 pb-lg-12">
            <div class="custom-container">
                <div class="py-5 py-md-14 py-lg-12 bg-primary-subtle rounded-3 overflow-hidden">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <h2 class="fs-10 fw-bolder text-center mb-10 pb-lg-4 px-2 px-md-0">
                                Statistik organisasi kami pada beberapa dekade terakhir
                            </h2>
                        </div>
                    </div>
                    <div class="w-100 text-nowrap">
                        <div class="slide-animation1 d-flex gap-7 text-nowrap">
                            <!-- Feature Item 1 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-users text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">1.200 Anggota Terdaftar</p>
                            </div>
                            <!-- Feature Item 2 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-video text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">200 Siaran Pers</p>
                            </div>
                            <!-- Feature Item 3 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-notebook text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">16 Publikasi</p>
                            </div>
                            <!-- Feature Item 1 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-users text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">1.200 Anggota Terdaftar</p>
                            </div>
                            <!-- Feature Item 2 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-video text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">200 Siaran Pers</p>
                            </div>
                            <!-- Feature Item 3 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-notebook text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">16 Publikasi</p>
                            </div>
                            <!-- Feature Item 1 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-users text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">1.200 Anggota Terdaftar</p>
                            </div>
                            <!-- Feature Item 2 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-video text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">200 Siaran Pers</p>
                            </div>
                            <!-- Feature Item 3 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-notebook text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">16 Publikasi</p>
                            </div>
                            <!-- Feature Item 1 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-users text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">1.200 Anggota Terdaftar</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 text-nowrap">
                        <div class="slide-animation2 d-flex gap-7 text-nowrap my-4">
                            <!-- Feature Item 1 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-users text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">1.200 Anggota Terdaftar</p>
                            </div>
                            <!-- Feature Item 2 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-video text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">200 Siaran Pers</p>
                            </div>
                            <!-- Feature Item 3 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-notebook text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">16 Publikasi</p>
                            </div>
                            <!-- Feature Item 1 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-users text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">1.200 Anggota Terdaftar</p>
                            </div>
                            <!-- Feature Item 2 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-video text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">200 Siaran Pers</p>
                            </div>
                            <!-- Feature Item 3 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-notebook text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">16 Publikasi</p>
                            </div>
                            <!-- Feature Item 1 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-users text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">1.200 Anggota Terdaftar</p>
                            </div>
                            <!-- Feature Item 2 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-video text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">200 Siaran Pers</p>
                            </div>
                            <!-- Feature Item 3 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-notebook text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">16 Publikasi</p>
                            </div>
                            <!-- Feature Item 1 -->
                            <div
                                class="feature-item bg-white rounded-3 gap-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-users text-primary fs-8" aria-hidden="true"></i>
                                <p class="fs-3 fw-semibold mb-0 gap-3">1.200 Anggota Terdaftar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Statistik End -->

        <!-- Berita Start -->
        <!-- ------------------------------------- -->
        <section class="pt-2 pt-md-10 pt-lg-8">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <p class="fs-4 fw-normal text-center mb-7 mb-md-5">
                            Hi👋, Baca berita terbaru melalui <span class="fw-bolder">Rilis Media</span>, ikuti
                            informasi terbaru hanya melalui laman website resmi kami!
                        </p>
                    </div>
                </div>
                <div class="row">
                    @foreach ($beritaTerbaru as $berita)                        
                        <div class="col-lg-4 col-md-6">
                            <div class="card rounded-3 overflow-hidden">
                                <a href="{{ route('detail.berita', ['slug' => $berita->b_slug]) }}" class="position-relative">
                                    <img src="{{ $berita->b_image_url }}"
                                        alt="blog image" class="w-100 img-fluid">
                                    <div class="position-absolute bottom-0 end-0 me-9 mb-3">
                                        <p class="text-dark fs-2 px-2 rounded-pill bg-white mb-0 ">2 min read</p>
                                    </div>
                                    <div class="position-absolute bottom-0 ms-7 mb-n9">
                                        <img src="../assets/images/profile/user-3.jpg" alt="user" class="rounded-circle"
                                            width="44px" height="44px">
                                    </div>
                                </a>
                                <div class="mt-10 px-7 pb-7 h-100">
                                    <div class="d-flex gap-3 flex-column h-100 justify-content-between">
                                        <div class="d-flex">
                                            <p class="fs-2 px-2 rounded-pill bg-muted bg-opacity-25 text-dark mb-0">
                                                {{ $berita->user_name }}
                                            </p>
                                        </div>
                                        <a href="{{ route('detail.berita', ['slug' => $berita->b_slug]) }}" class="fs-15 fw-bolder">
                                            {{ $berita->b_title }}
                                        </a>
                                        <p class="mb-0 fs-4 truncated-text">
                                            {{ $berita->b_content }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex gap-9">
                                                <div class="d-flex gap-2">
                                                    <i class="ti ti-eye fs-5 text-dark"></i>
                                                    <p class="mb-0 fs-2 fw-semibold text-dark">{{ $berita->b_view }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="ti ti-circle fs-2"></i>
                                                <p class="mb-0 fs-2 fw-semibold text-dark">{{ $berita->b_date }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="ml-3 text-center">
                    <a href="{{ route('berita') }}" class="btn btn-primary px-9 py-6">Lihat Lebih Banyak</a>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Berita End -->

        <!-- Testimonial Start -->
        <!-- ------------------------------------- -->
        <section class="py-5 py-md-14 py-lg-12 ">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-5">
                        <div class="">
                            <h2 class="fs-10 fw-bolder mb-3">
                                Bagaimana Tanggapan
                                <br /> Anggota Kami?
                            </h2>
                            <p class="fs-4">
                                Umpan balik dari anggota kami adalah bukti nyata komitmen, kualitas dan pengembangan pada
                                organisasi.
                                Simak tanggapan mereka selama berorganisasi.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="border p-7 p-md-5 rounded-3">
                            <h3 class="fs-7 fw-semibold text-dark">Tanggapan mereka</h3>
                            <div class="owl-carousel testimonial-carousel owl-theme">
                                <div class="item">
                                    <div>
                                        <div class="d-flex align-items-center gap-3 my-4">
                                            <div><img src="../assets/images/profile/user-3.jpg" alt="user"
                                                    class="rounded-circle" width="44px" height="44px"></div>
                                            <p class="fs-4 fw-semibold mb-0 text-dark">Sophia Johnson</p>
                                        </div>
                                        <p class="fs-5 pb-4 mb-4">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div>
                                        <div class="d-flex align-items-center gap-3 my-4">
                                            <div><img src="../assets/images/profile/user-3.jpg" alt="user"
                                                    class="rounded-circle" width="44px" height="44px"></div>
                                            <p class="fs-4 fw-semibold mb-0 text-dark">Sophia Johnson</p>
                                        </div>
                                        <p class="fs-5 pb-4 mb-4">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Testimonial End -->

        <!-- Develop Start -->
        <!-- ------------------------------------- -->
        <section>
            <div class="custom-container">
                <div class="bg-primary-subtle rounded-3 position-relative overflow-hidden">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="py-lg-12 ps-lg-12 py-5 px-lg-0 px-9">
                                <h2 class="fs-10 fw-bolder text-lg-start text-center">
                                    Jadilah Bagian dari Ikatan Pranata Humas Indonesia
                                </h2>
                                <div
                                    class="d-flex justify-content-lg-start justify-content-center gap-3 my-4 flex-sm-nowrap flex-wrap">
                                    <a href="/login" class="btn btn-primary py-6 px-9">Masuk
                                        untuk Anggota</a>
                                    <a href="/register"
                                        class="btn border border-dark py-6 px-9">Daftar Menjadi Anggota</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-lg-block d-none">
                            <img src="../assets/images/frontend-pages/icon-join-us.svg" alt="banner"
                                class="position-absolute develop-feature-rich">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Develop End -->
    </div>
@endsection
