<x-modal-detail />

<div class="modal fade" id="modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content p-2">
            <form method="POST" id="users-form" action="" class="needs-validation" novalidate
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="add-detail-box" style="height: 390px;">
                        <div class="add-detail-content">
                            <input type="hidden" name="_method">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="name" :value="__('Nama Lengkap')" required />
                                    <x-text-input id="name" type="text" name="name" :value="old('name')"
                                        required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="nip" :value="__('NIP')" required />
                                    <x-text-input id="nip" type="text" name="nip" :value="old('nip')"
                                        required autofocus autocomplete="nip" />
                                    <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="email" :value="__('Email')" required />
                                    <x-text-input id="email" type="email" name="email" :value="old('email')"
                                        required autofocus autocomplete="email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="position_id" :value="__('Jabatan')" required />
                                    <select name="position_id" id="position_id" class="form-control" required
                                        autocomplete="position_id">
                                        <option value="" disabled selected>Pilih Jabatan</option>
                                        @forelse($positions as $position)
                                            <option value="{{ $position->id }}"
                                                {{ old('position_id') == $position->id ? 'selected' : '' }}>
                                                {{ $position->name }}</option>
                                        @empty
                                            <option readonly value="">Data Masih Kosong</option>
                                        @endforelse
                                    </select>
                                    <x-input-error :messages="$errors->get('position_id')" class="mt-2" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="instance_id" :value="__('Instansi')" required />
                                    <select name="instance_id" id="instance_id" class="form-control" required
                                        autocomplete="instance_id">
                                        <option value="" disabled selected>Pilih Instansi</option>
                                        @forelse($instances as $instance)
                                            <option value="{{ $instance->id }}"
                                                {{ old('instance_id') == $instance->id ? 'selected' : '' }}>
                                                {{ $instance->name }}</option>
                                        @empty
                                            <option readonly value="">Data Masih Kosong</option>
                                        @endforelse
                                    </select>
                                    <x-input-error :messages="$errors->get('instance_id')" class="mt-2" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="golongan_id" :value="__('Pangkat/Golongan')" required />
                                    <select name="golongan_id" id="golongan_id" class="form-control" required
                                        autocomplete="golongan_id">
                                        <option value="" disabled selected>Pilih Pangkat/Golongan
                                        </option>
                                        @forelse($golongans as $golongan)
                                            <option value="{{ $golongan->id }}"
                                                {{ old('golongan_id') == $golongan->id ? 'selected' : '' }}>
                                                {{ $golongan->name }}</option>
                                        @empty
                                            <option readonly value="">Data Masih Kosong</option>
                                        @endforelse
                                    </select>
                                    <x-input-error :messages="$errors->get('golongan_id')" class="mt-2" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="work_unit" :value="__('Unit Kerja')" required />
                                    <x-text-input id="work_unit" type="text" name="work_unit" :value="old('work_unit')"
                                        required autofocus autocomplete="work_unit" />
                                    <x-input-error :messages="$errors->get('work_unit')" class="mt-2" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="skill_id" :value="__('Keahlian')" required />
                                    <select name="skill_id" id="skill_id" class="form-control" required
                                        autocomplete="skill_id">
                                        <option value="" disabled selected>Pilih Keahlian
                                        </option>
                                        @forelse($skills as $skill)
                                            <option value="{{ $skill->id }}"
                                                {{ old('skill_id') == $skill->id ? 'selected' : '' }}>
                                                {{ $skill->name }}</option>
                                        @empty
                                            <option readonly value="">Data Masih Kosong</option>
                                        @endforelse
                                    </select>
                                    <x-input-error :messages="$errors->get('skill_id')" class="mt-2" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="dob" :value="__('Tanggal Lahir')" required />
                                    <x-text-input id="dob" type="date" name="dob" :value="old('dob')"
                                        required autofocus autocomplete="dob" />
                                    <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="religion" :value="__('Agama')" required />
                                    <select name="religion" id="religion" class="form-control" required
                                        autocomplete="religion">
                                        <option value="" disabled selected>Pilih Agama</option>
                                        <option value="islam" {{ old('religion') == 'islam' ? 'selected' : '' }}>
                                            Islam
                                        </option>
                                        <option value="christian" {{ old('religion') == 'christian' ? 'selected' : '' }}>
                                            Kristen</option>
                                        <option value="catholic"
                                            {{ old('religion') == 'catholic' ? 'selected' : '' }}>Katolik
                                        </option>
                                        <option value="hindu" {{ old('religion') == 'hindu' ? 'selected' : '' }}>
                                            Hindu</option>
                                        <option value="buddha" {{ old('religion') == 'buddha' ? 'selected' : '' }}>
                                            Buddha</option>
                                        <option value="konghucu"
                                            {{ old('religion') == 'konghucu' ? 'selected' : '' }}>Konghucu
                                        </option>
                                        <option value="other" {{ old('religion') == 'other' ? 'selected' : '' }}>
                                            Lainnya</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('religion')" class="mt-2" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="phone" :value="__('Nomor WA')" required />
                                    <x-text-input id="phone" type="text" name="phone" :value="old('phone')"
                                        required autofocus autocomplete="phone" />
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="profile_picture" :value="__('Foto Resmi')" required />
                                    <x-text-input id="profile_picture" type="file" name="profile_picture"
                                        :value="old('profile_picture')" accept="image/png, image/jpg, image/jpeg" required autofocus
                                        autocomplete="profile_picture" />
                                    <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
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
                                        <option value="d4/s1"
                                            {{ old('last_education') == 'd4/s1' ? 'selected' : '' }}>D4/S1
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
                                    <x-text-input id="last_education_major" type="text"
                                        name="last_education_major" :value="old('last_education_major')" required autofocus
                                        autocomplete="last_education_major" />
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
                                    <x-text-input id="address" type="text" name="address" :value="old('address')"
                                        required autofocus autocomplete="address" />
                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger"
                        data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" onclick="onSubmit(event)" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
