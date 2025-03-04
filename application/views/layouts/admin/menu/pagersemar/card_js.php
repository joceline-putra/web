
<script type="text/javascript">
$(document).ready(function() {
    let identity = 1;
    let url = "<?php base_url('card'); ?>";
    let url_print = "<?php base_url('card'); ?>";
    let url_tool = "<?php base_url('search/manage'); ?>";
    var url_image = "<?php site_url('upload/noimage.png'); ?>";

    let image_width = 240;
    let image_height = 240;

    $(function() {
        setInterval(function(){ 
        }, 3000);
    });


    //Croppie
    var upload_crop_img = $('#modal_croppie_canvas').croppie({
        enableExif: true,
        viewport: {width: image_width, height: image_height},
        boundary: {width: parseInt(image_width)+10, height: parseInt(image_height)+10},
        url: url_image,
    });
    $('.files_link').magnificPopup({
        type: 'image',
        mainClass: 'mfp-with-zoom', // this class is for CSS animation below
            zoom: {
                enabled: true, // By default it's false, so don't forget to enable it
                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function
                // The "opener" function should return the element from which popup will be zoomed in
                // and to which popup will be scaled down
                // By defailt it looks for an image tag:
                opener: function (openerElement) {
                    // openerElement is the element on which popup was initialized, in this case its <a> tag
                    // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
    });
    //Select2
    /*
    $('#select').select2({
        //dropdownParent:$("#modal-id"), //If Select2 Inside Modal
        //placeholder: '<i class="fas fa-search"></i> Search',
        //width:'100%',
        placeholder: {
            id: '0',
            text: '-- Pilih --'
        },
        minimumInputLength: 0,
        allowClear: true,
        ajax: {
            type: "get",
            url: url_tool,
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var query = {
                    search: params.term,
                    action:'search',
                    type: 1,
                    source: 'select_source'
                };
                return query;
            },
            processResults: function (data){
                var datas = [];
                $.each(data, function(key, val){
                    datas.push({
                        'id' : val.id,
                        'text' : val.text
                    });
                });
                return {
                    results: datas
                };
            },
        cache: true
        },
        escapeMarkup: function(markup){ 
            return markup; 
        },
        templateResult: function(datas){ //When Select on Click
            if (!datas.id) { return datas.text; }
            if($.isNumeric(datas.id) == true){
                // return '<i class="fas fa-user-check '+datas.id.toLowerCase()+'"></i> '+datas.text;
                return datas.text;
            }else{
                // return '<i class="fas fa-plus '+datas.id.toLowerCase()+'"></i> '+datas.text;
                return datas.text;
            }
        },
        templateSelection: function(datas) { //When Option on Click
            if (!datas.id) { return datas.text; }
            //Custom Data Attribute
            $(datas.element).attr('data-alamat', datas.alamat);
            return datas.text;
        }
    });
    $("#select").on('change', function(e){
        // Do Something
    });
    */
    // $("select").select2();

    //Date Clock Picker
    $("#card_date").datepicker({
        // defaultDate: new Date(),
        format: 'dd-mm-yyyy',
        autoclose: true,
        enableOnReadOnly: true,
        language: "id",
        todayHighlight: true,
        weekStart: 1 
    }).on('changeDate', function(e){
    });
    $('.clockpicker').clockpicker({
        default: 'now',
        placement: 'bottom',
        align: 'left',
        donetext: 'Done',
        autoclose: true
    }).on('change', function(e){
    });
    $("#filter_start_date, #filter_end_date").datepicker({
        // defaultDate: new Date(),
        format: 'dd-mm-yyyy',
        autoclose: true,
        enableOnReadOnly: true,
        language: "id",
        todayHighlight: true,
        weekStart: 1 
    }).on('changeDate', function(e){
        e.stopImmediatePropagation();
        card_table.ajax.reload();
    });

    //Autonumeric
    const autoNumericOption = {
        digitGroupSeparator : ',', 
        decimalCharacter  : '.',
        decimalCharacterAlternative: '.', 
        decimalPlaces: 0,
        watchExternalChanges: true
    };
    // new AutoNumeric('#some_id', autoNumericOption);

    //Datatable
    let card_table = $("#table_card").DataTable({
        // "processing": true,
        // "rowReorder": { selector: 'td:nth-child(1)'},
        "responsive": true,
        "serverSide": true,
        "ajax": {
            url: url,
            type: 'post',
            dataType: 'json',
            cache: 'false',
            data: function(d) {
                d.action = 'load';
                d.length = $("#filter_length").find(':selected').val();
                // d.date_start = $("#filter_start_date").datepicker("getFormattedDate","yyyy-mm-dd");
                // d.date_end = $("#filter_end_date").datepicker("getFormattedDate","yyyy-mm-dd");
                d.filter_flag = $("#filter_flag").find(':selected').val();
                d.search = {value:$("#filter_search").val()};
            },
            dataSrc: function(data) {
                return data.result;
            }
        },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "columnDefs": [
            {"targets":0, "width":"30%", "title":"Jenis", "searchable":true, "orderable":true},
            {"targets":1, "width":"20%", "title":"Nomor", "searchable":true, "orderable":true},
            {"targets":2, "width":"20%", "title":"Status", "searchable":true, "orderable":true},
        ],
        "order": [[0, 'ASC']],
        "columns": [
            {
                'data': 'card_number',
                className: 'text-left',
                render: function(data, meta, row) {
                    var dsp = '';
                    dsp += row.card_number;
                    return dsp;
                }
            },{
                'data': 'card_type',
                className: 'text-left',
                render: function(data, meta, row) {
                    var dsp = '';
                    dsp += row.card_type;
                    // if(row.contact_email_1 != undefined){
                        // dsp += '<br>'+row.contact_email_1;
                    // }
                    return dsp;
                }
            },{
                'data': 'card_flag',
                className: 'text-left',
                render: function(data, meta, row) {
                    var dsp = ''; var label = 'Error Status'; var icon = 'fas fa-cog'; var color = 'white'; var bgcolor = '#d1dade';
                    if(parseInt(row.card_flag) == 1){
                    //  dsp += '<label style="color:#6273df;">Aktif</label>';
                       label = 'Aktif';
                       icon = 'fas fa-lock';
                       bgcolor = '#0aa699';
                    }else if(parseInt(row.card_flag) == 4){
                       //  dsp += '<label style="color:#ff194f;">Terhapus</label>';
                       label = 'Terhapus';
                       icon = 'fas fa-trash';
                       bgcolor = '#f35958';
                    }else if(parseInt(row.card_flag) == 0){
                       //   dsp += '<label style="color:#ff9019;">Nonaktif</label>';
                       label = 'Nonaktif';
                       icon = 'fas fa-unlock';
                       // color = 'green';
                       bgcolor = '#ff9019';
                    }

                        /* Button Action Concept 1 */
                        dsp += '&nbsp;<button class="btn btn_print_card btn-mini btn-primary"';
                        dsp += 'data-card-id="'+data+'" data-card-name="'+row.card_name+'" data-card-flag="'+row.card_flag+'" data-card-session="'+row.card_session+'">';
                        dsp += '<span class="fas fa-qrcode primary"></span> Lihat</button>';

                        // dsp += '&nbsp;<button class="btn btn_delete_card btn-mini btn-danger"';
                        // dsp += 'data-card-id="'+data+'" data-card-name="'+row.card_name+'" data-card-flag="4" data-card-session="'+row.card_session+'">';
                        // dsp += '<span class="fas fa-trash danger"></span> Hapus</button>';

                        // if (parseInt(row.card_flag) === 1) {
                        //     dsp += '&nbsp;<button class="btn btn_update_flag_card btn-mini btn-primary" style="background-color:#ff9019;"';
                        //     dsp += 'data-card-id="'+data+'" data-card-name="'+row.card_name+'" data-card-flag="0" data-card-session="'+row.card_session+'">';
                        //     dsp += '<span class="fas fa-ban"></span> Nonaktifkan</button>';                      
                        // }else if (parseInt(row.card_flag) === 0) {
                        //     dsp += '&nbsp;<button class="btn btn_update_flag_card btn-mini btn-primary" style="background-color:#6273df;"';
                        //     dsp += 'data-card-id="'+data+'" data-card-name="'+row.card_name+'" data-card-flag="1" data-card-session="'+row.card_session+'">';
                        //     dsp += '<span class="fas fa-check primary"></span> Aktifkan</button>';
                        // }


                       /* Button Action Concept 2 */
                    //    dsp += '&nbsp;<div class="btn-group">';
                    //    // dsp += '    <button class="btn btn-mini btn-default" style="background-color:'+bgcolor+';color:'+color+'"><span class="'+icon+'"></span> '+label+'</button>';
                    //    dsp += '    <button class="btn btn-mini btn-default dropdown-toggle btn-demo-space" style="background-color:'+bgcolor+';color:'+color+';" data-toggle="dropdown" aria-expanded="true"><span class="'+icon+'"></span> '+label+' <span class="caret" style="color:'+color+'"></span> </button>';
                    //    dsp += '    <ul class="dropdown-menu">';
                    //    if(parseInt(row.card_flag) == 1){
                    //            dsp += '<li>';
                    //            dsp += '    <a class="btn_update_flag_card" style="cursor:pointer;"';
                    //            dsp += '        data-card-id="'+data+'" data-card-name="'+row.card_name+'" data-card-flag="'+row.card_flag+'" data-card-session="'+row.card_session+'">';
                    //            dsp += '        <span class="fas fa-ban"></span> Nonaktifkan';
                    //            dsp += '    </a>';
                    //            dsp += '</li>';
                    //    }else if(parseInt(row.card_flag) == 0) {
                    //            dsp += '<li>'; 
                    //            dsp += '    <a class="btn_update_flag_card" style="cursor:pointer;"';
                    //            dsp += '        data-card-id="'+data+'" data-card-name="'+row.card_name+'" data-card-flag="'+row.card_flag+'" data-card-session="'+row.card_session+'">';
                    //            dsp += '        <span class="fas fa-lock"></span> Aktifkan';
                    //            dsp += '    </a>';
                    //            dsp += '</li>';
                    //    }
                    //    dsp += '    </ul>';
                    //    dsp += '</div>';
                    return dsp;
                }
            }
        ],
        "language": {
            "sProcessing":    "Sedang memuat",
            "sLengthMenu":    "Tampil _MENU_ data",
            "sZeroRecords":   "Data tidak ada",
            "sEmptyTable":    "Data tidak ada",
            "sInfo":          "Data _START_ sampai _END_ dari _TOTAL_ data",
            "sInfoEmpty":     "Data 0 sampai 0 dari 0 data",
            "sInfoFiltered":  "(saring total _MAX_ data)",
            "sInfoPostFix":   "",
            "sSearch":        "Cari:",
            "sUrl":           "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Loading...",
            "oPaginate": {
                "sFirst":    "Pertama",
                "sLast":    "Terakhir",
                "sNext":    "Selanjutnya",
                "sPrevious": "Sebelumnya"
            },
            "oAria": {
                "sSortAscending":  ": Mengurutkan A-Z / 0-9",
                "sSortDescending": ": Mengurutkan Z-A / 9-0"
            }
        }
    });
    $("#table_card_filter").css('display','none');
    $("#table_card_length").css('display','none');
    $("#filter_length").on('change', function(e){
        var value = $(this).find(':selected').val(); 
        $('select[name="table_card_length"]').val(value).trigger('change');
        card_table.ajax.reload();
    });
    $("#filter_flag").on('change', function(e){ card_table.ajax.reload(); });
    $("#filter_search").on('input', function(e){ var ln = $(this).val().length; if(parseInt(ln) > 3){ card_table.ajax.reload(); }else if(parseInt(ln) < 1){ card_table.ajax.reload();} });
    $('#table_card').on('page.dt', function () {
        var info = cards.page.info();
        var limit_start = info.start;
        var limit_end = info.end;
        var length = info.length;
        var page = info.page;
        var pages = info.pages;
        // console.log( 'Showing page: '+info.page+' of '+info.pages);
        // console.log(limit_start,limit_end);
        $("#table_card-in").attr('data-limit-start',limit_start);
        $("#table_card-in").attr('data-limit-end',limit_end);
    });

    //CRUD
    $(document).on("click","#btn_save_card",function(e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        var next =true;
        if($("#card_name").val().length == 0){
            notif(0,'card_NAME wajib diisi');
            $("#card_name").focus();
            next=false;
        }else if($("#card_note").val().length == 0){
            notif(0,'card_NOTE wajib diisi');
            $("#card_note").focus();
            next=false;
        }
        // }else if($("#card_flag").find(':selected').val() == 0){
        //     notif(0,'card_FLAG wajib diisi');
        //     $("#card_flag").focus();
        //     next=false;
        // }else
        
        if(next){
            var form = new FormData($("#form_card")[0]);
            // var form = new FormData();
            form.append('action', 'create');
            form.append('upload1', $("#card_preview").attr('data-save-img'));
            $.ajax({
                type: "POST",
                url: url,
                data: form, dataType:"json",
                cache: false, contentType: false, processData: false,
                beforeSend:function(){},
                success:function(d){
                    var s = d.status;
                    var m = d.message;
                    var r = d.result;
                    if(parseInt(s) == 1){
                        notif(s,m);
                        formcardReset();
                        /* hint zz_for or zz_each */
                        card_table.ajax.reload();
                    }else{
                        notif(s,m);
                    }
                },
                error:function(xhr,status,err){
                    notif(0,err);
                }
            });
        }
    });
    $(document).on("click",".btn_edit_card",function(e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        var id       = $(this).attr('data-card-id');
        var session  = $(this).attr('data-card-session');
        var name     = $(this).attr('data-card-name');

        var form = new FormData();
        form.append('action', 'read');
        form.append('card_id', id);
        form.append('card_session', session);
        form.append('card_name', name);
        $.ajax({
            type: "post",
            url: url,
            data: form, dataType:"json",
            cache: false, contentType: false, processData: false,
            beforeSend:function(){},
            success:function(d){
                var s = d.status;
                var m = d.message;
                var r = d.result;
                if(parseInt(s)==1){ /* Success Message */
                    $("#div_form_card").show(300);
                    
                    $("#card_id").val(d.result.card_id);
                    $("#card_session").val(d.result.card_session);
                    $("#card_type").val(d.result.card_type).trigger('change');
                    $("#card_name").val(d.result.card_name);
                    // $("#card_note").val(d.result.card_note);
                    $('#card_note').summernote('code', d.result.card_note);
                    $("#card_flag").val(d.result.card_flag).trigger('change');
                    // $("#card_date_created").val(d.result.card_date_created);

                    $("#files_preview").attr('src',d.result.card_image);
                    $(".files_link").attr('href',d.result.card_image);

                    $("#btn_new_card").hide();
                    $("#btn_save_card").hide();
                    $("#btn_update_card").show();
                    $("#btn_cancel_card").show();
                    // scrollUp('content');
                    formcardSetDisplay(0);
                    //loadcardItem(r.card_id);
                    //formcardItemSetDisplay(0);
                }else{
                    $("#div_form_card").hide(300);
                    notif(0,d.message);
                }
            },
            error:function(xhr, Status, err){
                notif(0,'Error');
            }
        });
    });
    $(document).on("click","#btn_update_card",function(e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        var next =true;
        var id = $("#card_id").val();
        var session = $("#card_session").val();
        if(parseInt(id) > 0){
            if($("#card_type").val().length == 0){
                notif(0,'card_TYPE wajib diisi');
                $("#card_type").focus();
                next=false;
            }else if($("#card_name").val().length == 0){
                notif(0,'card_NAME wajib diisi');
                $("#card_name").focus();
                next=false;
            }else if($("#card_note").val().length == 0){
                notif(0,'card_NOTE wajib diisi');
                $("#card_note").focus();
                next=false;
            }else if($("#card_flag").val().length == 0){
                notif(0,'card_FLAG wajib diisi');
                $("#card_flag").focus();
                next=false;
            }else{
                var form = new FormData($("#form_card")[0]);
                form.append('action', 'update');
                form.append('card_id', id);
                form.append('card_session', session);
                form.append('upload1', $("#card_preview").attr('data-save-img'));
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form,
                    dataType:"json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend:function(){},
                    success:function(d){
                        var s = d.status;
                        var m = d.message;
                        var r = d.result;
                        if(parseInt(s)==1){
                            formcardReset();
                            notif(s,m);
                            card_table.ajax.reload(null,false);
                        }else{
                            notif(s,m);  
                        }
                    },
                    error:function(xhr, Status, err){
                        notif(0,err);
                    }
                });
            }
        }else{
            notif(0,'Data belum dibuka');
        }
    });
    $(document).on("click",".btn_delete_card",function(e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        var next     = true;
        var id       = $(this).attr('data-card-id');
        var session  = $(this).attr('data-card-session');
        var name     = $(this).attr('data-card-name');

        $.confirm({
            title: 'Hapus!',
            content: 'Apakah anda ingin menghapus <b>'+name+'</b> ?',
            buttons: {
                confirm:{ 
                    btnClass: 'btn-danger',
                    text: 'Ya',
                    action: function () {
                        
                        var form = new FormData();
                        form.append('action', 'delete');
                        form.append('card_id', id);
                        form.append('card_session', session);
                        form.append('card_name', name);
                        form.append('card_flag', 4);

                        $.ajax({
                            type: "POST",
                            url : url,
                            data: form,
                            dataType:'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            success:function(d){
                                if(parseInt(d.status)==1){ 
                                    notif(d.status,d.message); 
                                    card_table.ajax.reload(null,false);
                                }else{ 
                                    notif(d.status,d.message); 
                                }
                            }
                        });
                    }
                },
                cancel:{
                    btnClass: 'btn-success',
                    text: 'Batal', 
                    action: function () {
                        // $.alert('Canceled!');
                    }
                }
            }
        });
    });

    $(document).on("click",".btn_update_flag_card",function(e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        var next     = true;
        var id       = $(this).attr('data-card-id');
        var session  = $(this).attr('data-card-session');
        var name     = $(this).attr('data-card-name');
        var flag     = $(this).attr('data-card-flag');

        if(parseInt(flag) == 0){
            var set_flag = 0;
            var msg = 'menonaktifkan';
        }else if(parseInt(flag) == 1){
            var set_flag = 1;
            var msg = 'mengaktifkan';
        }else{
            var set_flag = 4;
            var msg = 'menghapus';
        }

        $.confirm({
            title: 'Konfirmasi!',
            content: 'Apakah anda ingin '+msg+' <b>'+name+'</b> ?',
            buttons: {
                confirm:{ 
                    btnClass: 'btn-danger',
                    text: 'Ya',
                    action: function () {
                        
                        var form = new FormData();
                        form.append('action', 'update_flag');
                        form.append('card_id', id);
                        form.append('card_session', session);
                        form.append('card_name', name);
                        form.append('card_flag', set_flag);

                        $.ajax({
                            type: "POST",
                            url : url,
                            data: form,
                            dataType:'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            success:function(d){
                                if(parseInt(d.status)==1){ 
                                    notif(d.status,d.message); 
                                    card_table.ajax.reload(null,false);
                                }else{ 
                                    notif(d.status,d.message); 
                                }
                            }
                        });
                    }
                },
                cancel:{
                    btnClass: 'btn-success',
                    text: 'Batal', 
                    action: function () {
                        // $.alert('Canceled!');
                    }
                }
            }
        });
    });

    //Additional
    $(document).on("click","#btn_new_card",function(e) {
        formcardReset();
        formcardSetDisplay(0);
        // $("#div_form_card").show(300);
        // $("#btn_new_card").hide(300);
        $("#modal_card").modal('show');
    });
    $(document).on("click","#btn_cancel_card",function(e) {
        formcardReset();
        formcardSetDIsplay(1);
        // $("#div_form_card").hide(300);
        // $("#btn_new_card").show(300);
    });
    $(document).on("click",".btn_print_card",function(e) {
        e.preventDefault();
        e.stopPropagation();
        console.log($(this));
        var id = $(this).attr('data-card-id');
        var session = $(this).attr('data-card-session');
        // if(parseInt(id) > 0){
            var x = screen.width / 2 - 700 / 2;
            var y = screen.height / 2 - 450 / 2;
            // http://localhost/git/web/pagersemar/card?action=print&data=VUAMYO8S2I6X1W82B9WL
            var print_url = url_print+'card_info/'+session;
            var win = window.open(print_url,'Print','width=700,height=485,left=' + x + ',top=' + y + '');
            //var win = window.open(print_url,'_blank');
        // }else{
            // notif(0,'Dokumen belum di buka');
        // }
    });
    $(document).on("click","#btn_export_card",function(e) {
        e.stopPropagation();
        $.alert('Fungsi belum dibuat');
    });
    $(document).on("click","#btn_print_card",function(e) {
        e.preventDefault();
        e.stopPropagation();
        console.log($(this));
        // var id = $(this).attr('data-card-id');
        $.alert('Fungsi belum dibuat');
    });
    $(document).on("click","#btn_cancel_card_item",function(e) {
        formcardItemReset();
    });
    function loadcardItem(card_id = 0){
        if(parseInt(card_id) > 0){
            $.ajax({
                type: "post",
                url: "<?= base_url('card'); ?>",
                data: {
                    action:'load_card_item_2',
                    card_item_card_id:card_id
                },
                dataType: 'json', cache: 'false', 
                beforeSend:function(){},
                success:function(d){
                    let s = d.status;
                    let m = d.message;
                    let r = d.result;
                    if(parseInt(s) == 1){
                        notif(s,m);
                        // zz_for, zz_each, zz_for_group, zz_each_group
                    }else{
                        notif(s,m);
                    }
                },
                error:function(xhr,status,err){
                    notif(0,err);
                }
            });
        }else{

        }
    }
    /*
    $('#files').change(function(e) {
        var fileName = e.target.files[0].name;
        var fileReader = new FileReader();
        fileReader.onload = function(e) {
            $('#files_preview').attr('src', e.target.result).width(150).height(150);
            $('.files_link').attr('href', e.target.result);
        };
        fileReader.readAsDataURL(this.files[0]);
    });
    */

    //Image Croppie
    $(document).on('change', '#files', function(e) {
        if($("#files").val() == ''){
            $("#files_preview").attr('src', url_image);
            $("#files_link").attr('href', url_image);
            $("#files_preview").attr('data-save-img', '');
            return;
        }
        var reader = new FileReader();
        reader.onload = function(e) {
        upload_crop_img.croppie('bind', {
            url: e.target.result
            }).then(function () {
                $("#modal-croppie").modal("show");
                    setTimeout(function(){$('#modal_croppie_canvas').croppie('bind');}, 300);
            });
        };
        reader.readAsDataURL(this.files[0]);
    });
    $(document).on('click', '#modal_croppie_cancel', function(e){
        e.preventDefault(); e.stopPropagation();
        $("#files").val('');
        $("#files_preview").attr('data-save-img', '');
        $("#files_preview").attr('src', url_image);
        $("#files_link").attr('href', url_image);
    });
    $(document).on('click', '#modal_croppie_save', function(e){
        e.preventDefault(); e.stopPropagation();
        upload_crop_img.croppie('result', {
            type: 'canvas',
            size: 'viewport',
        }).then(function (resp) {
            $("#files_preview").attr('src', resp);
            $("#files_link").attr('href', resp);
            $("#files_preview").attr('data-save-img', resp);
            $("#modal-croppie").modal("hide");
        });
    });


// window.setInterval(loadPlugin(),3000);
function loadPlugin(){
}
function formcardReset(){
    $("#form_card input")
    .not("input[id='card_hour']")
    .not("input[id='card_date']")
    .not("input[id='card_date_start']")
    .not("input[id='card_date_end']").val('');
    $("#form_card textarea").val('');

    $("#files_link").attr('href',url_image);
    $("#files_preview").attr('src',url_image);
    $("#files_preview").attr('data-save-img',url_image);

    $("#btn_save_card").show();
    $("#btn_update_card").hide();
    $("#btn_cancel_card").show();
    $("#div_form_card").hide(300);
} 
function formcardItemReset(){
    $("#form_card_item input")
    .not("input[id='card_item_date_start']")
    .not("input[id='card_item_date_end']").val('');
    $("#form_card_item textarea").val('');
  
    $("#btn_save_card_item").show(300);
    $("#btn_update_card_item").hide(300);
    $("#btn_cancel_card_item").hide(300);
} 
}); //End of Document Ready
function formcardSetDisplay(value){ // 1 = Untuk Enable/ ditampilkan, 0 = Disabled/ disembunyikan
    if(value == 1){ var flag = true; }else{ var flag = false; }
    //Attr Input yang perlu di setel
    var form = '#form_card'; 
    var attrInput = [
       "card_name","card_date","card_hour","card_count","card_initial"
    ];
    for (var i=0; i<=attrInput.length; i++) { $(""+ form +" input[name='"+attrInput[i]+"']").attr('readonly',flag); }

    //Attr Textarea yang perlu di setel
    var attrText = [
       "card_note"
    ];
    for (var i=0; i<=attrText.length; i++) { $(""+ form +" textarea[name='"+attrText[i]+"']").attr('readonly',flag); }

    //Attr Select yang perlu di setel
    var atributSelect = [
       "card_flag",
       "card_type",
    ];
    for (var i=0; i<=atributSelect.length; i++) { $(""+ form +" select[name='"+atributSelect[i]+"']").attr('disabled',flag); }
}
function formcardItemSetDisplay(value){ // 1 = Untuk Enable/ ditampilkan, 0 = Disabled/ disembunyikan
    if(value == 1){ var flag = true; }else{ var flag = false; }
    //Attr Input yang perlu di setel
    var form = '#form_card_item'; 
    var attrInput = [
       "card_value"
    ];
    for (var i=0; i<=attrInput.length; i++) { $(""+ form +" input[name='"+attrInput[i]+"']").attr('readonly',flag); }

    //Attr Textarea yang perlu di setel
    var attrText = [
    ];
    for (var i=0; i<=attrText.length; i++) { $(""+ form +" textarea[name='"+attrText[i]+"']").attr('readonly',flag); }

    //Attr Select yang perlu di setel
    var atributSelect = [
       "card_name",
    ];
    for (var i=0; i<=atributSelect.length; i++) { $(""+ form +" select[name='"+atributSelect[i]+"']").attr('disabled',flag); }
}
</script>