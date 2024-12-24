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
                                <p class="mb-0 ">
                                    {{ __('Masukkan alamat email yang terhubung dengan akun Anda, dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda.') }}
                                </p>
                            </div>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="mb-3">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autofocus />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <x-primary-button class="btn btn-primary w-100 py-8 mb-3">
                                    {{ __('Email Password Reset Link') }}
                                </x-primary-button>
                                <a href="{{ route('login') }}"
                                    class="btn bg-primary-subtle text-primary w-100 py-8">Back to
                                    Login</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
