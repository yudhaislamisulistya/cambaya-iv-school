<?= $this->extend('layouts/page-layout') ?>

<?= $this->section('content') ?>

<div class="content-page rtl-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mx-auto">
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
                        <h3 class="text-white font-weight-bold">Kelas <?= getKelasById($id_kelas)['kelas'] ?></h3>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Siswa -
                            <?= getUserById(getSiswaByIdSiswa($data['id_siswa'])['id_user'])['nama_lengkap'] ?>
                            (<?= getSiswaByIdSiswa($data['id_siswa'])['nis'] ?>)</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="mb-3">Kompetensi Pengetahuan dan Keterampilan</h2>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="tg-0pky" rowspan="2">No</th>
                                                <th class="tg-0lax" rowspan="2">Mata Pelajaran</th>
                                                <th class="tg-0lax" colspan="3">Pengetahuan</th>
                                                <th class="tg-0lax" colspan="3">Keterampilan</th>
                                            </tr>
                                            <tr>
                                                <th class="tg-0lax">Nilai</th>
                                                <th class="tg-0lax">Predikat</th>
                                                <th class="tg-0lax">Deksripsi</th>
                                                <th class="tg-0lax">Nilai</th>
                                                <th class="tg-0lax">Predikat</th>
                                                <th class="tg-0lax">Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach (getMataPelajaranByIdKelasDanIdSemester($id_kelas, $id_semester) as $key => $value) { ?>
                                                <input type="hidden"  name="id_mata_pelajaran[<?= $key ?>]" value="<?= $value->id_mata_pelajaran ?>">
                                                <?php
                                                    $p_rata_rata_nilai = 0;
                                                    $k_rata_rata_nilai = 0;
                                                ?>
                                                <?php foreach (getTrNilaiPengetahuanKelasByIdMataPelajaranKelasSemester($value->id_mata_pelajaran, $id_kelas, $id_semester) as $key2 => $value2) { ?>
                                                    <?php
                                                    $p_rata_rata_nilai += (int)getTrNilaiPengetahuanSiswaKelasByIdSiswaKodeNilaiPengetahuan($data['id_siswa'], $value2->kode_nilai_pengetahuan)['nilai_pengetahuan'];
                                                    ?>

                                                <?php } ?>
                                                <?php foreach (getTrNilaiKeterampilanKelasByIdMataPelajaranKelasSemester($value->id_mata_pelajaran, $id_kelas, $id_semester) as $key2 => $value2) { ?>
                                                    <?php
                                                    $k_rata_rata_nilai += (int)getTrNilaiKeterampilanSiswaKelasByIdSiswaKodeNilaiKeterampilan($data['id_siswa'], $value2->kode_nilai_keterampilan)['nilai_keterampilan'];
                                                    ?>

                                                <?php } ?>
                                                <?php
                                                    $p_rata_rata_nilai = $p_rata_rata_nilai / count(getTrNilaiPengetahuanKelasByIdMataPelajaranKelasSemester($value->id_mata_pelajaran, $id_kelas, $id_semester));
                                                    $k_rata_rata_nilai = $k_rata_rata_nilai / count(getTrNilaiKeterampilanKelasByIdMataPelajaranKelasSemester($value->id_mata_pelajaran, $id_kelas, $id_semester));
                                                ?>
                                                <tr>
                                                    <td><?=  ++$key ?></td>
                                                    <td><?=  $value->mata_pelajaran ?></td>
                                                    <td>
                                                        <input type="text" class="form-control" name="p_nilai[<?= $key-1 ?>]" value="<?= $p_rata_rata_nilai ?>" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="p_predikat[<?= $key-1 ?>]" readonly value="<?= getPredikatByNilai($p_rata_rata_nilai) ?>">
                                                    </td>

                                                    <td>
                                                        <input type="text" class="form-control" name="p_deskripsi[<?= $key-1 ?>]" placeholder="Keterangan" value="<?= getTrSiswaPengetahuanKeterampilanByIdSiswaKelasMataPelajaran($data['id_siswa_kelas'], $value->id_mata_pelajaran) == NULL ? 'Tidak ada Keterangan' :  getTrSiswaPengetahuanKeterampilanByIdSiswaKelasMataPelajaran($data['id_siswa_kelas'], $value->id_mata_pelajaran)['p_deskripsi']?>" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="k_nilai[<?= $key-1 ?>]" readonly value="<?= $k_rata_rata_nilai ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="k_predikat[<?= $key-1 ?>]" readonly value="<?= getPredikatByNilai($k_rata_rata_nilai) ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="k_deskripsi[<?= $key-1 ?>]" placeholder="Keterangan" value="<?= getTrSiswaPengetahuanKeterampilanByIdSiswaKelasMataPelajaran($data['id_siswa_kelas'], $value->id_mata_pelajaran) == NULL ? 'Tidak ada Keterangan' :  getTrSiswaPengetahuanKeterampilanByIdSiswaKelasMataPelajaran($data['id_siswa_kelas'], $value->id_mata_pelajaran)['k_deskripsi']?>" readonly>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="id_siswa_kelas" value="<?= $data['id_siswa_kelas'] ?>">
                                    <input type="hidden" name="jumlah_pengetahuan_keterampilan" value="<?= count(getMataPelajaranByIdKelasDanIdSemester($id_kelas, $id_semester)) ?>">
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>