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
                            <p class="text-center">
                                @if (Auth::user()->form->status == 'pending')
                                    {{ __('Terima kasih sudah bergabung! Proses pendaftaran akun Anda sedang diproses. Silakan cek email Anda secara berkala.') }}
                                @elseif (Auth::user()->form->status == 'rejected')
                                    {{ __('Maaf, pendaftaran akun Anda ditolak. Silakan cek email Anda untuk informasi lebih lanjut.') }}
                                @elseif (Auth::user()->form->status == 'approved')
                                    {{ __('Selamat, pendaftaran akun Anda berhasil!') }}
                                @endif
                            </p>
                            <div class="mb-3">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger w-100 py-2 me-2">
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
