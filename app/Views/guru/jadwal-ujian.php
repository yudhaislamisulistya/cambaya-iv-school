<?= $this->extend('layouts/page-layout') ?>

<?= $this->section('content') ?>

<div class="content-page rtl-page">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Jadwal Ujian</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hari</th>
                                        <th>Tanggal</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Jam</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) { ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= $value->hari ?></td>
                                            <td><?= $value->tanggal ?></td>
                                            <td><?= $value->mata_pelajaran ?></td>
                                            <td><?= $value->jam_masuk ?> - <?=  $value->jam_keluar?></td>
                                            <td><?= getKelasById($value->id_kelas)['kelas'] ?></td>
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

