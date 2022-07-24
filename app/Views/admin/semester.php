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
                        <h4 class="card-title">Data Semester</h4>
                        <a class="btn btn-primary btn-sm" href="javascript:void(0);" data-toggle="modal" data-target="#addModal">Tambah Semester</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Semester</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) { ?>
                                        <?php
                                            $status = '';
                                            if($value->status == 1){
                                                $status = '<span class="badge badge-success">Aktif</span>';
                                            }else{
                                                $status = '<span class="badge badge-danger">Tidak Aktif</span>';
                                            }
                                        ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= $value->semester ?></td>
                                            <td><?= $value->tahun_ajaran ?></td>
                                            <td><?= $status ?></td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm btn-edit"
                                                        data-id="<?= $value->id_semester;?>"
                                                        data-semester="<?= $value->semester?>"
                                                        data-tahun-ajaran="<?= $value->tahun_ajaran?>"
                                                        data-status="<?= $value->status?>">
                                                        <i class="las la-pen"></i>Edit</a>
                                                <a href=" #" class="btn btn-danger btn-sm btn-delete"
                                                        data-id="<?= $value->id_semester?>"><i class="las la-trash"></i>Delete</a>
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

<!-- Modal Add Data Semester-->
<form action="<?= route_to('semester_admin_save') ?>" method="post">
    <?= csrf_field()?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Semester</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Semester</label>
                        <input type="text" class="form-control" name="semester" placeholder="Semester">
                    </div>
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <input type="text" class="form-control" name="tahun_ajaran" placeholder="Tahun Ajaran">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="" disabled>--Pilih Status Semester--</option>
                            <option value="1">Aktif</option>
                            <option value="99">Tidak Aktif</option>
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
<!-- End Modal Add Data Semester-->

<!-- Modal Edit Data Semester-->
<form action="<?= route_to('semester_admin_update') ?>" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Semester</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Semester</label>
                        <input type="text" class="form-control semester" name="semester"
                            placeholder="Nama Barang">
                    </div>
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <input type="text" class="form-control tahun_ajaran" name="tahun_ajaran"
                            placeholder="Tahun Ajaran">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control status" name="status" id="status">
                            <option value="" disabled>--Pilih Status Semester--</option>
                            <option value="1">Aktif</option>
                            <option value="99">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_semester" class="id_semester">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Data Semester-->

<!-- Modal Delete Category-->
<form action="<?= route_to('semester_admin_delete') ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Semester Ini ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4>Apakah Kamu Ingin Data Semester Ini?</h4>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_semester" class="id_semester">
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
            const semester = $(this).data('semester');
            const tahun_ajaran = $(this).data('tahun-ajaran');
            const status = $(this).data('status');
            $('.id_semester').val(id);
            $('.semester').val(semester);
            $('.tahun_ajaran').val(tahun_ajaran);
            $('.status').val(status);
            $('#editModal').modal('show');
        });

        $('.btn-delete').click(function (e) {
            e.preventDefault();
            const id = $(this).data('id');
            $('.id_semester').val(id);
            $('#deleteModal').modal('show');
        });
    });
</script>
<?= $this->endSection() ?>