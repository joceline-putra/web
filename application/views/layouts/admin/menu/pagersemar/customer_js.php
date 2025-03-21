<script>
    $(document).ready(function () {
        $("#checkbox_customer").prop("checked", true);
        // $.alert('Create Update CATEGORIES');
        var identity = "<?php echo $identity; ?>";
        var view = "<?php echo $_view; ?>";
        var url = "<?= base_url('kontak/manage'); ?>";
        var url_image = "<?= site_url('upload/noimage.png'); ?>";
        let url_print = "<?php base_url('card'); ?>";
        var url_finance = "<?= base_url('keuangan/manage'); ?>";
        var url_print_buy = "<?= base_url('transaksi/print_history'); ?>";        
        // $("#img-preview1").attr('src', url_image);
        // console.log("Identity:"+identity,"View:"+view);
        var alias = "<?= $title; ?>";
        
        $(".nav-tabs").find('li[class="active"]').removeClass('active');
        $(".nav-tabs").find('li[data-name="contact/customer"]').addClass('active');

        let image_width = "<?= $image_width;?>";
        let image_height = "<?= $image_height;?>";  

        //Croppie
        var upload_crop_img = null;
        upload_crop_img = $('#modal-croppie-canvas').croppie({
            enableExif: true,
            viewport: {width: image_width, height: image_height},
            boundary: {width: parseInt(image_width)+10, height: parseInt(image_height)+10},
            url: url_image,
        });

        // $("select").select2();
        $(".date").datepicker({
            // defaultDate: new Date(),
            format: 'yyyy-mm-dd',
            autoclose: true,
            enableOnReadOnly: true,
            language: "id",
            todayHighlight: true,
            weekStart: 1
        });
        //Autonumeric
        const autoNumericOption = {
            digitGroupSeparator: ',',
            decimalCharacter: '.',
            decimalCharacterAlternative: '.',
            decimalPlaces: 2,
            watchExternalChanges: true //!!!        
        };
        // new AutoNumeric('#contact_receivable_limit', autoNumericOption);

        // $("#filter_search").focus();
        var index = $("#table-data").DataTable({
            // "processing": true,
            // "responsive": true,
            "serverSide": true,
            "ajax": {
                url: url,
                type: 'post',
                dataType: 'json',
                cache: 'false',
                data: function (d) {
                    d.action = 'load';
                    d.tipe = identity;
                    d.length = $("#filter_length").find(':selected').val();
                    // d.filter_flag = $("#filter_flag").find(':selected').val();
                    // d.filter_categories = $("#filter_categories").find(':selected').val();                    
                    d.search = {
                        value: $("#filter_search").val()
                    };
                },
                dataSrc: function (data) {
                    return data.result;
                }
            },
            "columnDefs": [
                {"targets": 0, "title": "Nomor", "searchable": true, "orderable": true, "width":"25%"},
                {"targets": 1, "title": "Nama", "searchable": true, "orderable": true, "width":"15%"},
                {"targets": 2, "title": "Handphone", "searchable": true, "orderable": true, "width":"25%"},
                {"targets": 3, "title": "Informasi", "searchable": true, "orderable": true, "width":"20%"},
                {"targets": 4, "title": "Action", "searchable": false, "orderable": false, "width":"15%"}
            ],
            "order": [
                [0, 'asc']
            ],
            "columns": [
                {
                    'data': 'card_number',
                    className: 'text-left',
                    render: function (data, meta, row) {
                        var dsp = '';
                        // if (row.contact_code != undefined) {
                        //     // dsp += '<br><label class="label label-inverse" style="padding:1px 4px;">' + row.contact_code+'</label>';
                        //     dsp += data;
                        // }           
                        dsp += data+'<br>'+row.card_type;                   
                        return dsp;
                    }
                }, {
                    'data': 'contact_name',
                    className: 'text-left',
                    render: function (data, meta, row) {
                        var dsp = '';
                        // dsp += '<a class="btn-edit" style="cursor:pointer"';
                        // dsp += 'data-nama="' + row.contact_name + '" data-kode="' + row.contact_code + '" data-id="' + data + '" data-flag="' + row.contact_flag + '">';
                        // dsp += row.contact_name + '</a>';   
                        dsp += data;       
                        // dsp += '<br>'+row.card_number;                
                        return dsp;
                    }
                }, {
                    'data': 'contact_phone_1',
                    className: 'text-left',
                    render: function (data, meta, row) {
                        var dsp = '';
                        dsp += row.contact_phone_1;
                        // if (row.contact_email_1 != undefined) {
                        //     dsp += '<br>' + row.contact_email_1;
                        // }
                        return dsp;
                    }
                }, {
                    'data': 'branch_name',
                    className: 'text-left',
                    render: function (data, meta, row) {
                        var dsp = '';
                        // if (row.contact_address != undefined) {
                        //     dsp += row.contact_address + '<br>';
                        // }
                        dsp += 'Via: '+data + ' Date: '+moment(row.contact_date_created).format("DD-MMM-YYYY, HH:mm");
                        // if (row.contact_category_id != undefined) {
                        //     dsp += '<label class="label label-inverse" style="padding:1px 4px;">' + row.category_name+'</label>';
                        // }      
                        return dsp;
                    }
                }, {
                    'data': 'contact_id',
                    className: 'text-left',
                    render: function (data, meta, row) {
                        var dsp = '';
                        // dsp += '<a href="#" class="activation-data mr-2" data-id="' + data + '" data-stat="' + row.flag + '">';
                        dsp += '<button class="btn-edit btn btn-mini btn-primary" data-id="' + data + '">';
                        dsp += '<span class="fas fa-edit"></span>Edit';
                        dsp += '</button>';

                        dsp += '&nbsp;<button class="btn btn_print_card btn-mini btn-primary"';
                        dsp += 'data-card-id="'+data+'" data-card-name="'+row.card_name+'" data-card-flag="'+row.card_flag+'" data-card-session="'+row.card_session+'">';
                        dsp += '<span class="fas fa-qrcode primary"></span> Print</button>';
                        // if (parseInt(row.contact_flag) === 1) {
                        //     dsp += '&nbsp;<button class="btn btn-set-active btn-mini btn-success"';
                        //     dsp += 'data-nama="' + row.contact_name + '" data-kode="' + row.contact_code + '" data-id="' + data + '" data-flag="' + row.contact_flag + '">';
                        //     dsp += '<span class="fas fa-user-check primary"></span> Aktif</button>';
                        // } else {
                        //     dsp += '&nbsp;<button class="btn btn-set-active btn-mini btn-danger"';
                        //     dsp += 'data-nama="' + row.contact_name + '" data-kode="' + row.contact_code + '" data-id="' + data + '" data-flag="' + row.contact_flag + '">';
                        //     dsp += '<span class="fas fa-user-alt-slash danger"></span> Nonaktif</button>';
                        // }

                        return dsp;
                    }
                }]
        });

        //Datatable Config
        $("#table-data_filter").css('display', 'none');
        $("#table-data_length").css('display', 'none');
        $("#filter_length").on('change', function (e) {
            var value = $(this).find(':selected').val();
            $('select[name="table-data_length"]').val(value).trigger('change');
            index.ajax.reload();
        });
        $("#filter_flag").on('change', function (e) {
            index.ajax.reload();
        });
        $("#filter_categories").on('change', function (e) {
            index.ajax.reload();
        });        
        $("#filter_search").on('input', function (e) {
            var ln = $(this).val().length;
            if (parseInt(ln) > 3) {
                index.ajax.reload();
            } else if (parseInt(ln) < 1) {
                index.ajax.reload();
            }
        });
        $('#table-data').on('page.dt', function () {
            var info = index.page.info();
            var limit_start = info.start;
            var limit_end = info.end;
            var length = info.length;
            var page = info.page;
            var pages = info.pages;
            // console.log( 'Showing page: '+info.page+' of '+info.pages);
            // console.log(limit_start,limit_end);
            $("#table-data-in").attr('data-limit-start', limit_start);
            $("#table-data-in").attr('data-limit-end', limit_end);
        });

        $('#categories').select2({
            placeholder: '--- Semua ---',
            minimumInputLength: 0,
            ajax: {
                type: "get",
                url: "<?= base_url('search/manage'); ?>",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        search: params.term,
                        tipe: 4, //1=Produk, 2=News
                        source: 'categories'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            templateSelection: function (data, container) {
                // Add custom attributes to the <option> tag for the selected option
                // $(data.element).attr('data-custom-attribute', data.customValue);
                // $("input[name='satuan']").val(data.satuan);
                return data.text;
            }
        });        
        $('#filter_categories').select2({
            placeholder: '--- Semua ---',
            minimumInputLength: 0,
            ajax: {
                type: "get",
                url: "<?= base_url('search/manage'); ?>",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        search: params.term,
                        tipe: 4, //1=Produk, 2=News
                        source: 'categories'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            templateSelection: function (data, container) {
                // Add custom attributes to the <option> tag for the selected option
                // $(data.element).attr('data-custom-attribute', data.customValue);
                // $("input[name='satuan']").val(data.satuan);
                return data.text;
            }
        });
        $('#contact_parent_id').select2({
            placeholder: '--- Pilih ---',
            minimumInputLength: 0,
            ajax: {
                type: "get",
                url: "<?= base_url('search/manage'); ?>",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        search: params.term,
                        source: 'contacts',
                        tipe:3
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) {
                return markup;
            },
            templateResult: function (datas) { //When Select on Click
                if (!datas.id) {
                    return datas.text;
                }
                // return '<i class="fas fa-balance-scale '+datas.id.toLowerCase()+'"></i> '+datas.text;
                if ($.isNumeric(datas.id) == true) {
                    // return '<i class="fas fa-user-check '+datas.id.toLowerCase()+'"></i> '+datas.text;
                    return datas.text;
                } else {
                    // return '<i class="fas fa-plus '+datas.id.toLowerCase()+'"></i> '+datas.text;    
                }
            },
            templateSelection: function (datas) { //When Option on Click
                if (!datas.id) {
                    return datas.text;
                }
                //Custom Data Attribute         
                return datas.text;
            }
        });

        // New Button
        $(document).on("click", "#btn-new", function (e) {
            formNew();
            // $("#div-form-trans").show(300);
            $("#div-form-trans").show(300);
            $(this).hide();
            // animateCSS('#btn-new', 'backOutLeft','true');

            // btnNew.classList.add('animate__animated', 'animate__fadeOutRight');
        });
        // Cancel Button
        $(document).on("click", "#btn-cancel", function (e) {
            e.preventDefault();
            formCancel();
            $("#img-preview1").attr('src', url_image);
        });
        // Save Button 
        $(document).on("click", "#btn-save", function (e) {
            e.preventDefault();
            var next = true;

            var kode = $("#form-master input[name='kode']");
            var nama = $("#form-master input[name='nama']");

            //Contact Type
            var type_supplier = ($("#checkbox_supplier").is(':checked') == true) ? 1 : 0;
            var type_customer = ($("#checkbox_customer").is(':checked') == true) ? 1 : 0;
            var type_karyawan = ($("#checkbox_karyawan").is(':checked') == true) ? 1 : 0;

            // if (next == true) {
            //     if ($("input[id='kode']").val().length == 0) {
            //         notif(0, 'Kode wajib diisi');
            //         $("#kode").focus();
            //         next = false;
            //     }
            // }

            if (next == true) {
                if ($("input[id='nama']").val().length == 0) {
                    notif(0, 'Nama wajib diisi');
                    $("#nama").focus();
                    next = false;
                }
            }

            if (next == true) {
                if ($("input[id='telepon_1']").val().length == 0) {
                    notif(0, 'Telepon 1 wajib diisi');
                    $("#telepon_1").focus();
                    next = false;
                }
            }

            if (next == true) {
                if ($("textarea[id='alamat']").val().length == 0) {
                    notif(0, 'Alamat wajib diisi');
                    $("#alamat").focus();
                    next = false;
                }
            }

            if (next == true) {

                var form = new FormData();
                form.append('action', 'create');
                // form.append('upload1', $('#upload1')[0].files[0]);
                form.append('tipe', identity);
                form.append('kode', $('#kode').val());
                form.append('nama', $('#nama').val());
                form.append('perusahaan', $('#perusahaan').val());
                form.append('telepon_1', $('#telepon_1').val());
                // form.append('telepon_2', $('#telepon_2').val());      
                form.append('email_1', $('#email_1').val());
                // form.append('email_2', $('#email_2').val());
                form.append('alamat', $('#alamat').val());
                form.append('status', $('#status').find(':selected').val());
                form.append('supplier', type_supplier);
                form.append('customer', type_customer);
                form.append('karyawan', type_karyawan);   
                form.append('categories', $('#categories').find(':selected').val());
                form.append('upload1', $("#files_preview").attr('data-save-img'));                           
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        $("#btn-save").attr('disabled',true);
                        notif(1,'Sedang menambahkan');                    
                    },
                    success: function (d) {
                        if (parseInt(d.status) == 1) {
                            notif(1, d.message);
                            index.ajax.reload();
                            formCancel();
                        } else {
                            notif(0, d.message);
                        }
                        $("#btn-save").attr('disabled',false);
                    },
                    error: function (xhr, Status, err) {
                        notif(0, 'Error');
                    }
                });
            }
        });

        // Edit Button
        $(document).on("click", ".btn-edit", function (e) {
            formMasterSetDisplay(0);
            // $("#form-master input[name='kode']").attr('readonly',true);
            $("#div-form-trans").show(300);
            e.preventDefault();
            var id = $(this).data("id");
            var data = {
                action: 'read',
                id: id
            }
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: 'json',
                cache: false,
                beforeSend: function () {
                    $("#checkbox_supplier").prop("checked", false);
                    $("#checkbox_customer").prop("checked", false);
                    $("#checkbox_karyawan").prop("checked", false);
                },
                success: function (d) {
                    if (parseInt(d.status) == 1) { /* Success Message */
                        //activeTab('tab1'); // Open/Close Tab By ID
                        // notif(1,d.result.contact_id);
                        $("#form-master input[id='id_document']").val(d.result.contact_id);
                        // $("#form-master input[name='kode']").val(d.result.contact_code);
                        if(d.result.contact_card_session != undefined){
                            var ret = d.result.card_number+' - '+d.result.card_type;
                        }else{
                            var ret = '';
                        }
                        console.log(ret);
                        $("#form-master input[name='kode']").val(ret);                        
                        $("#form-master input[name='nama']").val(d.result.contact_name);
                        $("#form-master input[name='telepon_1']").val(d.result.contact_phone_1);
                        $("#form-master input[name='telepon_2']").val(d.result.contact_phone_2);
                        $("#form-master input[name='email_1']").val(d.result.contact_email_1);
                        $("#form-master input[name='email_2']").val(d.result.contact_email_2);
                        $("#form-master textarea[name='alamat']").val(d.result.contact_address);
                        $("#form-master select[name='status']").val(d.result.contact_flag).trigger('change');

                        $("#form-master input[name='handphone']").val(d.result.contact_handphone);
                        $("#form-master input[name='fax']").val(d.result.contact_fax);
                        $("#form-master input[name='npwp']").val(d.result.contact_npwp);

                        if(d.result.contact_category_id != undefined){
                            $("select[name='categories']").append('' +
                                    '<option value="' + d.result.category_id + '">' +
                                    d.result.category_name +
                                    '</option>');
                            $("select[name='categories']").val(d.result.category_id).trigger('change');
                        }

                        //Contact Type
                        var contact_type = d.result.contact_type, output = [], num = contact_type.toString();
                        for (var i = 0, len = num.length; i < len; i += 1) {
                            if (num.charAt(i) == 1) {
                                $("#checkbox_supplier").prop("checked", true);
                            }
                            if (num.charAt(i) == 2) {
                                $("#checkbox_customer").prop("checked", true);
                            }
                            if (num.charAt(i) == 3) {
                                $("#checkbox_karyawan").prop("checked", true);
                            }
                        }

                        //Contact Image
                        if (d.result.contact_image == undefined) {
                            // $('#img-preview1').attr('src', url_image);
                            $("#files_preview").attr('src',url_image);
                            $(".files_link").attr('href',url_image);                            
                        } else {
                            var image = "<?php echo base_url(); ?>" + d.result.contact_image;
                            // $('#img-preview1').attr('src', image);
                            $("#files_preview").attr('src',image);
                            $(".files_link").attr('href',image);                            
                        } 
                        
                        $("#btn-new").hide();
                        $("#btn-save").hide();
                        $("#btn-update").show();
                        $("#btn-cancel").show();
                        scrollUp('content');
                    } else {
                        notif(0, d.message);
                    }
                },
                error: function (xhr, Status, err) {
                    notif(0, 'Error');
                }
            });
        });
        // Update Button
        $(document).on("click", "#btn-update", function (e) {
            e.preventDefault();
            var next = true;
            var id = $("#form-master input[name='id_dokumen']").val();
            var kode = $("#form-master input[name='kode']");
            var nama = $("#form-master input[name='nama']");

            //Contact Type
            var type_supplier = ($("#checkbox_supplier").is(':checked') == true) ? 1 : 0;
            var type_customer = ($("#checkbox_customer").is(':checked') == true) ? 1 : 0;
            var type_karyawan = ($("#checkbox_karyawan").is(':checked') == true) ? 1 : 0;

            if (id == '') {
                notif(0, 'ID tidak ditemukan');
                next = false;
            }

            // $("input[type=checkbox]").each(function(){
            //   var input = $(this).is(':checked');
            //   // console.log(input);
            //   if(input == false){
            //   }
            // });

            if (kode.val().length == 0) {
                notif(0, 'Kode wajib diisi');
                kode.focus();
                next = false;
            }


            if (nama.val().length == 0) {
                notif(0, 'Nama wajib diisi');
                nama.focus();
                next = false;
            }


            if (next == true) {
                var form = new FormData();
                form.append('action', 'update');
                form.append('id', $('#id_document').val());
                // form.append('upload1', $('#upload1')[0].files[0]);
                form.append('tipe', identity);
                // form.append('kode', $('#kode').val());
                form.append('nama', $('#nama').val());
                form.append('perusahaan', $('#perusahaan').val());
                form.append('telepon_1', $('#telepon_1').val());
                // form.append('telepon_2', $('#telepon_2').val());      
                form.append('email_1', $('#email_1').val());
                // form.append('email_2', $('#email_2').val());
                form.append('alamat', $('#alamat').val());
                form.append('status', $('#status').find(':selected').val());
                form.append('note', $('#note').val());
                form.append('supplier', type_supplier);
                form.append('customer', type_customer);
                form.append('karyawan', type_karyawan);
                form.append('categories', $('#categories').find(':selected').val());
                form.append('upload1', $("#files_preview").attr('data-save-img'));              
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {},
                    success: function (d) {
                        console.log(d);
                        if (parseInt(d.status) == 1) {
                            formCancel();
                            notif(1, d.message);
                            index.ajax.reload(null, false);
                        } else {
                            notif(0, d.message);
                        }
                    },
                    error: function (xhr, Status, err) {
                        notif(0, 'Error');
                    }
                });
            }
        });

        // Delete Button
        $(document).on("click", ".btn-delete", function () {
            event.preventDefault();
            var id = $(this).attr("data-id");
            var kode = $(this).attr("data-kode");
            var user = $(this).attr("data-nama");
            $.confirm({
                title: 'Hapus!',
                content: 'Apakah anda ingin menghapus <b>' + user + '</b> ?',
                buttons: {
                    confirm: {
                        btnClass: 'btn-danger',
                        text: 'Ya',
                        action: function () {
                            var data = {
                                action: 'remove',
                                id: id
                            }
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: data,
                                success: function (d) {
                                    if (parseInt(d.status) = 1) {
                                        notif(1, d.message);
                                        index.ajax.reload(null, false);
                                    } else {
                                        notif(0, d.message);
                                    }
                                }
                            });
                        }
                    },
                    cancel: {
                        btnClass: 'btn-success',
                        text: 'Batal',
                        action: function () {
                            // $.alert('Canceled!');
                        }
                    }
                }
            });
        });

        // Set Flag Button
        $(document).on("click", ".btn-set-active", function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            var flag = $(this).attr("data-flag");
            if (flag == 1) {
                var set_flag = 0;
                var msg = 'nonaktifkan';
            } else {
                var set_flag = 1;
                var msg = 'aktifkan';
            }
            var kode = $(this).attr("data-kode");
            var user = $(this).attr("data-nama");
            $.confirm({
                title: 'Set Status',
                content: 'Apakah anda ingin <b>' + msg + '</b> dengan nama <b>' + user + '</b> ?',
                columnClass: 'col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1',
                autoClose: 'button_2|10000',
                closeIcon: true,
                closeIconClass: 'fas fa-times',
                buttons: {
                    button_1: {
                        text: 'Ok',
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function () {
                            var data = {
                                action: 'set-active',
                                id: id,
                                flag: set_flag,
                                user: user,
                                kode: kode
                            }
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: data,
                                dataType: 'json',
                                cache: false,
                                beforeSend: function () {},
                                success: function (d) {
                                    if (parseInt(d.status) == 1) {
                                        notif(1, d.message);
                                        index.ajax.reload(null, false);
                                    } else {
                                        notif(0, d.message);
                                    }
                                },
                                error: function (xhr, Status, err) {
                                    notif(0, 'Error');
                                }
                            });
                        }
                    },
                    button_2: {
                        text: 'Batal',
                        btnClass: 'btn-danger',
                        keys: ['Escape'],
                        action: function () {
                            //Close
                        }
                    }
                }
            });
        });      
        $(document).on("click", "#btn-print-all", function () {
            let alias1 = alias;
            let title   = 'Print Data '+alias1;
            $.confirm({
                title: title,
                columnClass: 'col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1',      
                autoClose: 'button_2|100000',
                closeIcon: true, closeIconClass: 'fas fa-times', 
                animation:'zoom', closeAnimation:'bottom', animateFromElement:false, useBootstrap:true,
                content: function(){           
                },
                onContentReady: function(e){
                    let self    = this;
                    let d = self.ajaxResponse.data;
                    let content = '';
                    let dsp     = '';
                    
                    dsp += '<form id="jc_form">';
                        dsp += '<div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">';
                        dsp += '    <div class="form-group">';
                        dsp += '    <label class="form-label">Wilayah '+alias1+'</label>';
                        dsp += '        <select id="filter_category2" name="filter_category2" class="form-control">';
                        dsp += '            <option value="0">Semua</option>';
                        dsp += '        </select>';
                        dsp += '    </div>';
                        dsp += '</div>';   
                        dsp += '<div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">';
                        dsp += '    <div class="form-group">';
                        dsp += '    <label class="form-label">Status '+alias1+'</label>';
                        dsp += '        <select id="filter_flag2" name="filter_flag2" class="form-control">';
                        dsp += '            <option value="a">Semua</option>';
                        dsp += '            <option value="1">Aktif</option>';
                        dsp += '            <option value="0">Nonaktif</option>';                                                
                        dsp += '        </select>';
                        dsp += '    </div>';
                        dsp += '</div>';                                                                                                         
                        dsp += '<div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">';
                            dsp += '<div class="col-md-6 col-xs-6 col-sm-6 padding-remove-left">';
                            dsp += '    <div class="form-group">';
                            dsp += '    <label class="form-label">Urut Berdasarkan</label>';
                            dsp += '        <select id="filter_order2" name="filter_order2" class="form-control">';
                            dsp += '            <option value="1">Nama '+alias1+'</option>';
                            dsp += '            <option value="2">Kode '+alias1+'</option>';  
                            dsp += '            <option value="3">Perusahaan</option>';    
                            dsp += '            <option value="4">Group '+alias1+'</option>';                                                                                                                                           
                            dsp += '        </select>';
                            dsp += '    </div>';
                            dsp += '</div>';
                            dsp += '<div class="col-md-6 col-xs-6 col-sm-6 padding-remove-side">';
                            dsp += '    <div class="form-group">';
                            dsp += '    <label class="form-label">Sort</label>';
                            dsp += '        <select id="filter_dir2" name="filter_dir2" class="form-control">';
                            dsp += '            <option value="0">Urut Naik</option>';
                            dsp += '            <option value="1">Urut Menurun</option>';
                            dsp += '        </select>';
                            dsp += '    </div>';
                            dsp += '</div>';        
                        dsp += '</div>';                
                    dsp += '</form>';
                    content = dsp;
                    self.setContentAppend(content);

                    $('#filter_category2').select2({
                        dropdownParent:$(".jconfirm-box-container"), //If Select2 Inside Modal
                        // tags:true,
                        minimumInputLength: 0,
                        allowClear: true,
                        minimumResultsForSearch: Infinity,
                        placeholder: {
                            id: '0',
                            text: 'Semua'
                        },                          
                        ajax: {
                            type: "get",
                            url: "<?= base_url('search/manage'); ?>",
                            dataType: 'json',
                            delay: 250,
                            data: function (params) {
                                var query = {
                                    search: params.term,
                                    tipe: 4,
                                    source: 'categories'
                                }
                                return query;
                            },
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },
                            cache: true
                        },
                        templateSelection: function (datas) { //When Option on Click
                            if (!datas.id) {
                                return datas.text;
                            }
                            if (parseInt(datas.id) > 0) {
                                return datas.text;
                            }
                        }
                    });       
                },
                buttons: {
                    button_1: {
                        text:'Print',
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function(e){
                            let self      = this;
                            let filter_order    = self.$content.find('#filter_order2').val();
                            let filter_dir      = self.$content.find('#filter_dir2').val(); 
                            let filter_cat      = self.$content.find('#filter_category2').val();
                            let filter_type      = 2;   
                            let filter_flag      = self.$content.find('#filter_flag2').find(':selected').val();                                                                                                                
                            
                            if(filter_order == 0){
                                $.alert('Urut mohon dipilih dahulu');
                                return false;
                            } else{
                                // var filter_ref = $("#filter_ref").find(':selected').val();
                                // var filter_type = $("#filter_type").find(':selected').val();
                                // var filter_contact = $("#filter_contact").find(':selected').val();
                                // var filter_city = $("#filter_city").find(':selected').val();
                                // var filter_flag = $("#filter_flag").find(':selected').val();

                                // var filter_order    = 0;
                                // var filter_dir      = 0;
                                var request = $('.btn-print-all').data('request');
                                var p = "<?= base_url('contact/print'); ?>" + '?';
                                    p += '&cat='+filter_cat;
                                    p += '&type=' + filter_type + '&flag=' + filter_flag;
                                    p += '&start=0&limit=0'; 
                                    p += '&order=' + filter_order + '&dir=' + filter_dir;
                                    p += '&image=0';
                                var win = window.open(p,'_blank').print();
                            }
                        }
                    },
                    button_2: {
                        text: 'Tutup',
                        btnClass: 'btn-danger',
                        keys: ['Escape'],
                        action: function(){
                            //Close
                        }
                    }
                }
            });

        });
        $(document).on("click",".btn_print_card",function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log($(this));
            // var id = $(this).attr('data-card-id');
            var session = $(this).attr('data-card-session');
            // if(parseInt(id) > 0){
                var x = screen.width / 2 - 700 / 2;
                var y = screen.height / 2 - 450 / 2;
                // http://localhost/git/web/pagersemar/card?action=print&data=VUAMYO8S2I6X1W82B9WL
                var print_url = url_print+'card_info/'+session;
                var win = window.open(print_url,'Print','width=700,height=485,left=' + x + ',top=' + y + '').print();
                //var win = window.open(print_url,'_blank');
            // }else{
                // notif(0,'Dokumen belum di buka');
            // }
        });
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
                    setTimeout(function(){$('#modal-croppie-canvas').croppie('bind');}, 300);
                });
            };
            reader.readAsDataURL(this.files[0]);
        });
        $(document).on('click', '#modal-croppie-cancel', function(e){
            e.preventDefault();
            e.stopPropagation();
            $("#files").val('');
            $("#files_preview").attr('data-save-img', '');
            $("#files_preview").attr('src', url_image);
            $("#files_link").attr('href', url_image);
        });
        $(document).on('click', '#modal-croppie-save', function(e){
            e.preventDefault();
            e.stopPropagation();
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
        function formNew() {
            formMasterSetDisplay(0);
            $("#form-master input").val('');
            $("#form-master textarea").val('');
            $("#btn-new").hide();
            $("#btn-save").show();
            $("#btn-cancel").show();
        }
        function formCancel() {
            formMasterSetDisplay(1);
            $("#form-master input").val('');
            $("#form-master textarea").val('');
            $("#btn-new").css('display', 'inline');
            $("#files_link").attr('href',url_image);
            $("#files_preview").attr('src',url_image);
            $("#files_preview").attr('data-save-img','');

            $("#btn-save").hide();
            $("#btn-update").hide();
            $("#btn-cancel").hide();
            $("#div-form-trans").hide(300);
        }
    });
    function formMasterSetDisplay(value) { // 1 = Untuk Enable/ ditampilkan, 0 = Disabled/ disembunyikan
        if (value == 1) {
            var flag = true;
        } else {
            var flag = false;
        }
        //Attr Input yang perlu di setel
        var form = '#form-master';
        var attrInput = [
            // "kode",
            "nama",
            "perusahaan",
            "telepon_1",
            "telepon_2",
            "email_1",
            "email_2"
        ];
        for (var i = 0; i <= attrInput.length; i++) {
            $("" + form + " input[name='" + attrInput[i] + "']").attr('readonly', flag);
        }

        //Attr Textarea yang perlu di setel
        var attrText = [
            "alamat",
            "note"
        ];
        for (var i = 0; i <= attrText.length; i++) {
            $("" + form + " textarea[name='" + attrText[i] + "']").attr('readonly', flag);
        }

        //Attr Select yang perlu di setel
        var atributSelect = [
            "status",          
            "type",
            "categories"            
        ];
        for (var i = 0; i <= atributSelect.length; i++) {
            $("" + form + " select[name='" + atributSelect[i] + "']").attr('disabled', flag);
        }
    }
</script>