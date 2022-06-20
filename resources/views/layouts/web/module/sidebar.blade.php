<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" style="background: black">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" style="background: black;">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" style="background: black;">
                <!-- User Profile-->
                <li style="background: black">
                    <!-- User Profile-->
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">
                            {{-- <img src="{{ asset('assets/adminbite/assets/images/users/1.jpg') }}" alt="users"
                                class="rounded-circle img-fluid" /> --}}
                        </div>

                        <div class="user-content hide-menu m-t-10">
                            <h5 class="m-b-10 user-name font-medium">
                                {{ Str::upper('WELLCOME' . ' ' . Auth::user()->name) }}
                            </h5>
                            <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-settings"></i>
                            </a>
                            <a href="{{ route('logout') }}" title="Logout" class="btn btn-circle btn-sm"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="ti-power-off"></i>
                            </a>
                            <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-user m-r-5 m-l-5"></i> My Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-settings m-r-5 m-l-5"></i> Account Setting
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>

                <!-- User Profile-->
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Halaman Utama</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.home') }}"
                        aria-expanded="false">
                        <i class="icon-Home"></i>
                        <span class="hide-menu">Halaman Utama</span>
                    </a>
                </li>
                @if (Auth::user()->role_id == '1')
                    <li class="nav-small-cap">
                        <i class="mdi mdi-dots-horizontal"></i>
                        <span class="hide-menu">Data Siswa {{ date('Y') }}</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false">
                            <i class="icon-User"></i>
                            <span class="hide-menu">Data Siswa </span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level" style="background: black">
                            <li class="sidebar-item">
                                <a href="{{ route('admin.siswa.index') }}" class="sidebar-link">
                                    <i class="icon-Record"></i>
                                    <span class="hide-menu"> Siswa </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('admin.siswa.create') }}" class="sidebar-link">
                                    <i class="icon-Record"></i>
                                    <span class="hide-menu"> Tambah Siswa</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-small-cap">
                        <i class="mdi mdi-dots-horizontal"></i>
                        <span class="hide-menu">Perhitungan Topsis</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false">
                            <i class="icon-Gears-2"></i>
                            <span class="hide-menu">Topsis </span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level" style="background: black">

                            <li class="sidebar-item mt-2">
                                <i class="mdi mdi-dots-horizontal"></i>
                                <span class="hide-menu">Data Kriteria</span>
                            </li>

                            <li class="sidebar-item">
                                <a href="{{ route('admin.kriteria.index') }}" class="sidebar-link"
                                    aria-expanded="false">
                                    <i class="icon-Receipt"></i>
                                    <span class="hide-menu">Kriteria</span>
                                </a>
                            </li>

                            <li class="sidebar-item ">
                                <i class="mdi mdi-dots-horizontal"></i>
                                <span class="hide-menu">Penilaian</span>
                            </li>

                            <li class="sidebar-item">
                                <a href="{{ route('admin.penilaianAwal') }}" class="sidebar-link">
                                    <i class="icon-Record"></i>
                                    <span class="hide-menu"> Penilaian Siswa </span>
                                </a>
                            </li>

                            <li class="sidebar-item ">
                                <i class="mdi mdi-dots-horizontal"></i>
                                <span class="hide-menu">Hasil Topis</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false">
                                    <i class="mdi mdi-playlist-plus"></i>
                                    <span class="hide-menu">Hasil Topsis</span>
                                </a>
                                <ul aria-expanded="false" class="collapse second-level" style="background: black">
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.normalisasi') }}" class="sidebar-link">
                                            <i class="icon-Record"></i>
                                            <span class="hide-menu"> Normalisasi </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.bobot') }}" class="sidebar-link">
                                            <i class="icon-Record"></i>
                                            <span class="hide-menu"> Pembobotan </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.jarak') }}" class="sidebar-link">
                                            <i class="icon-Record"></i>
                                            <span class="hide-menu"> Jarak Ideal (+/-) </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.preferensi') }}" class="sidebar-link">
                                            <i class="icon-Record"></i>
                                            <span class="hide-menu"> Preferensi </span>
                                        </a>
                                    </li>
                                </ul>
                            @else
                            <li class="nav-small-cap">
                                <i class="mdi mdi-dots-horizontal"></i>
                                <span class="hide-menu">Perhitungan Topsis</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="icon-Gears-2"></i>
                                    <span class="hide-menu">Topsis </span>
                                </a>
                                <ul aria-expanded="false" class="collapse  first-level">

                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.preferensi') }}" class="sidebar-link">
                                            <i class="icon-Record"></i>
                                            <span class="hide-menu"> Hasil Rangking </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                @endif
                </li>

            </ul>
            </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
