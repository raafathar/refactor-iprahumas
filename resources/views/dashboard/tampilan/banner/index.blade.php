<x-app-layout>

    <x-breadcrumb :items="['Tampilan', 'Banner']" />

    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <form class="position-relative">
                    <input type="text" class="form-control product-search ps-5" id="input-search"
                        placeholder="Cari Banner..." />
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <div
                class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0 gap-2">
                <a href="{{ route('beritas.create') }}" id="btn-add" class="btn btn-primary d-flex align-items-center"
                    data-bs-toggle="modal" data-bs-target="#modal-created">
                    <i class="ti ti-plus text-white me-1 fs-5"></i>
                    Tambah Banner
                </a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-created" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title" id="exampleModalLabel1">
                        Tambah Banner
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="banner-form" action="{{ route('banners.store') }}" novalidate
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        {{-- Judul --}}
                        <div class="form-group mb-3">
                            <x-input-label for="b_title" :value="__('Judul Banner')" required />
                            <x-text-input id="b_title" type="text" name="b_title" :value="old('b_title')" required
                                autofocus autocomplete="name" />
                            <x-input-error messages="{{ $errors->first('b_title') }}" />
                        </div>

                        {{-- Gambar --}}
                        <div class="form-group mb-3">
                            <x-input-label for="b_image" :value="__('Upload Gambar (JPEG, PNG, JPG)')" required />
                            <x-text-input id="formFile" type="file" name="b_image" :value="old('b_image')" required
                                autofocus autocomplete="name" />
                            <x-input-error messages="{{ $errors->first('b_image') }}" />
                        </div>

                        {{-- is Active --}}
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" name="b_is_active" type="checkbox" id="color-primary"
                                checked>
                            <label class="form-check-label" for="color-primary">Aktif</label>
                            <x-input-error messages="{{ $errors->first('b_is_active') }}" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-danger-subtle text-danger"
                            data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary" id="submit-banner"
                            onclick="onSubmit(event)">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Update --}}
    <div class="modal fade text-start" id="modal-update" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title" id="modal-detail-update">
                        Edit Banner
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="banner-form-update" novalidate enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body" id="modal-body-update">

                    </div>
                </form>
            </div>
        </div>
    </div>

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
        <script src="{{ asset('assets/js/components/form.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/sweetalert2/js/sweetalert2.min.js') }}"></script>

        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

        <script src="{{ asset('assets/js/feature/datamaster/banner.js') }}"></script>
    @endpush
</x-app-layout>
