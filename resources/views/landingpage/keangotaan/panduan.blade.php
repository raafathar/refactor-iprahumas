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
                  <h2 class="fw-bolder fs-9 text-white">Panduan pendaftaran</h2>
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
      <section class="pt-5 pt-md-14 pt-lg-12">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="d-flex flex-column gap-sm-4 gap-3">
                     <div>
                        <h3 class="fs-7 fw-bolder mb-sm-4 mb-3">
                           Tata cara pendaftaran anggota
                        </h3>
                        <p class="fs-4">
                           <ul class="list mb-0">
                              <li>
                                 <p class="fs-5 mb-3">
                                    Mengisi formulir pendaftaran melalui <a href="">iprahumas.id</a>
                                 </p>
                                 <img src="../assets/images/frontend-pages/panduan-pendaftaran/form-page.png" alt="" class="w-100 img-fluid mb-5">
                              </li>
                              <li>
                                 <p class="fs-5">
                                    Harap melakukan pembayaran untuk pendaftaran rekening Bank Mandiri IAII no. Rek:130-00-2209999-1 atas nama Ikatan Ahli Informatika Indonesia
                                 </p>
                              </li>
                              <li>
                                 <p class="fs-5">
                                    Terdapat beberapa file yang harus dilampirkan dengan ketentuan dibawah ini:
                                    <br>Foto resmi ukuran 4x3 (format file JPG, JPEG atau PNG)
                                    <br>Scan KTP (Pastikan scan KTP terlihat jelas dengan format file JPG, JPEG, PNG atau PDF)
                                    <br>Bukti pembayaran jika telah melakukan transfer pada no. rekening yang tertera diatas (format file JPG, JPEG, PNG atau PDF)
                                 </p>
                              </li>
                              <li>
                                 <p class="fs-5">
                                    Pastikan semua isian biodata dan file telah diupload dengan benar, jika sudah klik tombol submit.
                                 </p>
                              </li>
                              <li>
                                 <p class="fs-5">
                                    Jika pendaftaran sudah berhasil, harap menunggu untuk disetujui pendaftaran oleh pihak terkait.
                                 </p>
                              </li>
                              <li>
                                 <p class="fs-5">
                                    Status pendaftaran akan dikirimkan paling lambat 3x24 jam melalui alamat email, jika pendaftaran anda disetujui
                                    maka akan mendapatkan nomor keanggotaan dan akun untuk anggota resmi Ikatan Pranata Humas Indonesia.
                                 </p>
                              </li>
                              <li>
                                 <p class="fs-5 mb-3">
                                    Jika anda telah menerima nomor keanggotaan dan akun resmi anggota maka anda telah resmi menjadi bagian dari Ikatan Pranata Humas Indonesia dan Selamat Beproses!
                                 </p>
                                 <img src="../assets/images/frontend-pages/panduan-pendaftaran/email.png" alt="" class="w-100 img-fluid mb-5">
                              </li>
                           </ul>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
@endsection
