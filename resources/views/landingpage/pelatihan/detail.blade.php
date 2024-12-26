@extends('frontend.layouts.main')
@include('frontend.layouts.header')
@include('frontend.layouts.footer')



@section('contents')
<div class="main-wrapper overflow-hidden">
   <!-- ------------------------------------- -->
   <!-- banner Start -->
   <!-- ------------------------------------- -->
   <section class="pt-lg-14 py-lg-0 py-5 bg-primary-subtle">
      <div class="container-fluid">
         <div class="text-center">
               <div class="d-flex justify-content-center">
                  <p class="fs-2 px-2 rounded-pill bg-muted bg-opacity-25 text-dark mb-0">
                     Web Development
                  </p>
               </div>
               <h2 class="text-dark fs-12 fw-bolder px-xl-12 my-9">
                  Building responsive websites: tips and tricks for modern developers
               </h2>
         </div>
         <div class="mt-7 mt-md-5">
               <img src="https://proglat-assets.kemnaker.go.id/programs/57d2c0ad-c254-4a2d-b317-3806c3962d6b/cover-images/XUFcT9NQXe2BKx0pNYwgmBIOBpnORP5ZkpaBLKv2.jpeg"
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
      <div class="container-fluid">
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
                              <a href="#" class="border round-40 hstack justify-content-center rounded-circle"
                                 data-bs-toggle="tooltip" data-bs-title="Instagram">
                                 <img src="../assets/images/frontend-pages/icon-instagram.svg" alt="instagram">
                              </a>
                              <a href="#" class="border round-40 hstack justify-content-center rounded-circle"
                                 data-bs-toggle="tooltip" data-bs-title="YouTube">
                                 <img src="../assets/images/frontend-pages/icon-youtube.svg" alt="youtube">
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
                              Starting with mobile design and then scaling up is a widely recommended approach. By
                              prioritizing the mobile experience, developers can ensure that the most critical
                              content is accessible on smaller screens. Once the mobile version is optimized,
                              expanding to larger screens becomes much easier.
                           </p>
                     </div>
                     <div class="" id="leverage-media">
                           <h3 class="fs-7 fw-bolder mb-sm-4 mb-3">
                              Luaran Pelatihan
                           </h3>
                           <p class="fs-4">
                              Media queries are CSS techniques that apply styles based on the screen size or
                              device characteristics. By using media queries, developers can create breakpoints in
                              their design, ensuring that the layout adapts to different screen widths. For
                              instance, you might want to change the font size or adjust the padding on a smaller
                              screen. A simple example of a media query is:
                           </p>
                     </div>
                     <div class="" id="leverage-media">
                           <h3 class="fs-7 fw-bolder mb-sm-4 mb-3">
                              Persyaratan Peserta
                           </h3>
                           <p class="fs-4">
                              Media queries are CSS techniques that apply styles based on the screen size or
                              device characteristics. By using media queries, developers can create breakpoints in
                              their design, ensuring that the layout adapts to different screen widths. For
                              instance, you might want to change the font size or adjust the padding on a smaller
                              screen. A simple example of a media query is:
                           </p>
                     </div>
                     <div class="" id="leverage-media">
                        <h3 class="fs-7 fw-bolder mb-sm-4 mb-3">
                           Jadwal Pelaksanan
                        </h3>
                        <div class="row">
                           <div class="col-4 d-flex gap-4">
                              <i class="ti ti-briefcase text-dark fs-6"></i>
                              <p class="fs-4">Batas pendaftaran</p>
                           </div>
                           <div class="col-8">
                              <p class="fs-4">20 Oktober 2024</p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-4 d-flex gap-4">
                              <i class="ti ti-calendar text-dark fs-6"></i>
                              <p class="fs-4">Durasi pelatihan</p>
                           </div>
                           <div class="col-8">
                              <p class="fs-4">20 Oktober 2024 - 14 November 2024</p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-4 d-flex gap-4">
                              <i class="ti ti-location text-dark fs-6"></i>
                              <p class="fs-4">Lokasi pelatihan</p>
                           </div>
                           <div class="col-8">
                              <p class="fs-4">Online</p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-4 d-flex gap-4">
                              <i class="ti ti-users text-dark fs-6"></i>
                              <p class="fs-4">Kuota peserta</p>
                           </div>
                           <div class="col-8">
                              <p class="fs-4">400</p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-4 d-flex gap-4">
                              <i class="ti ti-eye text-dark fs-6"></i>
                              <p class="fs-4">Dilihat sebanyak</p>
                           </div>
                           <div class="col-8">
                              <p class="fs-4">400</p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-4 d-flex gap-4">
                              <i class="ti ti-book text-dark fs-6"></i>
                              <p class="fs-4">Silabus pelatihan</p>
                           </div>
                           <div class="col-8">
                              <a href="">
                                 <p class="fs-4">Download</p>
                              </a>
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
