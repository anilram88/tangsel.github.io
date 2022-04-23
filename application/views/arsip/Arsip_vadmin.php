<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "constant/header.php"; ?>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('asset/bootstrap/css/1/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('asset/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('asset/theme/css/nprogress.css')?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('asset/theme/css/green.css')?>" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url('asset/bootstrap/css/bootstrap-progressbar-3.3.4.min.css')?>" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url('asset/theme/css/jqvmap.min.css')?>" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('asset/theme/css/daterangepicker.css')?>" rel="stylesheet">
    <!-- Chart -->
    <link href="<?php echo base_url('asset/theme/css/morris.css')?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('asset/theme/css/custom.min.css')?>" rel="stylesheet">


</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo base_url('arsip/Cadmin');?>" class="site_title"><span>ARSIP</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?php echo base_url('asset/images/logo_tangsel.png')?>" alt="..."
                                class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $nm_cs ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />
                    <br />

                    <!-- sidebar menu -->
                    <?php include "constant/Navbar.php"; ?>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Logout"
                            href="<?php echo site_url('arsip/Cadmin/logout'); ?>">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <?php echo $nm_cs ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="<?php echo site_url('arsip/Cadmin/logout'); ?>"><i
                                                class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <!-- top tiles -->
                    <div class="row tile_count">
                        <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-users"></i> Total Pengaduan</span>
                            <div class="count"><?php echo "" ?></span></div>
                            <span class="count_bottom"><i class="green">Pengaduan</span>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-check-square"></i> Selesai</span>
                            <div class="count"><?php echo ""?></div>
                            <span class="count_bottom"><i class="green"></i></span>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-clock-o"></i> Dalam Proses</span>
                            <div class="count green"><?php echo "" ?></div>
                            <span class="count_bottom"><i class="green"></span>
                        </div> -->
                    </div>
                    <!-- /top tiles -->
                    <center><img src="<?php echo base_url('asset/images/Welcome.png') ?>" style="width:70%;height:auto;" ></center>
                </div>

                <div class="clearfix"></div>

                <div class="row" style="display: block;">
                </div>
            </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <?php include "constant/Footer.php"; ?>
            </footer>
            <!-- /footer content -->
        </div>
    </div>



    <!-- jQuery -->
    <script src="<?php echo base_url('asset/theme/js/jquery.min.js')?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('asset/bootstrap/js/1/bootstrap.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('asset/theme/js/fastclick.js')?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('asset/theme/js/nprogress.js')?>"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url('asset/Chart.js/dist/Chart.min.js')?>"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url('asset/gauge.js/dist/gauge.min.js')?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url('asset/bootstrap/js/bootstrap-progressbar.min.js')?>">
    </script>
    <!-- iCheck -->
    <script src="<?php echo base_url('asset/theme/js/icheck.min.js')?>"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url('asset/theme/js/skycons.js')?>"></script>
    <!-- Flot -->
    <script src="<?php echo base_url('asset/Flot/jquery.flot.js')?>"></script>
    <script src="<?php echo base_url('asset/Flot/jquery.flot.pie.js')?>"></script>
    <script src="<?php echo base_url('asset/Flot/jquery.flot.time.js')?>"></script>
    <script src="<?php echo base_url('asset/Flot/jquery.flot.stack.js')?>"></script>
    <script src="<?php echo base_url('asset/Flot/jquery.flot.resize.js')?>"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url('asset/Flot/flot.orderbars/js/jquery.flot.orderBars.js')?>"></script>
    <script src="<?php echo base_url('asset/Flot/flot-spline/js/jquery.flot.spline.min.js')?>"></script>
    <script src="<?php echo base_url('asset/Flot/flot.curvedlines/curvedLines.js')?>"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url('asset/DateJS/build/date.js')?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('asset/jqvmap/dist/jquery.vmap.js')?>"></script>
    <script src="<?php echo base_url('asset/jqvmap/dist/maps/jquery.vmap.world.js')?>"></script>
    <script src="<?php echo base_url('asset/jqvmap/examples/js/jquery.vmap.sampledata.js')?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('asset/theme/js/moment.min.js')?>"></script>
    <script src="<?php echo base_url('asset/theme/js/daterangepicker.js')?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('asset/theme/js/custom.min.js')?>"></script>

</body>

</html>