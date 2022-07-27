<?= $this->extend('layouts/page-layout') ?>

<?= $this->section('content') ?>

<div class="content-page rtl-page">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12 mx-auto">
                <div class="alert text-white bg-primary" role="alert">
                    <div class="iq-alert-text">
                        <h3 class="text-white"><b>Tahun Ajaran <?= getSemesterAktif()['tahun_ajaran'] ?> <br> <?= getSemesterAktif()['semester'] ?>  </b></h3>
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
                                        <th>NIS</th>
                                        <th>Nama Lengkap Siswa</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>Aksi Kompetensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) { ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= getSiswaByIdSiswa($value->id_siswa)['nis'] ?></td>
                                            <td><?= getUserById(getSiswaByIdSiswa($value->id_siswa)['id_user'])['nama_lengkap'] ?></td>
                                            <td><?= getSiswaByIdSiswa($value->id_siswa)['tempat_tanggal_lahir'] ?></td>
                                            <td><?= getSiswaByIdSiswa($value->id_siswa)['jenis_kelamin'] ?></td>
                                            <td><?= getSiswaByIdSiswa($value->id_siswa)['agama'] ?></td>
                                            <td><?= getSiswaByIdSiswa($value->id_siswa)['alamat'] ?></td>
                                            <td class="text-center">
                                                <a href="<?= route_to('raport_guru_kompetensi_keahlian', $value->id_siswa_kelas) ?>" class="btn btn-info btn-sm mt-1">Keahlian</a>
                                                <a href="<?= route_to('raport_guru_pengetahuan_keterampilan', $value->id_siswa_kelas) ?>" class="btn btn-primary btn-sm mt-1">Pengetahuan dan Keteampilan</a>
                                                <a href="<?= route_to('raport_guru_ekstrakurikuler', $value->id_siswa_kelas) ?>" class="btn btn-success btn-sm mt-1">Ekstrakuriikuler</a>
                                                <a href="<?= route_to('raport_guru_saran', $value->id_siswa_kelas) ?>" class="btn btn-warning btn-sm mt-1">Saran</a>
                                                <a href="<?= route_to('raport_guru_prestasi',$value->id_siswa_kelas) ?>" class="btn btn-secondary btn-sm mt-1">Prestasi</a>
                                                <a href="<?= route_to('raport_guru_ketidakhadiran',$value->id_siswa_kelas) ?>" class="btn btn-danger btn-sm mt-1">Ketidakhadiran</a>
                                                <a href="<?= route_to('raport_guru_diagram_pengetahuan_keterampilan', $value->id_siswa_kelas) ?>" class="btn btn-light btn-sm mt-1"><i class="las la-chart-area"></i>Diagram</a>
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

