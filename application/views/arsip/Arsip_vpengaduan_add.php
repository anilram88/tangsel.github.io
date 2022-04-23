<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "constant/header.php" ?>

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
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('asset/theme/css/daterangepicker.css')?>" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url('asset/bootstrap/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/bootstrap/css/buttons.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/bootstrap/css/fixedHeader.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/bootstrap/css/responsive.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/bootstrap/css/scroller.bootstrap.min.css')?>" rel="stylesheet">

    <!-- Date Picker -->
    <link href="<?php echo base_url('asset/bootstrap/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

    <!-- Profile -->
    <link href="<?php echo base_url('asset/bootstrap/css/bootstrap-responsive.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/bootstrap/css/prettyPhoto.css')?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('asset/theme/css/custom.min.css')?>" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo site_url('arsip/Cadmin');?>" class="site_title"><span>ARSIP</span></a>
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
                <!-- Body tiles -->
                <div class="">
                    <!-- Header 1 -->
                    <div class="clearfix"></div>
                    <div class="pull-left">
                    <br />
                    <button class="btn btn-success" onclick="add_media()"><i class="glyphicon glyphicon-plus"></i>
                        Tambah Data</button>
                    <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i>
                        Refresh</button>
                    <br />
                    <br />
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>DATA ARSIP</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><div align="center">Nomor Urut</div></th>
                                        <th><div align="center">NIK</div></th>
                                        <th><div align="center">Nomor Surat</div></th>
                                        <th><div align="center">Tanggal Surat</div></th>  
                                        <th><div align="center">Nama Pemohon</div></th>
                                        <th><div align="center">Kategori</div></th>
                                        <th><div align="center">Keterangan</div></th>
                                        <th><div align="center">Kode Arsip</div></th>
                                        <th><div align="center">Tanggal Input</div></th>
                                        <th><div align="center">Petugas</div></th>
                                        <th><div align="center">File Arsip</div></th>
                                        <?php if($level == "Admin")
                                        {
                                            echo "<th style='width:150px;'><div align='center'>Action</div></th>";
                                        } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Body Tiles -->
                <br />
            </div>
            <!-- /page content -->
        </div>
        <!--END MODAL EDIT PETUGAS-->
        <!-- footer content -->
        <footer>
            <?php include "constant/Footer.php"; ?>
        </footer>
        <!-- /footer content -->
    </div>
    </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('asset/web/assets/jquery/jquery.min.js')?>"></script>

    <script src="<?php echo base_url('asset/web/assets/jquery/jquery-2.1.4.min.js')?>"></script>

    <!-- Bootstrap -->
    <script src="<?php echo base_url('asset/bootstrap/js/1/bootstrap.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('asset/theme/js/fastclick.js')?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('asset/theme/js/nprogress.js')?>"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url('asset/theme/js/gauge.min.js')?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url('asset/bootstrap/js/bootstrap-progressbar.min.js')?>"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url('asset/theme/js/skycons.js')?>"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url('asset/theme/js/date.js')?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('asset/theme/js/moment.min.js')?>"></script>
    <script src="<?php echo base_url('asset/theme/js/daterangepicker.js')?>"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url('asset/bootstrap/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/buttons.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/buttons.flash.min.js')?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/buttons.html5.min.js')?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/buttons.print.min.js')?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/dataTables.fixedHeader.min.js')?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/dataTables.keyTable.min.js')?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/responsive.bootstrap.js')?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/dataTables.scroller.min.js')?>"></script>
    <script src="<?php echo base_url('asset/jszip/jszip.min.js')?>"></script>
    <!-- <script src="<?php echo base_url('asset/pdfmake/pdfmake.min.js')?>"></script> -->
    <script src="<?php echo base_url('asset/pdfmake/vfs_fonts.js')?>"></script>

    <!-- Date picker -->
    <script src="<?php echo base_url('asset/bootstrap/js/bootstrap-datepicker.min.js')?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('asset/theme/js/custom.min.js')?>"></script>

    <!-- Initialize datepicker -->
    <script>
        $(function() { 
        $("#tgl_surat").datepicker({
            dateFormat: 'dd-mm-yyyy',
            autoClose:true
        });
        });
    </script>

    <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>

    <script type="text/javascript">
    var save_method; //for save method string
    var table;
    var table_load;
    var base_url = '<?php echo base_url();?>';

    $(document).ready(function() {

        //datatables
        table = $('#table.table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('arsip/Carsip/ajax_list')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [-2], //2 last column (photo)
                    "orderable": false, //set not orderable
                },
            ],

        });

        //set input/textarea/select event when change value, remove class error and remove text help block 
        $("input").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

    });

    // proses untuk tambah attachment
    function add_media() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Data Arsip'); // Set Title to Bootstrap modal title
        $('input[name="no_surat"]').prop('disabled', false);

        $('#photo-preview').hide(); // hide photo preview modal

        $('#label-photo').text('FILE ARSIP'); // label photo upload
    }

    function save_media() {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable 
        
        var url;

        if (save_method == 'add') {
            url = "<?php echo site_url('arsip/Carsip/ajax_add')?>";
        } else {
            url = "<?php echo site_url('arsip/Carsip/ajax_update')?>";
        }

        // ajax adding data to database
        var formData = new FormData($('#form')[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                if (data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    // reload_table();
                    location.reload();  
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass(
                            'has-error'
                        ); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[
                            i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 


            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal Menambahkan / Update Data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 

            }
        });
    }

    function edit_media(id_arsip) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('input[name="no_surat"]').prop('disabled', true);

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('arsip/Carsip/ajax_edit')?>/" + id_arsip,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="id_arsip"]').val(data.id_arsip);
                $('[name="no_urut"]').val(data.no_urut);
                $('[name="nik"]').val(data.nik);
                $('[name="no_surat"]').val(data.no_surat);
                $('[name="tgl_surat"]').val(data.tgl_surat);
                $('[name="nm_pemohon"]').val(data.nm_pemohon);
                $('[name="kategori"]').val(data.kategori);
                $('[name="keterangan"]').val(data.keterangan);
                $('[name="kode_arsip"]').val(data.kode_arsip);
                $('[name="tgl_input"]').val(data.tgl_input);
                // $('[name="tgl_surat"]').val(dateFormat("mm-dd", data.tgl_surat) );
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Update Data Arsip'); // Set title to Bootstrap modal title

                $('#photo-preview').show(); // show photo preview modal

                if (data.attachment) {
                    $('#label-photo').text('UBAH FILE ARSIP'); // label photo upload
                    // $('#photo-preview div').html('<img src="' + base_url + 'uploads/attachment/' + data.attachment +
                    //     '" class="img-responsive">'); // show photo
                    $('#photo-preview div').html('<a href="' + base_url + 'uploads/' + data.kode_arsip + '/' + data.attachment +
                        '" class="glyphicon glyphicon-save"> "'+ data.no_urut + '"'); // show photo



                        // <a class="glyphicon glyphicon-save" href="'.base_url('uploads/attachment/'.$media->attachment).'" target="_blank">  Download</a>
                    $('#photo-preview div').append('<br><input type="checkbox" name="remove_attachment" value="' +
                        data.attachment + '"/> Remove Media when saving'); // remove photo

                } else {
                    $('#label-photo').text('Upload Attachment'); // label photo upload
                    $('#photo-preview div').text('(No Attachment)');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal Mengambil Data (Ajax)');
            }
        });
    }

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    function delete_media(id_arsip) {
        if (confirm('Apakah Yakin Ingin Menghapus Data Ini?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('arsip/Carsip/ajax_delete')?>/" + id_arsip,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    // reload_table();
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Gagal Menghapus Data');
                }
            });

        }
    }
    // akhir proses berita
    </script>

    <!-- Tambah Berita  -->
    <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Tambah Data Arsip</h3>
                </div>
                <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal">
                            <input type="hidden" value="" name="id_arsip" />
                            <div class="form-body">                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">NOMOR URUT</label>
                                    <div class="col-md-9">
                                        <input name="no_urut" placeholder="NOMOR URUT" class="form-control"
                                            type="text" required="required" readonly="readonly" value="<?php echo $auto; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">NIK PEMOHON</label>
                                    <div class="col-md-9">
                                        <input name="nik" id="nik" placeholder="NIK PEMOHON" class="form-control"
                                            type="text" maxlength="16" required="required" onkeypress="return hanyaAngka(event)">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">NOMOR SURAT</label>
                                    <div class="col-md-9">
                                        <input name="no_surat" placeholder="NOMOR SURAT" class="form-control"
                                            type="text" required="required">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">TANGGAL SURAT</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input name="tgl_surat" placeholder="TANGGAL SURAT" class="form-control datepicker-here" type="text" required="required" data-language='en' id="tgl_surat">                                            
                                        </div>  
                                        <span class="help-block"></span>                                      
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAMA PEMOHON</label>
                                    <div class="col-md-9">
                                        <input name="nm_pemohon" placeholder="NAMA PEMOHON" class="form-control"
                                            type="text" required="required">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kategori">KATEGORI</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="kategori" required="required"
                                            placeholder="KATEGORI" id="kategori">
                                            <option value="">--- Pilih Kategori ---</option>
                                            <?php foreach ($kategori as $data) { ?>
                                                <option value="<?php echo $data->kategori ?>"> <?php echo $data->kategori ?> </option>
                                            <?php } ?>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">KETERANGAN</label>
                                    <div class="col-md-9">
                                        <textarea name="keterangan" placeholder="KETERANGAN" class="form-control"
                                            type="text" required="required"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">KODE ARSIP</label>
                                    <div class="col-md-9">
                                        <input name="kode_arsip" placeholder="KODE ARSIP" class="form-control"
                                            type="text" required="required" value="<?php echo date('F Y');?>" readonly = "readonly">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group" id="photo-preview">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-9">
                                        (No Attachment)
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" id="label-photo">FILE ARSIP </label>
                                    <div class="col-md-9">
                                        <input name="attachment" type="file">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">TANGGAL INPUT</label>
                                    <div class="col-md-9">
                                        <div class=" input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input name="tgl_input" placeholder="TANGGAL INPUT" class="form-control" type="text" required="required" data-language='en' id="tgl_input" value="<?php echo date('d-m-Y');?>" readonly = "readonly">
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save_media()" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</body>

</html>