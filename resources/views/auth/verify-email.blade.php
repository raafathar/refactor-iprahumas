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
                                {{ __('Terima kasih sudah bergabung! Silakan bayar biaya pendaftaran untuk menerima email verifikasi.') }}
                            </p>

                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-5 text-center text-success">
                                    {{ __('Tautan verifikasi berhasil dikirim ke email yang Anda gunakan saat pendaftaran.') }}
                                </div>
                            @endif
                            <div class="mb-3">
                                <form method="POST" action="{{ route('verification.send') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if (Auth::user()->form->payment_proof == null)
                                        <div class="mb-3">
                                            <x-input-label for="payment_proof" :value="__('Bukti Pembayaran')" />
                                            <x-text-input id="payment_proof" type="file" name="payment_proof"
                                                :value="old('payment_proof')" required autofocus autocomplete="payment_proof" />
                                            <x-input-error :messages="$errors->get('payment_proof')" class="mt-2" />
                                        </div>
                                    @endif
                                    <button type="submit" class="btn btn-primary w-100 py-2 me-2">
                                        {{ __('Kirim Email Verifikasi') }}
                                    </button>
                                </form>
                            </div>
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
