<div class="dropdown dropstart text-center">
    <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="ti ti-dots-vertical fs-6"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li>
            <a class="dropdown-item d-flex align-items-center gap-3" data-bs-toggle="modal"
                data-bs-target="#modal-update" data-json="{{ $page }}" onclick="onEdit(event)">
                <i class="fs-4 ti ti-edit"></i>Edit
            </a>
            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"
                data-json="{{ $page }}" onclick="onDelete(event)">
                <i class="fs-4 ti ti-trash"></i>Hapus
            </a>
        </li>
    </ul>
</div>
