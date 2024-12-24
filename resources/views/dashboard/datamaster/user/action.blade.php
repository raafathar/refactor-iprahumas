<div class="action-btn">
    <a href="javascript:void(0)" class="text-dark edit" data-bs-toggle="modal" data-bs-target="#modal"
        data-json='{{ $users }}' onclick="onEdit()">
        <i class="ti ti-pencil fs-5"></i>
    </a>
    <a href="javascript:void(0)" class="text-danger delete ms-2" data-json='{{ $users }}' onclick="onDelete()">
        <i class="ti ti-trash fs-5"></i>
    </a>
</div>
