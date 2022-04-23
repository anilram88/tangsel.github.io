    $( document ).ready(function() {   
    $('#msgbx_success').css('display', 'none');
    $('#msgbx_err').css('display', 'none');
    var table_organisasi = $('#organisasi-table').DataTable({
        "processing": true,
        "sort": false,
        "filter": true,
        "serverSide": true,
        "ajax": {
            "url": base_url + "hrm/organisasi/get_list_nomenklatur_organisasi",
            "type": "POST"
        },
        "columns": [
            {"data": "company_kode", "orderable": false, "targets": 'no-sort'},
            {"data": "keterangan", "orderable": false, "targets": 'no-sort'},
            {"data": "utk_ket", "orderable": false, "targets": 'no-sort'},
            {"data": "flag_berlaku", "orderable": false, "targets": 'no-sort'},
            {"data": "actions"}
        ]
    });  

    var init_hide_semua     = null; 
    $("#wrapper-nomenklatur-mutasi").show();
    table_organisasi.ajax.reload(null, true);

    init_hide_semua = function()
    {
        $('.isi_semua').hide();
        for (i=1;i<=7;i++){
            $('#isi_flag_level'+i).hide();
        }      
    }


    $("#add-organisasi-btn").on('click', function (event) {
        event.preventDefault();  
        init_hide_semua();
        $('#msgbx_err').css('display', 'none');
        $('#msgbx_success').css('display', 'none');
        $('#company_kode').css('border-width', '1px');
        $('#company_kode').css('border-color', '');
        $('#organisasi-form').find('select').val("");
        $('#organisasi-form').find('input').val("");
        $('.modal-header').addClass('add-modal');
    });

    init_isi_flag_level1 = function(){
            // menampilkan pilihan level parent sesuai dengan level yang dipilih
            $('#isi_flag_level1').show();            
            // menampilkan isi level
            $("#flag_level0").select2({
                tags: false,
                multiple: false,
                placeholder: "Pilih Level",
                value: true,
                ajax: {
                    url: base_url + 'hrm/organisasi/result_cari_unitkerja/0',
                    dataType: "json",
                    type: "POST",
                    data: function (params) {
                        var queryParameters = {
                            param: params.term
                        }
                        return queryParameters;
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.text,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            }); 
            $('select[name="flag_level0"]').select2("val", "");       
    }

    init_isi_flag_level2 = function(){
        $('#isi_flag_level2').show();        
            var parent = $("#flag_level0").val();
            $('#isi_flag_level2').show();
            // menampilkan isi level
            $("#flag_level1").select2({
                tags: false,
                multiple: false,
                placeholder: "Pilih Level",
                val:"",
                value: true,
                ajax: {
                    url: base_url + 'hrm/organisasi/result_cari_unitkerja/1/'+parent,
                    dataType: "json",
                    type: "POST",
                    data: function (params) {
                        var queryParameters = {
                            param: params.term
                        }
                        return queryParameters;
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.text,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });     
            $('select[name="flag_level1"]').select2("val", "");    
    }

    init_isi_flag_level3 = function(){
            $('#isi_flag_level3').show();
            var parent = $("#flag_level1").val();
            // menampilkan isi level
            $("#flag_level2").select2({
                tags: false,
                multiple: false,
                placeholder: "Pilih Level",
                value: true,
                ajax: {
                    url: base_url + 'hrm/organisasi/result_cari_unitkerja/2/'+parent,
                    dataType: "json",
                    type: "POST",
                    data: function (params) {
                        var queryParameters = {
                            param: params.term
                        }
                        return queryParameters;
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.text,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });  
            $('select[name="flag_level2"]').select2("val", "");       
    }

    init_isi_flag_level4 = function(){
            $('#isi_flag_level4').show();
            var parent = $("#flag_level2").val();
            // menampilkan isi level
            $("#flag_level3").select2({
                tags: false,
                multiple: false,
                placeholder: "Pilih Level",
                value: true,
                ajax: {
                    url: base_url + 'hrm/organisasi/result_cari_unitkerja/3/'+parent,
                    dataType: "json",
                    type: "POST",
                    data: function (params) {
                        var queryParameters = {
                            param: params.term
                        }
                        return queryParameters;
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.text,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            }); 
            $('select[name="flag_level3"]').select2("val", "");
    }

    init_isi_flag_level5 = function(){
        $('#isi_flag_level5').show();
            var parent = $("#flag_level3").val();
            // menampilkan isi level
            $("#flag_level4").select2({
                tags: false,
                multiple: false,
                placeholder: "Pilih Level",
                value: true,
                ajax: {
                    url: base_url + 'hrm/organisasi/result_cari_unitkerja/4/'+parent,
                    dataType: "json",
                    type: "POST",
                    data: function (params) {
                        var queryParameters = {
                            param: params.term
                        }
                        return queryParameters;
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.text,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            }); 
            $('select[name="flag_level4"]').select2("val", ""); 
    }

    init_isi_flag_level6 = function(){
        $('#isi_flag_level5').show();
            var parent = $("#flag_level4").val();
            // menampilkan isi level
            $("#flag_level5").select2({
                tags: false,
                multiple: false,
                placeholder: "Pilih Level",
                value: true,
                ajax: {
                    url: base_url + 'hrm/organisasi/result_cari_unitkerja/5/'+parent,
                    dataType: "json",
                    type: "POST",
                    data: function (params) {
                        var queryParameters = {
                            param: params.term
                        }
                        return queryParameters;
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.text,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            }); 
            $('select[name="flag_level5"]').select2("val", ""); 
    }

    init_isi_flag_level7 = function(){
        $('#isi_flag_level6').show();
            var parent = $("#flag_level5").val();
            // menampilkan isi level
            $("#flag_level6").select2({
                tags: false,
                multiple: false,
                placeholder: "Pilih Level",
                value: true,
                ajax: {
                    url: base_url + 'hrm/organisasi/result_cari_unitkerja/6/'+parent,
                    dataType: "json",
                    type: "POST",
                    data: function (params) {
                        var queryParameters = {
                            param: params.term
                        }
                        return queryParameters;
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.text,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            }); 
            $('select[name="flag_level6"]').select2("val", ""); 
    }

    $("#flag_level").on("change", function () {
        event.preventDefault();      
        // mengilangkan semua pilihan level  
        init_hide_semua();
        if (($('#flag_level').val()=='') || ($('#flag_level').val()==null) ) {
            init_hide_semua();
        }else if (($('#flag_level').val()=='0')) {
            $(".isi_semua").show();
        }else{            
            init_isi_flag_level1();
        }
    });

    //ACTION SELECT2 GROUP MENAMPILKAN SELECT2 UNIT USAHA (UNIT USAHA TAMPILKAN DAFTAR)
    $("#flag_level0").on("change", function () {
        event.preventDefault();  
        init_hide_semua();
        $('#isi_flag_level1').show(); 
        // nilai level yang dipilih
        var level_selected = $("#flag_level").val();
        if (level_selected=='1'){
            $('.isi_semua').show(); 
            $('select[name="head"]').select2("val", "");   
        }else{
            // init_isi_flag_level2();
            var isi = $("#flag_level0").val();     
            if (isi!=null){
                init_isi_flag_level2();   
            }  
        }
    });

    // ACTION SELECT2 UNIT USAHA MENAMPILKAN SELECT2 DIREKTORAT (DIREKTORAT TAMPILKAN DAFTAR)
    $("#flag_level1").on("change", function () {
        event.preventDefault();  
        init_hide_semua();
        $('#isi_flag_level1').show();
        $('#isi_flag_level2').show();
        // nilai level yang dipilih
        var level_selected = $("#flag_level").val();
        if (level_selected=='2'){
            $('.isi_semua').show(); 
            $('select[name="head"]').select2("val", "");   
        }else{
            // init_isi_flag_level3();
            var isi = $("#flag_level1").val();     
            if (isi!=null){
                init_isi_flag_level3();   
            }  
        }
    });

    // ACTION SELECT2 DIREKTORAT MENAMPILKAN SELECT2 DIVISI (DIVISI TAMPILKAN DAFTAR)
    $("#flag_level2").on("change", function () {
        event.preventDefault();  
        init_hide_semua();
        $('#isi_flag_level1').show();
        $('#isi_flag_level2').show();
        $('#isi_flag_level3').show();
        // nilai level yang dipilih
        var level_selected = $("#flag_level").val();
        if (level_selected=='3'){
            $('.isi_semua').show(); 
            $('select[name="head"]').select2("val", "");   
        }else{
            var isi = $("#flag_level2").val();     
            if (isi!=null){
                init_isi_flag_level4();   
            }  
        }
    });

    // ACTION SELECT2 DIVISI  MENAMPILKAN SELECT2 BIDANG (BIDANG TAMPILKAN DAFTAR)
    $("#flag_level3").on("change", function () {
        event.preventDefault();  
        init_hide_semua();
        $('#isi_flag_level1').show();
        $('#isi_flag_level2').show();
        $('#isi_flag_level3').show();
        $('#isi_flag_level4').show();
        // nilai level yang dipilih
        var level_selected = $("#flag_level").val();
        if (level_selected=='4'){
            $('.isi_semua').show(); 
            $('select[name="head"]').select2("val", "");   
        }else{
            var isi = $("#flag_level3").val();     
            if (isi!=null){
                init_isi_flag_level5();   
            }  
        }
    });

    // ACTION SELECT2 DIVISI  MENAMPILKAN SELECT2 SUB BIDANG (SUB BIDANG TAMPILKAN DAFTAR)
    $("#flag_level4").on("change", function () {
        event.preventDefault();  
        init_hide_semua();
        $('#isi_flag_level1').show();
        $('#isi_flag_level2').show();
        $('#isi_flag_level3').show();
        $('#isi_flag_level4').show();
        $('#isi_flag_level5').show();
        // nilai level yang dipilih
        var level_selected = $("#flag_level").val();
        if (level_selected=='5'){
            $('.isi_semua').show(); 
            $('select[name="head"]').select2("val", "");   
        }else{
            // init_isi_flag_level6();
            var isi = $("#flag_level4").val();     
            if (isi!=null){
                init_isi_flag_level6();   
            }  
        }
    });

    // ACTION SELECT2 DIVISI  MENAMPILKAN SELECT2 SUB SUB BIDANG (SUB SUB BIDANG TAMPILKAN DAFTAR)
    $("#flag_level5").on("change", function () {
        event.preventDefault();  
        init_hide_semua();
        $('#isi_flag_level1').show();
        $('#isi_flag_level2').show();
        $('#isi_flag_level3').show();
        $('#isi_flag_level4').show();
        $('#isi_flag_level5').show();
        $('#isi_flag_level6').show();
        // nilai level yang dipilih
        var level_selected = $("#flag_level").val();
        if (level_selected=='6'){
            $('.isi_semua').show(); 
            $('select[name="head"]').select2("val", "");   
        }else{
            var isi = $("#flag_level5").val();     
            if (isi!=null){
                init_isi_flag_level7();   
            }  
        }
    });

    $("#flag_level6").on("change", function () {
        event.preventDefault();  
        init_hide_semua();
        $('#isi_flag_level1').show();
        $('#isi_flag_level2').show();
        $('#isi_flag_level3').show();
        $('#isi_flag_level4').show();
        $('#isi_flag_level5').show();
        $('#isi_flag_level6').show();
        $('#isi_flag_level7').show();
        $('.isi_semua').show();
        $('select[name="head"]').select2("val", "");     
    });


    $("#head").select2({
        tags: false,
        multiple: false,
        placeholder: "Pilih Jabatan",
        value: true,
        ajax: {
            url: base_url + 'hrm/organisasi/result_cari_head',
            dataType: "json",
            type: "POST",
            data: function (params) {
                var queryParameters = {
                    param: params.term
                }
            return queryParameters;
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.text,
                            id: item.id
                        }
                    })
                };
            }
        }
    });    

    //cek company kode
    $("#company_kode").on("change", function () {
        event.preventDefault();
        var company_kode        = $("#company_kode").val();
        var company_kode_lama   = $("#company_kode_lama").val();
                    $.post(base_url+'hrm/organisasi/cek_company_kode', {company_kode: company_kode}, function(d) {
                        // jika company code telah ada di db dan company code berbeda dengan company code sebelumnya
                        if ((d == 1)&&((company_kode!=company_kode_lama) ))
                        {
                            $("#msgbx_err").text("Kode Organisasi "+company_kode+" Sudah Digunakan");
                            $("#company_kode").val("");
                            $('#company_kode').css('border-color', '#DD0000');
                            $('#company_kode').css('text-weight', 'bold');
                            $('#company_kode').css('border-width', '3px');
                            $('#msgbx_err').css('color', '#DD0000');
                            $('#msgbx_success').css('display', 'none');
                            $('#msgbx_err').css('display', 'block');

                        }
                        // jika company code sudah ada di db dan company code berbeda dengan company code sebelumnya
                        // atau company code sama dengan company code sebelumnya
                        else if (((d == 0)&&(company_kode!=company_kode_lama))||(company_kode==company_kode_lama))
                        {
                            $('#company_kode').css('border-color', '#0D8E0F');
                            $('#company_kode').css('border-width', '3px');
                            $('#msgbx_success').css('color', '#0D8E0F');
                            $('#msgbx_err').css('display', 'none');
                            $('#msgbx_success').css('display', 'block');
                        }
                        else
                        {
                            $('#msgbx_err').css('display', 'none');
                            $('#msgbx_success').css('display', 'none');
                        }
                    });

    });

    $("#submit-organisasi-btn").on('click', function (event) {

        Metronic.blockUI({
            target: '#modal_organisasi'
        });
        event.preventDefault();
        var ruleSet_default = {
            required: true
        };
        $("#organisasi-form").validate({
            rules:
                    {
                        flag_level: ruleSet_default,
                        company_kode: ruleSet_default,
                        utk_ket: ruleSet_default,
                        utk_sktn: ruleSet_default,
                        head: ruleSet_default
                    }
        }).form();

        if ($("#organisasi-form").valid())
        {
            var url_action = $("#organisasi-form").attr('action');
            var data_post = $("#organisasi-form").serializeArray();
            if ($('.alert-organisasi').length > 0)
            {
                $('.alert-organisasi').fadeOut('2000').remove();
            }
            if ($('.error-organisasi').length > 0)
            {
                $('.error-organisasi').fadeOut('2000').remove()
            }
            $.ajax({
                type: "POST",
                url: url_action,
                data: data_post,
                data_type: "json",
                encode: true,
                success: function (data)
                {
                    if (data.status == "success")
                    {
                        $('.close').trigger('click');
                        table_organisasi.ajax.reload(null, true);
                        var parent_elem = $("<div>").addClass("alert alert-success alert-organisasi");
                        parent_elem.append('<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>');
                        parent_elem.append('<span class="alert-icon"><i class="far fa-bell"></i></span>');
                        var notif_info = $("<div>").addClass('notification-info');
                        notif_info.append('<ul class="clearfix notification-meta"><li class="pull-left notification-sender"> Notification : </li></ul>');
                        notif_info.append('<p>' + data.status_message + '</p>');
                        parent_elem.append(notif_info);                        
                        $('#wrapper-organisasi-table').prepend(parent_elem);
                        $$('files').clearAll();
                        data = $$("files").load(base_url+"hrm/organisasi/get_organisasi_tree/"+$("#id_sk").val()); 
                    }
                    else
                    {
                        var parrent_error = $("<div>").addClass("form-group col-md-12 col-xs-12 error-notif error-organisasi");
                        var div_error = $("<div>").addClass('callout callout-danger');
                        div_error.append('<strong>Error!</strong><br>');
                        div_error.append(data.error_message);
                        parrent_error.append(div_error);
                        $('#organisasi-form').prepend(parrent_error);
                    }
                    Metronic.unblockUI('#modal_organisasi');
                }
            });
        } else {
            Metronic.unblockUI('#modal_organisasi');
            $("#submit-organisasi-btn").removeAttr('disabled');
        }
    }); 

    // tambah organisasi shortcut
    $(document).on('click', 'a.edit-organisasi-btn', function (event) {
        $("#submit-organisasi-btn").removeAttr('disabled');
        event.preventDefault();
        var url_action = $(this).attr('href');
        // var url_action = $("#organisasi-form").attr('action');
        // $("#organisasi-form").attr('action', base_url + 'hrm/organisasi/add_organisasi_process');    
        $('#add-organisasi-btn').trigger('click');
        $.getJSON(url_action, function (json, textStatus) { 
            var total_pegawai= json.total_pegawai;
            var utk_kode     = json.utk_kode_old;
            if (total_pegawai==0){
                $("#total_pegawai").text("");
                $("#wrapper-nomenklatur-mutasi").hide();
            }else{
                $("#wrapper-nomenklatur-mutasi").show();
                // table.destroy();
                $('#nomenklatur-organisasi-table').DataTable({
                    "processing": false,
                    "destroy": true,
                    "sort": false,
                    "filter": false,                    
                    "serverSide": true,
                    "ajax": {
                        "url": base_url + "hrm/organisasi/get_list_pegawai_nomenklatur_organisasi/"+utk_kode,
                        "type": "POST"
                    },
                    "columns": [
                        {"data": "pslh_nrp", "orderable": false, "targets": 'no-sort'},
                        {"data": "pslh_nama", "orderable": false, "targets": 'no-sort'},
                        {"data": "utk_ket", "orderable": false, "targets": 'no-sort'},
                        {"data": "jab_ket", "orderable": false, "targets": 'no-sort'}
                    ]
                });
                $("#total_pegawai").text("Perubahan organisasi ini memungkinkan sistem akan melakukan permintaan mutasi otomatis untuk penyesuaian susunan organisasi kepada "+ total_pegawai +" Pegawai berikut ini:");
            }
            // menampilkan data lama
            $("#utk_kode").val(json.utk_kode_baru);
            $("#no_surat_old").html(json.no_surat_old);  
            $("#no_surat").html(json.no_surat_baru);  

            $("#flag_level_old").val(json.keterangan_old); 
            // $("#flag_level").val(json.keterangan_baru);      
            // alert(json.keterangan_baru);
            if ((json.utk_ket_level0_old)!=null){
                $("#flag_level0_old").val(json.utk_ket_level0_old);
            }else{
                $("#flag_level0_old").val("Tidak Ada");       
            } 
            if ((json.utk_ket_level1_old)!=null){
                $("#flag_level1_old").val(json.utk_ket_level1_old);
            }else{
                $("#flag_level1_old").val("Tidak Ada");       
            } 
            if ((json.utk_ket_level2_old)!=null){
                $("#flag_level2_old").val(json.utk_ket_level2_old);
            }else{
                $("#flag_level2_old").val("Tidak Ada");       
            } 
            if ((json.utk_ket_level3_old)!=null){
                $("#flag_level3_old").val(json.utk_ket_level3_old);
            }else{
                $("#flag_level3_old").val("Tidak Ada");       
            } 
            if ((json.utk_ket_level4_old)!=null){
                $("#flag_level4_old").val(json.utk_ket_level4_old);
            }else{
                $("#flag_level4_old").val("Tidak Ada");       
            } 
            if ((json.utk_ket_level5_old)!=null){
                $("#flag_level5_old").val(json.utk_ket_level5_old);
            }else{
                $("#flag_level5_old").val("Tidak Ada");       
            } 
            if ((json.utk_ket_level6_old)!=null){
                $("#flag_level6_old").val(json.utk_ket_level6_old);
            }else{
                $("#flag_level6_old").val("Tidak Ada");       
            }           
            $("#company_kode_old").val(json.company_kode_old);
            $("#utk_ket_old").val(json.utk_ket_old);
            $("#utk_sktn_old").val(json.utk_sktn_old);            
            $("#penempatan_old").val(json.penempatan_old);
            $("#head_old").val(json.jab_ket_old);

            init_hide_semua();
            if (json.flag_level_baru==0){ // jika level 0 ingin tambah level 1
                $("#company_kode").val(json.company_kode_baru);
                $("#company_kode_lama").val(json.company_kode_baru);
                $("#utk_ket").val(json.utk_ket_baru);
                $("#utk_sktn").val(json.utk_sktn_baru);
                $("#penempatan").val(json.penempatan_baru);

                $('#isi_flag_level1').hide();
                $('#isi_flag_level2').hide();
                $('#isi_flag_level3').hide();
                $('#isi_flag_level4').hide();
                $('#isi_flag_level5').hide();
                $('#isi_flag_level6').hide();
                $('#isi_flag_level7').hide();
                $('.isi_semua').show();                

                // var head = '<option value="' + json.jab_kode_baru + '" selected>' + json.jab_ket_baru + '</option>';
                // $("#head").empty().append(head).val(json.jab_kode_baru).trigger('change'); 

                $('#flag_level').val(0);
            }else if(json.flag_level_baru==1){ // jika level 1 ingin tambah level 2
                // menampilkan level 0
                $('#isi_flag_level1').show();
                init_isi_flag_level1();
                var elem_level0 = '<option value="' + json.level0_baru + '" selected>' + json.utk_ket_level0_baru + '</option>';
                $("#flag_level0").empty().append(elem_level0).val(json.level0_baru).trigger('change');     

                $("#company_kode").val(json.company_kode_baru);
                $("#company_kode_lama").val(json.company_kode_baru);
                $("#utk_ket").val(json.utk_ket_baru);
                $("#utk_sktn").val(json.utk_sktn_baru);
                $("#penempatan").val(json.penempatan_baru);

                $('#isi_flag_level2').hide();
                $('#isi_flag_level3').hide();
                $('#isi_flag_level4').hide();
                $('#isi_flag_level5').hide();
                $('#isi_flag_level6').hide();
                $('#isi_flag_level7').hide();
                $('.isi_semua').show();                

                // var head = '<option value="' + json.jab_kode_baru + '" selected>' + json.jab_ket_baru + '</option>';
                // $("#head").empty().append(head).val(json.jab_kode_baru).trigger('change');     
                $('#flag_level').val(1);
            }else if(json.flag_level_baru==2){ // jika level 2 ingin tambah level 3
                // menampilkan level 0
                $('#isi_flag_level1').show();
                init_isi_flag_level1();
                var elem_level0 = '<option value="' + json.level0_baru + '" selected>' + json.utk_ket_level0_baru + '</option>';
                $("#flag_level0").empty().append(elem_level0).val(json.level0_baru).trigger('change');     
                // menampilkan parent level 1
                $('#isi_flag_level2').show();
                init_isi_flag_level2();
                var elem_level1 = '<option value="' + json.level1_baru + '" selected>' + json.utk_ket_level1_baru + '</option>';
                $("#flag_level1").empty().append(elem_level1).val(json.level1_baru).trigger('change');     

                $("#company_kode").val(json.company_kode_baru);
                $("#company_kode_lama").val(json.company_kode_baru);
                $("#utk_ket").val(json.utk_ket_baru);                
                $("#utk_sktn").val(json.utk_sktn_baru);
                $("#penempatan").val(json.penempatan_baru);

                $('#isi_flag_level3').hide();
                $('#isi_flag_level4').hide();
                $('#isi_flag_level5').hide();
                $('#isi_flag_level6').hide();
                $('#isi_flag_level7').hide();
                $('.isi_semua').show();                

                // var head = '<option value="' + json.jab_kode_baru + '" selected>' + json.jab_ket_baru + '</option>';
                // $("#head").empty().append(head).val(json.jab_kode_baru).trigger('change');     
                $('#flag_level').val(2);
            }else if(json.flag_level_baru==3){ // jika level 3 ingin tambah level 4
                // menampilkan level 0
                $('#isi_flag_level1').show();
                init_isi_flag_level1();
                var elem_level0 = '<option value="' + json.level0_baru + '" selected>' + json.utk_ket_level0_baru + '</option>';
                $("#flag_level0").empty().append(elem_level0).val(json.level0_baru).trigger('change');     
                // menampilkan parent level 1
                $('#isi_flag_level2').show();
                init_isi_flag_level2();
                var elem_level1 = '<option value="' + json.level1_baru + '" selected>' + json.utk_ket_level1_baru + '</option>';
                $("#flag_level1").empty().append(elem_level1).val(json.level1_baru).trigger('change');     
                // menampilkan parent level 2
                $('#isi_flag_level3').show();
                init_isi_flag_level3();
                var elem_level2 = '<option value="' + json.level2_baru + '" selected>' + json.utk_ket_level2_baru + '</option>';
                $("#flag_level2").empty().append(elem_level2).val(json.level2_baru).trigger('change');     

                $("#company_kode").val(json.company_kode_baru);
                $("#company_kode_lama").val(json.company_kode_baru);
                $("#utk_ket").val(json.utk_ket_baru);
                $("#utk_sktn").val(json.utk_sktn_baru);
                $("#penempatan").val(json.penempatan_baru);

                $('#isi_flag_level4').hide();
                $('#isi_flag_level5').hide();
                $('#isi_flag_level6').hide();
                $('#isi_flag_level7').hide();
                $('.isi_semua').show();                

                // var head = '<option value="' + json.jab_kode_baru + '" selected>' + json.jab_ket_baru + '</option>';
                // $("#head").empty().append(head).val(json.jab_kode_baru).trigger('change');     
                $('#flag_level').val(3);
            }else if(json.flag_level_baru==4){ // jika level 4 ingin tambah level 5
                // menampilkan level 0
                $('#isi_flag_level1').show();
                init_isi_flag_level1();
                var elem_level0 = '<option value="' + json.level0_baru + '" selected>' + json.utk_ket_level0_baru + '</option>';
                $("#flag_level0").empty().append(elem_level0).val(json.level0_baru).trigger('change');     
                // menampilkan parent level 1
                $('#isi_flag_level2').show();
                init_isi_flag_level2();
                var elem_level1 = '<option value="' + json.level1_baru + '" selected>' + json.utk_ket_level1_baru + '</option>';
                $("#flag_level1").empty().append(elem_level1).val(json.level1_baru).trigger('change');     
                // menampilkan parent level 2
                $('#isi_flag_level3').show();
                init_isi_flag_level3();
                var elem_level2 = '<option value="' + json.level2_baru + '" selected>' + json.utk_ket_level2_baru + '</option>';
                $("#flag_level2").empty().append(elem_level2).val(json.level2_baru).trigger('change');     
                // menampilkan parent level 3
                $('#isi_flag_level4').show();
                init_isi_flag_level4();
                var elem_level3 = '<option value="' + json.level3_baru + '" selected>' + json.utk_ket_level3_baru + '</option>';
                $("#flag_level3").empty().append(elem_level3).val(json.level3_baru).trigger('change');     

                $("#company_kode").val(json.company_kode_baru);
                $("#company_kode_lama").val(json.company_kode_baru);
                $("#utk_ket").val(json.utk_ket_baru);
                $("#utk_sktn").val(json.utk_sktn_baru);
                $("#penempatan").val(json.penempatan_baru);

                $('#isi_flag_level5').hide();
                $('#isi_flag_level6').hide();
                $('#isi_flag_level7').hide();
                $('.isi_semua').show();                

                // var head = '<option value="' + json.jab_kode_baru + '" selected>' + json.jab_ket_baru + '</option>';
                // $("#head").empty().append(head).val(json.jab_kode_baru).trigger('change');     
                $('#flag_level').val(4);
            }else if(json.flag_level_baru==5){ // jika level 5 ingin tambah level 6
                // menampilkan level 0
                $('#isi_flag_level1').show();
                init_isi_flag_level1();
                var elem_level0 = '<option value="' + json.level0_baru + '" selected>' + json.utk_ket_level0_baru + '</option>';
                $("#flag_level0").empty().append(elem_level0).val(json.level0_baru).trigger('change');     
                // menampilkan parent level 1
                $('#isi_flag_level2').show();
                init_isi_flag_level2();
                var elem_level1 = '<option value="' + json.level1_baru + '" selected>' + json.utk_ket_level1_baru + '</option>';
                $("#flag_level1").empty().append(elem_level1).val(json.level1_baru).trigger('change');     
                // menampilkan parent level 2
                $('#isi_flag_level3').show();
                init_isi_flag_level3();
                var elem_level2 = '<option value="' + json.level2_baru + '" selected>' + json.utk_ket_level2_baru + '</option>';
                $("#flag_level2").empty().append(elem_level2).val(json.level2_baru).trigger('change');     
                // menampilkan parent level 3
                $('#isi_flag_level4').show();
                init_isi_flag_level4();
                var elem_level3 = '<option value="' + json.level3_baru + '" selected>' + json.utk_ket_level3_baru + '</option>';
                $("#flag_level3").empty().append(elem_level3).val(json.level3_baru).trigger('change');     
                // menampilkan parent level 4
                $('#isi_flag_level5').show();
                init_isi_flag_level5();
                var elem_level4 = '<option value="' + json.level4_baru + '" selected>' + json.utk_ket_level4_baru + '</option>';
                $("#flag_level4").empty().append(elem_level4).val(json.level4_baru).trigger('change');     
                // menampilkan parent level 5

                $("#company_kode").val(json.company_kode_baru);
                $("#company_kode_lama").val(json.company_kode_baru);
                $("#utk_ket").val(json.utk_ket_baru);
                $("#utk_sktn").val(json.utk_sktn_baru);
                $("#penempatan").val(json.penempatan_baru);

                $('#isi_flag_level6').hide();
                $('#isi_flag_level7').hide();
                $('.isi_semua').show();                

                // var head = '<option value="' + json.jab_kode_baru + '" selected>' + json.jab_ket_baru + '</option>';
                // $("#head").empty().append(head).val(json.jab_kode_baru).trigger('change');     
                $('#flag_level').val(5);
            }else if(json.flag_level_baru == 6){ // jika level 6 ingin tambah level 7
                // menampilkan level 0
                $('#isi_flag_level1').show();
                init_isi_flag_level1();
                var elem_level0 = '<option value="' + json.level0_baru + '" selected>' + json.utk_ket_level0_baru + '</option>';
                $("#flag_level0").empty().append(elem_level0).val(json.level0_baru).trigger('change');     
                // menampilkan parent level 1
                $('#isi_flag_level2').show();
                init_isi_flag_level2();
                var elem_level1 = '<option value="' + json.level1_baru + '" selected>' + json.utk_ket_level1_baru + '</option>';
                $("#flag_level1").empty().append(elem_level1).val(json.level1_baru).trigger('change');     
                // menampilkan parent level 2
                $('#isi_flag_level3').show();
                init_isi_flag_level3();
                var elem_level2 = '<option value="' + json.level2_baru + '" selected>' + json.utk_ket_level2_baru + '</option>';
                $("#flag_level2").empty().append(elem_level2).val(json.level2_baru).trigger('change');     
                // menampilkan parent level 3
                $('#isi_flag_level4').show();
                init_isi_flag_level4();
                var elem_level3 = '<option value="' + json.level3_baru + '" selected>' + json.utk_ket_level3_baru + '</option>';
                $("#flag_level3").empty().append(elem_level3).val(json.level3_baru).trigger('change');     
                // menampilkan parent level 4
                $('#isi_flag_level5').show();
                init_isi_flag_level5();
                var elem_level4 = '<option value="' + json.level4_baru + '" selected>' + json.utk_ket_level4_baru + '</option>';
                $("#flag_level4").empty().append(elem_level4).val(json.level4_baru).trigger('change');     
                // menampilkan parent level 5
                $('#isi_flag_level6').show();
                init_isi_flag_level6();
                var elem_level5 = '<option value="' + json.level5_baru + '" selected>' + json.utk_ket_level5_baru + '</option>';
                $("#flag_level5").empty().append(elem_level5).val(json.level5_baru).trigger('change');                    

                $("#company_kode").val(json.company_kode_baru);
                $("#company_kode_lama").val(json.company_kode_baru);
                $("#utk_ket").val(json.utk_ket_baru);
                $("#utk_sktn").val(json.utk_sktn_baru);
                $("#penempatan").val(json.penempatan_baru);

                $('#isi_flag_level7').hide();
                $('.isi_semua').show();                

                // var head = '<option value="' + json.jab_kode_baru + '" selected>' + json.jab_ket_baru + '</option>';
                // $("#head").empty().append(head).val(json.jab_kode_baru).trigger('change');     
                $('#flag_level').val(6);
            }else{
                // menampilkan level 0
                $('#isi_flag_level1').show();
                init_isi_flag_level1();
                var elem_level0 = '<option value="' + json.level0_baru + '" selected>' + json.utk_ket_level0_baru + '</option>';
                $("#flag_level0").empty().append(elem_level0).val(json.level0_baru).trigger('change');     
                // menampilkan parent level 1
                $('#isi_flag_level2').show();
                init_isi_flag_level2();
                var elem_level1 = '<option value="' + json.level1_baru + '" selected>' + json.utk_ket_level1_baru + '</option>';
                $("#flag_level1").empty().append(elem_level1).val(json.level1_baru).trigger('change');     
                // menampilkan parent level 2
                $('#isi_flag_level3').show();
                init_isi_flag_level3();
                var elem_level2 = '<option value="' + json.level2_baru + '" selected>' + json.utk_ket_level2_baru + '</option>';
                $("#flag_level2").empty().append(elem_level2).val(json.level2_baru).trigger('change');     
                // menampilkan parent level 3
                $('#isi_flag_level4').show();
                init_isi_flag_level4();
                var elem_level3 = '<option value="' + json.level3_baru + '" selected>' + json.utk_ket_level3_baru + '</option>';
                $("#flag_level3").empty().append(elem_level3).val(json.level3_baru).trigger('change');     
                // menampilkan parent level 4
                $('#isi_flag_level5').show();
                init_isi_flag_level5();
                var elem_level4 = '<option value="' + json.level4_baru + '" selected>' + json.utk_ket_level4_baru + '</option>';
                $("#flag_level4").empty().append(elem_level4).val(json.level4_baru).trigger('change');     
                // menampilkan parent level 5
                $('#isi_flag_level6').show();
                init_isi_flag_level6();
                var elem_level5 = '<option value="' + json.level5_baru + '" selected>' + json.utk_ket_level5_baru + '</option>';
                $("#flag_level5").empty().append(elem_level5).val(json.level5_baru).trigger('change');     
                // menampilkan parent level 6
                $('#isi_flag_level7').show();
                init_isi_flag_level7();
                var elem_level6 = '<option value="' + json.level5_baru + '" selected>' + json.utk_ket_level6_baru + '</option>';
                $("#flag_level6").empty().append(elem_level6).val(json.level5_baru).trigger('change');     

                $("#company_kode").val(json.company_kode_baru);
                $("#company_kode_lama").val(json.company_kode_baru);
                $("#utk_ket").val(json.utk_ket_baru);
                $("#utk_sktn").val(json.utk_sktn_baru);
                $("#penempatan").val(json.penempatan_baru);

                $('.isi_semua').show();                

                // var head = '<option value="' + json.jab_kode_baru + '" selected>' + json.jab_ket_baru + '</option>';
                // $("#head").empty().append(head).val(json.jab_kode_baru).trigger('change');     
                $('#flag_level').val(7);
            }
        });
    });

    $(document).on('click', 'a.delete-organisasi-btn', function(event) {
        event.preventDefault();
        var konfirmasi = confirm('Anda yakin ingin mengubah status organisasi ini?');
        if (konfirmasi==true){
            Metronic.blockUI();
            if($('.alert-organisasi').length>0)
            {
                $('.alert-organisasi').fadeOut('2000').remove(); 
            }
            if($('.error-organisasi').length>0)
            {
                $('.error-organisasi').fadeOut('2000').remove()
            }           
            var url_action=$(this).attr('href');
            $.getJSON(url_action, function(json, textStatus) {
                if(json.status=="success")
                {
                    var parent_elem=$("<div>").addClass("alert alert-success alert-organisasi");
                    parent_elem.append('<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>');
                    parent_elem.append('<span class="alert-icon"><i class="far fa-bell"></i></span>');
                    var notif_info=$("<div>").addClass('notification-info');
                    notif_info.append('<ul class="clearfix notification-meta"><li class="pull-left notification-sender"> Notification : </li></ul>');
                    notif_info.append('<p>'+json.status_message+'</p>');
                    parent_elem.append(notif_info);
                    $('#wrapper-organisasi-table').prepend(parent_elem);
                }
                else if (json.status="error") 
                {
                    var parrent_error=$("<div>").addClass("form-group col-md-12 col-xs-12 error-notif error-organisasi");
                    var div_error=$("<div>").addClass('callout callout-danger');
                    div_error.append('<strong>Ubah Status Gagal:</strong><br>');
                    div_error.append(json.error_message);
                    parrent_error.append(div_error);
                    $('#wrapper-organisasi-table').prepend(parrent_error);
                }
                Metronic.unblockUI();
                table_organisasi.ajax.reload(null,true);
            }); 
        }
    });

    $(document).on('click', 'a.finalisasi-btn', function(event) {
        event.preventDefault();
        var konfirmasi = confirm('Yakin akan proses data ini? Proses akan melakukan permintaan semua mutasi pegawai dengan unit kerja yang baru');
        if (konfirmasi==true){
            Metronic.blockUI();
            if($('.alert-organisasi').length>0)
            {
                $('.alert-organisasi').fadeOut('2000').remove(); 
            }
            if($('.error-organisasi').length>0)
            {
                $('.error-organisasi').fadeOut('2000').remove()
            }           
            var url_action=$(this).attr('href');
            $.getJSON(url_action, function(json, textStatus) {
                if(json.status=="success")
                {
                    var parent_elem=$("<div>").addClass("alert alert-success alert-organisasi");
                    parent_elem.append('<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>');
                    parent_elem.append('<span class="alert-icon"><i class="far fa-bell"></i></span>');
                    var notif_info=$("<div>").addClass('notification-info');
                    notif_info.append('<ul class="clearfix notification-meta"><li class="pull-left notification-sender"> Notification : </li></ul>');
                    notif_info.append('<p>'+json.status_message+'</p>');
                    parent_elem.append(notif_info);
                    $('#wrapper-organisasi-table').prepend(parent_elem);
                    $('.finalisasi-btn').hide();
                }
                else if (json.status="error") 
                {
                    var parrent_error=$("<div>").addClass("form-group col-md-12 col-xs-12 error-notif error-organisasi");
                    var div_error=$("<div>").addClass('callout callout-danger');
                    div_error.append('<strong>Ubah Status Gagal:</strong><br>');
                    div_error.append(json.error_message);
                    parrent_error.append(div_error);
                    $('#wrapper-organisasi-table').prepend(parrent_error);
                }
                Metronic.unblockUI();
                table_organisasi.ajax.reload(null,true);
            }); 
        }
    });
});