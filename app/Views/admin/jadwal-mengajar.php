<?= $this->extend('layouts/page-layout') ?>

<?= $this->section('content') ?>

<div class="content-page rtl-page">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="alert text-white bg-primary" role="alert">
                        <div class="iq-alert-text">
                            <h3 class="text-white"><b>Tahun Ajaran <?= getSemesterAktif()['tahun_ajaran'] ?> <br> <?= getSemesterAktif()['semester'] ?>  </b></h3>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">Data Jadwal Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hari/Jam</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Guru Sekolah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) { ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= $value->hari ?> (<?= $value->jam_masuk ?> - <?= $value->jam_keluar ?>)</td>
                                            <td><?= $value->mata_pelajaran ?></td>
                                            <td><?= getUserById(getGuruById($value->id_guru)['id_user'])['nama_lengkap'] ?></td>
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