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
                        <h4 class="card-title">Data Guru</h4>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" class="form-control nip" name="nip"
                            placeholder="NIP" value="<?= $data['nip'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap Guru</label>
                        <input type="text" class="form-control nama_lengkap" name="nama_lengkap"
                            placeholder="Nama Lengkap Guru" value="<?= $data['nip'] ?>" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control tempat_lahir" name="tempat_lahir"
                                    placeholder="Tempat Lahir" value="<?= $tempat_lahir ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir <?= $tanggal_lahir ?></label>
                                <input value="<?= $tanggal_lahir ?>" type="date" class="form-control tanggal_lahir" name="tanggal_lahir"  readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control jenis_kelamin" name="jenis_kelamin" value="<?= $data['jenis_kelamin'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <input type="text" class="form-control agama" name="agama" value="<?= $data['agama'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control alamat" name="alamat"
                            placeholder="Alamat" value="<?= $data['alamat'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control nomor_telepon" name="nomor_telepon"
                            placeholder="Nomor Telepon" value="<?= $data['nomor_telepon'] ?>" readonly>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>