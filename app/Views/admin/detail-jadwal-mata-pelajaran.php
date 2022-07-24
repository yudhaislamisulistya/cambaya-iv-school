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
                        <h3 class="text-white"><b>Tahun Ajaran <?= getSemesterAktif()['tahun_ajaran'] ?> <br>
                                <?= getSemesterAktif()['semester'] ?> </b></h3>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Jadwal Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td colspan="3" class="text-center font-weight-bold">Senin</td1>
                                            </tr>
                                            <?php foreach (getMataPelajaranByKelas($id_kelas, $id_semester, 'Senin') as $key => $value) { ?>
                                                <tr>
                                                    <td><?= getUserById(getGuruById($value->id_guru)['id_user'])['nama_lengkap'] ?></td>
                                                    <td><?= $value->mata_pelajaran ?></td>
                                                    <td><?= $value->jam_masuk ?>-<?= $value->jam_keluar ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="3" class="text-center font-weight-bold">Rabu</td>
                                            </tr>
                                            <?php foreach (getMataPelajaranByKelas($id_kelas, $id_semester, 'Rabu') as $key => $value) { ?>
                                                <tr>
                                                    <td><?= getUserById(getGuruById($value->id_guru)['id_user'])['nama_lengkap'] ?></td>
                                                    <td><?= $value->mata_pelajaran ?></td>
                                                    <td><?= $value->jam_masuk ?>-<?= $value->jam_keluar ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="3" class="text-center font-weight-bold">Jumat</td>
                                            </tr>
                                            <?php foreach (getMataPelajaranByKelas($id_kelas, $id_semester, 'Jumat') as $key => $value) { ?>
                                                <tr>
                                                    <td><?= getUserById(getGuruById($value->id_guru)['id_user'])['nama_lengkap'] ?></td>
                                                    <td><?= $value->mata_pelajaran ?></td>
                                                    <td><?= $value->jam_masuk ?>-<?= $value->jam_keluar ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td colspan="3" class="text-center font-weight-bold">Selasa</td1>
                                            </tr>
                                            <?php foreach (getMataPelajaranByKelas($id_kelas, $id_semester, 'Selasa') as $key => $value) { ?>
                                                <tr>
                                                    <td><?= getUserById(getGuruById($value->id_guru)['id_user'])['nama_lengkap'] ?></td>
                                                    <td><?= $value->mata_pelajaran ?></td>
                                                    <td><?= $value->jam_masuk ?>-<?= $value->jam_keluar ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="3" class="text-center font-weight-bold">Kamis</td>
                                            </tr>
                                            <?php foreach (getMataPelajaranByKelas($id_kelas, $id_semester, 'Kamis') as $key => $value) { ?>
                                                <tr>
                                                    <td><?= getUserById(getGuruById($value->id_guru)['id_user'])['nama_lengkap'] ?></td>
                                                    <td><?= $value->mata_pelajaran ?></td>
                                                    <td><?= $value->jam_masuk ?>-<?= $value->jam_keluar ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="3" class="text-center font-weight-bold">Sabtu</td>
                                            </tr>
                                            <?php foreach (getMataPelajaranByKelas($id_kelas, $id_semester, 'Sabtu') as $key => $value) { ?>
                                                <tr>
                                                    <td><?= getUserById(getGuruById($value->id_guru)['id_user'])['nama_lengkap'] ?></td>
                                                    <td><?= $value->mata_pelajaran ?></td>
                                                    <td><?= $value->jam_masuk ?>-<?= $value->jam_keluar ?></td>
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
    </div>
</div>
<?= $this->endSection() ?>