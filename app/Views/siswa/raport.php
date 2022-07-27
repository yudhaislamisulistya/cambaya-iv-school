<?= $this->extend('layouts/page-layout') ?>

<?= $this->section('content') ?>

<div class="content-page rtl-page">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12 mx-auto">
                <?php if(isset($validation)) : ?>
                    <div class=col-12>
                        <div class="alert alert-danger alert-dismissable alert-style-1">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="zmdi zmdi-block"></i><?= $validation->listErrors() ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(session()->getFlashData('status') == "success"){ ?>
                    <div class="alert alert-success alert-dismissable alert-style-1">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="zmdi zmdi-check"></i>Proses Berhasil
                    </div>
                    <?php }else if(session()->getFlashData('status') == "failed"){ ?>
                    <div class="alert alert-danger alert-dismissable alert-style-1">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="zmdi zmdi-info-outline"></i>Proses Gagal
                    </div>
                <?php }?>
                <div class="alert text-white bg-primary" role="alert">
                    <div class="iq-alert-text">
                        <h3 class="text-white"><b>Tahun Ajaran <?= getSemesterAktif()['tahun_ajaran'] ?> <br> <?= getSemesterAktif()['semester'] ?>  </b></h3>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Kelas - Raport</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Wali Kelas</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) { ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><span class="badge badge-success"><?= getKelasById($value->id_kelas)['kelas'] ?></span></td>
                                            <td><?= getKelasById($value->id_kelas)['wali_kelas'] ?></td>
                                            <td class="text-center">
                                                <a href="<?= route_to('raport_siswa_kompetensi_keahlian', $value->id_siswa_kelas) ?>" class="btn btn-info btn-sm mt-1">Keahlian</a>
                                                <a href="<?= route_to('raport_siswa_pengetahuan_keterampilan', $value->id_siswa_kelas) ?>" class="btn btn-primary btn-sm mt-1">Pengetahuan dan Keteampilan</a>
                                                <a href="<?= route_to('raport_siswa_ekstrakurikuler', $value->id_siswa_kelas) ?>" class="btn btn-success btn-sm mt-1">Ekstrakuriikuler</a>
                                                <a href="<?= route_to('raport_siswa_saran', $value->id_siswa_kelas) ?>" class="btn btn-warning btn-sm mt-1">Saran</a>
                                                <a href="<?= route_to('raport_siswa_prestasi',$value->id_siswa_kelas) ?>" class="btn btn-secondary btn-sm mt-1">Prestasi</a>
                                                <a href="<?= route_to('raport_siswa_ketidakhadiran',$value->id_siswa_kelas) ?>" class="btn btn-danger btn-sm mt-1">Ketidakhadiran</a>
                                                <a href="<?= route_to('raport_siswa_diagram_pengetahuan_keterampilan', $value->id_siswa_kelas) ?>" class="btn btn-light btn-sm mt-1"><i class="las la-chart-area"></i>Diagram</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
