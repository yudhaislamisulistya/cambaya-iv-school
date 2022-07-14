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
                                            <td><?= !$value->nis ? '-' : $value->nis ?></td>
                                            <td><?= !$value->nama_lengkap ? '-' : $value->nama_lengkap ?></td>
                                            <td><?= !$value->tempat_tanggal_lahir ? '-' : $value->tempat_tanggal_lahir ?></td>
                                            <td><?= !$value->jenis_kelamin ? '-' : $value->jenis_kelamin ?></td>
                                            <td><?= !$value->agama ? '-' : $value->agama ?></td>
                                            <td><?= !$value->alamat ?  '-' : $value->alamat ?></td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm btn-edit"
                                                        data-id="<?= $value->id_user;?>"
                                                        data-nis="<?= $value->nis?>"
                                                        data-nama-lengkap="<?= $value->nama_lengkap?>"
                                                        data-jenis-kelamin="<?= $value->jenis_kelamin?>"
                                                        data-tempat-tanggal-lahir="<?= $value->tempat_tanggal_lahir?>"
                                                        data-agama="<?= $value->agama?>"
                                                        data-alamat="<?= $value->alamat?>"
                                                        data-pendidikan-sebelumnya="<?= $value->pendidikan_sebelumnya?>"
                                                        data-nama-orang-tua-ayah="<?= $value->nama_orang_tua_ayah?>"
                                                        data-nama-orang-tua-ibu="<?= $value->nama_orang_tua_ibu?>"
                                                        data-pekerjaan-orang-tua-ayah="<?= $value->pekerjaan_orang_tua_ayah?>"
                                                        data-pekerjaan-orang-tua-ibu="<?= $value->pekerjaan_orang_tua_ibu?>"
                                                        data-alamat-orang-tua-jalan="<?= $value->alamat_orang_tua_jalan?>"
                                                        data-alamat-orang-tua-kelurahan="<?= $value->alamat_orang_tua_kelurahan?>"
                                                        data-alamat-orang-tua-kecamatan="<?= $value->alamat_orang_tua_kecamatan?>"
                                                        >
                                                        <i class="las la-pen"></i>Edit</a>
                                                <a href=" #" class="btn btn-success btn-sm btn-delete">
                                                        <i class="las la-home"></i>Detail</a>
                                                <a href=" #" class="btn btn-danger btn-sm btn-delete"
                                                        data-id="<?= $value->id_user?>">
                                                        <i class="las la-trash"></i>Delete</a>
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

<!-- Modal Edit Data Siswa-->
<form action="<?= route_to('siswa_admin_update') ?>" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" class="form-control nis" name="nis"
                            placeholder="NIS" >
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap Siswa</label>
                        <input type="text" class="form-control nama_lengkap" name="nama_lengkap"
                            placeholder="Nama Lengkap Siswa">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control tempat_lahir" name="tempat_lahir"
                                    placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input value="2019-12-18" type="date" class="form-control tanggal_lahir" name="tanggal_lahir">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control jenis_kelamin">
                            <option value="" disabled>--Pilih Jenis Kelamin--</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <select name="agama" id="agama" class="form-control agama">
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
                            placeholder="Pendidikan Sebelumnya">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control alamat" name="alamat"
                            placeholder="Alamat">
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
                                    placeholder="Ayah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ibu</label>
                                <input type="text" class="form-control nama_orang_tua_ibu" name="nama_orang_tua_ibu"
                                    placeholder="Ibu">
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
                                <input type="text" class="form-control pekerjaan_orang_tua_ayah" name="pekerjaan_orang_tua_ayah"
                                    placeholder="Ayah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ibu</label>
                                <input type="text" class="form-control pekerjaan_orang_tua_ibu" name="pekerjaan_orang_tua_ibu"
                                    placeholder="Ibu">
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
                                <input type="text" class="form-control alamat_orang_tua_jalan" name="alamat_orang_tua_jalan"
                                    placeholder="Jalan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <input type="text" class="form-control alamat_orang_tua_kelurahan" name="alamat_orang_tua_kelurahan"
                                    placeholder="Kelurahan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" class="form-control alamat_orang_tua_kecamatan" name="alamat_orang_tua_kecamatan"
                                    placeholder="Kecamatan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_user" class="id_user">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Data Siswa-->

<!-- Modal Delete Category-->
<form action="<?= route_to('siswa_admin_delete') ?>" method="post">
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
                    <input type="hidden" name="id_user" class="id_user">
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
            const nis = $(this).data('nis');
            const nama_lengkap = $(this).data('nama-lengkap');
            const tempat_tanggal_lahir = $(this).data('tempat-tanggal-lahir').split(', ');
            const jenis_kelamin = $(this).data('jenis-kelamin');
            const agama = $(this).data('agama');
            const alamat = $(this).data('alamat');
            const pendidikan_sebelumnya = $(this).data('pendidikan-sebelumnya');
            const nama_orang_tua_ayah = $(this).data('nama-orang-tua-ayah');
            const nama_orang_tua_ibu = $(this).data('nama-orang-tua-ibu');
            const pekerjaan_orang_tua_ayah = $(this).data('pekerjaan-orang-tua-ayah');
            const pekerjaan_orang_tua_ibu = $(this).data('pekerjaan-orang-tua-ibu');
            const alamat_orang_tua_jalan = $(this).data('alamat-orang-tua-jalan');
            const alamat_orang_tua_kelurahan = $(this).data('alamat-orang-tua-kelurahan');
            const alamat_orang_tua_kecamatan = $(this).data('alamat-orang-tua-kecamatan');
            $('.id_user').val(id);
            $('.nis').val(nis);
            $('.nama_lengkap').val(nama_lengkap);
            $('.jenis_kelamin').val(jenis_kelamin);
            $('.tempat_lahir').val(tempat_tanggal_lahir[0]);
            $('.tanggal_lahir').val(tempat_tanggal_lahir[1]);
            $('.agama').val(agama);
            $('.alamat').val(alamat);
            $('.pendidikan_sebelumnya').val(pendidikan_sebelumnya);
            $('.nama_orang_tua_ayah').val(nama_orang_tua_ayah);
            $('.nama_orang_tua_ibu').val(nama_orang_tua_ibu);
            $('.pekerjaan_orang_tua_ayah').val(pekerjaan_orang_tua_ayah);
            $('.pekerjaan_orang_tua_ibu').val(pekerjaan_orang_tua_ibu);
            $('.alamat_orang_tua_jalan').val(alamat_orang_tua_jalan);
            $('.alamat_orang_tua_kelurahan').val(alamat_orang_tua_kelurahan);
            $('.alamat_orang_tua_kecamatan').val(alamat_orang_tua_kecamatan);
            $('#editModal').modal('show');
        });

        $('.btn-delete').click(function (e) {
            e.preventDefault();
            const id = $(this).data('id');
            $('.id_user').val(id);
            $('#deleteModal').modal('show');
        });
    });
</script>
<?= $this->endSection() ?>