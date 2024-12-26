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
                    <select class="form-select w-auto bg-white">
                        <option value="news">Urutkan berdasarkan</option>
                        <option value="news">Berita Terbaru</option>
                        <option value="top">Berita Terpopuler</option>
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
        <div class="row">
            <div class="col-md-6 col-lg-8">
                <div class="card blog blog-img-one position-relative overflow-hidden hover-img">
                    <div class="card-body position-relative">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Mollie Underwood">
                                    <img src="../assets/images/profile/user-4.jpg" alt="modernize-img"
                                        class="rounded-circle img-fluid" width="40" height="40">
                                </div>
                                <span class="badge text-bg-primary fs-2 fw-semibold">Gadget</span>
                            </div>
                            <div>
                                <a href="../main/blog-detail.html"
                                    class="fs-7 my-4 fw-semibold text-white d-block lh-sm text-primary">Early Black
                                    Friday
                                    Amazon deals: cheap TVs, headphones, laptops</a>
                                <div class="d-flex align-items-center gap-4">
                                    <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                                        <i class="ti ti-eye fs-5"></i>
                                        6006
                                    </div>
                                    <div class="d-flex align-items-center gap-1 text-white fw-normal ms-auto">
                                        <i class="ti ti-point"></i>
                                        <small>Fri, Jan 13</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card blog blog-img-two position-relative overflow-hidden hover-img">
                    <div class="card-body position-relative">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Francisco Quinn">
                                    <img src="../assets/images/profile/user-5.jpg" alt="modernize-img"
                                        class="rounded-circle img-fluid" width="40" height="40">
                                </div>
                                <span class="badge text-bg-primary fs-2 fw-semibold">Health</span>
                            </div>
                            <div>
                                <a href="../main/blog-detail.html"
                                    class="fs-7 my-4 fw-semibold text-white d-block lh-sm">Presented by Max
                                    Rushden with Barry Glendenning, Philippe Auclair</a>
                                <div class="d-flex align-items-center gap-4">
                                    <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                                        <i class="ti ti-eye fs-5"></i>
                                        713
                                    </div>
                                    <div class="d-flex align-items-center gap-1 text-white fw-normal ms-auto">
                                        <i class="ti ti-point"></i>
                                        <small>Wed, Jan 18</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card overflow-hidden hover-img">
                    <div class="position-relative">
                        <a href="../main/blog-detail.html">
                            <img src="../assets/images/blog/blog-img6.jpg" class="card-img-top" alt="modernize-img">
                        </a>
                        <span
                            class="badge text-bg-light fs-2 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                            min Read</span>
                        <img src="../assets/images/profile/user-3.jpg" alt="modernize-img"
                            class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                            height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Addie Keller">
                    </div>
                    <div class="card-body p-4">
                        <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm  mt-3">Gadget</span>
                        <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary"
                            href="../main/blog-detail.html">As yen
                            tumbles, gadget-loving Japan goes
                            for iPhones</a>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-2">
                                <i class="ti ti-eye text-dark fs-5"></i>9,125
                            </div>
                            <div class="d-flex align-items-center fs-2 ms-auto">
                                <i class="ti ti-point text-dark"></i>Mon, Jan 16
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------------------------- -->
    <!-- List End -->
    <!-- ------------------------------------- -->
    <!-- ------------------------------------- -->
    <!-- Pagination Start -->
    <!-- ------------------------------------- -->
    <!-- ------------------------------------- -->
    <!-- Pagination End -->
    <!-- ------------------------------------- -->
    @endsection
