<div class="dropdown dropstart text-center">
    <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="ti ti-dots-vertical fs-6"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li>
            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)" id="btn-detail"
                data-bs-toggle="modal" data-bs-target="#modal-detail" data-json="{{ $skill }}"
                onclick="onDetail(event)">
                <i class="fs-4 ti ti-eye"></i>Detail
            </a>
            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)" id="btn-edit"
                data-bs-toggle="modal" data-bs-target="#modal" data-json="{{ $skill }}" onclick="onEdit(event)">
                <i class="fs-4 ti ti-edit"></i>Edit
            </a>
            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)" id="btn-delete"
                data-json="{{ $skill }}" onclick="onDelete(event)">
                <i class="fs-4 ti ti-trash"></i>Hapus
            </a>
        </li>
    </ul>
</div>
