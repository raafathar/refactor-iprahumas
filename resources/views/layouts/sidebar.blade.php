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
                <!-- Data Master -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Data Master</span>
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
                <!-- Data Pendaftaran -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-checkup-list"></i>
                        </span>
                        <span class="hide-menu">Data Pendaftaran</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('registration.index', ['status' => 'pending']) }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Diproses</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('registration.index', ['status' => 'approved']) }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Diterima</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('registration.index', ['status' => 'rejected']) }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Ditolak</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- ---------------------------------- -->
                <!-- Frontend page -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-layout-grid"></i>
                        </span>
                        <span class="hide-menu">Frontend page</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="../main/frontend-landingpage.html" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Homepage</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../main/frontend-aboutpage.html" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">About Us</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../main/frontend-contactpage.html" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Contact Us</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../main/frontend-blogpage.html" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Blog</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../main/frontend-blogdetailpage.html" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Blog Details</span>
                            </a>
                        </li>
                    </ul>
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
