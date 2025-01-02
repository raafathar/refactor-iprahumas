<x-app-layout>

    <x-breadcrumb :items="['Home', 'Biodata Anggota']" />

    <div class="card card-body">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 col-xl-3">
                <form class="position-relative" method="GET" action="{{ route('biography.index') }}">
                    <input type="text" class="form-control product-search ps-5" id="input-search" name="search"
                           value="{{ request('search') }}"
                           placeholder="Cari Anggota..." />
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($users as $user)
            <div class="col-sm-6 col-lg-4">
                <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                        @if ($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                 class="rounded-circle object-fit-fill" width="80" height="80"
                                 alt="{{ $user->name }}" />
                        @else
                            <img src="{{ asset('assets/images/profile/user-1.jpg') }}"
                                 class="rounded-circle object-fit-fill" width="80" height="80"
                                 alt="{{ $user->name }}" />
                        @endif
                        <h5 class="fw-semibold mb-0">{{ $user->name }}</h5>
                        <span class="text-dark fs-2">{{ $user->form->nip }}</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
{{--                       jabatan, pangkat--}}
                        <li class="me-3">
                            <i class="ti ti-user me-1 text-primary"></i>
                            <span>{{ $user->form->position->name }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        <ul class="pagination">
            @if ($users->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $users->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            @for ($i = 1; $i <= $users->lastPage(); $i++)
                <li class="page-item {{ $i == $users->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($users->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $users->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif
        </ul>
    </div>

</x-app-layout>
