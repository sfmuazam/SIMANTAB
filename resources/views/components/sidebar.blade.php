<div class="wrapper">
    <div class="sidenav sidenav-expand-lg sidenav-pills bg-white offcanvas offcanvas-start shadow" id="sidenavMenu">
        <div class="offcanvas-header sticky-top navbar">

            {{-- <a href="" class="navbar-brand hidden-dark">
                <img src="{{ asset('img/logo.svg') }}" width="136px">
            </a> --}}
            <h1 class="mt-5">SIMANTAB</h1>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav ~nav-pills mb-2 mb-lg-0">
                <li class="nav-item active">
                    <a class="nav-link {{ ($title === "Profil") ? 'active' : '' }}" aria-current="page"
                        href="{{ route('profil.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                        </svg>
                        <span>Profil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Petunjuk") ? 'active' : '' }}" aria-current="page"
                        href="{{ route('petunjuk.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help-circle"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                            <path d="M12 16v.01"></path>
                            <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483"></path>
                        </svg>
                        <span>Petunjuk</span>
                    </a>
                </li>
                @if(auth()->user()->role == 'Admin')
                <li>
                    <hr class="divider">
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ ($title === "User") ? 'active' : '' }}" aria-current="page"
                        href="{{ route('user.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                        </svg>
                        <span>Users</span>
                    </a>
                </li>
                @endif
                <li>
                    <hr class="divider">
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Kelas") ? 'active' : '' }}" aria-current="page"
                        href="{{ route('kelas.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path>
                            <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path>
                        </svg>
                        <span>Kelas</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Siswa") ? 'active' : '' }}" aria-current="page"
                        href="{{ route('siswa.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-id" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z">
                            </path>
                            <path d="M9 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M15 8l2 0"></path>
                            <path d="M15 12l2 0"></path>
                            <path d="M7 16l10 0"></path>
                        </svg>
                        <span>Siswa</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Tabungan") ? 'active' : '' }}" aria-current="page"
                        href="{{ route('tabungan.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z">
                            </path>
                            <path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                        </svg>
                        <span>Tabungan</span>
                    </a>
                </li>

                <li>
                    <hr class="divider">
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ ($title === "Kelas 10" || $title==="Kelas 11" ||
                        $title==="Kelas 12" || $title==="Total Per Siswa" ) ? 'active' : '' }}" href="#" role="button"
                        data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">

                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-server" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z">
                            </path>
                            <path d="M3 12m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z">
                            </path>
                            <path d="M7 8l0 .01"></path>
                            <path d="M7 16l0 .01"></path>
                        </svg>

                        <span>Rekap</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-chevron-down w-4 h-4"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <ul class="dropdown-menu show">

                        <li>
                            <a class="dropdown-item {{ ($title === "Kelas 10") ? 'active' : '' }}"
                                href="{{ route('kelas10.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                    </path>
                                </svg>
                                <span>Kelas 10</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ ($title === "Kelas 11") ? 'active' : '' }}"
                                href="{{ route('kelas11.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                    </path>
                                </svg>
                                <span>Kelas 11</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ ($title === "Kelas 12") ? 'active' : '' }}"
                                href="{{ route('kelas12.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                    </path>
                                </svg>
                                <span>Kelas 12</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ ($title === "Total Per Siswa") ? 'active' : '' }}"
                                href="{{ route('totalpersiswa.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                    </path>
                                </svg>
                                <span>Rekap Per Siswa</span>
                            </a>
                        </li>

                    </ul>
                <li>
                    <hr class="divider">
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Logout") ? 'active' : '' }}" aria-current="page"
                        href="{{ route('logout') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                            </path>
                            <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                        </svg>
                        <span>Logout</span>
                    </a>
                </li>
        </div>
    </div>

    <div class="wrapper-content">
        <nav class="navbar navbar-expand-lg">
            <div class="container-lg">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidenavMenu"
                    aria-controls="sidenavMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2 w-5 h-5"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="4" y1="6" x2="20" y2="6"></line>
                        <line x1="4" y1="12" x2="20" y2="12"></line>
                        <line x1="4" y1="18" x2="20" y2="18"></line>
                    </svg>
                </button>
                <button class="navbar-toggler d-none d-lg-block" type="button" data-bs-toggle="sidebar"
                    data-bs-target="#sidenavMenu" aria-controls="sidenavMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2 w-5 h-5"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="4" y1="6" x2="20" y2="6"></line>
                        <line x1="4" y1="12" x2="20" y2="12"></line>
                        <line x1="4" y1="18" x2="20" y2="18"></line>
                    </svg>
                </button>
                <h4 class="content-title ms-1 me-auto">{{ $title }}</h4>
                <div class="navbar-right">
                    <ul class="navbar-nav nav-pills ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-link-avatar" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="d-none d-md-block me-1">{{ auth()->user()->nama }}</span>
                                <span>&nbsp;</span>
                                <div class="avatar">{{ implode ('',array_map(function ($item) {return
                                    strtoupper($item[0]);} , explode(' ', auth()->user()->nama))) }}</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
