@extends('landingpage.layouts.main')
@include('landingpage.layouts.header')
@include('landingpage.layouts.footer')

@section('contents')

    <div class="main-wrapper overflow-hidden">
        <!-- ------------------------------------- -->
        <!-- banner Start -->
        <!-- ------------------------------------- -->
        <section class="bg-primary py-5 mb-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-left">
                        <h4 class="fw-bolder fs-9 text-white">Berita</h4>
                    </div>
                    <div class="d-flex justify-content-right align-items-center gap-2">
                        <select class="form-select w-auto bg-white" id="sort-by">
                            <option>Urutkan berdasarkan</option>
                            <option value="newest">Berita Terbaru</option>
                            <option value="popular">Berita Terpopuler</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- banner End -->
        <!-- ------------------------------------- -->

        <!-- ------------------------------------- -->
        <!-- List Start -->
        <!-- ------------------------------------- -->
        <div class="container">
            <div class="row" id="posts"></div>
        </div>
        <!-- ------------------------------------- -->
        <!-- List End -->
        <!-- ------------------------------------- -->

        <!-- ------------------------------------- -->
        <!-- Pagination Start -->
        <!-- ------------------------------------- -->
        <nav aria-label="...">
            <ul class="pagination justify-content-center mb-0 mt-4" id="pagination"></ul>
        </nav>
        <!-- ------------------------------------- -->
        <!-- Pagination End -->
        <!-- ------------------------------------- -->
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/feature/landingpage/berita.js') }}"></script>
@endpush