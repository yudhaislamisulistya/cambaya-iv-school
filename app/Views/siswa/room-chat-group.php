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
                        <h3 class="mb-3">Room Chat Group Kelas <?= getKelasById($id_kelas)['kelas'] ?></h3>
                    </div>
                    <div class="card-body text-left">
                            <div id="talkjs-container" style="width: 100%; height: 700px">
                                <i>Loading chat...</i>
                            </div>''
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
(function(t,a,l,k,j,s){
s=a.createElement('script');s.async=1;s.src="https://cdn.talkjs.com/talk.js";a.head.appendChild(s)
;k=t.Promise;t.Talk={v:3,ready:{then:function(f){if(k)return new k(function(r,e){l.push([f,r,e])});l
.push([f])},catch:function(){return k&&new k()},c:l}};})(window,document,[]);
</script>
<script>
    Talk.ready.then(function () {
    var me = new Talk.User({
        id: (<?= session()->get('id_user') ?>),
        name: "(<?= session()->get('nama_lengkap') ?>)",
    });
    window.talkSession = new Talk.Session({
        appId: 'toAgqg4m',
        me: me,
    });
    <?php foreach ($siswa_kelas as $key => $value) { ?>
            var other<?=++$key;?> = new Talk.User({
                    id: (<?= $value->id_siswa_kelas ?>),
                    name: "<?= getUserById(getSiswaByIdSiswa($value->id_siswa)['id_user'])['nama_lengkap'] ?>",
            });
    <?php } ?>

    var conversation = window.talkSession.getOrCreateConversation("<?= $id_kelas ?>");
    conversation.setParticipant(me);
    <?php foreach ($siswa_kelas as $key => $value) { ?>
            conversation.setParticipant(other<?=++$key;?>);
    <?php } ?>
    conversation.setAttributes({
        subject: "<?= getKelasById($id_kelas)['kelas'] ?> (<?= getKelasById($id_kelas)['wali_kelas'] ?>)"
    });

    var chatbox = talkSession.createChatbox();
    chatbox.select(conversation);
    chatbox.mount(document.getElementById("talkjs-container"));

    });
</script>
<?= $this->endSection() ?>