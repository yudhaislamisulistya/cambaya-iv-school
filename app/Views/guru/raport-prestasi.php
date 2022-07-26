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
                        <h3 class="text-white font-weight-bold">Kelas <?= getKelasById($id_kelas)['kelas'] ?></h3>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Siswa Kelas <?= getKelasById($id_kelas)['kelas']?></h4>
                        <a class="btn btn-primary btn-add text-white"><i class="text-white las la-plus"></i> Tambah
                            Prestasi</button></a>
                    </div>
                    <div class="card-body">
                        <form action="<?= route_to('raport_guru_prestasi_save') ?>" method="post">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Prestasi</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (getTrSiswaPrestasi() as $key => $value) { ?>
                                        <tr>
                                            <td><?= ++$key; ?></td>
                                            <td><?= $value->prestasi; ?></td>
                                            <td>
                                                <input type="text" class="form-control" name="keterangan[<?= $key-1 ?>]"
                                                    id="keterangan" value="<?= $value->keterangan ?>">
                                            </td>
                                        </tr>
                                        <input type="hidden" name="id_siswa_prestasi[<?= $key-1 ?>]" value="<?= $value->id_siswa_prestasi ?>">
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <button type="submti" class="btn btn-success text-white"><i
                                        class="text-white las la-check"></i>Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Data Absensi-->
<form action="<?= route_to('raport_guru_prestasi_add') ?>" method="post">
    <?= csrf_field()?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Prestasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Prestasi</label>
                        <input type="text" class="form-control" name="prestasi" placeholder="Prestasi">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_siswa_kelas" value="<?= $data['id_siswa_kelas'] ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Add Data Absensi-->
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