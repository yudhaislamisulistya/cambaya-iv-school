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
                        <h3 class="text-white"><b>Tahun Ajaran <?= getSemesterAktif()['tahun_ajaran'] ?> <br> <?= getSemesterAktif()['semester'] ?>  </b></h3>
                        <h3 class="text-white font-weight-bold">Kelas <?= getKelasById($id_kelas)['kelas'] ?></h3>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Siswa Kelas <?= getKelasById($id_kelas)['kelas']?></h4>
                        <a class="btn btn-primary btn-sm" href="javascript:void(0);" data-toggle="modal" data-target="#addModal">Tambah Siswa</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama Lengkap Siswa</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) { ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= getSiswaByIdSiswa($value->id_siswa)['nis'] ?></td>
                                            <td><?= getUserById(getSiswaByIdSiswa($value->id_siswa)['id_user'])['nama_lengkap'] ?></td>
                                            <td><?= getSiswaByIdSiswa($value->id_siswa)['tempat_tanggal_lahir'] ?></td>
                                            <td><?= getSiswaByIdSiswa($value->id_siswa)['jenis_kelamin'] ?></td>
                                            <td><?= getSiswaByIdSiswa($value->id_siswa)['agama'] ?></td>
                                            <td><?= getSiswaByIdSiswa($value->id_siswa)['alamat'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm btn-edit"
                                                        data-id="<?= $value->id_siswa_kelas?>"
                                                        data-id-kelas="<?= $value->id_kelas?>"
                                                        data-id-semester="<?= $value->id_semester?>"
                                                        data-id-siswa="<?= $value->id_siswa?>"
                                                        >
                                                        <i class="las la-pen"></i>Pindah Kelas</a>
                                                <a href=" #" class="btn btn-danger btn-sm btn-delete"
                                                        data-id="<?= $value->id_siswa_kelas?>"><i class="las la-trash"></i>Delete</a>
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

<!-- Modal Add Data Siswa-->
<form action="<?= route_to('kelas_siswa_admin_save') ?>" method="post">
    <?= csrf_field()?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Daftar Siswa</label>
                        <select class="id_siswa" name="id_siswa" id="select-beast-1" placeholder="Pilih Siswa..." autocomplete="off">
                            <?php foreach (getSiswa() as $key => $value) { ?>
                                <option value="">Pilih Siswa....</option>
                                <option value="<?= $value->id_siswa ?>-<?= getUserById($value->id_user)['nama_lengkap'] ?>"><?= getUserById($value->id_user)['nama_lengkap'] ?> (<?= $value->nis ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_kelas" value="<?= $id_kelas ?>">
                    <input type="hidden" name="id_semester" value="<?= $id_semester ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Add Data Siswa-->

<!-- Modal Edit Data Siswa-->
<form action="<?= route_to('kelas_siswa_admin_update') ?>" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pindah Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" class="form-control id_kelas" placeholder="Pilih Kelas..." autocomplete="off" required>
                            <?php foreach (getKelas() as $key => $value) { ?>
                                <option value="">Pilih Kelas...</option>
                                <option value="<?= $value->id_kelas ?>"><?= $value->kelas ?> (<?= $value->wali_kelas ?>)</option>
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
<!-- End Modal Edit Data Siswa-->

<!-- Modal Delete Category-->
<form action="<?= route_to('kelas_siswa_admin_delete') ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Siswa Ini ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4>Apakah Kamu Ingin Data Siswa Ini?</h4>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_siswa_kelas" class="id_siswa_kelas">
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
            const id_kelas = $(this).data('id-kelas');
            const id_siswa = $(this).data('id-siswa');
            const id_semester = $(this).data('id_semester');
            $('.id_siswa_kelas').val(id);
            $('.id_kelas').val(id_kelas);
            $('.id_siswa').val(id_siswa);
            $('.id_semester').val(id_semester);
            $('#editModal').modal('show');
        });

        $('.btn-delete').click(function (e) {
            e.preventDefault();
            const id = $(this).data('id');
            $('.id_siswa_kelas').val(id);
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