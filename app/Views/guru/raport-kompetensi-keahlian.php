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
                        <form action="<?= route_to('raport_guru_kompetensi_keahlian_save') ?>" method="post">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="3">Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Sikap Spiritual</td>
                                            <td>
                                                <input type="text" name="sikap_spiritual" id="sikap_spiritual"
                                                    class="form-control" placeholder="Keterangan" value="<?= $data['sikap_spiritual'] ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Sikap Sosial</td>
                                            <td>
                                                <input type="text" name="sikap_sosial" id="sikap_sosial"
                                                    class="form-control" placeholder="Keterangan" value="<?= $data['sikap_sosial'] ?>">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" name="id_siswa_kelas" value="<?= $data['id_siswa_kelas'] ?>">
                                <button class="btn btn-primary" type="submit">
                                    <i class="las la-check">Simpan</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>