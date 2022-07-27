<?= $this->extend('layouts/page-layout') ?>

<?= $this->section('content') ?>

<div class="content-page rtl-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="alert text-white bg-primary" role="alert">
                    <div class="iq-alert-text">
                        <h3 class="text-white"><b>Tahun Ajaran <?= getSemesterAktif()['tahun_ajaran'] ?> <br>
                                <?= getSemesterAktif()['semester'] ?> </b></h3>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Room Chat
                    </div>
                    <div class="card-body">
                        <h3 class="mb-3">Room Chat</h2>
                            <div class="" style="height: 100%; position: relative;">
                                <table class="table table-hover">
                                    <tbody>
                                        <form action="<?= route_to('room_chat_group') ?>" method="post">
                                            <tr>
                                                <td>Kelas</td>
                                                <td>
                                                    <select name="id_kelas" id="select-beast-1"
                                                        placeholder="Pilih Kelas..." autocomplete="off" required>
                                                        <?php foreach (getKelasByIdGuru(getGuruByIdUser(session()->get('id_user'))['id_guru']) as $key => $value) { ?>
                                                        <option value="">Pilih Kelas...</option>
                                                        <option value="<?= $value->id_kelas ?>"><?= $value->kelas ?>
                                                            (<?= $value->wali_kelas ?>)</option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit" href="" class="btn btn-warning"><i
                                                            class="las la-envelope"></i>Chat
                                                        Sekarang</button>
                                                </td>
                                            </tr>
                                        </form>
                                        <form action="<?= route_to('room_chat_siswa') ?>" method="post">
                                            <tr>
                                                <td>Siswa</td>
                                                <td>
                                                    <select name="id_siswa" id="select-beast-2"
                                                        placeholder="Pilih Siswa..." autocomplete="off" required>
                                                        <?php foreach (getSiswa() as $key => $value) { ?>
                                                        <option value="">Pilih Siswa...</option>
                                                        <option value="<?= $value->id_siswa ?>">
                                                            <?= getUserById($value->id_user)['nama_lengkap'] ?>
                                                            (<?= $value->nis ?>)</option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-success"><i
                                                            class="las la-envelope"></i>Chat
                                                        Sekarang</button>
                                                </td>
                                            </tr>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    new TomSelect("#select-beast-1", {
        create: true,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
    new TomSelect("#select-beast-2", {
        create: true,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
</script>
<?= $this->endSection() ?>