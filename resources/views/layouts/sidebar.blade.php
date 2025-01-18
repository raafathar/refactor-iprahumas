<!-- Sidebar Start -->
<aside class="left-sidebar with-vertical">
    <div><!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/dark-logo.png') }}" class="dark-logo" height="58"
                    alt="Logo-Dark" />
                <img src="{{ asset('assets/images/logos/light-logo.png') }}" class="light-logo" height="58"
                    alt="Logo-light" />
            </a>
            <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                <i class="ti ti-x"></i>
            </a>
        </div>

        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <!-- ---------------------------------- -->
                <!-- Home -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <!-- ---------------------------------- -->
                <!-- Dashboard -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard') }}" id="get-url" aria-expanded="false">
                        <span>
                            <i class="ti ti-home"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <!-- ---------------------------------- -->
                <!-- Biodata Anggota -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('biography.index') }}" aria-expanded="false">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="21.21" height="22.5" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                            </svg>
                        </span>
                        <span class="hide-menu">Biodata Anggota</span>
                    </a>
                </li>
                @if (auth()->check() && (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin'))
                    <!-- ---------------------------------- -->
                    <!-- Data Master -->
                    <!-- ---------------------------------- -->
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Keanggotaan</span>
                    </li>
                    <!-- ---------------------------------- -->
                    <!-- Data Anggota -->
                    <!-- ---------------------------------- -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('users.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-users"></i>
                            </span>
                            <span class="hide-menu">Data Anggota</span>
                        </a>
                    </li>
                    <!-- ---------------------------------- -->
                    <!-- Data Pendaftar -->
                    <!-- ---------------------------------- -->
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <span class="d-flex">
                                <i class="ti ti-checkup-list"></i>
                            </span>
                            <span class="hide-menu">Data Pendaftar</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('registration.index', ['status' => 'pending']) }}"
                                    class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Diproses</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('registration.index', ['status' => 'approved']) }}"
                                    class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Diterima</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('registration.index', ['status' => 'rejected']) }}"
                                    class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Ditolak</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <!-- ---------------------------------- -->
                <!-- Periode Pendaftaran -->
                <!-- ---------------------------------- -->
                @if (auth()->check() && auth()->user()->role == 'superadmin')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('periods.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-calendar-time"></i>
                            </span>
                            <span class="hide-menu">Periode Pendaftaran</span>
                        </a>
                    </li>
                @endif
                @if (auth()->check() && (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin'))
                    <!-- ---------------------------------- -->
                    <!-- Persuratan -->
                    <!-- ---------------------------------- -->
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Manajemen Surat</span>
                    </li>
                    <!-- ---------------------------------- -->
                    <!-- Surat Masuk -->
                    <!-- ---------------------------------- -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('trainings.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-mail"></i>
                            </span>
                            <span class="hide-menu">Surat Masuk</span>
                        </a>
                    </li>
                    <!-- ---------------------------------- -->
                    <!-- Surat Keluar -->
                    <!-- ---------------------------------- -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('letter-logs.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-mail"></i>
                            </span>
                            <span class="hide-menu">Surat Keluar</span>
                        </a>
                    </li>
                    <!-- ---------------------------------- -->
                    <!-- Postingan -->
                    <!-- ---------------------------------- -->
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Postingan</span>
                    </li>
                    <!-- ---------------------------------- -->
                    <!-- Pelatihan -->
                    <!-- ---------------------------------- -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('trainings.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-clipboard"></i>
                            </span>
                            <span class="hide-menu">Pelatihan</span>
                        </a>
                    </li>
                    <!-- ---------------------------------- -->
                    <!-- Publikasi -->
                    <!-- ---------------------------------- -->
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <span class="d-flex">
                                <i class="ti ti-book"></i>
                            </span>
                            <span class="hide-menu">Publikasi</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('trainings.index') }}" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Buku</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('trainings.index') }}" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Jurnal</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <!-- ---------------------------------- -->
                <!-- Tampilan -->
                <!-- ---------------------------------- -->
                @if (auth()->check() && auth()->user()->role == 'superadmin')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Landing Page</span>
                    </li>
                    <!-- ---------------------------------- -->
                    <!-- Banner -->
                    <!-- ---------------------------------- -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('banners.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-grid"></i>
                            </span>
                            <span class="hide-menu">Banner</span>
                        </a>
                    </li>
                    <!-- ---------------------------------- -->
                    <!-- Halaman Profil -->
                    <!-- ---------------------------------- -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('page-profile.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-menu"></i>
                            </span>
                            <span class="hide-menu">Halaman Profil</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Data Master</span>
                    </li>
                    <!-- ---------------------------------- -->
                    <!-- Data Master Kenggotaan-->
                    <!-- ---------------------------------- -->
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <span class="d-flex">
                                <i class="ti ti-users"></i>
                            </span>
                            <span class="hide-menu">Keanggotaan</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('positions.index') }}" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Jabatan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('instances.index') }}" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Instansi</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('golongans.index') }}" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Pangkat/Golongan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('skills.index') }}" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Keahlian</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- ---------------------------------- -->
                    <!-- Data Master Persuratan-->
                    <!-- ---------------------------------- -->
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <span class="d-flex">
                                <i class="ti ti-mail"></i>
                            </span>
                            <span class="hide-menu">Persuratan</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ '/test.html' }}" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Kode Jenis Agenda</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ '/test.html' }}" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Kode Jenis Surat</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('letter-classifications.index') }}" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Kode Klasifikasi Surat</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <!-- ---------------------------------- -->
                <!-- Pengaturan -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Pengaturan</span>
                </li>
                @if (auth()->check() && auth()->user()->role == 'superadmin')
                    <!-- ---------------------------------- -->
                    <!-- Pengaturan Akun -->
                    <!-- ---------------------------------- -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('user-settings.index') }}" aria-expanded="false">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="21.21" height="22.5"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-user-shield">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h2" />
                                    <path
                                        d="M22 16c0 4 -2.5 6 -3.5 6s-3.5 -2 -3.5 -6c1 0 2.5 -.5 3.5 -1.5c1 1 2.5 1.5 3.5 1.5z" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                </svg>
                            </span>
                            <span class="hide-menu">Manajemen Pengguna</span>
                        </a>
                    </li>
                @endif
                <!-- ---------------------------------- -->
                <!-- Pengaturan Akun -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('account-setting.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-circle"></i>
                        </span>
                        <span class="hide-menu">Pengaturan Akun</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    @if (Auth::user()->profile_picture)
                        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                            class="rounded-circle object-fit-fill" width="40" height="40"
                            alt="{{ Auth::user()->name }}" />
                    @else
                        <img src="{{ asset('assets/images/profile/user-1.jpg') }}"
                            class="rounded-circle object-fit-fill" width="40" height="40"
                            alt="{{ Auth::user()->name }}" />
                    @endif
                </div>
                <div class="john-title">
                    <h6 class="mb-1 fs-4 fw-semibold text-truncate" style="max-width: 90px;">{{ Auth::user()->name }}
                    </h6>
                    <h6 class="fs-2 text-capitalize text-truncate" style="max-width: 90px;">
                        @if (Auth::user()->getGolongan() != null)
                            {{ Auth::user()->getGolongan() }}
                        @else
                            {{ Auth::user()->role }}
                        @endif
                </div>

                <form method="POST" action="{{ route('logout') }}" class="w-100">
                    @csrf
                    <button type="submit" class="border-0 bg-transparent text-primary ms-auto" tabindex="0"
                        type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="logout">
                        <i class="ti ti-power fs-6"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
    </div>
</aside>
<!--  Sidebar End -->
