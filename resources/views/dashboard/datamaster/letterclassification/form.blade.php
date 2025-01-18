<x-modal-detail />

<div class="modal fade" id="modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content p-2">
            <form method="POST" id="letter-classification-form" action="" class="needs-validation" novalidate
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
                                    <x-input-label for="kode" :value="__('Kode Klasifikasi')" required />
                                    <x-text-input id="kode" type="number" name="kode" :value="old('kode')"
                                        required autofocus autocomplete="kode" />
                                    <x-input-error :messages="$errors->get('kode')" class="mt-2" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="name" :value="__('Keterangan')" required />
                                    <x-text-input id="name" type="text" name="name" :value="old('name')"
                                        required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
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