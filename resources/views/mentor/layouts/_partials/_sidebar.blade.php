<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu active pcoded-trigger">
                <a href="{{ route('mentor.dashboard') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>
            
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                    <span class="pcoded-mtext">Page layouts</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" pcoded-hasmenu">
                        <a href="javascript:void(0)">
                            <span class="pcoded-mtext">Murid</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="menu-static.html">
                                    <span class="pcoded-mtext">Daftar Murid</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="menu-compact.html">
                                    <span class="pcoded-mtext">Tambah Murid</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="menu-header-fixed.html">
                                    <span class="pcoded-mtext">Permintaan mengikuti</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="menu-sidebar.html">
                                    <span class="pcoded-mtext">Murid Dikeluarkan</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" pcoded-hasmenu">
                        <a href="javascript:void(0)">
                            <span class="pcoded-mtext">Nilai</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="menu-horizontal-static.html" target="_blank">
                                    <span class="pcoded-mtext">Daftar Nilai</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" ">
                        <a href="menu-bottom.html">
                            <span class="pcoded-mtext">Bottom Menu</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="box-layout.html" target="_blank">
                            <span class="pcoded-mtext">Box Layout</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="menu-rtl.html" target="_blank">
                            <span class="pcoded-mtext">RTL</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                    <span class="pcoded-mtext">Soal</span>
                    <span class="pcoded-badge label label-danger">Total</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('mentor.soal') }}">
                            <span class="pcoded-mtext">Daftar Soal</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="widget-data.html">
                            <span class="pcoded-mtext">Tambah Soal</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="{{ route('mentor.daftar_materi') }}">
                    <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                    <span class="pcoded-mtext">Materi</span>
                    <span class="pcoded-badge label label-danger">Total</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="widget-statistic.html">
                            <span class="pcoded-mtext">Daftar Materi</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="widget-data.html">
                            <span class="pcoded-mtext">Tambah Materi</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel">UI Element</div>
        
        
</nav>