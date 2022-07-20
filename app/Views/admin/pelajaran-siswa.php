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
                        <h4 class="card-title">Data Pelajaran Siswa</h4>
                        <a class="btn btn-primary btn-sm" href="javascript:void(0);" data-toggle="modal" data-target="#addModal">Tambah Pelajaran Siswa</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Guru</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Hari</th>
                                        <th>Jam</th>
                                        <th>Pelajaran Siswa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) { ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= getGuruById($value->id_guru)['nip'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm btn-edit"
                                                        data-id="<?= $value->id_mata_pelajaran?>"
                                                        data-id-guru="<?= $value->id_guru?>"
                                                        data-hari="<?= $value->kelas?>"
                                                        data-jam-mulai="<?= $value->wali_kelas?>"
                                                        data-jam-akhir="<?= $value->wali_kelas?>"
                                                        >
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

<!-- Modal Add Pelajaran Siswa-->
<form action="<?= route_to('pelajaran_siswa_admin_save') ?>" method="post">
    <?= csrf_field()?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pelajaran Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIP dan Nama Guru</label>
                        <select name="id_guru" id="select-beast-1" placeholder="Pilih Guru Pelajaran Siswa..." autocomplete="off" required>
                            <?php foreach (getGuru() as $key => $value) { ?>
                                <option value="">Pilih Guru Pelajaran Siswa....</option>
                                <option value="<?= $value->id_guru ?>-<?= getUserById($value->id_user)['nama_lengkap'] ?>"><?= getUserById($value->id_user)['nama_lengkap'] ?> (<?= $value->nip ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <input type="text" class="form-control" name="mata_pelajaran"
                            placeholder="Mata Pelajaran" required>
                    </div>
                    <div class="form-group">
                        <label>Hari</label>
                        <select name="hari" id="select-beast-2" placeholder="Pilih Hari..." autocomplete="off" required>
                            <option value="">Pilih Hari....</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Mulai</label>
                                <input type="time" class="form-control" name="jam_mulai"
                                    placeholder="Tempat Lahir" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Akhir</label>
                                <input type="time" class="form-control" name="jam_akhir" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" id="select-beast-3" placeholder="Pilih Kelas..." autocomplete="off" required>
                            <?php foreach (getKelas() as $key => $value) { ?>
                                <option value="">Pilih Kelas...</option>
                                <option value="<?= $value->id_kelas ?>"><?= $value->kelas ?> (<?= $value->wali_kelas ?>)</option>
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
<!-- End Modal Add Pelajaran Siswa-->

<!-- Modal Edit Pelajaran Siswa-->
<form action="<?= route_to('pelajaran_siswa_admin_update') ?>" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Pelajaran Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIP dan Nama Guru</label>
                        <select name="wali_kelas" id="select-beast-1" placeholder="Pilih Guru Pelajaran Siswa..." autocomplete="off">
                            <?php foreach (getGuru() as $key => $value) { ?>
                                <option value="">Pilih Guru Pelajaran Siswa....</option>
                                <option value="<?= $value->id_guru ?>-<?= getUserById($value->id_user)['nama_lengkap'] ?>"><?= getUserById($value->id_user)['nama_lengkap'] ?> (<?= $value->nip ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <input type="text" class="form-control mata_pelajaran" name="mata_pelajaran"
                            placeholder="Mata Pelajaran">
                    </div>
                    <div class="form-group">
                        <label>Hari</label>
                        <select name="hari" class="hari" id="select-beast-2" placeholder="Pilih Hari..." autocomplete="off">
                            <option value="">Pilih Hari....</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Mulai</label>
                                <input type="time" class="form-control jam_mulai" name="jam_mulai"
                                    placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Akhir</label>
                                <input type="time" class="form-control jam_akhir" name="jam_akhir">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" class="kelas" id="select-beast-3" placeholder="Pilih Kelas..." autocomplete="off">
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
<!-- End Modal Edit Pelajaran Siswa-->

<!-- Modal Delete Category-->
<form action="<?= route_to('pelajaran_siswa_admin_delete') ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pelajaran Siswa Ini ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4>Apakah Kamu Ingin Pelajaran Siswa Ini?</h4>

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
    new TomSelect("#select-beast-3",{
        create: true,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
</script>
<?= $this->endSection() ?>