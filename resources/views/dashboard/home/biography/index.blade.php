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
                        <h5 class="fw-semibold mb-0 mt-4">{{ $user->name }}</h5>
                        <span class="text-dark fs-2">{{ optional($user->form->instance)->name ?: '-' }}</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
{{--                       jabatan, pangkat--}}
                        <li class="me-3">
                            <span>{{ optional($user->form->position)->name ?: '-' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        <ul class="pagination">
            {{-- Tombol ke halaman sebelumnya --}}
            @if ($users->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $users->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Logika untuk menampilkan halaman tertentu --}}
            @php
                $currentPage = $users->currentPage();
                $lastPage = $users->lastPage();
                $start = max(1, $currentPage - 2); // Tampilkan 2 halaman sebelum halaman saat ini
                $end = min($lastPage, $currentPage + 2); // Tampilkan 2 halaman setelah halaman saat ini
            @endphp

            {{-- Tampilkan halaman pertama jika jauh dari range --}}
            @if ($start > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $users->url(1) }}">1</a>
                </li>
                @if ($start > 2)
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                @endif
            @endif

            {{-- Tampilkan halaman dalam range --}}
            @for ($i = $start; $i <= $end; $i++)
                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                    <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            {{-- Tampilkan halaman terakhir jika jauh dari range --}}
            @if ($end < $lastPage)
                @if ($end < $lastPage - 1)
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                @endif
                <li class="page-item">
                    <a class="page-link" href="{{ $users->url($lastPage) }}">{{ $lastPage }}</a>
                </li>
            @endif

            {{-- Tombol ke halaman berikutnya --}}
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
