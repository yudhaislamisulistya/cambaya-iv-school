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
                        <h3 class="mb-3">Ekstrakurikuler</h2>
                        <form action="<?= route_to('raport_guru_ekstrakurikuler_save') ?>" method="post">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kegiatan Ektrakurikuler</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Pramuka</td>
                                            <td>
                                                <input type="text" name="pramuka" id="pramuka"
                                                    class="form-control" placeholder="Keterangan" value="<?= $data['pramuka'] ?>" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Tari</td>
                                            <td>
                                                <input type="text" name="tari" id="tari"
                                                    class="form-control" placeholder="Keterangan" value="<?= $data['tari'] ?>" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Sanggar Mewarnai dan Menggambar</td>
                                            <td>
                                                <input readonly type="text" name="sanggar_mewarnai_dan_menggambar" id="sanggar_mewarnai_dan_menggambar"
                                                    class="form-control" placeholder="Keterangan" value="<?= $data['sanggar_mewarnai_dan_menggambar'] ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Quran Club</td>
                                            <td>
                                                <input type="text" name="quran_club" id="quran_club"
                                                    class="form-control" placeholder="Keterangan" value="<?= $data['quran_club'] ?>" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Sains Club</td>
                                            <td>
                                                <input type="text" name="sains_club" id="sains_club"
                                                    class="form-control" placeholder="Keterangan" value="<?= $data['sains_club'] ?>" readonly> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>English Club</td>
                                            <td>
                                                <input type="text" name="english_club" id="english_club"
                                                    class="form-control" placeholder="Keterangan" value="<?= $data['english_club'] ?>" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Sepak Bola</td>
                                            <td>
                                                <input type="text" name="sepak_bola" id="sepak_bola"
                                                    class="form-control" placeholder="Keterangan" value="<?= $data['sepak_bola'] ?>" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Tenis Meja</td>
                                            <td>
                                                <input type="text" name="tenis_meja" id="tenis_meja"
                                                    class="form-control" placeholder="Keterangan" value="<?= $data['tenis_meja'] ?>" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>PMR dan Dokcil</td>
                                            <td>
                                                <input type="text" name="pmr_dan_dokcil" id="pmr_dan_dokcil"
                                                    class="form-control" placeholder="Keterangan" value="<?= $data['pmr_dan_dokcil'] ?>" readonly>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" name="id_siswa_kelas" value="<?= $data['id_siswa_kelas'] ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>