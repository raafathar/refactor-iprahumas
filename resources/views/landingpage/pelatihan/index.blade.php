@extends('landingpage.layouts.main')
@include('landingpage.layouts.header')
@include('landingpage.layouts.footer')

@section('contents')
   <div class="main-wrapper overflow-hidden">
      <!-- ------------------------------------- -->  
      <!-- banner Start -->
      <!-- ------------------------------------- -->
      <section class="bg-primary py-5 mb-5">
         <div class="container mb-4">
            <div class="d-flex justify-content-between align-items-center">
               <div class="text-left">
                  <h2 class="fw-bolder fs-9 text-white">Pelatihan</h2>
               </div>
               <div class="d-flex justify-content-right align-items-center gap-2">
                  <select class="form-select w-auto bg-white" id="bulanSelect">
                  </select>
                  <select class="form-select w-auto bg-white" id="tahunSelect">
                  </select>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="owl-carousel owl-theme date-event-carousel" id="dateCarousel">
            </div>
         </div>
      </section>
      <!-- ------------------------------------- -->
      <!-- banner End -->
      <!-- ------------------------------------- -->
      <!-- ------------------------------------- -->
      <!-- List Start -->
      <!-- ------------------------------------- -->
      <section>         
         <div class="container">
            <div class="row" id="listAcara"></div>
         </div>
      </section>
      <!-- ------------------------------------- -->
      <!-- List End -->
      <!-- ------------------------------------- -->
   </div>
@endsection

@push('scripts')
   <script src="{{ asset('assets/js/feature/landingpage/pelatihan.js') }}"></script>
@endpush
