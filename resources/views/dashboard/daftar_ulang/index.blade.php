<x-app-layout>

    <x-breadcrumb :items="['Daftar Ulang', 'Formulir Daftar Ulang']" />

    <div class="card card-body">

        <form method="PUT" id="re-register-form" action="{{ route('re-registration.update') }}" class="needs-validation"
            novalidate enctype="multipart/form-data" data-json="{{ $user }}">
            @csrf

            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-12">
                    <div class="card w-100 border position-relative overflow-hidden mb-0">
                        <div class="card-body p-4">
                            <h4 class="card-title">Formulir Daftar Ulang</h4>
                            <p class="card-subtitle mb-4">Pastikan data pribadi anda sudah benar</p>

                            {{-- @dd(collect($user->form->skills)->contains('9debab61-adbe-4b6b-9036-cf25e46a5cfc')) --}}
                            @if (Auth::user()->role == 'user')
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <x-input-label for="position_id" :value="__('Jabatan')" required />
                                        <select name="position_id" id="position_id" class="form-control" required
                                            autocomplete="position_id">
                                            @if ($positions->isEmpty())
                                                <option readonly value="">Data Masih Kosong</option>
                                            @else
                                                <option value="" disabled selected>Pilih Jabatan</option>
                                                @foreach ($positions as $position)
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
                                            @if ($instances->isEmpty())
                                                <option readonly value="">Data Masih Kosong</option>
                                            @else
                                                <option value="" disabled selected>Pilih Instansi</option>
                                                @foreach ($instances as $instance)
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
                                        <x-input-label for="skill_id" :value="__('Keahlian')" required />
                                        <select name="skill_id[]" id="skill_id" multiple="multiple"
                                            class="form-control" required>
                                            @if ($skills->isEmpty())
                                                <option readonly value="">Data Masih Kosong</option>
                                            @else
                                                <option value="" disabled>Pilih Keahlian</option>
                                                @foreach ($skills as $index => $skill)
                                                    <option value="{{ $skill->id }}"
                                                        {{ collect(old('skill_id'))->contains($skill->id) ? 'selected' : '' }}>
                                                        {{ $skill->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <x-input-error :messages="$errors->get('skill_id')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <x-input-label for="work_unit" :value="__('Unit Kerja')" required />
                                        <x-text-input id="work_unit" type="text" name="work_unit" :value="old('work_unit')"
                                            required autofocus autocomplete="work_unit" />
                                        <x-input-error :messages="$errors->get('work_unit')" class="mt-2" />
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                        <button type="button" class="btn bg-danger-subtle text-danger"
                                            data-bs-dismiss="modal">Kembali</button>
                                        <button type="submit" onclick="onSubmit(event)"
                                            class="btn btn-primary">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>




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
        <script src="{{ asset('assets/js/feature/daftar_ulang/daftar_ulang.js') }}"></script>
    @endpush
</x-app-layout>
