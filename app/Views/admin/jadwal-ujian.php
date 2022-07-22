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
                        <h4 class="card-title">Data Jadwal Ujian</h4>
                        <a class="btn btn-primary btn-sm" href="javascript:void(0);" data-toggle="modal" data-target="#addModal">Tambah Jadwal Ujian</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hari</th>
                                        <th>Tanggal</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Jam</th>
                                        <th>Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) { ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= $value->hari ?></td>
                                            <td><?= $value->tanggal ?></td>
                                            <td><?= $value->mata_pelajaran ?></td>
                                            <td><?= $value->jam_masuk ?> - <?=  $value->jam_keluar?></td>
                                            <td><?= getKelasById($value->id_kelas)['kelas'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm btn-edit"
                                                        data-id="<?= $value->id_ujian?>"
                                                        data-hari="<?= $value->hari?>"
                                                        data-tanggal="<?= $value->tanggal?>"
                                                        data-mata-pelajaran="<?= $value->mata_pelajaran?>"
                                                        data-jam-masuk="<?= $value->jam_masuk?>"
                                                        data-jam-keluar="<?= $value->jam_keluar?>"
                                                        data-id-kelas="<?= $value->id_kelas?>"
                                                        >
                                                        <i class="las la-pen"></i>Edit</a>
                                                <a href=" #" class="btn btn-danger btn-sm btn-delete"
                                                        data-id="<?= $value->id_ujian?>"><i class="las la-trash"></i>Delete</a>
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

<!-- Modal Add Jadwal Ujian-->
<form action="<?= route_to('jadwal_ujian_admin_save') ?>" method="post">
    <?= csrf_field()?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Jadwal Ujian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Hari</label>
                        <select name="hari" id="select-beast-1" placeholder="Pilih Hari..." autocomplete="off" required>
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
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal"
                            placeholder="Tanggal" required>
                    </div>
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <input type="text" class="form-control" name="mata_pelajaran"
                            placeholder="Mata Pelajaran" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Masuk</label>
                                <input type="time" class="form-control" name="jam_masuk"
                                    placeholder="Tempat Lahir" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Keluar</label>
                                <input type="time" class="form-control" name="jam_keluar" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" id="select-beast-2" placeholder="Pilih Kelas..." autocomplete="off" required>
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
<!-- End Modal Add Jadwal Ujian-->

<!-- Modal Edit Jadwal Ujian-->
<form action="<?= route_to('jadwal_ujian_admin_update') ?>" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Jadwal Ujian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Hari</label>
                        <select name="hari" class="form-control hari" placeholder="Pilih Hari..." autocomplete="off" required>
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
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input value="2019-12-18" type="date" class="form-control tanggal" name="tanggal"
                            placeholder="Tanggal" required>
                    </div>
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <input type="text" class="form-control mata_pelajaran" name="mata_pelajaran"
                            placeholder="Mata Pelajaran" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Masuk</label>
                                <input type="time" class="form-control jam_masuk" name="jam_masuk"
                                    placeholder="Tempat Lahir" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Keluar</label>
                                <input type="time" class="form-control jam_keluar" name="jam_keluar" required>
                            </div>
                        </div>
                    </div>
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
                    <input type="hidden" name="id_ujian" class="id_ujian">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Jadwal Ujian-->

<!-- Modal Delete Category-->
<form action="<?= route_to('jadwal_ujian_admin_delete') ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Jadwal Ujian Ini ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4>Apakah Kamu Ingin Jadwal Ujian Ini?</h4>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_ujian" class="id_ujian">
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
            const mata_pelajaran = $(this).data('mata-pelajaran');
            const hari = $(this).data('hari');
            const tanggal = $(this).data('tanggal');
            const jam_masuk = $(this).data('jam-masuk');
            const jam_keluar = $(this).data('jam-keluar');
            $('.id_ujian').val(id);
            $('.id_kelas').val(id_kelas);
            $('.mata_pelajaran').val(mata_pelajaran);
            $('.hari').val(hari);
            console.log(tanggal);
            $('.tanggal').val(tanggal);
            $('.jam_masuk').val(jam_masuk);
            $('.jam_keluar').val(jam_keluar);
            $('#editModal').modal('show');
        });

        $('.btn-delete').click(function (e) {
            e.preventDefault();
            const id = $(this).data('id');
            $('.id_ujian').val(id);
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
    new TomSelect("#select-beast-4",{
        create: true,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
    new TomSelect("#select-beast-5",{
        create: true,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
</script>
<?= $this->endSection() ?>