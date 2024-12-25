<x-app-layout>

    <x-breadcrumb :items="['Data Master', 'Data Anggota']" />

    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <form class="position-relative">
                    <input type="text" class="form-control product-search ps-5" id="input-search"
                        placeholder="Cari Anggota..." />
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <div
                class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0 gap-2">
                <a href="javascript:void(0)" id="btn-add" class="btn btn-primary d-flex align-items-center"
                    data-bs-toggle="modal" data-bs-target="#modal" onclick="onStore(event)">
                    <i class="ti ti-plus text-white me-1 fs-5"></i>
                    Tambah Anggota
                </a>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <div class="table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

    @include('dashboard.datamaster.user.form')

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

        <script src="{{ asset('assets/js/feature/datamaster/users.js') }}"></script>
    @endpush
</x-app-layout>
