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
                        <h4 class="card-title">Data Nilai Keterampilan <span
                                class="badge badge-primary"><?= getKelasById($id_kelas)['kelas'] ?></span></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?= route_to('nilai_keterampilan_guru_update') ?>" method="post">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <td rowspan="2">No</td>
                                                    <td rowspan="2">NIS</td>
                                                    <td rowspan="2">Nama</td>
                                                    <td class="text-center"
                                                        colspan="<?= count(getTrNilaiKeterampilanKelas($id_mata_pelajaran, $id_kelas, $id_semester)) ?>">
                                                        Nilai <a class="btn btn-primary btn-add"><i
                                                                class="text-white las la-plus"></i></button></td>
                                                    <td rowspan="2"> Rata-Rata</td>
                                                    <td rowspan="2"> Predikat</td>
                                                </tr>
                                                <tr>
                                                    <?php foreach(getTrNilaiKeterampilanKelas($id_mata_pelajaran, $id_kelas, $id_semester) as $key => $value){ ?>
                                                    <td><?= $value->jenis_nilai ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <?php foreach($data as $key => $value){ ?>
                                                <input type="hidden" name="id_siswa[<?= $key ?>]"
                                                    value="<?= $value->id_siswa ?>">
                                                <tr>
                                                    <td><?= ++$key ?></td>
                                                    <td><?= getSiswaByIdSiswa($value->id_siswa)['nis'] ?></td>
                                                    <td><?= getUserById(getSiswaByIdSiswa($value->id_siswa)['id_user'])['nama_lengkap'] ?>
                                                    </td>
                                                    <?php
                                                    
                                                        $kode_nilai_keterampilan = '';
                                                    ?>
                                                    <?php foreach(getTrNilaiKeterampilanKelas($id_mata_pelajaran, $id_kelas, $id_semester) as $key2 => $value2){ ?>
                                                    <?php
                                                        $kode_nilai_keterampilan = $value2->kode_nilai_keterampilan;    
                                                    ?>
                                                    <input type="hidden"
                                                        name="kode_nilai_keterampilan[<?= ($key-1) ?>][<?= $key2 ?>]"
                                                        value="<?= $value2->kode_nilai_keterampilan ?>">
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            name="nilai_keterampilan[<?= ($key-1) ?>][<?= $key2 ?>]"
                                                            value="<?= getTrNilaiKeterampilanSiswaKelasByKodeNilaiKeterampilan($value2->kode_nilai_keterampilan) != NULL ? getTrNilaiKeterampilanSiswaKelasByStatus(getTrNilaiKeterampilanSiswaKelasByKodeNilaiKeterampilan($value2->kode_nilai_keterampilan)['kode_nilai_keterampilan_siswa_kelas'], $value->id_siswa, $value2->kode_nilai_keterampilan)['nilai_keterampilan'] : 0; ?>"
                                                            min="0" max="100" required>
                                                    </td>
                                                    <?php } ?>
                                                    <td>
                                                        <?php if(getTrNilaiKeterampilanSiswaKelasByKodeNilaiKeterampilan($kode_nilai_keterampilan) != NULL){ ?>

                                                        <?php
                                                            $rata_rata = 0;
                                                            foreach (getTrNilaiKeterampilanSiswaKelasByNilai(getTrNilaiKeterampilanSiswaKelasByKodeNilaiKeterampilan($kode_nilai_keterampilan)['kode_nilai_keterampilan_siswa_kelas'], $value->id_siswa) as $key => $value) {
                                                                $rata_rata += $value->nilai_keterampilan;
                                                            }
                                                            $rata_rata = $rata_rata/count(getTrNilaiKeterampilanSiswaKelasByNilai(getTrNilaiKeterampilanSiswaKelasByKodeNilaiKeterampilan($kode_nilai_keterampilan)['kode_nilai_keterampilan_siswa_kelas'], $value->id_siswa));
                                                            echo $rata_rata;    
                                                        ?>
                                                        <?php }else{ ?>
                                                        0
                                                        <?php } ?>
                                                        <?php
    
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if(getTrNilaiKeterampilanSiswaKelasByKodeNilaiKeterampilan($kode_nilai_keterampilan) != NULL){ ?>
                                                        <?= getPredikatByNilai($rata_rata) ?>
                                                        <?php }else{ ?>
                                                        -
                                                        <?php } ?>
                                                        <?php
                                                            ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <input type="hidden" name="jumlah_nilai_keterampilan"
                                            value="<?= count(getTrNilaiKeterampilanKelas($id_mata_pelajaran, $id_kelas, $id_semester)) ?>">
                                        <button class="btn btn-info btn-update"><i class="las la-check"></i>
                                            Simpan</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Daftar Predikat</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>A: 86 s.d 100</li>
                            <li>A-: 81 s.d 85</li>
                            <li>B+: 76 s.d 80</li>
                            <li>B: 71 s.d 75</li>
                            <li>B-: 66 s.d 70</li>
                            <li>C+: 61 s.d 65</li>
                            <li>C: 51 s.d 60</li>
                            <li>D: 45 s.d 50</li>
                            <li>E: < 45 </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Data Absensi-->
<form action="<?= route_to('nilai_keterampilan_guru_add') ?>" method="post">
    <?= csrf_field()?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Jenis Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Nilai</label>
                        <input type="text" class="form-control" name="jenis_nilai" placeholder="Jenis Nilai">
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
<form action="<?= route_to('nilai_keterampilan_guru_update') ?>" method="post">
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
                    <input type="hidden" name="kode_nilai_keterampilan" class="kode_nilai_keterampilan">
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