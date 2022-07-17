<nav id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            @if (auth()->user()->level == 1)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/data-user-guru*') ? 'active' : '' }}"
                        href="/dashboard/data-user-guru">
                        <span data-feather="file-text"></span>
                        Data User Guru E-Rapor
                    </a>
                </li>
            @endif
            @if (auth()->user()->level == 1)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/data-user-siswa*') ? 'active' : '' }}"
                        href="/dashboard/data-user-siswa">
                        <span data-feather="file-text"></span>
                        Data User Siswa E-Rapor
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/nilai*') ? 'active' : '' }}" href="/dashboard/nilai">
                    <span data-feather="file-text"></span>
                    Data Nilai Siswa
                </a>
            </li>
            @if (auth()->user()->level == 1)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/kelas*') ? 'active' : '' }}" href="/dashboard/kelas">
                        <span data-feather="file-text"></span>
                        Data Siswa
                    </a>
                </li>
            @endif
            @if (auth()->user()->status_walikelas === 'non-active')
                <li hidden>
                </li>
            @elseif (auth()->user()->status_walikelas === 'active')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/data-diri*') ? 'active' : '' }}"
                        href="/dashboard/data-diri-siswa">
                        <span data-feather="file-text"></span>
                        Data Siswa
                    </a>
                </li>
            @else
                <li hidden>
                </li>
            @endif
        </ul>
    </div>
</nav>
