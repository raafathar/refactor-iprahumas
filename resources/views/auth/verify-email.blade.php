<x-guest-layout>
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                    <div class="card mb-0">
                        <div class="card-body pt-5">
                            <a href="javascript:void(0)" class="text-nowrap logo-img text-center d-block mb-4 w-100">
                                <img src="{{ asset('assets/images/logos/dark-logo.png') }}" class="dark-logo"
                                    height="58" alt="Logo-Dark" />
                                <img src="{{ asset('assets/images/logos/light-logo.png') }}" class="light-logo"
                                    height="58" alt="Logo-light" />
                            </a>
                            <div class="mb-5 text-center">
                                <p>
                                    {{ __('Terima kasih sudah bergabung! Sebelum mulai, yuk cek email Anda dan klik tautan untuk verifikasi alamat email. Kalau emailnya belum sampai, jangan khawatir, kami siap kirim ulang untuk Anda.') }}
                                </p>
                                <h6 class="fw-bolder">{{ $email }}</h6>
                            </div>
                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-5 text-center text-success">
                                    {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda gunakan saat pendaftaran.') }}
                                </div>
                            @endif
                            <div class="d-flex gap-3 mb-4">
                                <form method="POST" action="{{ route('verification.send') }}" class="w-100">
                                    @csrf
                                    <button type="submit" class="btn btn-primary w-100 py-2 me-2">
                                        {{ __('Kirim Ulang Email') }}
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('logout') }}" class="w-100">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger w-100 py-2 ms-2">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
