<div class="dropdown dropstart text-center">
    <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="ti ti-dots-vertical fs-6"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li>
            <a class="dropdown-item d-flex align-items-center gap-3" data-bs-toggle="modal"
                data-bs-target="#modal-detail" id="btn-detail">
                <i class="fs-4 ti ti-eye"></i>Detail
            </a>
            <a class="dropdown-item d-flex align-items-center gap-3" data-bs-toggle="modal"
                data-bs-target="#modal-update">
                <i class="fs-4 ti ti-edit"></i>Edit
            </a>
            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)" id="btn-delete"
                data-bs-toggle="modal" data-bs-target="#modal">
                <i class="fs-4 ti ti-trash"></i>Hapus
            </a>
        </li>
    </ul>
</div>

{{-- Modal Delete --}}
<div class="modal fade" id="modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" id="users-form" action="{{ route('banners.destroy', $banner->id) }}"
                class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="text-center">
                        <i class="ti ti-help text-danger" style="font-size: 3rem"></i>
                    </div>
                    <h5>Apakah ingin menghapus banner "{{ $banner->b_title }}" ?</h5>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Update --}}
<div class="modal fade text-start" id="modal-update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="{{ route('banners.update', $banner->id) }}" class="p-3" novalidate
                enctype="multipart/form-data">
                @csrf
                @method('put')
                {{-- Judul --}}
                <div class="form-group mb-3">
                    <label for="b_title">Judul Banner</label>
                    <input id="b_title" name="b_title" value="{{ old('b_title') ?? $banner->b_title }}" type="text"
                        class="form-control">
                    <x-input-error messages="{{ $errors->first('b_title') }}" />
                </div>

                {{-- Gambar --}}
                <div class="mb-3">
                    <label for="b_image">Gambar Banner</label>
                    <input name="b_image" class="form-control" type="file" id="formFile">
                    <img src="{{ Storage::url($banner->b_image) }}" class="img-fluid img-thumbnail" alt="Banner update">
                    <x-input-error messages="{{ $errors->first('b_image') }}" />
                </div>

                {{-- is Active --}}
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" name="b_is_active" type="checkbox" id="color-primary"
                        {{ $banner->b_is_active == 1 ? 'checked' : '' }}>
                    <label class="form-check-label text-start" for="color-primary">Aktif</label>
                </div>
                <x-input-error messages="{{ $errors->first('b_is_active') }}" />


                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Detail --}}
<div class="modal fade" id="modal-detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ Storage::url($banner->b_image) }}" class="img-fluid img-thumbnail" alt="Banner Image">
                <h5 class="text-center p-2">{{ $banner->b_title }}</h5>
            </div>
        </div>
    </div>
</div>
