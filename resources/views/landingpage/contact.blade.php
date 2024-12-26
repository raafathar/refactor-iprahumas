@extends('landingpage.layouts.main')
@include('landingpage.layouts.header')
@include('landingpage.layouts.footer')


@section('contents')
    <div class="main-wrapper overflow-hidden">
        <!-- ------------------------------------- -->
        <!-- Banner Start -->
        <!-- ------------------------------------- -->
        <section class="bg-primary-subtle mb-md-11 mb-15 pb-sm-0 pb-1 pt-sm-5 pt-0">
            <div class="container">
                <div class="text-center mb-sm-14 mb-5 pt-5 pt-lg-0">
                    <p class="text-primary fw-bolder fs-4 mb-1">Contact Us</p>
                    <h1 class="text-dark fs-13 fw-bolder">We'd love to hear from you</h1>
                </div>
                <div class="rounded-3">
                    <iframe class="mb-md-n11 mb-n15 rounded-3 overflow-hidden"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d300.67204610448823!2d106.82225262441432!3d-6.175043046951885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d47c71fdaf%3A0x56d2a62dc19ddbc9!2sMinistry%20of%20Communication%20and%20Informatics!5e0!3m2!1sen!2sid!4v1729097274617!5m2!1sen!2sid"
                        width="100%" height="439" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Banner End -->
        <!-- ------------------------------------- -->

        <!-- ------------------------------------- -->
        <!-- Form Start -->
        <!-- ------------------------------------- -->
        <section class="py-lg-12 py-md-14 py-5">
            <div class="container">
                <div class="row g-7">
                    <div class="col-lg-8">
                        <form class="">
                            <div class="d-flex flex-column gap-sm-7 gap-3">
                                <div class="d-flex flex-sm-row flex-column gap-sm-7 gap-3">
                                    <div class="d-flex flex-column flex-grow-1 gap-2">
                                        <label for="Fname" class="fs-3 fw-semibold text-dark">
                                            First Name *
                                        </label>
                                        <input type="text" name="Fname" id="Fname" placeholder="First Name"
                                            class="form-control">
                                    </div>
                                    <div class="d-flex flex-column flex-grow-1 gap-2">
                                        <label for="Lname" class="fs-3 fw-semibold text-dark">
                                            Last Name *
                                        </label>
                                        <input type="text" name="Lname" id="Lname" placeholder="Last name"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="d-flex flex-sm-row flex-column gap-sm-7 gap-3">
                                    <div class="d-flex flex-column flex-grow-1 gap-2">
                                        <label for="phone" class="fs-3 fw-semibold text-dark">
                                            Phone Number *
                                        </label>
                                        <input type="tel" name="phone" id="phone" placeholder="XXX XXX XXXX"
                                            class="form-control">
                                    </div>
                                    <div class="d-flex flex-column flex-grow-1 gap-2">
                                        <label for="email" class="fs-3 fw-semibold text-dark">
                                            Email *
                                        </label>
                                        <input type="email" name="email" id="email" placeholder="Email"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="d-flex flex-column gap-2">
                                    <label for="enquire" class="fs-3 fw-semibold text-dark">Enquire related to *</label>
                                    <select class="form-select w-auto">
                                        <option value="1">General Enquiry</option>
                                        <option value="2">Customer Service Enquiry</option>
                                        <option value="3">Legal Enquiry</option>
                                        <option value="4">General Enquiry</option>
                                    </select>
                                </div>
                                <div class="d-flex flex-column gap-2">
                                    <label for="message" class="fs-3 fw-semibold text-dark">Message</label>
                                    <textarea name="message" id="message" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-sm-7 mt-3 px-9 py-6">Submit</button>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="bg-primary p-7 rounded-4 position-relative overflow-hidden connect-details-shape">
                            <div class="position-relative z-1">
                                <div class="pb-10 border-bottom border-white border-opacity-10">
                                    <h3 class="text-white fs-6 fw-bolder mb-3">Reach Out Today</h3>
                                    <p class="fs-4 mb-1 text-white">
                                        Ikatan Pranata Humas Indonesia
                                    </p>
                                    <p class="fs-4 mb-1 text-white">
                                        Sekretariat Pembina Jabatan Fungsional Pranata Humas
                                    </p>
                                    <p class="fs-4 mb-3 text-white">
                                        Kementerian Komunikasi dan Informatika
                                    </p>

                                    <p class="fs-4 mb-0 text-white">
                                        <i class="fas fa-phone-alt"></i> Telp/Faks: +62 21 345 9191
                                    </p>
                                    <p class="fs-4 mb-0 text-white">
                                        <i class="fas fa-envelope"></i> e-mail: <a href="mailto:admin@iprahumas.go.id"
                                            class="text-white text-decoration-none">admin@iprahumas.go.id</a>
                                    </p>

                                    <div class="pt-10">
                                        <h3 class="text-white fs-6 fw-bolder mb-3">Our Location</h3>
                                        <p class="fs-4 mb-0 text-white">
                                            Visit us in person or find our contact details to connect with us directly.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Form End -->
        <!-- ------------------------------------- -->
    </div>
@endsection
