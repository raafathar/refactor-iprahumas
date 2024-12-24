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
                <a href="javascript:void(0)" id="btn-add" class="btn btn-primary d-flex align-items-center">
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

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-app-layout>
