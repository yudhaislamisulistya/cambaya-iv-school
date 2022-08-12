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
                <div class="alert bg-light" role="alert">
                    <div class="iq-alert-text">
                        <ul>
                            <li>Mata Pelajaran : <b><?= getMataPelajranById($id_mata_pelajaran)['mata_pelajaran'] ?></b></li>
                            <li>Hari : <b><?= getMataPelajranById($id_mata_pelajaran)['hari'] ?></b></li>
                            <li>Jam : <b><?= getMataPelajranById($id_mata_pelajaran)['jam_masuk'] ?></b>-<b><?= getMataPelajranById($id_mata_pelajaran)['jam_keluar'] ?></b></li>
                            <li>Kelas : <b><?= getKelasById($id_kelas)['kelas'] ?></b></li>
                            <li>Wali Kelas : <b><?= getKelasById($id_kelas)['wali_kelas'] ?></b></li>
                            <li>Guru Mata Pelajaran : <b><?= getUserById(getGuruById(getMataPelajaranById($id_mata_pelajaran)['id_guru'])['id_user'])['nama_lengkap'] ?></b></li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Jadwal Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?= route_to('absensi_guru_update') ?>" method="post">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td rowspan="2">No</td>
                                                <td rowspan="2">NIS</td>
                                                <td rowspan="2">Nama</td>
                                                <td class="text-center"
                                                    colspan="<?= count(getTrAbsensiKelas($id_mata_pelajaran, $id_kelas, $id_semester)) ?>">
                                                    Pertemuan <a class="btn btn-primary btn-add"><i
                                                            class="las la-plus text-white"></i></a></td>
                                                <td colspan="4">Jumlah</td>
                                            </tr>
                                            <tr>
                                                <?php foreach(getTrAbsensiKelas($id_mata_pelajaran, $id_kelas, $id_semester) as $key => $value){ ?>
                                                <td><?= ++$key; ?></td>
                                                <?php } ?>
                                                <td>H</td>
                                                <td>I</td>
                                                <td>A</td>
                                                <td>S</td>
                                            </tr>
                                            <?php foreach($data as $key => $value){ ?>
                                                <input type="hidden" name="id_siswa[<?= $key ?>]" value="<?= $value->id_siswa ?>">
                                            <tr>
                                                <td><?= ++$key ?></td>
                                                <td><?= getSiswaByIdSiswa($value->id_siswa)['nis'] ?></td>
                                                <td><?= getUserById(getSiswaByIdSiswa($value->id_siswa)['id_user'])['nama_lengkap'] ?>
                                                </td>
                                                <?php foreach(getTrAbsensiKelas($id_mata_pelajaran, $id_kelas, $id_semester) as $key2 => $value2){ ?>
                                                <input type="hidden" name="kode_absensi[<?= ($key-1) ?>][<?= $key2 ?>]" value="<?= $value2->kode_absensi ?>">
                                                <td>
                                                    <select name="absensi_kelas_siswa[<?= ($key-1) ?>][<?= $key2 ?>]" class="form-control">
                                                        <?php if(getTrAbsensiSiswaKelasByIdSiswaDanKodeAbsensi($value->id_siswa, $value2->kode_absensi) == null){ ?>
                                                        <option value="">Status...</option>
                                                        <option value="" disabled>--------</option>
                                                        <?php }else{ ?>
                                                        <option value="<?= getTrAbsensiSiswaKelasByIdSiswaDanKodeAbsensi($value->id_siswa, $value2->kode_absensi)['status'] ?>"><?= getTrAbsensiSiswaKelasByIdSiswaDanKodeAbsensi($value->id_siswa, $value2->kode_absensi)['status'] ?></option>
                                                        <option value="" disabled>--------</option>
                                                        <?php } ?>
                                                        <option value="Hadir">Hadir</option>
                                                        <option value="Izin">Izin</option>
                                                        <option value="Alpha">Alpha</option>
                                                        <option value="Sakit">Sakit</option>
                                                    </select>
                                                </td>
                                                <?php } ?>
                                                <?php if(getTrAbsensiSiswaKelasIdSiswa($value->id_siswa) == NULL){ ?>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                <?php }else{ ?>
                                                    <td><span class="badge badge-primary"><?= count(getTrAbsensiSiswaKelasByStatus('Hadir', $value->id_siswa, getTrAbsensiSiswaKelasByKodeAbsensiOne( getTrAbsensiKelasOne($id_mata_pelajaran, $id_kelas, $id_semester)['kode_absensi'])['kode_absensi_siswa_kelas'])) ?></span></td>
                                                    <td><span class="badge badge-warning"><?= count(getTrAbsensiSiswaKelasByStatus('Izin', $value->id_siswa, getTrAbsensiSiswaKelasByKodeAbsensiOne( getTrAbsensiKelasOne($id_mata_pelajaran, $id_kelas, $id_semester)['kode_absensi'])['kode_absensi_siswa_kelas'])) ?></span></td>
                                                    <td><span class="badge badge-danger"><?= count(getTrAbsensiSiswaKelasByStatus('Alpha', $value->id_siswa, getTrAbsensiSiswaKelasByKodeAbsensiOne( getTrAbsensiKelasOne($id_mata_pelajaran, $id_kelas, $id_semester)['kode_absensi'])['kode_absensi_siswa_kelas'])) ?></span></td>
                                                    <td><span class="badge badge-secondary"><?= count(getTrAbsensiSiswaKelasByStatus('Sakit', $value->id_siswa, getTrAbsensiSiswaKelasByKodeAbsensiOne( getTrAbsensiKelasOne($id_mata_pelajaran, $id_kelas, $id_semester)['kode_absensi'])['kode_absensi_siswa_kelas'])) ?></span></td>
                                                    <input type="hidden" name="hadir[<?= $key-1 ?>]" value="<?= count(getTrAbsensiSiswaKelasByStatus('Hadir', $value->id_siswa, getTrAbsensiSiswaKelasByKodeAbsensiOne( getTrAbsensiKelasOne($id_mata_pelajaran, $id_kelas, $id_semester)['kode_absensi'])['kode_absensi_siswa_kelas'])) ?>">
                                                    <input type="hidden" name="izin[<?= $key-1 ?>]" value="<?= count(getTrAbsensiSiswaKelasByStatus('Izin', $value->id_siswa, getTrAbsensiSiswaKelasByKodeAbsensiOne( getTrAbsensiKelasOne($id_mata_pelajaran, $id_kelas, $id_semester)['kode_absensi'])['kode_absensi_siswa_kelas'])) ?>">
                                                    <input type="hidden" name="alpha[<?= $key-1 ?>]" value="<?= count(getTrAbsensiSiswaKelasByStatus('Alpha', $value->id_siswa, getTrAbsensiSiswaKelasByKodeAbsensiOne( getTrAbsensiKelasOne($id_mata_pelajaran, $id_kelas, $id_semester)['kode_absensi'])['kode_absensi_siswa_kelas'])) ?>">
                                                    <input type="hidden" name="sakit[<?= $key-1 ?>]" value="<?= count(getTrAbsensiSiswaKelasByStatus('Sakit', $value->id_siswa, getTrAbsensiSiswaKelasByKodeAbsensiOne( getTrAbsensiKelasOne($id_mata_pelajaran, $id_kelas, $id_semester)['kode_absensi'])['kode_absensi_siswa_kelas'])) ?>">
                                                <?php } ?>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="id_kelas" value="<?= $id_kelas ?>">
                                    <input type="hidden" name="id_semester" value="<?= $id_semester ?>">
                                        <input type="hidden" name="jumlah_absensi" value="<?= count(getTrAbsensiKelas($id_mata_pelajaran, $id_kelas, $id_semester)) ?>">
                                        <button class="btn btn-info btn-update"><i class="las la-check"></i>
                                            Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Data Absensi-->
<form action="<?= route_to('absensi_guru_add') ?>" method="post">
    <?= csrf_field()?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Kolom Absensi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Jumlah Kolom Absensi</label>
                        <input type="text" class="form-control" name="jumlah_kolom_absensi"
                            placeholder="Jumlah Kolom Absensi">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_mata_pelajaran" value="<?= $id_mata_pelajaran ?>">
                    <input type="hidden" name="id_kelas" value="<?= $id_kelas ?>">
                    <input type="hidden" name="id_semester" value="<?= $id_semester ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Add Data Absensi-->
<!-- Modal Update Data Absensi -->
<form action="<?= route_to('absensi_guru_update') ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kelas Ini ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4>Apakah Kamu Ingin Data Kelas Ini?</h4>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="kode_absensi" class="kode_absensi">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Update Data Absensi-->
<?= $this->endSection() ?>
<?= $this->section('javascript') ?>
<script>
    $(document).ready(function () {
        $('.btn-add').on('click', function () {
            $('#addModal').modal('show');
        });
    });
</script>
<?= $this->endSection() ?>