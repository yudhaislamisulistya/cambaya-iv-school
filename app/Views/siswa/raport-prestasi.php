<?= $this->extend('layouts/page-layout') ?>

<?= $this->section('content') ?>

<div class="content-page rtl-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="alert text-white bg-primary" role="alert">
                    <div class="iq-alert-text">
                        <h3 class="text-white"><b>Tahun Ajaran <?= getSemesterAktif()['tahun_ajaran'] ?> <br>
                                <?= getSemesterAktif()['semester'] ?> </b></h3>
                        <h3 class="text-white font-weight-bold">Kelas <?= getKelasById($id_kelas)['kelas'] ?></h3>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Siswa Kelas <?= getKelasById($id_kelas)['kelas']?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Prestasi</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (getTrSiswaPrestasi() as $key => $value) { ?>
                                    <tr>
                                        <td><?= ++$key; ?></td>
                                        <td><?= $value->prestasi; ?></td>
                                        <td>
                                            <input type="text" class="form-control" name="keterangan[<?= $key-1 ?>]"
                                                id="keterangan" value="<?= $value->keterangan ?>">
                                        </td>
                                    </tr>
                                    <input type="hidden" name="id_siswa_prestasi[<?= $key-1 ?>]"
                                        value="<?= $value->id_siswa_prestasi ?>">
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