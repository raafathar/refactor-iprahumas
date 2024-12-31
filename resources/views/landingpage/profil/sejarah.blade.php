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
                    <h1 class="fw-bolder text-white fs-12">Sejarah Singkat IPRAHUMAS</h1>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- banner End -->
        <!-- ------------------------------------- -->

        <!-- ------------------------------------- -->
        <!-- sejarah Start -->
        <!-- ------------------------------------- -->
        <section class="pt-2 pt-md-14 pt-lg-8 pb-4 pb-md-5 pb-lg-14">
            <div class="container-fluid">
                <div class="card shadow-none border">
                    <div class="card-body p-4">
                        <div class="row">
                            {{-- <div class="col-lg-12 d-flex items-center justify-content-center pb-4 pb-md-5 pb-lg-14">
                                <div class="item rounded-4 overflow-hidden">
                                    <img src="{{ asset('assets/images/frontend-pages/bg-sejarah.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="shop-content">
                                    <h4 class="text-center text-wrap mb-3">Ikatan Pranata Humas (IPRAHUMAS)</h4>
                                    <p class="mb-3">Ikatan Pranata Humas (Iprahumas) Indonesia didirikan pada tahun 2015,
                                        yang pembentukannya dilandasi oleh Peraturan Menteri Pendayagunaan Aparatur Negara
                                        dan Reformasi Birokrasi Nomor 6 Tahun 2014 tentang Jabatan Fungsional Pranata
                                        Hubungan Masyarakat dan Angka Kreditnya.</p>
                                    <p class="mb-3">Iprahumas merupakan mitra kerja Direktorat Jenderal Informasi dan
                                        Komunikasi Publik, Kementerian Komunikasi dan Informatika (Kementerian Kominfo)
                                        sebagai instansi Pembina Jabatan Fungsional Pranata Humas di Indonesia.</p>
                                    <p class="mb-3">Jabatan Fungsional Pranata Humas (JFPH) merupakan jabatan fungsional
                                        yang keberadaannya diatur dalam Keppres Nomor 87 Tahun 1999, jabatan fungsional
                                        adalah kedudukan yang menunjukkan tugas, tanggungjawab, wewenang dan hak Pegawai
                                        Negeri Sipil (PNS) dalam satuan tugas organisasi yang dalam melaksanakan tugasnya
                                        didasarkan pada keahlian atau keterampilan tertentu serta mandiri.</p>
                                    <p class="mb-3">Pranata humas sebagai salah satu jabatan fungsional PNS yang diberi
                                        tugas, tanggung jawab, wewenang dan hak secara penuh oleh pejabat yang berwenang
                                        untuk melakukan kegiatan pelayanan informasi dan kehumasan, baik informasi berskala
                                        nasional maupun daerah/lokal</p>
                                    <p class="mb-3">Berdasarkan Permenpan RB No. 6 Tahun 2014, Pranata Humas adalah
                                        Pegawai Negeri Sipil yang diberi tugas, tanggung jawab, wewenang dan hak secara
                                        penuh oleh pejabat yang berwenang untuk melakukan kegiatan pelayanan informasi dan
                                        kehumasan.</p>
                                    <p class="mb-3">Jabatan Fungsional Pranata Humas dibedakan menjadi :</p>
                                    <ol class="mb-3">
                                        <li class="mb-3">Pranata Humas Tingkat Terampil; pranata humas yang mempunyai
                                            kualifikasi teknis
                                            atau penunjang professional yang pelaksanaan tugas dan fungsinya mensyaratkan
                                            penguasaan pengetahuan teknis di bidang kehumasan. Jenjang jabatan Pranata Humas
                                            tingkat terampil ; a) Pranata Humas Pelaksana Pemula (gol II/a); b) Pranata
                                            Humas Pelaksana (gol II/b-II/d); c) Pranata Humas Pelaksana Lanjutan A (gol
                                            III/a-III/b); dan d) Pranata Humas Penyelia (gol III/c-III/d).
                                        </li>
                                        <li>Pranata Humas Tingkat Ahli; pranata humas yang mempunyai kualifikasi
                                            professional yang pelaksanaan tugas dan fungsinya mensyaratkan ilmu pengetahuan
                                            dan teknologi di bidang kehumasan. Jenjang jabatan Pranata Humas tingkat ahli ;
                                            a) Pranata Humas Pertama (gol III/a-III/b); b) Pranata Humas Muda (gol III/c) c)
                                            Pranata Humas Madya (gol IV/a-IV/c).</li>
                                    </ol>
                                    <p class="mb-3">Pranata Humas merupakan Jabatan karier sebagaimana juga dengan Jabatan
                                        Struktural, yang apabila berprestasi dapat dinaikkan pangkatnya setiap dua tahun
                                        sekali setingkat lebih tinggi jika telah memenuhi syarat angka kredit yang
                                        ditetapkan serta DP3 sekurang-kurangnya bernilai baik dalam 2 (dua) tahun terakhir
                                        dan bahkan jabatannya dapat dinaikkan setiap tahun. Bagi yang berprestasi baik akan
                                        diberi prioritas kemudahan.
                                    </p>
                                    <p class="mb-3">Dalam ketentuan umum PermenpanRB tersebut dijelaskan bahwa kegiatan
                                        Pranata Humas adalah melakukan perencanaan, penyediaan dan penyebarluasan informasi
                                        dan pelaksanaan hubungan kelembagaan dalam rangka meningkatkan hubungan yang
                                        harmonis antara lembaga yang ada dalam masyarakat. Butir-butir kegiatan dan ruang
                                        lingkup rincian kegiatan Pranata Humas saat ini tengah disempurnakan.</p>
                                    <p class="mb-3">Tugas pokok pranata humas adalah melakukan kegiatan pelayanan
                                        informasi dan kehumasan. Meliputi perencanaan pelayanan informasi dan kehumasan,
                                        pelayanan informasi, pelaksanaan hubungan kelembagaan, dan pelaksanaan hubungan
                                        personil serta pengembangan pelayanan informasi dan kehumasan. Artinya, semua tugas
                                        pelayanan informasi dan kehumasan termasuk dalam cakupan penilaian jabatan
                                        fungsional pranata humas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Sejarah End -->
        <!-- ------------------------------------- -->
    </div>
@endsection
