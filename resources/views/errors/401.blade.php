<x-guest-layout :title="__('401 Unauthorized')">
    <div id="main-wrapper">
        <div class="position-relative overflow-hidden min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-lg-4">
                        <div class="text-center">
                            <img src="{{ asset('assets/images/backgrounds/401.svg') }}" alt="401 Unauthorized"
                                class="img-fluid" width="500">
                            <h1 class="fw-semibold mb-7 fs-9">401 Unauthorized</h1>
                            <h4 class="fw-semibold mb-7">Oops! Kamu tidak memiliki hak akses untuk mengakses halaman
                                ini.
                            </h4>
                            </h4>
                            <a href="javascript:void(0);" class="btn btn-primary" onclick="window.history.back();"
                                role="button">Kembali</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
