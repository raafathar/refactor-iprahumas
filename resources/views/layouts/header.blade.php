<!--  Header Start -->
<header class="topbar">
    <div class="with-vertical">
        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Header -->
        <!-- ---------------------------------- -->
        <nav class="navbar navbar-expand-lg p-0">
            <ul class="navbar-nav">
                <li class="nav-item nav-icon-hover-bg rounded-circle ms-n2">
                    <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav quick-links d-none d-lg-flex align-items-center">
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="javascript:void(0)">Header 1</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="javascript:void(0)">Header 2</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="javascript:void(0)">Header 3</a>
                </li>
            </ul>

            <div class="d-block d-lg-none py-4">
                <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                    <img src="{{ asset('assets/images/logos/dark-logo.png') }}" class="dark-logo" height="58"
                        alt="Logo-Dark" />
                    <img src="{{ asset('assets/images/logos/light-logo.png') }}" class="light-logo" height="58"
                        alt="Logo-light" />
                </a>
            </div>
            <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)"
                data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="ti ti-dots fs-7"></i>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="javascript:void(0)"
                        class="nav-link nav-icon-hover-bg rounded-circle mx-0 ms-n1 d-flex d-lg-none align-items-center justify-content-center"
                        type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                        aria-controls="offcanvasWithBothOptions">
                        <i class="ti ti-align-justified fs-7"></i>
                    </a>
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                        <!-- ------------------------------- -->
                        <!-- start language Dropdown -->
                        <!-- ------------------------------- -->
                        <li class="nav-item nav-icon-hover-bg rounded-circle">
                            <a class="nav-link moon dark-layout" href="javascript:void(0)">
                                <i class="ti ti-moon moon"></i>
                            </a>
                            <a class="nav-link sun light-layout" href="javascript:void(0)">
                                <i class="ti ti-sun sun"></i>
                            </a>
                        </li>
                        <li class="nav-item nav-icon-hover-bg rounded-circle dropdown">
                            <a class="nav-link" href="javascript:void(0)" id="drop2" aria-expanded="false">
                                <img src="../assets/images/svgs/icon-flag-en.svg" alt="modernize-img" width="20px"
                                    height="20px" class="rounded-circle object-fit-cover round-20" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                aria-labelledby="drop2">
                                <div class="message-body">
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="../assets/images/svgs/icon-flag-en.svg" alt="modernize-img"
                                                width="20px" height="20px"
                                                class="rounded-circle object-fit-cover round-20" />
                                        </div>
                                        <p class="mb-0 fs-3">English (UK)</p>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="../assets/images/svgs/icon-flag-cn.svg" alt="modernize-img"
                                                width="20px" height="20px"
                                                class="rounded-circle object-fit-cover round-20" />
                                        </div>
                                        <p class="mb-0 fs-3">中国人 (Chinese)</p>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="../assets/images/svgs/icon-flag-fr.svg" alt="modernize-img"
                                                width="20px" height="20px"
                                                class="rounded-circle object-fit-cover round-20" />
                                        </div>
                                        <p class="mb-0 fs-3">français (French)</p>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="../assets/images/svgs/icon-flag-sa.svg" alt="modernize-img"
                                                width="20px" height="20px"
                                                class="rounded-circle object-fit-cover round-20" />
                                        </div>
                                        <p class="mb-0 fs-3">عربي (Arabic)</p>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!-- ------------------------------- -->
                        <!-- end language Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- start profile Dropdown -->
                        <!-- ------------------------------- -->
                        <li class="nav-item dropdown">
                            <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="user-profile-img">
                                        @if (Auth::user()->profile_picture)
                                            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                                class="rounded-circle object-fit-fill" width="35" height="35"
                                                alt="{{ Auth::user()->name }}" />
                                        @else
                                            <img src="{{ asset('assets/images/profile/user-1.jpg') }}"
                                                class="rounded-circle object-fit-fill" width="35" height="35"
                                                alt="{{ Auth::user()->name }}" />
                                        @endif
                                    </div>
                                </div>
                            </a>

                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                aria-labelledby="drop1">
                                <div class="profile-dropdown position-relative" data-simplebar>
                                    <div class="py-3 px-7 pb-0">
                                        <h5 class="mb-0 fs-5 fw-semibold">Profil Pengguna</h5>
                                    </div>
                                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                        @if (Auth::user()->profile_picture)
                                            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                                class="rounded-circle object-fit-fill" width="80" height="80"
                                                alt="{{ Auth::user()->name }}" />
                                        @else
                                            <img src="{{ asset('assets/images/profile/user-1.jpg') }}"
                                                class="rounded-circle object-fit-fill" width="80" height="80"
                                                alt="{{ Auth::user()->name }}" />
                                        @endif
                                        <div class="ms-3">
                                            <h5 class="mb-1 fs-3 text-truncate" style="max-width: 180px;">
                                                {{ Auth::user()->name }}</h5>
                                            <span class="mb-1 d-block text-capitalize text-truncate"
                                                style="max-width: 180px;">
                                                @if (Auth::user()->getGolongan() != null)
                                                    {{ Auth::user()->getGolongan() }}
                                                @else
                                                    {{ Auth::user()->role }}
                                                @endif
                                            </span>
                                            <p class="mb-0 align-items-center gap-2 text-truncate"
                                                style="max-width: 180px;">
                                                <i class="ti ti-mail fs-4"></i> {{ Auth::user()->email }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="message-body">
                                        <a href="../main/page-user-profile.html"
                                            class="py-8 px-7 mt-8 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                <img src="{{ asset('assets/images/svgs/icon-account.svg') }}"
                                                    alt="modernize-img" width="24" height="24" />
                                            </span>
                                            <div class="w-100 ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base">Profil Saya</h6>
                                                <span class="fs-2 d-block text-body-secondary">Pengaturan Akun</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="d-grid py-4 px-7 pt-8">
                                        <div
                                            class="upgrade-plan bg-primary-subtle position-relative overflow-hidden rounded-4 p-4 mb-9">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5 class="fs-4 mb-3 fw-semibold">Landing Page</h5>
                                                    <a href="{{ route('landingpage') }}" class="btn btn-primary">
                                                        Lihat
                                                    </a>
                                                </div>
                                                <div class="col-6">
                                                    <div class="m-n4 unlimited-img">
                                                        <img src="{{ asset('assets/images/backgrounds/unlimited-bg.png') }}"
                                                            alt="modernize-img" class="w-100" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form method="POST" action="{{ route('logout') }}" class="w-100">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-primary w-100">Log
                                                Out</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- ------------------------------- -->
                        <!-- end profile Dropdown -->
                        <!-- ------------------------------- -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ---------------------------------- -->
        <!-- End Vertical Layout Header -->
        <!-- ---------------------------------- -->

        <!-- ------------------------------- -->
        <!-- apps Dropdown in Small screen -->
        <!-- ------------------------------- -->
        <!--  Mobilenavbar -->
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
            aria-labelledby="offcanvasWithBothOptionsLabel">
            <nav class="sidebar-nav scroll-sidebar">
                <div class="offcanvas-header justify-content-between">
                    <img src="{{ asset('assets/images/logos/dark-logo.png') }}" class="dark-logo" height="58"
                        alt="Logo-Dark" />
                    <img src="{{ asset('assets/images/logos/light-logo.png') }}" class="light-logo" height="58"
                        alt="Logo-light" />
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body h-n80" data-simplebar="" data-simplebar>
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../main/app-email.html" aria-expanded="false">
                                <span class="hide-menu">Header 1</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../main/app-email.html" aria-expanded="false">
                                <span class="hide-menu">Header 2</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../main/app-email.html" aria-expanded="false">
                                <span class="hide-menu">Header 3</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--  Header End -->
