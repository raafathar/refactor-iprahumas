<x-guest-layout>
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
        <div class="position-relative z-index-5">
            <div class="row">
                <div class="col-xl-7 col-xxl-8">
                    <a href="javascript:void(0)" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                        <img src="{{ asset('assets/images/logos/dark-logo.png') }}" class="dark-logo" height="58"
                            alt="Logo-Dark" />
                        <img src="{{ asset('assets/images/logos/light-logo.png') }}" class="light-logo" height="58"
                            alt="Logo-light" />
                    </a>
                    <div class="d-none d-xl-flex align-items-center justify-content-center h-n80">
                        <div class="d-flex flex-column align-items-center">
                            <h1 class="text-center">IPRAHUMAS</h1>
                            <p class="text-center">Ikatan Pranata Humas Indonesia</p>
                            <div class="row" style="width: 80%; height: 80%">
                                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                                        class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain1.webp"
                                        class="w-100 shadow-1-strong rounded mb-4" alt="Wintry Mountain Landscape" />
                                </div>

                                <div class="col-lg-4 mb-4 mb-lg-0">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp"
                                        class="w-100 shadow-1-strong rounded mb-4" alt="Mountains in the Clouds" />

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                                        class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
                                </div>

                                <div class="col-lg-4 mb-4 mb-lg-0">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(18).webp"
                                        class="w-100 shadow-1-strong rounded mb-4" alt="Waves at Sea" />

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain3.webp"
                                        class="w-100 shadow-1-strong rounded mb-4" alt="Yosemite National Park" />
                                </div>
                            </div>
                        </div>
                        <!-- Gallery -->
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-4">
                    <div
                        class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                        <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                            <h2 class="mb-1 fs-6 fw-bolder">Selamat Datang di IPRAHUMAS</h2>
                            <p class="mb-7">Ikatan Pranata Humas Indonesia</p>
                            <div class="row">
                                <div class="col-12 mb-2 mb-sm-0">
                                    <a class="btn text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8"
                                        href="javascript:void(0)" role="button">
                                        <img src="{{ asset('assets/images/svgs/google-icon.svg') }}" alt="google-icon"
                                            class="img-fluid me-2" width="18" height="18">
                                        <span class="flex-shrink-0">with Google</span>
                                    </a>
                                </div>
                            </div>
                            <div class="position-relative text-center my-4">
                                <p class="mb-0 fs-4 px-3 d-inline-block bg-body text-dark z-index-5 position-relative">
                                    {{ __('atau masuk dengan') }}
                                </p>
                                <span
                                    class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                            </div>
                            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" type="email" name="email" :value="old('email')"
                                        required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <x-input-label for="password" :value="__('Kata Sandi')" />
                                    <x-text-input id="password" class="block mt-1 w-full" type="password"
                                        name="password" required autocomplete="current-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox" value=""
                                            id="remember_me" name="remember" checked>
                                        <label class="form-check-label text-dark fs-3" id="remember_me">
                                            {{ __('Ingat Perangkat ini') }}
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="text-primary fw-medium fs-3" href="{{ route('password.request') }}">
                                            {{ __('Lupa Password?') }}
                                        </a>
                                    @endif
                                </div>
                                <button class="btn btn-primary w-100 py-8 mb-4 rounded-2">
                                    {{ __('Masuk') }}
                                </button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-medium">{{ __('Belum menjadi anggota?') }}</p>
                                    <a class="text-primary fw-medium ms-2" href="{{ route('register') }}">
                                        {{ __('Daftar') }}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
