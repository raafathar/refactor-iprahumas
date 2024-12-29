<x-modal-detail />

<div class="modal fade" id="modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content p-2">
            <form method="POST" id="period-form" action="" class="needs-validation" novalidate
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="add-detail-box">
                        <div class="add-detail-content">
                            <input type="hidden" name="_method">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="name" :value="__('Nama Periode')" required />
                                    <x-text-input id="name" type="text" name="name" :value="old('name')"
                                        required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="status" :value="__('Status')" required />
                                    <select name="status" id="status" class="form-control" required
                                        autocomplete="status">
                                        <option value="" disabled selected>Pilih Status</option>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                            Aktif
                                        </option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                            Tidak Aktif
                                        </option>
                                    </select>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="start_date" :value="__('Tanggal Mulai')" required />
                                    <x-text-input id="start_date" type="date" name="start_date" :value="old('start_date')"
                                        required autofocus autocomplete="start_date" />
                                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="end_date" :value="__('Tanggal Berakhir')" required />
                                    <x-text-input id="end_date" type="date" name="end_date" :value="old('end_date')"
                                        required autofocus autocomplete="end_date" />
                                    <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
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
