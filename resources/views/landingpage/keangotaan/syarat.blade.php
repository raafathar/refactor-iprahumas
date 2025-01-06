@extends('landingpage.layouts.main')
@include('landingpage.layouts.header')
@include('landingpage.layouts.footer')



@section('contents')
   <div class="main-wrapper overflow-hidden">
      <!-- ------------------------------------- -->
      <!-- banner Start -->
      <!-- ------------------------------------- -->
      <section class="bg-primary py-5">
         <div class="container">
            <div class="d-flex justify-content-between align-items-center">
               <div class="text-left">
                  <h2 class="fw-bolder fs-9 text-white">Syarat keanggotaan</h2>
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
      <section class="pt-5 pt-md-14 pt-lg-12 pb-4 pb-md-5 pb-lg-14">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="d-flex flex-column gap-sm-4 gap-3">
                     <div>
                        <h3 class="fs-7 fw-bolder mb-sm-4 mb-3">
                           Syarat Keanggotaan
                        </h3>
                        <p class="fs-4">
                           Dengan ini, untuk rekan-rekan lulusan Informatika, Ilmu Komputer, Sistem Informasi, Teknologi Informasi, Sistem Komputer, Teknik Komputer, Manajemen Informasi, Komputer Akuntansi, Pratisi dibidang Informatika, Akademisi bidang Informatika/Ilmu Komputer dan sebagainya yang masih mempunyai niat untuk bersama membangun Indonesia (NKRI) diharapkan dapat bergabung pada Rakornas, Kongres dan Semnas atau Kegiatan IAII ini.
                        </p>
                     </div>
                     <div>
                        <h3 class="fs-7 fw-bolder mb-sm-4 mb-3">
                           Persyaratan
                        </h3>
                        <p class="fs-4">
                           <ul class="list mb-0">
                              <li>
                                 <p class="fs-4 mb-1">
                                    Memiliki komitmen untuk terus aktif pada kegiatan organisasi Ikatan Pranata Humas Indonesia
                                 </p>
                              </li>
                              <li>
                                 <p class="fs-4 mb-1">
                                    Melakukan pendaftaran secara online melalui tautan <a href="">iprahumas.id</a>
                                 </p>
                              </li>
                              <li>
                                 <p class="fs-4 mb-1">
                                    Mengisi biodata secara lengkap pada formulir pendaftaran (sebelum melakukan pendaftaran baca juga
                                    panduan pendaftaran melalui <a href="">iprahumas.id/panduanpendaftaran</a>)
                                 </p>
                              </li>
                           </ul>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- ------------------------------------- -->
      <!-- List End -->
      <!-- ------------------------------------- -->
   </div>
@endsection
