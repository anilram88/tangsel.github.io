<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "constant/header.php"; ?>  

    <!-- Bootstrap -->
    <link href="<?php echo base_url('asset/bootstrap/css/1/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('asset/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('asset/theme/css/nprogress.css') ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('asset/theme/css/green.css') ?>" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url('asset/bootstrap/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/bootstrap/css/buttons.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/bootstrap/css/fixedHeader.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/bootstrap/css/responsive.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/bootstrap/css/scroller.bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('asset/theme/css/custom.min.css') ?>" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo site_url('arsip/Cadmin'); ?>" class="site_title">
                            <span>
                                ARSIP
                            </span>
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?php echo base_url('asset/images/logo_tangsel.png') ?>" alt="..." class="img-circle profile_img">
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
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo site_url('arsip/Cadmin/logout'); ?>">
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
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <?php echo $nm_cs ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="<?php echo site_url('arsip/Cadmin/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>
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
                    <!-- Header 1 -->
                    <div class="clearfix"></div>
                    <div class="pull-left">
                        <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_tambah">Tambah
                            Petugas</a>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Data User</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <div align="center">NO</div>
                                        </th>
                                        <th>
                                            <div align="center">NAMA CUSTOMER SERVICE</div>
                                        </th>
                                        <th>
                                            <div align="center">USERNAME</div>
                                        </th>
                                        <th>
                                            <div align="center">LEVEL</div>
                                        </th>
                                        <th>
                                            <div align="center">STATUS</div>
                                        </th>
                                        <th>
                                            <div align="center">ACTION</div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($tb_user as $u) {
                                    ?>
                                        <tr>
                                            <td width="20"><?php echo $no ?></td>
                                            <td width="40"><?php echo $u->nm_cs ?></td>
                                            <td align="left" width="10"><?php echo $u->user ?></td>
                                            <td width="40"><?php echo $u->level ?></td>
                                            <td align="center" width="10"><?php echo $u->status ?></td>
                                            <td width="30" align="center">
                                                <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_edit<?php echo $u->id_user ?>"> <i class="fa fa-pencil"></i> Edit </a>
                                                <a href="javascript:void(0);" onclick="hapus(<?php echo $u->id_user; ?>);" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
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
    <script src="<?php echo base_url('asset/theme/js/jquery.min.js') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('asset/bootstrap/js/1/bootstrap.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('asset/theme/js/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('asset/theme/js/nprogress.js') ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('asset/theme/js/icheck.min.js') ?>"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url('asset/bootstrap/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/dataTables.bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/buttons.bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/buttons.flash.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/buttons.html5.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/buttons.print.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/dataTables.fixedHeader.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/dataTables.keyTable.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/responsive.bootstrap.js') ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/dataTables.scroller.min.js') ?>"></script>

    <!-- <script src="<?php echo base_url('asset/jszip/dist/jszip.min.js') ?>"></script> -->
    <!-- <script src="<?php echo base_url('asset/pdfmake/build/pdfmake.min.js') ?>"></script> -->
    <!-- <script src="<?php echo base_url('asset/pdfmake/build/vfs_fonts.js') ?>"></script> -->

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('asset/theme/js/custom.min.js') ?>"></script>

    <!-- Notifikasi Hapus User -->
    <script type="text/javascript">
        var url = "<?php echo site_url(); ?>";

        function hapus(id_user) {
            var r = confirm("Apakah Anda Yakin Ingin Menghapus User Ini?")
            if (r == true)
                window.location = url + "arsip/Cadmin/hapus_user/" + id_user;
            else
                return false;
        }
    </script>
</body>

</html>

<!-- ============ MODAL TAMBAH DATA PETUGAS =============== -->
<div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Data User</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('arsip/Cadmin/tambah_user'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3">NAMA USER <span class="required">*</span></label>
                        <div class="col-xs-8">
                            <input name="nm_cs" class="form-control" type="text" placeholder="NAMA USER" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">USERNAME <span class="required">*</span></label>
                        <div class="col-xs-8">
                            <input name="username" class="form-control" type="text" placeholder="USERNAME" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label col-md-3">Password <span class="required">*</span></label>
                        <div class="col-xs-8">
                            <input placeholder="Password" type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Level <span class="required">*</span></label>
                        <div class="col-xs-8">
                            <select class="form-control" name="level" id="level" required>
                                <option value="">--Pilih Level--</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Status <span class="required">*</span></label>
                        <div class="col-xs-8">
                            <select class="form-control" name="status" id="status" required>
                                <option value="">--Pilih Status--</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL TAMBAH DATA PETUGAS-->

<!-- ============ MODAL EDIT USER =============== -->
<?php foreach ($tb_user as $u) { ?>
    <div class="modal fade" id="modal_edit<?php echo $u->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Update Data User</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo site_url('arsip/Cadmin/update_user/') . $u->id_user ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3">NAMA USER <span class="required">*</span></label>
                            <div class="col-xs-8">
                                <input name="id_user" class="form-control" type="hidden" placeholder="id_user" required value="<?php echo $u->id_user ?>">
                                <input name="nm_cs" class="form-control" type="text" placeholder="NAMA USER" required value="<?php echo $u->nm_cs ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">USERNAME<span class="required">*</span></label>
                            <div class="col-xs-8">
                                <input name="username" class="form-control" type="text" placeholder="USERNAME" required value="<?php echo $u->user ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Password<span class="required">*</span></label>
                            <div class="col-xs-8">
                                <input name="password" class="form-control" type="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Level <span class="required">*</span></label>
                            <div class="col-xs-8">
                                <select class="form-control" name="level" id="level" required>
                                    <option value="<?php echo $u->level ?>"><?php echo $u->level ?></option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Status <span class="required">*</span></label>
                            <div class="col-xs-8">
                                <select class="form-control" name="status" id="status" required>
                                    <option value="<?php echo $u->status ?>"><?php echo $u->status ?></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!--END MODAL EDIT PETUGAS-->