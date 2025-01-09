<x-app-layout>
    <div class="card bg-primary-gt text-white overflow-hidden shadow-none">
        <div class="card-body">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center mb-7">
                        <div class="rounded-circle overflow-hidden me-6 flex-shrink-0">
                            @if (Auth::user()->profile_picture)
                                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" width="45"
                                    height="45" class="rounded-circle" alt="{{ Auth::user()->name }}" />
                            @else
                                <img src="{{ asset('assets/images/profile/user-1.jpg') }}" width="45" height="45"
                                    class="rounded-circle" alt="{{ Auth::user()->name }}" />
                            @endif
                        </div>
                        <h5 class="fw-semibold fs-5 text-white mb-0 d-flex align-items-center"
                            style="line-height: 45px;">
                            {{ __('Selamat Datang, :name!', ['name' => Auth::user()->name]) }}
                        </h5>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="position-relative mb-n7 text-end">
                        <img src="../assets/images/backgrounds/welcome-bg2.png" alt="modernize-img" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

    </div>
    @if (!in_array(auth()->user()->role, ['admin', 'superadmin']))
        @if (auth()->user()->form->period->status != 'inactive' || config('app.env') != 'production')
            <div class="card card-body">
                <p>Masa aktif anda sudah berakhir silakan melakukan daftar ulang</p>
                <div class="d-flex">
                    <a href="{{ route('re-registration.index') }}" class="btn btn-primary">Daftar Ulang</a>
                </div>
            </div>
        @endif
    @endif
</x-app-layout>
