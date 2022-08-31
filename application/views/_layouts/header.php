<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Padepokan79</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <!-- Sweet Alert -->
    <link href="<?= base_url('assets/plugins/sweetalert2/sweetalert2.css'); ?>" rel="stylesheet" type="text/css">

    <!-- DataTables -->
    <link href="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/plugins/datatables/buttons.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/plugins/datatables/fixedHeader.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/plugins/datatables/responsive.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('assets/plugins/datatables/scroller.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="header-bg">
        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo-->
                    <div>
                        <a href="<?= base_url(); ?>" class="logo">
                            <h3 class="text-white">Padepokan79</h3>
                        </a>
                    </div>
                    <!-- End Logo-->

                    <div class="clearfix"></div>

                </div>
                <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">

                    <div id="navigation">

                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="<?= base_url(); ?>">Tugas 01</a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?= base_url('home/tugas2'); ?>">Tugas 02</a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?= base_url('home/tugas3'); ?>">Tugas 03</a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?= base_url('home/tugas4'); ?>">Tugas 04</a>
                            </li>

                        </ul>
                        <!-- End navigation menu -->
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->

    </div>
    <!-- header-bg -->