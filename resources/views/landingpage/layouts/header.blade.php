@section('header')
    <!-- ------------------------------------- -->
    <!-- Header Start -->
    <!-- ------------------------------------- -->
    <header class="header-fp p-0 w-100">
        <nav class="navbar navbar-expand-lg bg-white-subtle py-2 py-lg-9">
            <div class="custom-container d-flex align-items-center justify-content-between">
                <a href="/" class="text-nowrap logo-img">
                    <img src="{{ asset('assets/images/logos/logo.png') }}" class="dark-logo" alt="Logo-Dark" height="58" />
                    <img src="{{ asset('assets/images/logos/logo.png') }}" class="light-logo" alt="Logo-light" height="58" />
                </a>
                <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="ti ti-menu-2 fs-8"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 gap-xl-7 gap-8 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fs-4 fw-bold text-dark link-primary" href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link fs-4 fw-bold text-dark link-primary" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil
                                <i class="ti ti-chevron-down fs-3"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropdown-pages" data-url="{{ route('get.pages') }}">
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-4 fw-bold text-dark link-primary" href="/berita">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-4 fw-bold text-dark link-primary" href="{{ url('/pelatihan') }}">Pelatihan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-4 fw-bold text-dark link-primary"
                                href="../main/frontend-pricingpage.html">Publikasi</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link fs-4 fw-bold text-dark link-primary" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Keanggotaan
                                <i class="ti ti-chevron-down fs-3"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('syarat') }}">Syarat
                                        keanggotaan</a></li>
                                <li><a class="dropdown-item" href="{{ route('panduan') }}">Panduan
                                        pendaftaran</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-4 fw-bold text-dark link-primary" href="{{ route('kontak') }}">Kontak</a>
                        </li>
                    </ul>
                    <div class="d-flex gap-3 justify-content-center align-items-center">
                        <div>
                            <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#searchModal">
                                <i class="ti ti-search fs-6"></i>
                            </a>
                        </div>
                        @if(auth()->check())
                            <div>
                                <a href="{{ route('dashboard') }}" class="btn btn-primary py-8 px-9">Dashboard</a>
                            </div>
                        @else
                            <div>
                                <a href="{{ route('login') }}" class="btn btn-primary py-8 px-9">Masuk</a>
                            </div>
                            <div>
                                <a href="{{ route('register') }}"
                                    class="btn btn-light border border-dark py-8 px-9">Daftar</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- ------------------------------------- -->
    <!-- Header End -->
    <!-- ------------------------------------- -->

<!--  Search Bar -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content rounded-1">
            <div class="modal-header border-bottom">
                <input type="search" class="form-control fs-3" placeholder="Cari berita, pengumuman, pelatihan dll"
                    id="search" autocomplete="off" />
                <a href="javascript:void(0)" data-bs-dismiss="modal" class="lh-1">
                    <i class="ti ti-x fs-5 ms-3"></i>
                </a>
            </div>
            <div class="modal-body message-body d-none" id="rekomendasi">
                <ul class="mb-0 py-1">
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="">
                            <div class="d-flex align-items-center gap-2">
                                <i class="ti ti-search"></i>
                                <span class="d-block">Cari pelatihan tentang <b></b></span>
                            </div>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="">
                            <div class="d-flex align-items-center gap-2">
                                <i class="ti ti-search"></i>
                                <span class="d-block">Cari berita tentang <b></b></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- ------------------------------------- -->
<!-- Responsive Sidebar Start -->
<!-- ------------------------------------- -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <a href="../main/frontend-landingpage.html">
            <img src="{{ asset('assets/images/logos/logo.png') }}" alt="Logo-light" width="100" />
        </a>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-unstyled ps-0">

            <li class="mb-1">
                <a href="{{ route('landingpage') }}" class="px-0 fs-4 d-block text-dark link-primary w-100 py-2">
                    Beranda
                </a>
            </li>

            <li class="mb-1">
                <a href="{{ route('berita') }}" class="px-0 fs-4 d-block text-dark link-primary w-100 py-2">
                    Berita
                </a>
            </li>

            <li class="mb-1">
                <a href="{{ route('pelatihan.index') }}" class="px-0 fs-4 d-block text-dark link-primary w-100 py-2">
                    Pelatihan
                </a>
            </li>
            
            <li class="mb-1">
                <a href="{{ route('syarat') }}" class="px-0 fs-4 d-block text-dark link-primary w-100 py-2">
                    Syarat keanggotaan
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('panduan') }}" class="px-0 fs-4 d-block text-dark link-primary w-100 py-2">
                    Panduan Pendaftaran
                </a>
            </li>

            <li class="mb-1">
                <a href="{{ route('kontak') }}" class="px-0 fs-4 d-block text-dark link-primary w-100 py-2">
                    Kontak
                </a>
            </li>


            <li class="mt-4">
                <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-2">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-light border border-dark w-100">Daftar</a>
            </li>

        </ul>
    </div>
</div>
<!-- ------------------------------------- -->
<!-- Responsive Sidebar End -->
<!-- ------------------------------------- -->

@endsection

@push('scripts')
<script src="{{ asset('assets/js/feature/landingpage/header-handle.js') }}"></script>
@endpush
