@extends('landingpage.layouts.main')
@include('landingpage.layouts.header')
@include('landingpage.layouts.footer')



@section('contents')
    <div class="main-wrapper overflow-hidden">
        <!-- ------------------------------------- -->
        <!-- Banner Start -->
        <!-- ------------------------------------- -->
        <section class="bg-primary-subtle pt-lg-14 py-lg-0 py-5">
            <div class="container">
                <div class="text-center">
                    <div class="d-flex justify-content-center">
                        {{-- <p class="fs-2 px-2 rounded-pill bg-muted bg-opacity-25 text-dark mb-0">Web Development</p> --}}
                    </div>
                    <h2 class="text-dark fs-12 fw-bolder px-xl-12 my-9">
                        {{ $berita->b_title }}
                    </h2>
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <div class="d-flex gap-2">
                            <i class="ti ti-user fs-5 text-dark"></i>
                            <p class="mb-0 fs-2 fw-semibold text-dark">{{ $berita->user_name }}</p>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="ti ti-circle fs-2"></i>
                            <p class="mb-0 fs-2 fw-semibold text-dark">{{ $berita->b_date }}</p>
                        </div>
                        <div class="d-flex gap-2">
                            <i class="ti ti-eye fs-5 text-dark"></i>
                            <p class="mb-0 fs-2 fw-semibold text-dark">{{ $berita->b_view }}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-7 mt-md-5 d-flex justify-content-center align-items-center">
                    <img src="{{ $berita->b_image_url }}"
                        alt="blog detail banner" class="img-fluid rounded-3 mb-n11 img-berita">
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Banner End -->
        <!-- ------------------------------------- -->
        <!-- ------------------------------------- -->
        <!-- Details Start -->
        <!-- ------------------------------------- -->
        <section class="mt-11 pb-5 pt-lg-14">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="contain-editor">
                            {!! html_entity_decode($berita->b_content) !!}
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="py-9 d-flex justify-content-end align-items-center gap-6">
                            <h3 class="fs-4 fw-semibold">Bagikan</h3>
                            <div class="d-flex gap-6">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="border round-40 hstack justify-content-center rounded-circle"
                                    data-bs-toggle="tooltip" data-bs-title="Facebook">
                                    <img src="{{ asset('assets/images/frontend-pages/icon-facebook.svg') }}" alt="facebook">
                                </a>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode(url()->current()) }}" target="_blank" class="border round-40 hstack justify-content-center rounded-circle"
                                    data-bs-toggle="tooltip" data-bs-title="Whatsapp">
                                    <img src="{{ asset('assets/images/frontend-pages/icon-whatsapp.svg') }}" alt="whatsapp">
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}" target="_blank" class="border round-40 hstack justify-content-center rounded-circle"
                                    data-bs-toggle="tooltip" data-bs-title="Twitter">
                                    <img src="{{ asset('assets/images/frontend-pages/icon-twitter.svg') }}" alt="twitter">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Details End -->
        <!-- ------------------------------------- -->
        <!-- ------------------------------------- -->
        <!-- Berita Lainnya -->
        <!-- ------------------------------------- -->
        <section>
            <div class="container">
                <h3 class="fw-bolder fs-7 text-left mb-5">Berita Lainnya</h3>
                <div class="row">
                    @foreach ($beritaLainnya as $beritaContent)                    
                        <div class="col-md-6 col-lg-4">
                            <div class="card overflow-hidden hover-img">
                                <div class="position-relative">
                                    <a href="{{ route('detail.berita', ['slug' => $beritaContent->b_slug]) }}" onclick="updateView('{{ $berita->b_slug }}')">
                                        <img src="{{ $beritaContent->b_image_url }}" class="card-img-top card-berita-image-container" alt="modernize-img">
                                    </a>
                                </div>
                                <div class="card-body p-4">
                                    <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm  mt-3">{{ $beritaContent->user_name }}</span>
                                    <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary card-berita-judul"
                                    href="{{ route('detail.berita', ['slug' => $beritaContent->b_slug]) }}" 
                                    onclick="updateView('{{ $beritaContent->b_slug }}')">
                                    {{ $beritaContent->b_title }}
                                    </a>
                                    <div class="d-flex align-items-center gap-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="ti ti-eye text-dark fs-5"></i>{{ $beritaContent->b_view }}
                                        </div>
                                        <div class="d-flex align-items-center fs-2 ms-auto">
                                            <i class="ti ti-point text-dark"></i>{{ $beritaContent->b_date }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Berita Lainnya End -->
        <!-- ------------------------------------- -->
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/feature/landingpage/count-views.js') }}"></script>
@endpush

