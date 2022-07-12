<div class="iq-top-navbar rtl-iq-top-navbar ">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                <i class="ri-menu-line wrapper-menu"></i>
                <a href="index.html" class="header-logo">
                    <img src="<?= base_url() ?>/assets/images/logo.png" class="img-fluid rounded-normal light-logo"
                        alt="logo">
                    <img src="<?= base_url() ?>/assets/images/logo-white.png"
                        class="img-fluid rounded-normal darkmode-logo" alt="logo">

                </a>
            </div>
            <div class="iq-search-bar device-search">
            </div>
            <div class="d-flex align-items-center">
                <div class="change-mode">
                    <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                        <div class="custom-switch-inner">
                            <p class="mb-0"> </p>
                            <input type="checkbox" class="custom-control-input" id="dark-mode" data-active="true">
                            <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                                <span class="switch-icon-left"><i class="a-left ri-moon-clear-line"></i></span>
                                <span class="switch-icon-right"><i class="a-right ri-sun-line"></i></span>
                            </label>
                        </div>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-label="Toggle navigation">
                    <i class="ri-menu-3-line"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">
                        <li class="nav-item nav-icon search-content">
                            <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </a>
                            <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                <form action="#" class="searchbox p-2">
                                    <div class="form-group mb-0 position-relative">
                                        <input type="text" class="text search-input font-size-12"
                                            placeholder="type here to search...">
                                        <a href="#" class="search-link"><i class="las la-search"></i></a>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-mail-line  bg-orange p-2 rounded-small"></i>
                                <span class="bg-primary"></span>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="cust-title p-3">
                                            <h5 class="mb-0">Semua Pesan</h5>
                                        </div>
                                        <div class="p-3">
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                    <div class>
                                                        <img class="avatar-40 rounded-small"
                                                            src="<?= base_url() ?>/assets/images/01.jpg" alt="01">
                                                    </div>
                                                    <div class="media-body ml-3 rtl-mr-3 rtl-ml-0">
                                                        <h6 class="mb-0">Barry Emma Watson <small
                                                                class="badge badge-success float-right rtl-mr-1">New</small>
                                                        </h6>
                                                        <small class="float-left font-size-12">12:00 PM</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                    <div class>
                                                        <img class="avatar-40 rounded-small"
                                                            src="<?= base_url() ?>/assets/images/02.jpg" alt="02">
                                                    </div>
                                                    <div class="media-body ml-3 rtl-ml-0 rtl-mr-3">
                                                        <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                                                        <small class="float-left font-size-12">20 Apr</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                    <div class>
                                                        <img class="avatar-40 rounded-small"
                                                            src="<?= base_url() ?>/assets/images/03.jpg" alt="03">
                                                    </div>
                                                    <div class="media-body ml-3 rtl-mr-3 rtl-ml-0">
                                                        <h6 class="mb-0 ">Why do we use it? <small
                                                                class="badge badge-success float-right rtl-mr-1">New</small>
                                                        </h6>
                                                        <small class="float-left font-size-12">1:24 PM</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                    <div class>
                                                        <img class="avatar-40 rounded-small"
                                                            src="<?= base_url() ?>/assets/images/04.jpg" alt="04">
                                                    </div>
                                                    <div class="media-body ml-3 rtl-ml-0 rtl-mr-3">
                                                        <h6 class="mb-0">Variations Passages <small
                                                                class="badge badge-success float-right rtl-mr-1">New</small>
                                                        </h6>
                                                        <small class="float-left font-size-12">5:45 PM</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                    <div class>
                                                        <img class="avatar-40 rounded-small"
                                                            src="<?= base_url() ?>/assets/images/05.jpg" alt="05">
                                                    </div>
                                                    <div class="media-body ml-3 rtl-mr-3 rtl-ml-0">
                                                        <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                                                        <small class="float-left font-size-12">1 day ago</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <a class="right-ic btn btn-primary btn-block position-relative p-2" href="#"
                                            role="button">
                                            <div class="dd-icon"><i class="las la-arrow-right mr-0"></i></div>
                                            View All
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-notification-line bg-info p-2 rounded-small"></i>
                                <span class="bg-primary "></span>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="cust-title p-3">
                                            <h5 class="mb-0">Semua Notifikasi</h5>
                                        </div>
                                        <div class="p-3">
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                    <div class>
                                                        <img class="avatar-40 rounded-small"
                                                            src="<?= base_url() ?>/assets/images/01.jpg" alt="01">
                                                    </div>
                                                    <div class="media-body ml-3 rtl-ml-0 rtl-mr-3">
                                                        <h6 class="mb-0">Emma Watson Barry <small
                                                                class="badge badge-success float-right rtl-mr-1">New</small>
                                                        </h6>
                                                        <p class="mb-0">95 MB</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                    <div class>
                                                        <img class="avatar-40 rounded-small"
                                                            src="<?= base_url() ?>/assets/images/02.jpg" alt="02">
                                                    </div>
                                                    <div class="media-body ml-3 rtl-mr-3 rtl-ml-0">
                                                        <h6 class="mb-0 ">New customer is join</h6>
                                                        <p class="mb-0 ">Cyst Barry</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                    <div class>
                                                        <img class="avatar-40 rounded-small"
                                                            src="<?= base_url() ?>/assets/images/03.jpg" alt="03">
                                                    </div>
                                                    <div class="media-body ml-3 rtl-ml-0 rtl-mr-3">
                                                        <h6 class="mb-0 ">Two customer is left</h6>
                                                        <p class="mb-0">Cyst Barry</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                    <div class>
                                                        <img class="avatar-40 rounded-small"
                                                            src="<?= base_url() ?>/assets/images/04.jpg" alt="04">
                                                    </div>
                                                    <div class="media-body ml-3 rtl-mr-3 rtl-ml-0">
                                                        <h6 class="mb-0 ">New Mail from Fenny <small
                                                                class="badge badge-success float-right">New</small>
                                                        </h6>
                                                        <p class="mb-0">Cyst Barry</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <a class="right-ic btn btn-primary btn-block position-relative p-2" href="#"
                                            role="button">
                                            <div class="dd-icon"><i class="las la-arrow-right mr-0"></i></div>
                                            View All
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item iq-full-screen"><a href="#" class id="btnFullscreen"><i
                                    class="ri-fullscreen-line"></i></a></li>
                        <li class="caption-content">
                            <a href="#" class="iq-user-toggle">
                                <img src="<?= base_url() ?>/assets/images/01.jpg" class="img-fluid rounded" alt="user">
                            </a>
                            <div class="iq-user-dropdown">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                        <div class="header-title">
                                            <h4 class="card-title mb-0">Profile</h4>
                                        </div>
                                        <div class="close-data text-right badge badge-primary cursor-pointer"><i
                                                class="ri-close-fill"></i></div>
                                    </div>
                                    <div class="data-scrollbar" data-scroll="2">
                                        <div class="card-body">
                                            <div class="profile-header">
                                                <div class="cover-container ">
                                                    <div class="media align-items-center mb-4">
                                                        <img src="<?= base_url() ?>/assets/images/1.jpg"
                                                            alt="profile-bg" class="rounded img-fluid avatar-80">
                                                        <div class="media-body profile-detail ml-3 rtl-mr-3 rtl-ml-0">
                                                            <h3>Bill Yerds</h3>
                                                            <div class="d-flex flex-wrap">
                                                                <p class="mb-1">Web designer</p><a
                                                                    href="<?= route_to('otentikasi_logout') ?>"
                                                                    class=" ml-3 rtl-mr-3 rtl-ml-0">Sign Out</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6  col-6 pr-0">
                                                        <div class="profile-details text-center">
                                                            <a href="../app/user-profile.html"
                                                                class="iq-sub-card bg-primary-light rounded-small p-2">
                                                                <div class="rounded iq-card-icon-small">
                                                                    <i class="ri-file-user-line"></i>
                                                                </div>
                                                                <h6 class="mb-0 ">My Profile</h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6  col-md-6 col-6">
                                                        <div class="profile-details text-center">
                                                            <a href="../app/user-profile-edit.html"
                                                                class="iq-sub-card bg-danger-light rounded-small p-2">
                                                                <div class="rounded iq-card-icon-small">
                                                                    <i class="ri-profile-line"></i>
                                                                </div>
                                                                <h6 class="mb-0 ">Edit Profile</h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6  col-6 pr-0">
                                                        <div class="profile-details text-center">
                                                            <a href="../app/user-account-setting.html"
                                                                class="iq-sub-card bg-success-light rounded-small p-2">
                                                                <div class="rounded iq-card-icon-small">
                                                                    <i class="ri-account-box-line"></i>
                                                                </div>
                                                                <h6 class="mb-0 ">Account</h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6  col-6">
                                                        <div class="profile-details text-center">
                                                            <a href="../app/user-privacy-setting.html"
                                                                class="iq-sub-card bg-info-light rounded-small p-2">
                                                                <div class="rounded iq-card-icon-small">
                                                                    <i class="ri-lock-line"></i>
                                                                </div>
                                                                <h6 class="mb-0 ">Settings</h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="personal-details">
                                                    <h5 class="card-title mb-3 mt-3">Personal Details</h5>
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-6">
                                                            <h6>Birthday</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="mb-0">3rd March</p>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-6">
                                                            <h6>Address</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="mb-0">Landon</p>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-6">
                                                            <h6>Phone</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="mb-0">(010)987 543 201</p>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-6">
                                                            <h6>Email</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="mb-0">Barry@example.com</p>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-6">
                                                            <h6>Twitter</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="mb-0">@Barry</p>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-6">
                                                            <h6>Facebook</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="mb-0">@Barry_Tech</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>