<nav class="iq-sidebar-menu">
    <ul id="iq-sidebar-toggle" class="iq-menu">
        <li class="active">
            <a href="../backend/index.html">
                <i class="lab la-blogger-b"></i><span>Dashboard</span>
            </a>
        </li>
        <li class="mt-2 mb-2">
            <span id="sidebar-bottom" class="font-weight-bold">Manajemen Siswa</span>
        </li>
        <li class=" ">
            <a href="<?= route_to('data_siswa_siswa_index') ?>">
                <i class="las la-tasks"></i><span>Data Siswa</span>
            </a>
        </li>
        <li class="mt-2 mb-2">
            <span id="sidebar-bottom" class="font-weight-bold">Manajemen Jadwal</span>
        </li>
        <li class=" ">
            <a href="<?= route_to('jadwal_mata_pelajaran_siswa_index') ?>">
                <i class="las la-calendar"></i><span>Jadwal Mata Pelajaran</span>
            </a>
        </li>
        <li class=" ">
            <a href="<?= route_to('jadwal_ujian_siswa_index') ?>">
                <i class="las la-calendar-day"></i><span>Jadwal Ujian</span>
            </a>
        </li>
        <li class="mt-2 mb-2">
            <span id="sidebar-bottom" class="font-weight-bold">Manajemen Nilai</span>
        </li>
        <li class=" ">
            <a href="<?= route_to('nilai_pengetahuan_siswa_index') ?>">
                <i class="las la-tasks"></i><span>Nilai Pengetahuan</span>
            </a>
        </li>
        <li class=" ">
            <a href="<?= route_to('nilai_keterampilan_siswa_index') ?>">
                <i class="las la-user-check"></i><span>Nilai Keterampilan</span>
            </a>
        </li>
        <li class="mt-2 mb-2">
            <span id="sidebar-bottom" class="font-weight-bold">Manajemen Raport</span>
        </li>
        <li class=" ">
            <a href="../backend/index.html">
                <i class="las la-book-open"></i><span>Raport</span>
            </a>
        </li>
        <li class="mt-2 mb-2">
            <span id="sidebar-bottom" class="font-weight-bold">Manajemen Diagram</span>
        </li>
        <li class=" ">
            <a href="../backend/index.html">
                <i class="la la-bar-chart"></i><span>Digram</span>
            </a>
        </li>
    </ul>
</nav>