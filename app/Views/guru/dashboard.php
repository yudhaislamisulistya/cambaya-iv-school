<?= $this->extend('layouts/page-layout') ?>

<?= $this->section('content') ?>
<div class="content-page rtl-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="d-flex align-items-center justify-content-between welcome-content">
                    <div class="navbar-breadcrumb">
                        <h4 class="mb-0">Selamat Datang di Dashboard</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header border-none">
                        <div class="header-title">
                            <h4 class="card-title">Absensi Siswa (Hari Ini)</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="layout-1-chart-01"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-block card-stretch card-height rtl-mode ">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between mb-3">
                                    <h3 class="text-danger h1">33</h3>
                                    <div class="bg-danger icon iq-icon-box-2 mr-2 rounded rtl-ml-2  rtl-mr-0">
                                        <i class="lar la-hand-pointer"></i>
                                    </div>
                                </div>
                                <h4>Guru</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block card-stretch card-height rtl-mode">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between mb-3">
                                    <h3 class="text-primary h1">300</h3>
                                    <div class="bg-primary icon iq-icon-box-2 mr-2 rounded rtl-mr-0  rtl-ml-2">
                                        <i class="lar la-folder-open"></i>
                                    </div>
                                </div>
                                <h4>Siswa</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block card-stretch card-height rtl-mode ">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between mb-3">
                                    <h3 class="text-orange h1">50</h3>
                                    <div class="bg-orange icon iq-icon-box-2 mr-2 rounded rtl-ml-2 rtl-mr-0">
                                        <i class="las la-desktop"></i>
                                    </div>
                                </div>
                                <h4>Kelas</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block card-stretch card-height rtl-mode">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between mb-3">
                                    <h3 class="text-skyblue h1">5</h3>
                                    <div class="bg-skyblue icon iq-icon-box-2 mr-2 rounded rtl-ml-2 rtl-mr-0">
                                        <i class="las la-exclamation-triangle"></i>
                                    </div>
                                </div>
                                <h4>Mata Pelajaran</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block card-stretch card-height rtl-mode">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between mb-3">
                                    <h3 class="text-success h1">5</h3>
                                    <div class="bg-success icon iq-icon-box-2 mr-2 rounded rtl-mr-0 rtl-ml-2">
                                        <i class="las la-circle-notch"></i>
                                    </div>
                                </div>
                                <h4>Mengajar</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block card-stretch card-height rtl-mode">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between mb-3">
                                    <h3 class="text-info h1">2</h3>
                                    <div class="bg-info icon iq-icon-box-2 mr-2 rounded rtl-ml-2 rtl-mr-0">
                                        <i class="lar la-envelope"></i>
                                    </div>
                                </div>
                                <h4>Ujian</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <img src="../assets/images/01.jpeg" class="card-img-top" alt="#">
                    <div class="card-body">
                        <h4 class="card-title">UPT SPF SD INPRES CAMBAYA IV </h4>
                        <p class="card-text text-justify">salah satu sekolah inpres yang beralamat di Jl. Galangan Kapal, Kelurahan Pannampu,
                                Kecamatan Tallo, Kota Makassar. Sekolah ini memiliki 11 pegawai diantaranya Kepala
                                Sekolah, 9 Guru Pendidik, dan 1 Satpam. tersebut juga telah mengalami banyak
                                perkembangan baik perkembangan fisik bangunan, prestasi dari segi akademik maupun
                                prestasi dalam kegiatan ekstra kurikuler. Perkembangan tersebut diperoleh berkat kerja
                                keras kepala Sekolah beserta seluruh jajarannya , dukungan dari orang tua siswa, dan
                                dukungan dari Masyarakat disekitar Sekolah Dilihat dari segi geografis UPT SPF SD INPRES
                                CAMBAYA IV yang terletak jauh dari Kota, namun dari segi Prestasi siswa, sekolah
                                tersebut berhasil menempatkan diri sejajar dengan beberapa SD yang ada di Kota Makassar.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>
<?= $this->endSection() ?>