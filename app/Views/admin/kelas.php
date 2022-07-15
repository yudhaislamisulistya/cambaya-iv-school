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
                        <h4 class="card-title">Data Kelas</h4>
                        <a class="btn btn-primary btn-sm" href="javascript:void(0);" data-toggle="modal" data-target="#addModal">Tambah Kelas</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Wali Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) { ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><span class="badge badge-success"><?= $value->kelas ?></span></td>
                                            <td><?= $value->wali_kelas ?></td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm btn-edit"
                                                        data-id="<?= $value->id_kelas?>"
                                                        data-id-guru="<?= $value->id_guru?>"
                                                        data-kelas="<?= $value->kelas?>"
                                                        data-wali-kelas="<?= $value->wali_kelas?>">
                                                        <i class="las la-pen"></i>Edit</a>
                                                <a href=" #" class="btn btn-danger btn-sm btn-delete"
                                                        data-id="<?= $value->id_kelas?>"><i class="las la-trash"></i>Delete</a>
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

<!-- Modal Add Data Kelas-->
<form action="<?= route_to('kelas_admin_save') ?>" method="post">
    <?= csrf_field()?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" class="form-control" name="kelas" placeholder="Kelas">
                    </div>
                    <div class="form-group">
                        <label>Wali kelas</label>
                        <select class="wali_kelas" name="wali_kelas" id="select-beast-1" placeholder="Pilih Wali Kelas..." autocomplete="off">
                            <?php foreach (getGuru() as $key => $value) { ?>
                                <option value="">Pilih Wali Kelas....</option>
                                <option value="<?= $value->id_guru ?>-<?= getUserById($value->id_user)['nama_lengkap'] ?>"><?= getUserById($value->id_user)['nama_lengkap'] ?> (<?= $value->nip ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Add Data Kelas-->

<!-- Modal Edit Data Kelas-->
<form action="<?= route_to('kelas_admin_update') ?>" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" class="form-control kelas" name="kelas"
                            placeholder="Nama Barang">
                    </div>
                    <div class="form-group">
                        <label>Wali kelas</label>
                        <select name="wali_kelas" id="select-beast-2" placeholder="Pilih Wali Kelas..." autocomplete="off">
                            <?php foreach (getGuru() as $key => $value) { ?>
                                <option value="">Pilih Wali Kelas....</option>
                                <option value="<?= $value->id_guru ?>-<?= getUserById($value->id_user)['nama_lengkap'] ?>"><?= getUserById($value->id_user)['nama_lengkap'] ?> (<?= $value->nip ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_kelas" class="id_kelas">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Data Kelas-->

<!-- Modal Delete Category-->
<form action="<?= route_to('kelas_admin_delete') ?>" method="post">
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
                    <input type="hidden" name="id_kelas" class="id_kelas">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Delete Category-->
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $(document).ready(function () {
        $('.btn-edit').on('click',function(){
            const id = $(this).data('id');
            const kelas = $(this).data('kelas');
            const id_guru = $(this).data('id-guru');
            const wali_kelas = $(this).data('wali-kelas');
            $('.id_kelas').val(id);
            $('.kelas').val(kelas);
            $('.wali_kelas').val(id_guru + '-' + wali_kelas);
            console.log(id_guru + '-' + wali_kelas);
            $('#editModal').modal('show');
        });

        $('.btn-delete').click(function (e) {
            e.preventDefault();
            const id = $(this).data('id');
            $('.id_kelas').val(id);
            $('#deleteModal').modal('show');
        });
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    new TomSelect("#select-beast-1",{
        create: true,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
    new TomSelect("#select-beast-2",{
        create: true,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
</script>
<?= $this->endSection() ?>