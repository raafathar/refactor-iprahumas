<div class="dropdown dropstart text-center">
    <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="ti ti-dots-vertical fs-6"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li>
            <a class="dropdown-item d-flex align-items-center gap-3" href="{{ route('beritas.show', $berita->b_slug) }}"
                id="btn-detail">
                <i class="fs-4 ti ti-eye"></i>Detail
            </a>
            <a class="dropdown-item d-flex align-items-center gap-3"
                href="{{ route('beritas.edit', $berita->b_slug) }}">
                <i class="fs-4 ti ti-edit"></i>Edit
            </a>
            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)" id="btn-delete"
                data-bs-toggle="modal" data-bs-target="#modal" data-json="{{ $berita }}" onclick="onDelete()">
                <i class="fs-4 ti ti-trash"></i>Hapus
            </a>
        </li>
    </ul>
</div>

<div class="modal fade" id="modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" id="users-form" action="{{ route('beritas.destroy', $berita->id) }}"
                class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="text-center">
                        <i class="ti ti-help" style="font-size: 3rem"></i>
                    </div>
                    <h5>Apakah ingin menghapus berita "{{ $berita->b_title }}" ?</h5>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
