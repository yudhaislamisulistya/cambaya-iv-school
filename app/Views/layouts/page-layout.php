<!doctype html>
<html lang="en" dir>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cambaya IV - Sistem</title>

    <!-- Favicon -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/backend.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/remixicon.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/dripicons.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main_2.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main_1.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main_3.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/mapbox-gl.css">
</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">

        <div class="iq-sidebar  rtl-iq-sidebar sidebar-default ">
            <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                <a href="index.html" class="header-logo">
                    <span class="light-logo">Cambaya IV</span>
                    <span class="darkmode-logo">Cambaya IV</span>
                </a>
                <div class="iq-menu-bt-sidebar">
                    <i class="las la-bars wrapper-menu"></i>
                </div>
            </div>
            <div class="data-scrollbar" data-scroll="1">
                <?php if(session()->get('role') == 1){ ?>
                    <?= $this->include('layouts/menu-siswa') ?>
                <?php }elseif(session()->get('role') == 2){ ?>
                    <?= $this->include('layouts/menu-guru') ?>
                <?php }elseif(session()->get('role') == 3){ ?>
                    <?= $this->include('layouts/menu-admin') ?>
                <?php } ?>
                <div id="sidebar-bottom" class="position-relative sidebar-bottom">
                    <div class="card bg-primary rounded">
                        <div class="card-body">
                            <div class="sidebarbottom-content">
                                <div class="image"><img src="<?= base_url() ?>/assets/images/side-bkg.png" class="img-fluid" alt="side-bkg">
                                </div>
                                <h5 class="mb-3 text-white mt-3">Did you Know ?</h5>
                                <p class="mb-0 text-white">You can add additional user in your Account's Settings</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3"></div>
            </div>
        </div>
        <?= $this->include('layouts/header') ?>
        <?= $this->renderSection('content') ?>
    </div>
    <!-- Wrapper End-->


    <div class="custom-control-inline change-rtl">

        <a href="#" class="switch-rtl" data-active="true" for="rtl-mode" data-mode="rtl">RTL</a>
    </div>





    <footer class="iq-footer rtl-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 ">
                    <ul class="list-inline mb-0  rtl-pr-0 rtl-right">
                        <li class="list-inline-item "><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right ">
                    Copyright 2020 <a href="#">Insta Dash</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- Backend Bundle JavaScript -->
    <script src="<?= base_url() ?>/assets/js/backend-bundle.min.js"></script>

    <!-- Flextree Javascript-->
    <script src="<?= base_url() ?>/assets/js/flex-tree.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/tree.js"></script>

    <!-- Table Treeview JavaScript -->
    <script src="<?= base_url() ?>/assets/js/table-treeview.js"></script>

    <!-- Masonary Gallery Javascript -->
    <script src="<?= base_url() ?>/assets/js/masonry.pkgd.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/imagesloaded.pkgd.min.js"></script>

    <!-- Mapbox Javascript -->
    <script src="<?= base_url() ?>/assets/js/mapbox-gl.js"></script>
    <script src="<?= base_url() ?>/assets/js/mapbox.js"></script>

    <!-- Fullcalender Javascript -->
    <script src="<?= base_url() ?>/assets/js/main_2.js"></script>
    <script src="<?= base_url() ?>/assets/js/main_1.js"></script>
    <script src="<?= base_url() ?>/assets/js/main.js"></script>
    <script src="<?= base_url() ?>/assets/js/main_3.js"></script>

    <!-- SweetAlert JavaScript -->
    <script src="<?= base_url() ?>/assets/js/sweetalert.js"></script>

    <!-- Vectoe Map JavaScript -->
    <script src="<?= base_url() ?>/assets/js/vector-map-custom.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="<?= base_url() ?>/assets/js/customizer.js"></script>
    <script src="<?= base_url() ?>/assets/js/rtl.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="<?= base_url() ?>/assets/js/chart-custom.js"></script>

    <!-- slider JavaScript -->
    <script src="<?= base_url() ?>/assets/js/slider.js"></script>

    <!-- app JavaScript -->
    <script src="<?= base_url() ?>/assets/js/app.js"></script>
</body>

</html>