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
                        <h3 class="text-white font-weight-bold">Kelas <?= getKelasById($id_kelas)['kelas'] ?></h3>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="card">
                    <div class="card-header">
                    <h4 class="card-title">Data Siswa -
                            <?= getUserById(getSiswaByIdSiswa($data['id_siswa'])['id_user'])['nama_lengkap'] ?>
                            (<?= getSiswaByIdSiswa($data['id_siswa'])['nis'] ?>)</h4>
                    </div>
                    <div class="card-body">
                    <h3 class="mb-3">Diagram Kompetensi Pengetahuan dan Keterampilan</h2>
                        <div class="card">
                            <div class="card-body">
                                <div id="aaa" style="height: 600px; position: relative;">

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
<?= $this->section('javascript') ?>
<script>
    
    var options = {

        series: [{
            name: 'Nilai Pengetahuan',
            data: [
                <?php foreach (getMataPelajaranByIdKelasDanIdSemester($id_kelas, $id_semester) as $key => $value) { ?>
                    <?php
                        $p_rata_rata_nilai = 0;
                    ?>
                    <?php foreach (getTrNilaiPengetahuanKelasByIdMataPelajaranKelasSemester($value->id_mata_pelajaran, $id_kelas, $id_semester) as $key2 => $value2) { ?>
                        <?php
                        $p_rata_rata_nilai += (int)getTrNilaiPengetahuanSiswaKelasByIdSiswaKodeNilaiPengetahuan($data['id_siswa'], $value2->kode_nilai_pengetahuan)['nilai_pengetahuan'];
                        ?>

                    <?php } ?>
                    <?php
                        if($p_rata_rata_nilai != 0){
                            $p_rata_rata_nilai = $p_rata_rata_nilai / count(getTrNilaiPengetahuanKelasByIdMataPelajaranKelasSemester($value->id_mata_pelajaran, $id_kelas, $id_semester));
                        }
                    ?>
                    <?php
                        echo $p_rata_rata_nilai . ',';
                    ?>
                <?php } ?>
            ]
        }, {
            name: 'Nilai Keterampilan',
            data: [
                <?php foreach (getMataPelajaranByIdKelasDanIdSemester($id_kelas, $id_semester) as $key => $value) { ?>
                    <?php
                        $k_rata_rata_nilai = 0;
                    ?>
                    <?php foreach (getTrNilaiKeterampilanKelasByIdMataPelajaranKelasSemester($value->id_mata_pelajaran, $id_kelas, $id_semester) as $key2 => $value2) { ?>
                        <?php
                        $k_rata_rata_nilai += (int)getTrNilaiKeterampilanSiswaKelasByIdSiswaKodeNilaiKeterampilan($data['id_siswa'], $value2->kode_nilai_keterampilan)['nilai_keterampilan'];
                        ?>
                    <?php } ?>
                    <?php
                    if($k_rata_rata_nilai != 0){
                        $k_rata_rata_nilai = $k_rata_rata_nilai / count(getTrNilaiKeterampilanKelasByIdMataPelajaranKelasSemester($value->id_mata_pelajaran, $id_kelas, $id_semester));
                    }
                    ?>
                    <?php
                        echo $k_rata_rata_nilai . ',';
                    ?>
                <?php } ?>
            ]
        }],
        chart: {
            type: 'bar',
            height: 600
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 5,
            colors: ['transparent']
        },
        xaxis: {
            categories: [
                <?php foreach (getMataPelajaranByIdKelasDanIdSemester($id_kelas, $id_semester) as $key => $value) {
                    if ($key+1 == count(getMataPelajaranByIdKelasDanIdSemester($id_kelas, $id_semester))) {
                        echo '"' . $value->mata_pelajaran . '"';
                    } else {
                        echo '"' . $value->mata_pelajaran . '"' . ',';
                    }
                    
                } ?>
            ],
        },
        yaxis: {
            title: {
                text: 'Nilai'
            },
            labels: {
                formatter: function (value) {
                return value + "";
                }
            },
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return  val
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#aaa"), options);
    chart.render();
</script>
<?= $this->endSection() ?>