<x-guest-layout>
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
        <div class="position-relative z-index-5">
            <div class="row">
                <div class="col-xl-7 col-xxl-8" style="background-image: url('{{ asset('assets/images/backgrounds/register.jpg') }}'); background-repeat: no-repeat; background-size: cover; background-position: center;">
                    <a href="{{ route('landingpage') }}" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                        <img src="{{ asset('assets/images/logos/dark-logo.png') }}" class="dark-logo" height="58"
                            alt="Logo-Dark" />
                        <img src="{{ asset('assets/images/logos/light-logo.png') }}" class="light-logo" height="58"
                            alt="Logo-light" />
                    </a>
                    <div class="d-none d-xl-flex align-items-center justify-content-center h-n80">
                        <div class="d-flex flex-column align-items-center">
                            {{-- <h1 class="text-center">IPRAHUMAS</h1>
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
                            </div> --}}
                        </div>
                        <!-- Gallery -->
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-4">
                    <div
                        class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                        <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-2">
                            <h2 class="fs-6 fw-bolder">Daftar menjadi Bagian Anggota</h2>
                            <p class="mb-4">Ikatan Pranata Humas Indonesia</p>
                            <!-- Search Section -->
                            <x-input-label for="input-search" :value="__('Cari Data untuk Anggota Lama')" />
                            <div class="input-group mb-2">
                                <x-text-input id="input-search" type="text" name="input_search" class="form-control"
                                    placeholder="Cari berdasarkan NIP" required autofocus />
                                <button id="search-btn" class="btn btn-primary" type="button">Cari</button>
                            </div>

                            <!-- Result Section -->
                            <div id="user-result" class="text-danger fs-3"></div>

                            <p class="mb-2 mt-4" id="navigator-count"></p>

                            <form method="POST" id="register-form" action="{{ route('register') }}"
                                class="needs-validation" novalidate enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div id="form-container">
                                    {{-- 1 --}}
                                    <div class="d-none mt-4">
                                        <div class="mb-3">
                                            <x-input-label for="name" :value="__('Nama Lengkap')" required />
                                            <x-text-input id="name" type="text" name="name" :value="old('name')"
                                                required autofocus autocomplete="name" />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="nip" :value="__('NIP')" required />
                                            <x-text-input id="nip" type="text" name="nip" :value="old('nip')"
                                                required autofocus autocomplete="nip" />
                                            <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="email" :value="__('Email')" required />
                                            <x-text-input id="email" type="email" name="email" :value="old('email')"
                                                required autofocus autocomplete="email" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="phone" :value="__('Nomor WA')" required />
                                            <x-text-input id="phone" type="text" name="phone"
                                                :value="old('phone')" required autofocus autocomplete="phone" />
                                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                        </div>
                                    </div>

                                    {{-- 2 --}}
                                    <div class="d-none mt-4">
                                        <div class="mb-3">
                                            <x-input-label for="dob" :value="__('Tanggal Lahir')" required />
                                            <x-text-input id="dob" type="date" name="dob"
                                                :value="old('dob')" required autofocus autocomplete="dob" />
                                            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="religion" :value="__('Agama')" required />
                                            <select name="religion" id="religion" class="form-control" required
                                                autocomplete="religion">
                                                <option value="" disabled selected>Pilih Agama</option>
                                                <option value="islam"
                                                    {{ old('religion') == 'islam' ? 'selected' : '' }}>Islam
                                                </option>
                                                <option value="christian"
                                                    {{ old('religion') == 'christian' ? 'selected' : '' }}>Kristen</option>
                                                <option value="catholic"
                                                    {{ old('religion') == 'catholic' ? 'selected' : '' }}>Katolik
                                                </option>
                                                <option value="hindu"
                                                    {{ old('religion') == 'hindu' ? 'selected' : '' }}>Hindu</option>
                                                <option value="buddha"
                                                    {{ old('religion') == 'buddha' ? 'selected' : '' }}>Buddha</option>
                                                <option value="konghucu"
                                                    {{ old('religion') == 'konghucu' ? 'selected' : '' }}>Konghucu
                                                </option>
                                                <option value="other"
                                                    {{ old('religion') == 'other' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('religion')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="profile_picture" :value="__('Foto Resmi')" required />
                                            <x-text-input id="profile_picture" type="file" name="profile_picture"
                                                :value="old('profile_picture')" accept="image/png, image/jpg, image/jpeg" required
                                                autofocus autocomplete="profile_picture" />
                                            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                                        </div>
                                    </div>

                                    {{-- 3 --}}
                                    <div class="d-none mt-4">
                                        <div class="mb-3">
                                            <x-input-label for="position_id" :value="__('Jabatan')" required />
                                            <select name="position_id" id="position_id" class="form-control" required
                                                autocomplete="position_id">
                                                @if($positions->isEmpty())
                                                    <option readonly value="">Data Masih Kosong</option>
                                                @else
                                                <option value="" disabled selected>Pilih Jabatan</option>
                                                    @foreach($positions as $position)
                                                    <option value="{{ $position->id }}"
                                                        {{ old('position_id') == $position->id ? 'selected' : '' }}>
                                                        {{ $position->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <x-input-error :messages="$errors->get('position_id')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="instance_id" :value="__('Instansi')" required />
                                            <select name="instance_id" id="instance_id" class="form-control" required
                                                autocomplete="instance_id">
                                                @if($instances->isEmpty())
                                                    <option readonly value="">Data Masih Kosong</option>
                                                @else
                                                    <option value="" disabled selected>Pilih Instansi</option>
                                                    @foreach($instances as $instance)
                                                        <option value="{{ $instance->id }}"
                                                            {{ old('instance_id') == $instance->id ? 'selected' : '' }}>
                                                            {{ $instance->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <x-input-error :messages="$errors->get('instance_id')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="golongan_id" :value="__('Pangkat/Golongan')" required />
                                            <select name="golongan_id" id="golongan_id" class="form-control" required
                                                autocomplete="golongan_id">
                                                @if($golongans->isEmpty())
                                                    <option readonly value="">Data Masih Kosong</option>
                                                @else
                                                    <option value="" disabled selected>Pilih Pangkat/Golongan</option>
                                                    @foreach($golongans as $golongan)
                                                        <option value="{{ $golongan->id }}"
                                                            {{ old('golongan_id') == $golongan->id ? 'selected' : '' }}>
                                                            {{ $golongan->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <x-input-error :messages="$errors->get('golongan_id')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="work_unit" :value="__('Unit Kerja')" required />
                                            <x-text-input id="work_unit" type="text" name="work_unit"
                                                :value="old('work_unit')" required autofocus autocomplete="work_unit" />
                                            <x-input-error :messages="$errors->get('work_unit')" class="mt-2" />
                                        </div>
                                    </div>

                                    {{-- 4 --}}
                                    <div class="d-none mt-4">
                                        <div class="mb-3">
                                            <x-input-label for="last_education" :value="__('Pendidikan Terakhir')" required />
                                            <select name="last_education" id="last_education" class="form-control"
                                                required autocomplete="last_education">
                                                <option value="" disabled selected>Pilih Pendidikan Terakhir
                                                </option>
                                                <option value="sma"
                                                    {{ old('last_education') == 'sma' ? 'selected' : '' }}>SMA</option>
                                                <option value="d3"
                                                    {{ old('last_education') == 'd3' ? 'selected' : '' }}>D3</option>
                                                <option value="d4/s1"
                                                    {{ old('last_education') == 'd4/s1' ? 'selected' : '' }}>D4/S1
                                                </option>
                                                <option value="s2"
                                                    {{ old('last_education') == 's2' ? 'selected' : '' }}>S2</option>
                                                <option value="s3"
                                                    {{ old('last_education') == 's3' ? 'selected' : '' }}>S3</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('last_education')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="last_education_major" :value="__('Jurusan Pendidikan Terakhir')" required />
                                            <x-text-input id="last_education_major" type="text"
                                                name="last_education_major" :value="old('last_education_major')" required autofocus
                                                autocomplete="last_education_major" />
                                            <x-input-error :messages="$errors->get('last_education_major')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="last_education_institution" :value="__('Universitas')"
                                                required />
                                            <x-text-input id="last_education_institution" type="text"
                                                name="last_education_institution" :value="old('last_education_institution')" required autofocus
                                                autocomplete="last_education_institution" />
                                            <x-input-error :messages="$errors->get('last_education_institution')" class="mt-2" />
                                        </div>
                                    </div>

                                    {{-- 5 --}}
                                    <div class="d-none mt-4">
                                        <div class="mb-3">
                                            <x-input-label for="province_id" :value="__('Provinsi')" required />
                                            <select name="province_id" id="province_id" class="form-control" required
                                                autocomplete="province_id">
                                                <option value="" disabled selected>Pilih Provinsi
                                                </option>
                                            </select>
                                            <x-input-error :messages="$errors->get('province_id')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="district_id" :value="__('Kabupaten')" required />
                                            <select name="district_id" id="district_id" class="form-control" required
                                                autocomplete="district_id">
                                                <option value="" disabled selected>Pilih Kabupaten
                                                </option>
                                            </select>
                                            <x-input-error :messages="$errors->get('district_id')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="subdistrict_id" :value="__('Kecamatan')" required />
                                            <select name="subdistrict_id" id="subdistrict_id" class="form-control"
                                                required autocomplete="subdistrict_id">
                                                <option value="" disabled selected>Pilih Kecamatan
                                                </option>
                                            </select>
                                            <x-input-error :messages="$errors->get('subdistrict_id')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="village_id" :value="__('Kelurahan')" required />
                                            <select name="village_id" id="village_id" class="form-control" required
                                                autocomplete="village_id">
                                                <option value="" disabled selected>Pilih Kelurahan
                                                </option>
                                            </select>
                                            <x-input-error :messages="$errors->get('village_id')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="address" :value="__('Alamat Lengkap')" required />
                                            <x-text-input id="address" type="text" name="address"
                                                :value="old('address')" required autofocus autocomplete="address" />
                                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                        </div>
                                    </div>

                                    {{-- 6 --}}
                                    <div class="d-none mt-4">
                                        <div class="mb-3">
                                            <x-input-label for="skill_id" :value="__('Keahlian')" required />
                                            <select name="skill_id[]" id="skill_id" multiple="multiple" class="form-control" required>
                                                @if($skills->isEmpty())
                                                    <option readonly value="">Data Masih Kosong</option>
                                                @else
                                                    <option value="" disabled>Pilih Keahlian</option>
                                                    @foreach($skills as $skill)
                                                        <option value="{{ $skill->id }}" {{ collect(old('skill_id'))->contains($skill->id) ? 'selected' : '' }}>
                                                            {{ $skill->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <x-input-error :messages="$errors->get('skill_id')" class="mt-2" />
                                        </div>
                                    </div>

                                    
                                </div>


                                <div class="form-check mt-3">
                                    <input class="form-check-input primary" type="checkbox" value=""
                                    id="remember_me" name="remember" checked>
                                    <label class="form-check-label text-dark fs-3" id="remember_me">
                                        {{ __('Dengan melakukan pendaftaran, saya setuju dengan Syarat & Ketentuan keanggotaan.') }}
                                    </label>
                                </div>

                                <div class="d-flex justify-content-end gap-3 my-3">
                                    <span id="back" class="btn btn-rounded btn-outline-dark w-100">Kembali</span>
                                    <span id="next" class="btn btn-primary w-100"></span>
                                </div>

                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-medium">{{ __('Sudah menjadi anggota?') }}</p>
                                    <a class="text-primary fw-medium ms-2 fs-4" href="{{ route('login') }}">
                                        {{ __('Masuk') }}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
        <link id="themeColors" rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/css/sweetalert2.min.css') }}" />
    @endpush
    @push('scripts')
        <script src="{{ asset('assets/js/plugins/toastr-init.js') }}"></script>
        <script src="{{ asset('assets/js/dashboards/app.helper.js') }}"></script>
        <script src="{{ asset('assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/sweetalert2/js/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/js/feature/form-registration.js') }}"></script>
        <script src="{{ asset('assets/js/feature/auth/register.js') }}"></script>
    @endpush
</x-guest-layout>
