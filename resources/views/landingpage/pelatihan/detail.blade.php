@extends('landingpage.layouts.main')
@include('landingpage.layouts.header')
@include('landingpage.layouts.footer')



@section('contents')
<div class="main-wrapper overflow-hidden">
   <!-- ------------------------------------- -->
   <!-- banner Start -->
   <!-- ------------------------------------- -->
   <section class="pt-lg-14 py-lg-0 py-5 bg-primary-subtle">
      <div class="custom-container">
         <div class="text-center">
               <h2 class="text-dark fs-12 fw-bolder px-xl-12 my-9">
                  {{ $pelatihan->p_title }}
               </h2>
         </div>
         <div class="mt-7 mt-md-5">
               <img src="{{ $pelatihan->p_image }}"
                  alt="blog detail banner" class="img-fluid w-100 rounded-3 mb-n11">
         </div>
      </div>
   </section>
   <!-- ------------------------------------- -->
   <!-- banner End -->
   <!-- ------------------------------------- -->

   <!-- ------------------------------------- -->
   <!-- Details Start -->
   <!-- ------------------------------------- -->
   <section class="mt-11 pb-md-5 pb-lg-12 pt-lg-14">
      <div class="custom-container">
         <div class="row">
               <div class="col-lg-4">
                  <div class="d-flex flex-column gap-3">
                     <div class="py-9 d-flex flex-column gap-3 border-bottom">
                           <h4 class="fs-3 fw-bold text-uppercase text-muted mb-0 ">Contents</h4>
                           <a href="#mobile-first-approach" class="text-dark fs-4 fw-semibold link-primary">Deskripsi Pelatihan</a>
                           <a href="#mobile-first-approach" class="text-dark fs-4 fw-semibold link-primary">Luaran Pelatihan</a>
                           <a href="#mobile-first-approach" class="text-dark fs-4 fw-semibold link-primary">Peryaratan Peserta</a>
                           <a href="#mobile-first-approach" class="text-dark fs-4 fw-semibold link-primary">Jadwal Pelaksanaan</a>
                     </div>
                     <div class="py-9">
                           <h4 class="text-uppercase fs-3 fw-bold">Share</h4>
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
               <div class="col-lg-8 mb-lg-0 mb-7">
                  <div class="d-flex flex-column gap-sm-4 gap-3">
                     <div class="" id="mobile-first-approach">
                           <h3 class="fs-7 fw-bolder mb-sm-4 mb-3">
                              Deskripsi Pelatihan
                           </h3>
                           <p class="fs-4 mb-0">
                              {{ $pelatihan->p_content }}
                           </p>
                     </div>
                     <div class="" id="leverage-media">
                        <h3 class="fs-7 fw-bolder mb-sm-4 mb-3">
                           Jadwal Pelaksanan
                        </h3>
                        <div class="row">
                           <div class="col-4 d-flex gap-4">
                              <i class="ti ti-calendar text-dark fs-6"></i>
                              <p class="fs-4">Durasi pelatihan</p>
                           </div>
                           <div class="col-8">
                              <p class="fs-4">{{ $pelatihan->p_start_date }} - {{ $pelatihan->p_end_date }}</p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-4 d-flex gap-4">
                              <i class="ti ti-location text-dark fs-6"></i>
                              <p class="fs-4">Lokasi pelatihan</p>
                           </div>
                           <div class="col-8">
                              <p class="fs-4">{{ $pelatihan->p_type_training }}</p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-4 d-flex gap-4">
                              <i class="ti ti-users text-dark fs-6"></i>
                              <p class="fs-4">Kuota peserta</p>
                           </div>
                           <div class="col-8">
                              <p class="fs-4">{{ $pelatihan->p_kuota }}</p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-4 d-flex gap-4">
                              <i class="ti ti-analyze text-dark fs-6"></i>
                              <p class="fs-4">Status pelatihan</p>
                           </div>
                           <div class="col-8">
                              <p class="fs-4">{{ $pelatihan->p_status }}</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
      </div>
   </section>
   <!-- ------------------------------------- -->
   <!-- Details End -->
   <!-- ------------------------------------- -->
</div>
@endsection
