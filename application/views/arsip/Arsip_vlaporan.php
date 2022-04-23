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
  <!-- daterangepicker -->
  <link href="<?php echo base_url('asset/chart/css/datepicker.min.css') ?>" rel="stylesheet">
  <!-- Datatables -->
  <link href="<?php echo base_url('asset/bootstrap/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('asset/bootstrap/css/buttons.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('asset/bootstrap/css/fixedHeader.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('asset/bootstrap/css/responsive.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('asset/bootstrap/css/scroller.bootstrap.min.css') ?>" rel="stylesheet">

   <!-- Select2 CSS -->
   <link href="<?php echo base_url('asset/select2/select2.min.css') ?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('asset/theme/css/custom.min.css')?>" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo base_url('arsip/Cadmin'); ?>" class="site_title">
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
          <div class="page-title">
            <div class="title_left">
              <h3>LAPORAN DATA ARSIP</h3>
            </div>
          </div>
          <!-- Header 1 -->
          <div class="clearfix"></div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data Arsip</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="container">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Custom Filter : </h3>
                  </div>
                  <div class="panel-body">
                    <form id="form-filter" class="form-horizontal">
                      <div class="form-group">
                        <label for="nik" class="col-sm-2 control-label">NIK</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="nik">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="no_surat" class="col-sm-2 control-label">NO SURAT</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="no_surat">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nm_pemohon" class="col-sm-2 control-label">NAMA PEMOHON</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="nm_pemohon">
                        </div>
                      </div>     
                      <div class="form-group">
                        <label for="kode_arsip" class="col-sm-2 control-label">KODE ARSIP</label>
                        <div class="col-sm-4">
                          <select class="kode_arsip form-control" id="kode_arsip">
                            <option value=''>-- Pilih Kode Arsip --</option>
                          </select>
                        </div>
                      </div>   
                      <div class="form-group">
                        <label for="kategori" class="col-sm-2 control-label">KATEGORI</label>
                        <div class="col-sm-4">
                          <select class="kategori form-control" id="kategori">
                            <option value=''>-- Pilih Kategori --</option>
                          </select>
                        </div>
                      </div>  
                      <div class="form-group">
                          <label for="" class="col-sm-2 control-label">TANGGAL INPUT</label> 
                          <div class="col-md-4">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type='text' name="tgl_input" class="form-control datepicker-here" data-language='en' id="tgl_input" />
                            </div>
                          </div>
                        </div>                   
                      <div class="form-group">
                        <label for="nm_cs" class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
                          <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                          <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- <form method="post" action="<?php echo site_url('jerapah/Claporan/tambah_aksi'); ?>"> -->
                  <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>No Urut</th>
                        <th>NIK</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Nama Pemohon</th>
                        <th>Keterangan</th>
                        <th>Kategori</th>
                        <th>Kode Arsip</th>
                        <th>Tanggal Input</th>
                        <th>Petugas</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                <!-- </form> -->
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- /page content -->

      <!-- footer content -->
      <?php include "constant/Footer.php"; ?>
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
  <!-- daterangepicker -->
  <script src="<?php echo base_url('asset/chart/js/datepicker.min.js') ?>"></script>
  <script src="<?php echo base_url('asset/chart/js/datepicker.en.js') ?>"></script>
  <!-- Datatables -->
  <script src="<?php echo base_url('asset/pdfmake/pdfmake.min.js') ?>"></script>
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

  <script src="<?php echo base_url('asset/jszip/jszip.min.js') ?>"></script>
  <script src="<?php echo base_url('asset/pdfmake/vfs_fonts.js') ?>"></script>

  <!-- Select2 JS -->
  <script src="<?php echo base_url('asset/select2/select2.min.js') ?>"></script>
  

  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url('asset/theme/js/custom.min.js') ?>"></script>

  <script type="text/javascript">
    var table;

    $(document).ready(function() {
      //datatables
      table = $('#table').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.

        "dom": 'Blftipr', //menampilkan tombol copy,csv,print lihat doc DOM
        // "dom": 'Bfrtip', 
        // "lengthMenu": [ 10, 25, 50, 75, 100,"All" ],
        "lengthMenu": [
          [10, 25, 50, 75, 100, -1],
          [10, 25, 50, 75, 100, "All"]
        ],
        // "buttons": ['copy', 'csv', 'print'],
        "buttons": [
          // 'copy', 
          'csv', 
          // 'print',
            {
                extend: 'pdf',
                text: 'Download PDF',
                orientation: 'landscape',
                pageSize: 'A4',
                download: open,
                header: true,
                title: 'Data Arsip',
                customize: function(doc) {

                    doc.defaultStyle.fontSize = 11; 
                    doc.defaultStyle.alignment = 'center';
                } 
                // download: 'open'
                // exportOptions: {
                //     modifier: {
                //         page: 'current'
                //     }
                // }
            }
        ],

        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('arsip/Claporan/ajax_list') ?>",
          "type": "POST",
          "data": function(data) {
            data.nik        = $('#nik').val();
            data.no_surat   = $('#no_surat').val();
            data.nm_pemohon = $('#nm_pemohon').val();
            data.kategori   = $('#kategori').val();
            data.kode_arsip = $('#kode_arsip').val();
            data.tgl_input  = $('#tgl_input').val();
          }
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
          "targets": [1,2,3,4,5,6,7,8], //first column / numbering column
          "orderable": false, //set not orderable
        }, ],
      });

      $('#btn-filter').click(function() { //button filter event click
        table.ajax.reload(); //just reload table
      });
      $('#btn-reset').click(function() { //button reset event click
        $('#form-filter')[0].reset();
        $('#kategori').text('null');
        $('#kode_arsip').text('null');
        table.ajax.reload(); //just reload table
      });

    });
  </script>

  <script type="text/javascript">
    $('.kode_arsip').select2({
      ajax:{
        url : "<?php echo base_url('arsip/Claporan/get_kode_arsip') ?>",
        dataType : "json",
        delay: 250,
        data: function(params){
          return {
            kd_arsip: params.term
          };
        },
        processResults: function(data){
          var results = [];

          $.each(data, function(index, item){
            results.push({
              id: item.kode_arsip,
              text: item.kode_arsip
            });
          });
          return{
            results:results
          };
        }
      }
    });

    $('.kategori').select2({
      ajax:{
        url : "<?php echo base_url('arsip/Claporan/get_kategori') ?>",
        dataType : "json",
        delay: 250,
        data: function(params){
          return {
            kategori_: params.term
          };
        },
        processResults: function(data){
          var results = [];

          $.each(data, function(index, item){
            results.push({
              id: item.kategori,
              text: item.kategori
            });
          });
          return{
            results:results
          };
        }
      }
    });
  </script>



  <!-- Initialize datepicker -->
  <script>
    $(function() { 
      // "autoclose": true;
      $("#tgl_input").datepicker({
        dateFormat: 'yyyy-mm-dd',
        autoClose:true
      });
    });
  </script>
</body>

</html>