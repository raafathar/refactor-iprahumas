<form method="PUT" id="account-setting-form" action="{{ route('account-setting.update', $user->id) }}"
    class="needs-validation" novalidate enctype="multipart/form-data" data-json="{{ $user }}">
    @csrf

    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card w-100 border position-relative overflow-hidden">
                <div class="card-body p-4">
                    <h4 class="card-title">Ubah Profil</h4>
                    <p class="card-subtitle mb-4">Ubah foto profil Anda dari sini</p>
                    <div class="text-center">
                        @if ($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                 class="rounded-circle object-fit-fill" id="image-preview" width="120" height="120"
                                 alt="{{ $user->name }}" />
                        @else
                            <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="{{ $user->name }}"
                            class="rounded-circle object-fit-fill" id="image-preview" width="120" height="120">
                        @endif
                        <div class="d-flex align-items-center justify-content-center my-4 gap-6">
                            <x-text-input id="profile_picture" type="file" name="profile_picture"
                                          :value="old('profile_picture')" accept="image/png, image/jpg, image/jpeg"
                                          autocomplete="profile_picture" placeholder="Upload" />
                            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                        </div>
                        <p class="mb-0">Diizinkan JPEG, JPG atau PNG. Ukuran maksimal 1MB</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card w-100 border position-relative overflow-hidden">
                <div class="card-body p-4">
                    <h4 class="card-title">Ubah Kata Sandi</h4>
                    <p class="card-subtitle mb-4">Untuk mengubah kata sandi Anda, silakan konfirmasi di sini</p>
                    <form>
                        <div class="mb-3">
                            <x-input-label for="current_password" :value="__('Kata Sandi Saat Ini')" required />
                            <x-text-input id="current_password" class="block mt-1 w-full" type="password"
                                          name="current_password" required />
                            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="password" :value="__('Kata Sandi Baru')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password"
                                          name="password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                          name="password_confirmation" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card w-100 border position-relative overflow-hidden mb-0">
                <div class="card-body p-4">
                    <h4 class="card-title">Data Pribadi</h4>
                    <p class="card-subtitle mb-4">Untuk mengubah data pribadi Anda, edit dan simpan dari di sini</p>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <x-input-label for="name" :value="__('Nama Lengkap')" required />
                            <x-text-input id="name" type="text" name="name" :value="old('name')" required
                                autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <x-input-label for="email" :value="__('Email')" required />
                            <x-text-input id="email" type="email" name="email" :value="old('email')" required
                                          autofocus autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                    @if (Auth::user()->role == 'user')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <x-input-label for="nip" :value="__('NIP')" required />
                                <x-text-input id="nip" type="text" name="nip" :value="old('nip')" required
                                              autofocus autocomplete="nip" />
                                <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-input-label for="new_member_number" :value="__('No. Anggota')" required />
                                <x-text-input id="new_member_number" type="text" name="new_member_number"
                                    :value="old('new_member_number')" disabled readonly autocomplete="new_member_number" />
                                <x-input-error :messages="$errors->get('new_member_number')" class="mt-2" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
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
                            <div class="col-md-6 mb-3">
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
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
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
                            <div class="col-md-6 mb-3">
                                <x-input-label for="work_unit" :value="__('Unit Kerja')" required />
                                <x-text-input id="work_unit" type="text" name="work_unit" :value="old('work_unit')" required
                                    autofocus autocomplete="work_unit" />
                                <x-input-error :messages="$errors->get('work_unit')" class="mt-2" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
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
                            <div class="col-md-6 mb-3">
                                <x-input-label for="dob" :value="__('Tanggal Lahir')" required />
                                <x-text-input id="dob" type="date" name="dob" :value="old('dob')" required
                                    autofocus autocomplete="dob" />
                                <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <x-input-label for="religion" :value="__('Agama')" required />
                                <select name="religion" id="religion" class="form-control" required
                                    autocomplete="religion">
                                    <option value="" disabled selected>Pilih Agama</option>
                                    <option value="islam" {{ old('religion') == 'islam' ? 'selected' : '' }}>
                                        Islam
                                    </option>
                                    <option value="christian" {{ old('christian') == 'islam' ? 'selected' : '' }}>
                                        Kristen</option>
                                    <option value="catholic" {{ old('religion') == 'catholic' ? 'selected' : '' }}>
                                        Katolik
                                    </option>
                                    <option value="hindu" {{ old('religion') == 'hindu' ? 'selected' : '' }}>
                                        Hindu</option>
                                    <option value="buddha" {{ old('religion') == 'buddha' ? 'selected' : '' }}>
                                        Buddha</option>
                                    <option value="konghucu" {{ old('religion') == 'konghucu' ? 'selected' : '' }}>
                                        Konghucu
                                    </option>
                                    <option value="other" {{ old('religion') == 'other' ? 'selected' : '' }}>
                                        Lainnya</option>
                                </select>
                                <x-input-error :messages="$errors->get('religion')" class="mt-2" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-input-label for="phone" :value="__('Nomor WA')" required />
                                <x-text-input id="phone" type="text" name="phone" :value="old('phone')" required
                                    autofocus autocomplete="phone" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <x-input-label for="last_education" :value="__('Pendidikan Terakhir')" required />
                                <select name="last_education" id="last_education" class="form-control" required
                                    autocomplete="last_education">
                                    <option value="" disabled selected>Pilih Pendidikan Terakhir
                                    </option>
                                    <option value="sma" {{ old('last_education') == 'sma' ? 'selected' : '' }}>
                                        SMA</option>
                                    <option value="d3" {{ old('last_education') == 'd3' ? 'selected' : '' }}>
                                        D3</option>
                                    <option value="d4/s1" {{ old('last_education') == 'd4/s1' ? 'selected' : '' }}>
                                        D4/S1
                                    </option>
                                    <option value="s2" {{ old('last_education') == 's2' ? 'selected' : '' }}>
                                        S2</option>
                                    <option value="s3" {{ old('last_education') == 's3' ? 'selected' : '' }}>
                                        S3</option>
                                </select>
                                <x-input-error :messages="$errors->get('last_education')" class="mt-2" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-input-label for="last_education_major" :value="__('Jurusan Pendidikan Terakhir')" required />
                                <x-text-input id="last_education_major" type="text" name="last_education_major"
                                    :value="old('last_education_major')" required autofocus autocomplete="last_education_major" />
                                <x-input-error :messages="$errors->get('last_education_major')" class="mt-2" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <x-input-label for="last_education_institution" :value="__('Universitas')" required />
                                <x-text-input id="last_education_institution" type="text"
                                    name="last_education_institution" :value="old('last_education_institution')" required autofocus
                                    autocomplete="last_education_institution" />
                                <x-input-error :messages="$errors->get('last_education_institution')" class="mt-2" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-input-label for="province_id" :value="__('Provinsi')" required />
                                <select name="province_id" id="province_id" class="form-control" required
                                    autocomplete="province_id">
                                    <option value="" disabled selected>Pilih Provinsi
                                    </option>
                                </select>
                                <x-input-error :messages="$errors->get('province_id')" class="mt-2" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <x-input-label for="district_id" :value="__('Kabupaten')" required />
                                <select name="district_id" id="district_id" class="form-control" required
                                    autocomplete="district_id">
                                    <option value="" disabled selected>Pilih Kabupaten
                                    </option>
                                </select>
                                <x-input-error :messages="$errors->get('district_id')" class="mt-2" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-input-label for="subdistrict_id" :value="__('Kecamatan')" required />
                                <select name="subdistrict_id" id="subdistrict_id" class="form-control" required
                                    autocomplete="subdistrict_id">
                                    <option value="" disabled selected>Pilih Kecamatan
                                    </option>
                                </select>
                                <x-input-error :messages="$errors->get('subdistrict_id')" class="mt-2" />
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6 mb-3">
                            <x-input-label for="village_id" :value="__('Kelurahan')" required />
                            <select name="village_id" id="village_id" class="form-control" required
                                autocomplete="village_id">
                                <option value="" disabled selected>Pilih Kelurahan
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('village_id')" class="mt-2" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <x-input-label for="address" :value="__('Alamat Lengkap')" required />
                            <x-text-input id="address" type="text" name="address" :value="old('address')" required
                                autofocus autocomplete="address" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                <button type="button" class="btn bg-danger-subtle text-danger"
                                    data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" onclick="onSubmit(event)"
                                    class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
