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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Siswa</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>NIS</label>
                            <input value="<?= getSiswaById($data['id_user'])['nis'] ?>" type="text" class="form-control nis" name="nis" placeholder="NIS" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap Siswa</label>
                            <input value="<?= getUserById($data['id_user'])['nama_lengkap'] ?>" type="text" class="form-control nama_lengkap" name="nama_lengkap"
                                placeholder="Nama Lengkap Siswa" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input value="<?= $tempat_lahir ?>" type="text" class="form-control tempat_lahir" name="tempat_lahir"
                                        placeholder="Tempat Lahir" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input value="<?= $tanggal_lahir ?>" type="date" class="form-control tanggal_lahir"
                                        name="tanggal_lahir" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input value="<?= getSiswaById($data['id_user'])['jenis_kelamin'] ?>" type="text" class="form-control nis" name="nis" placeholder="NIS" readonly>
                        </div>
                        <div class="form-group">
                            <label>Agama</label>
                            <input value="<?= getSiswaById($data['id_user'])['agama'] ?>" type="text" class="form-control nis" name="nis" placeholder="NIS" readonly>
                        </div>
                        <div class="form-group">
                            <label>Pendidikan Sebelumnya</label>
                            <input value="<?= getSiswaById($data['id_user'])['pendidikan_sebelumnya'] ?>" type="text" class="form-control pendidikan_sebelumnya" name="pendidikan_sebelumnya"
                                placeholder="Pendidikan Sebelumnya" readonly>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input value="<?= getSiswaById($data['id_user'])['alamat'] ?>" type="text" class="form-control alamat" name="alamat" placeholder="Alamat" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2 mt-2">
                                <h4>Nama Orang Tua</h4>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ayah</label>
                                    <input value="<?= getSiswaById($data['id_user'])['nama_orang_tua_ayah'] ?>" type="text" class="form-control nama_orang_tua_ayah"
                                        name="nama_orang_tua_ayah" placeholder="Ayah" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ibu</label>
                                    <input value="<?= getSiswaById($data['id_user'])['nama_orang_tua_ibu'] ?>" type="text" class="form-control nama_orang_tua_ibu" name="nama_orang_tua_ibu"
                                        placeholder="Ibu" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2 mt-2">
                                <h4>Pekerjaan Orang Tua</h4>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ayah</label>
                                    <input value="<?= getSiswaById($data['id_user'])['pekerjaan_orang_tua_ayah'] ?>" type="text" class="form-control pekerjaan_orang_tua_ayah"
                                        name="pekerjaan_orang_tua_ayah" placeholder="Ayah" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ibu</label>
                                    <input value="<?= getSiswaById($data['id_user'])['pekerjaan_orang_tua_ibu'] ?>" type="text" class="form-control pekerjaan_orang_tua_ibu"
                                        name="pekerjaan_orang_tua_ibu" placeholder="Ibu" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2 mt-2">
                                <h4>Alamat Orang Tua</h4>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Jalan</label>
                                    <input value="<?= getSiswaById($data['id_user'])['alamat_orang_tua_jalan'] ?>" type="text" class="form-control alamat_orang_tua_jalan"
                                        name="alamat_orang_tua_jalan" placeholder="Jalan" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <input value="<?= getSiswaById($data['id_user'])['alamat_orang_tua_kelurahan'] ?>" type="text" class="form-control alamat_orang_tua_kelurahan"
                                        name="alamat_orang_tua_kelurahan" placeholder="Kelurahan" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input value="<?= getSiswaById($data['id_user'])['alamat_orang_tua_kecamatan'] ?>" type="text" class="form-control alamat_orang_tua_kecamatan"
                                        name="alamat_orang_tua_kecamatan" placeholder="Kecamatan" readonly>
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