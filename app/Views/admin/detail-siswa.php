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
                        <input type="text" class="form-control nis" name="nis" placeholder="NIS" value="<?= $data['nis'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap Siswa</label>
                        <input type="text" class="form-control nama_lengkap" name="nama_lengkap"
                            placeholder="Nama Lengkap Siswa" value="<?= $data['nama_lengkap'] ?>" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control tempat_lahir" name="tempat_lahir"
                                    placeholder="Tempat Lahir" value="<?= explode(", ", $data['tempat_tanggal_lahir'])[0] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control tanggal_lahir"
                                    name="tanggal_lahir" value="<?= explode(", ", $data['tempat_tanggal_lahir'])[1] ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control jenis_kelamin" value="<?= $data['jenis_kelamin'] ?>" readonly>
                            <option value="" disabled>--Pilih Jenis Kelamin--</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <select name="agama" id="agama" class="form-control agama" value="<?= $data['agama'] ?>" readonly>
                            <option value="" disabled>--Pilih Agama--</option>
                            <option value="Islam">Islam</option>
                            <option value="Prorestan">Protestan</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pendidikan Sebelumnya</label>
                        <input type="text" class="form-control pendidikan_sebelumnya" name="pendidikan_sebelumnya"
                            placeholder="Pendidikan Sebelumnya" value="<?= $data['pendidikan_sebelumnya'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control alamat"  name="alamat" placeholder="Alamat" value="<?= $data['alamat'] ?>" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-2 mt-2">
                            <h4>Nama Orang Tua</h4>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ayah</label>
                                <input type="text" class="form-control nama_orang_tua_ayah" name="nama_orang_tua_ayah"
                                    placeholder="Ayah" value="<?= $data['nama_orang_tua_ayah'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ibu</label>
                                <input type="text" class="form-control nama_orang_tua_ibu" name="nama_orang_tua_ibu"
                                    placeholder="Ibu" value="<?= $data['nama_orang_tua_ibu'] ?>" readonly>
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
                                <input type="text" class="form-control pekerjaan_orang_tua_ayah"
                                    name="pekerjaan_orang_tua_ayah" placeholder="Ayah" value="<?= $data['pekerjaan_orang_tua_ayah'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ibu</label>
                                <input type="text" class="form-control pekerjaan_orang_tua_ibu"
                                    name="pekerjaan_orang_tua_ibu" placeholder="Ibu" value="<?= $data['pekerjaan_orang_tua_ibu'] ?>"  readonly>
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
                                <input type="text" class="form-control alamat_orang_tua_jalan"
                                    name="alamat_orang_tua_jalan" placeholder="Jalan" value="<?= $data['alamat_orang_tua_jalan'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <input type="text" class="form-control alamat_orang_tua_kelurahan"
                                    name="alamat_orang_tua_kelurahan" placeholder="Kelurahan" value="<?= $data['alamat_orang_tua_kelurahan'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" class="form-control alamat_orang_tua_kecamatan"
                                    name="alamat_orang_tua_kecamatan" placeholder="Kecamatan" value="<?= $data['alamat_orang_tua_kecamatan'] ?>" readonly>
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