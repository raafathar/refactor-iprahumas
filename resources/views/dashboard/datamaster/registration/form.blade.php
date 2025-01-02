<x-modal-detail />

<div class="modal fade" id="modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content p-2">
            <form method="POST" id="registration-form" action="" class="needs-validation" novalidate
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
                                <div class="col-md-12 mb-3">
                                    <x-input-label for="status" :value="__('Status')" required />
                                    <select name="status" id="status" class="form-control" required
                                        autocomplete="status">
                                        <option value="" disabled selected>Pilih Status</option>
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>
                                            Diproses
                                        </option>
                                        <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>
                                            Diterima
                                        </option>
                                        <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>
                                            Ditolak
                                        </option>
                                    </select>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>
                                <div class="col-md-12 mb-3 col-reason">
                                    <x-input-label for="reason" :value="__('Keterangan')" required />
                                    <x-text-input id="reason" type="text" name="reason" :value="old('reason')"
                                        required autofocus autocomplete="reason" />
                                    <x-input-error :messages="$errors->get('reason')" class="mt-2" />
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
