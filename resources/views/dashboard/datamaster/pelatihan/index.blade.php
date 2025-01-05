<x-app-layout>

    <x-breadcrumb :items="['Data Master', 'Pelatihan']" />

    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <form class="position-relative">
                    <input type="text" class="form-control product-search ps-5" id="input-search"
                        placeholder="Cari Pelatihan..." />
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <div
                class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0 gap-2">
                <a id="btn-add" href="{{ route('trainings.create') }}"
                    class="btn btn-primary d-flex align-items-center">
                    <i class="ti ti-plus text-white me-1 fs-5"></i>
                    Tambah Pelatihan
                </a>
                @if (config('app.env') != 'production')
                    <a id="btn-add" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#modal-registration">
                        <i class="ti ti-plus text-white me-1 fs-5"></i>
                        Tambah Registration Pelatihan
                    </a>
                @endif
            </div>
        </div>
    </div>

    @if (config('app.env') != 'production')
        {{-- Modal Update --}}
        <div class="modal fade text-start" id="modal-registration" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center">
                        <h5 class="modal-title" id="modal-detail-update">
                            Tambah Registration (dev only)
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" id="form-registration" action="{{ route('trainings.registration.store') }}"
                        novalidate>
                        @csrf
                        <div class="modal-body" id="modal-body-update">
                            {{-- 1 --}}
                            <div class="row">
                                {{-- Training {training_id} --}}
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="training_id">Training</label>
                                        <select id="training_id" name="training_id" value="{{ old('training_id') }}"
                                            type="text" class="form-control">
                                            <option disabled selected>-- PILIH TRAINING --</option>
                                            @forelse ($trainings as $training)
                                                <option value="{{ $training->id }}">{{ $training->p_title }}</option>
                                            @empty
                                                <option>Tidak ada pelatihan</option>
                                            @endforelse
                                        </select>
                                        <x-input-error messages="{{ $errors->first('training_id') }}" />
                                    </div>
                                </div>
                                <div class="col">
                                    {{-- Nama Lengkap {rp_nama_lengkap} --}}
                                    <div class="mb-3">
                                        <label for="rp_nama_lengkap">Nama Lengkap</label>
                                        <input id="rp_nama_lengkap" name="rp_nama_lengkap"
                                            value="{{ old('rp_nama_lengkap') }}" type="text" class="form-control">
                                        <x-input-error messages="{{ $errors->first('rp_nama_lengkap') }}" />
                                    </div>
                                </div>
                            </div>

                            {{-- 2 --}}
                            <div class="row">
                                {{-- Email {rp_email} --}}
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="rp_email">Email</label>
                                        <input id="rp_email" name="rp_email" value="{{ old('rp_email') }}"
                                            type="text" class="form-control">
                                        <x-input-error messages="{{ $errors->first('rp_email') }}" />
                                    </div>
                                </div>
                                <div class="col">
                                    {{-- Nomor Wa {rp_nomor_wa} --}}
                                    <div class="mb-3">
                                        <label for="rp_nomor_wa">Nomor Wa</label>
                                        <input id="rp_nomor_wa" name="rp_nomor_wa" value="{{ old('rp_nomor_wa') }}"
                                            type="text" class="form-control">
                                        <x-input-error messages="{{ $errors->first('rp_nomor_wa') }}" />
                                    </div>
                                </div>
                            </div>

                            {{-- 3 --}}
                            <div class="row">
                                {{-- Alamat {rp_alamat} --}}
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="rp_alamat">Alamat</label>
                                        <input id="rp_alamat" name="rp_alamat" value="{{ old('rp_alamat') }}"
                                            type="text" class="form-control">
                                        <x-input-error messages="{{ $errors->first('rp_alamat') }}" />
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary"
                                onclick="onSubmitRegistration(event)">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif


    <div class="card card-body">
        <div class="table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
        <link id="themeColors" rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/css/sweetalert2.min.css') }}" />

        <style>
            #users-table_info {
                margin-bottom: 1rem;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/js/plugins/toastr-init.js') }}"></script>
        <script src="{{ asset('assets/js/dashboards/app.helper.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/sweetalert2/js/sweetalert2.min.js') }}"></script>

        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

        <script src="{{ asset('assets/js/feature/datamaster/training.js') }}"></script>
    @endpush
</x-app-layout>
