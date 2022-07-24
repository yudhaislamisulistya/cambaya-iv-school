
<nav class="iq-sidebar-menu">
    <ul id="iq-sidebar-toggle" class="iq-menu">
        <li class="active">
            <a href="<?= route_to('dashboard_admin_index') ?>">
                <i class="lab la-blogger-b"></i><span>Dashboard</span>
            </a>
        </li>
        <li class="mt-2 mb-2">
            <span id="sidebar-bottom" class="font-weight-bold">Manajemen User</span>
        </li>
        <li class=" ">
            <a href="#app" class="collapsed" data-toggle="collapse" aria-expanded="false">
                <i class="las la-user iq-arrow-left"></i><span>User</span>
                <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
            </a>
            <ul id="app" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                <li class=" ">
                    <a href="<?= route_to('user_guru_admin_index') ?>">
                        <i class="las la-user-shield"></i><span>Guru</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="<?= route_to('user_siswa_admin_index') ?>">
                        <i class="las la-user-graduate"></i><span>Siswa</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="mt-2 mb-2">
            <span id="sidebar-bottom" class="font-weight-bold">Manajemen Guru</span>
        </li>
        <li class=" ">
            <a href="../backend/index.html">
                <i class="las la-tasks"></i><span>Absensi</span>
            </a>
        </li>
        <li class=" ">
            <a href="<?= route_to('guru_admin_index') ?>">
                <i class="las la-user-check"></i><span>Data Guru</span>
            </a>
        </li>
        <li class="mt-2 mb-2">
            <span id="sidebar-bottom" class="font-weight-bold">Manajemen Siswa</span>
        </li>
        <li class=" ">
            <a href="<?= route_to('kelas_admin_index') ?>">
                <i class="las la-book-open"></i><span>Kelas Siswa</span>
            </a>
        </li>
        <li class=" ">
            <a href="<?= route_to('siswa_admin_index') ?>">
                <i class="las la-database"></i><span>Data Siswa</span>
            </a>
        </li>
        <li class="mt-2 mb-2">
            <span id="sidebar-bottom" class="font-weight-bold">Manajemen
                Pelajaran</span>
        </li>
        <li class=" ">
        <a href="<?= route_to('pelajaran_siswa_admin_index') ?>">
                <i class="las la-book"></i><span>Pejalaran Siswa</span>
            </a>
        </li>
        <li class="mt-2 mb-2">
            <span id="sidebar-bottom" class="font-weight-bold">Manajemen Jadwal</span>
        </li>
        <li class=" ">
            <a href="<?= route_to('jadwal_mata_pelajaran_admin_index') ?>">
                <i class="las la-calendar"></i><span>Jadwal Mata Pelajaran</span>
            </a>
        </li>
        <li class=" ">
            <a href="<?= route_to('jadwal_mengajar_admin_index') ?>">
                <i class="las la-calendar-check"></i><span>Jadwal Mengajar</span>
            </a>
        </li>
        <li class=" ">
            <a href="<?= route_to('jadwal_ujian_admin_index') ?>">
                <i class="las la-calendar-day"></i><span>Jadwal Ujian</span>
            </a>
        </li>
        <li class="mt-2 mb-2">
            <span id="sidebar-bottom" class="font-weight-bold">Master Data</span>
        </li>
        <li class=" ">
            <a href="<?= route_to('semester_admin_index') ?>">
                <i class="las la-tint"></i><span>Set Semester</span>
            </a>
        </li>
    </ul>
</nav>
