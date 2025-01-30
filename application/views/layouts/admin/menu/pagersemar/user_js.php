<script>
    $(document).ready(function () {
        var url = "<?= base_url('user/manage'); ?>";
        $(".nav-tabs").find('li[class="active"]').removeClass('active');
        $(".nav-tabs").find('li[data-name="user"]').addClass('active');
        $("select").select2();
        /*
         $(".date").datepicker({
         format: 'yyyy-mm-dd',
         autoclose: true,
         enableOnReadOnly: true,
         language: "id",
         todayHighlight: true,
         weekStart: 1
         });  
         */
        $('#tgl').daterangepicker({
            "startDate": moment(), //mm/dd/yyyy
            "singleDatePicker": true,
            "showDropdowns": true,
            "autoApply": true,
            "alwaysShowCalendars": true,
            "opens": "center",
            "applyButtonClasses": "btn-primary",
            "cancelClass": "btn-danger",
            "locale": {
                "format": "YYYY-MM-DD",
                "daysOfWeek": ["Mn", "Sn", "Sl", "Rb", "Km", "Jm", "Sb"],
                "monthNames": ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                "applyLabel": "Apply", "cancelLabel": "Cancel",
            }
        }, function (start, end, label) {
            // console.log(start.format('YYYY-MM-DD')+' to '+end.format('YYYY-MM-DD'));
        });
        $('#tgl').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD'));
        });
        var index = $("#table-data").DataTable({
            "serverSide": true,
            "ajax": {
                url: url,
                type: 'post',
                dataType: 'json',
                cache: 'false',
                data: function (d) {
                    d.action = 'load';
                    // d.start = $("#table-data").attr('data-limit-start');
                    // d.length = $("#table-data").attr('data-limit-end');
                    // d.user_role = $("#select_role").val();
                    d.length = $("#filter_length").find(':selected').val();
                    d.search = {
                        value: $("#filter_search").val()
                    };
                    d.filter_branch = $("#filter_branch").find(':selected').val();
                    d.filter_group = $("#filter_group").find(':selected').val();
                },
                dataSrc: function (data) {
                    return data.result;
                }
            },
            "columnDefs": [
                {"targets": 0, "title": "Username / Group", "searchable": true, "orderable": true},
                {"targets": 1, "title": "Detail", "searchable": true, "orderable": true},
                {"targets": 2, "title": "Cabang", "searchable": true, "orderable": true},
                {"targets": 3, "title": "Login Terakhir", "searchable": true, "orderable": true},
                {"targets": 4, "title": "Action", "searchable": true, "orderable": true},
            ],
            "order": [
                [0, 'asc']
            ],
            "columns": [
                {
                    'data': 'user_username',
                    render: function (data, meta, row) {
                        var dsp = '';
                        dsp += row.user_username + '<br>';
                        dsp += '<span class="label label-default">' + row.user_group_name + '</span><br>';
                        return dsp;
                    }
                }, {
                    'data': 'user_username',
                    className: 'text-left',
                    render: function (data, meta, row) {
                        var dsp = '';
                        if (row.user_fullname != undefined) {
                            dsp += row.user_fullname + '<br>';
                        }
                        if (row.user_email_1 != undefined) {
                            dsp += row.user_email_1 + '<br>';
                        }
                        if (row.user_phone_1 != undefined) {
                            dsp += row.user_phone_1 + '<br>';
                        }
                        return dsp;
                    }
                }, {
                    'data': 'branch_name',
                    render:function(data, meta, row){
                        var dsp = '';
                        if(row.branch_id != undefined){
                            dsp += row.branch_name;
                        }else{ dsp += '-'; }
                        return dsp;
                    }
                }, {
                    'data': 'time_ago'
                }, {
                    'data': 'user_id',
                    className: 'text-left',
                    render: function (data, meta, row) {
                        var dsp = '';
                        // disp += '<a href="#" class="activation-data mr-2" data-id="' + data + '" data-stat="' + row.flag + '">';
                        dsp += '<button class="btn-edit btn btn-mini btn-primary" data-id="' + data + '">';
                        dsp += '<span class="fas fa-edit"></span>Edit';
                        dsp += '</button>';
                        dsp += '&nbsp;<button class="btn btn-open-user-access btn-mini label-inverse" data-id="' + row.user_id + '" data-username="' + row.user_username + '"><span class="fas fa-user-shield"></span> Hak Akses</button>';
                        if (parseInt(row.user_flag) === 1) {
                            dsp += '&nbsp;<button class="btn btn-set-active btn-mini btn-success"';
                            dsp += 'data-username="' + row.user_username + '" data-kode="' + row.user_code + '" data-id="' + data + '" data-flag="' + row.user_flag + '">';
                            dsp += '<span class="fas fa-user-check primary"></span> Aktif</button>';
                        } else {
                            dsp += '&nbsp;<button class="btn btn-set-active btn-mini btn-danger"';
                            dsp += 'data-username="' + row.user_username + '" data-kode="' + row.user_code + '" data-id="' + data + '" data-flag="' + row.user_flag + '">';
                            dsp += '<span class="fas fa-user-times danger"></span> Nonaktif</button>';
                        }
                        return dsp;
                    }
                }
            ]
        });
        $('#table-data').on('page.dt', function () {
            var info = index.page.info();
            //console.log( 'Showing page: '+info.page+' of '+info.pages);
            var limit_start = info.start;
            var limit_end = info.end;
            var length = info.length;
            var page = info.page;
            var pages = info.pages;
            $("#table-data").attr('data-limit-start', limit_start);
            $("#table-data").attr('data-limit-end', limit_end);
        });
        $("#table-data_length").on("change", function (e) {
            e.preventDefault();
            e.stopPropagation();
            // var limit_end = $(this).find(":selected").val();
            // $("#table-data").attr('data-limit-end',limit_end);    
            // index.ajax.reload();
        });
        $("#table-data_filter").css('display', 'none');
        $("#table-data_length").css('display', 'none');
        $("#filter_length").on('change', function (e) {
            index.ajax.reload();
        });
        $("#filter_search").on('input', function (e) {
            var ln = $(this).val().length;
            if (parseInt(ln) > 2) {
                index.ajax.reload();
            }
        });
        // $("#filter_categories").on('change', function(e){ index.ajax.reload(); });    
        // $("#filter_ref").on('change', function(e){ index.ajax.reload(); });    
        $('#user').select2({
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
                        source: 'users'
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
        $('#menu').select2({
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
                        source: 'menus'
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
        $('#branch').select2({
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
                        source: 'branchs'
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
        $('#group').select2({
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
                        source: 'users_groups'
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
        $('#filter_branch').select2({
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
                        source: 'branchs'
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
        $('#filter_group').select2({
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
                        source: 'users_groups'
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
        $("#filter_branch, #filter_group").on('change', function (e) {
            index.ajax.reload();
        });
        // New Button
        $(document).on("click", "#btn-new", function (e) {
            formNew();
            $("#div-form-trans").show(300);
            $(this).hide();
        });
        // Cancel Button
        $(document).on("click", "#btn-cancel", function (e) {
            e.preventDefault();
            formCancel();
        });
        // Save Button
        $(document).on("click", "#btn-save", function (e) {
            e.preventDefault();
            var next = true;
            var username = $("#form-master input[name='username']");
            var password = $("#form-master input[name='password']");
            // if($("select[id='tipe']").find(':selected').val() == 0){
            //   notif(0,'Tipe harus dipilih');
            //   next=false;
            // }
            // if(next==true){    
            //   if($("input[id='kode']").val().length == 0){
            //     notif(0,'Kode wajib diisi');
            //     $("#kode").focus();
            //     next=false;
            //   }
            // }
            if (next == true) {
                if ($("select[id='branch']").find(':selected').val() == 0) {
                    notif(0, 'Cabang harus dipilih');
                    next = false;
                }
            }
            // if(next==true){
            //   if($("input[id='fullname']").val().length == 0){
            //     notif(0,'Nama wajib diisi');
            //     $("#fullname").focus();
            //     next=false;
            //   }   
            // }
            // if(next==true){
            //   if($("select[id='gender']").find(':selected').val() == 0){
            //     notif(0,'Jenis kelamin harus dipilih');
            //     next=false;
            //   }     
            // }
            if (next == true) {
                if ($("select[id='group']").find(':selected').val() == 0) {
                    notif(0, 'Group harus dipilih');
                    next = false;
                }
            }
            if (next == true) {
                if (username.val().length == 0) {
                    notif(0, 'Username wajib diisi');
                    username.focus();
                    next = false;
                }
            }
            if (next == true) {
                if (password.val().length == 0) {
                    notif(0, 'Password wajib diisi');
                    password.focus();
                    next = false;
                }
            }
            if (next == true) {
                if ($("input[id='telepon_1']").val().length == 0) {
                    notif(0, 'Telepon wajib diisi');
                    $("input[id='telepon_1']").focus();
                    next = false;
                }
            }
            if (next == true) {
                var prepare = {
                    // kode: $("input[id='kode']").val(),
                    nama: $("input[id='fullname']").val(),
                    tipe: $("select[id='tipe']").find(':selected').val(),
                    // tempat_lahir: $("input[id='place_birth']").val(),
                    // tgl_lahir: $("input[id='tgl']").val(),
                    // gender: $("select[id='gender']").find(':selected').val(),
                    telepon_1: $("input[id='telepon_1']").val(),
                    email_1: $("input[id='email_1']").val(),
                    alamat: $("textarea[id='alamat']").val(),
                    group: $("select[id='group']").find(':selected').val(),
                    branch: $("select[id='branch']").find(':selected').val(),
                    username: $("input[id='username']").val(),
                    password: $("input[id='password']").val(),
                    status: $("select[id='status']").find(':selected').val(),
                    user_theme: $("select[id='theme']").find(':selected').val(),
                    user_menu_style: $("select[id='user_menu_style']").find(':selected').val()
                }
                var prepare_data = JSON.stringify(prepare);
                var data = {
                    action: 'create',
                    data: prepare_data
                };
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: 'json',
                    cache: false,
                    beforeSend: function(){
                        $("#btn-save").attr('disabled',true);
                        notif(1,'Sedang menambahkan');
                    },
                    success: function (d) {
                        if (parseInt(d.status) == 1) { /* Success Message */
                            notif(1, d.message);
                            index.ajax.reload();
                            formCancel();
                            $("#btn-save").attr('disabled',false);
                        } else { //Error
                            notif(0, d.message);
                        }
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
            // $("#form-master input[name='username']").attr('readonly',true);
            $("#div-form-trans").show(300);
            e.preventDefault();
            var id = $(this).attr("data-id");
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
                },
                success: function (d) {
                    if (parseInt(d.status) == 1) { /* Success Message */
                        activeTab('tab1'); // Open/Close Tab By ID
                        // notif(1,d.result.id);ss
                        $("#form-master input[name='id_document']").val(d.result.user_id);
                        $("#form-master input[name='kode']").val(d.result.user_code);
                        $("#form-master input[name='username']").val(d.result.user_username);
                        $("#form-master input[name='fullname']").val(d.result.user_fullname);
                        // $("#form-master input[name='place_birth']").val(d.result.user_place_birth); 
                        // $('#tgl').data('daterangepicker').setStartDate(d.result.user_birth_of_date);
                        $("#form-master input[name='telepon_1']").val(d.result.user_phone_1);
                        $("#form-master input[name='email_1']").val(d.result.user_email_1);
                        $("#form-master textarea[name='alamat']").val(d.result.user_address);
                        $("#form-master select[name='tipe']").val(d.result.user_type).trigger('change');
                        $("#form-master select[name='group']").val(d.result.user_user_group_id).trigger('change');
                        // $("#form-master select[name='gender']").val(d.result.user_gender).trigger('change');
                        $("#form-master select[name='theme']").val(d.result.user_theme).trigger('change');
                        $("#form-master select[name='status']").val(d.result.user_flag).trigger('change');
                        $("#form-master select[name='user_menu_style']").val(d.result.user_menu_style).trigger('change');
                        $("select[name='branch']").append('' +
                                '<option value="' + d.result.user_branch_id + '">' +
                                d.result.branch_name +
                                '</option>');
                        $("select[name='branch']").val(d.result.user_branch_id).trigger('change');
                        $("select[name='group']").append('' +
                                '<option value="' + d.result.user_group_id + '">' +
                                d.result.user_group_name +
                                '</option>');
                        $("select[name='group']").val(d.result.user_group_id).trigger('change');
                        // if(parseInt(d.result.user_check_price_buy) == 1){
                        //     $("#user_check_price_buy").prop("checked", true);
                        // }
                        // if(parseInt(d.result.user_check_price_sell) == 1){
                        //     $("#user_check_price_sell").prop("checked", true);
                        // }
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
            var username = $("#form-master input[name='username']");
            var password = $("#form-master input[name='password']");
            if (id == '') {
                notif(0, 'ID tidak ditemukan');
                next = false;
            }
            if (username.val().length == 0) {
                notif(0, 'Username wajib diisi');
                username.focus();
                next = false;
            }
            if (next == true) {
                if ($("select[id='branch']").find(':selected').val() == 0) {
                    notif(0, 'Cabang harus dipilih');
                    next = false;
                }
            }
            if (next == true) {
                if ($("select[id='group']").find(':selected').val() == 0) {
                    notif(0, 'Group harus dipilih');
                    next = false;
                }
            }
            if (next == true) {
                if ($("input[id='telepon_1']").val().length == 0) {
                    notif(0, 'Telepon wajib diisi');
                    $("input[id='telepon_1']").focus();
                    next = false;
                }
            }
            if (next == true) {
                var prepare = {
                    id: $("input[id='id_document']").val(),
                    // kode: $("input[id='kode']").val(),
                    nama: $("input[id='fullname']").val(),
                    tipe: $("select[id='tipe']").find(':selected').val(),
                    // tempat_lahir: $("input[id='place_birth']").val(),
                    // tgl_lahir: $("input[id='tgl']").val(),
                    gender: $("select[id='gender']").find(':selected').val(),
                    telepon_1: $("input[id='telepon_1']").val(),
                    email_1: $("input[id='email_1']").val(),
                    alamat: $("textarea[id='alamat']").val(),
                    group: $("select[id='group']").find(':selected').val(),
                    branch: $("select[id='branch']").find(':selected').val(),
                    username: $("input[id='username']").val(),
                    password: $("input[id='password']").val(),
                    status: $("select[id='status']").find(':selected').val(),
                    user_theme: $("select[id='theme']").find(':selected').val(),
                    user_menu_style: $("select[id='user_menu_style']").find(':selected').val(),
                    // user_check_price_buy:($("#user_check_price_buy").is(':checked') == true) ? 1 : 0,
                    // user_check_price_sell:($("#user_check_price_sell").is(':checked') == true) ? 1 : 0,
                }
                var prepare_data = JSON.stringify(prepare);
                var data = {
                    action: 'update',
                    data: prepare_data
                };
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    cache: false,
                    dataType: "json",
                    beforeSend:function(){
                        $("#btn-update").attr('disabled',true);
                        notif(1,'Sedang memperbaruai');
                    },
                    success: function (d) {
                        if (parseInt(d.status) == 1) {
                            $("#btn-new").show();
                            $("#btn-save").hide();
                            $("#btn-update").hide();
                            $("#btn-cancel").hide();
                            $("#form-master input").val();
                            index.ajax.reload(null, false);
                            formMasterSetDisplay(1);
                            notif(1, d.message);
                            formCancel();
                        } else {
                            notif(0, d.message);
                        }
                        $("#btn-update").attr('disabled',false);                        
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
            var user = $(this).attr("data-username");
            $.confirm({
                title: 'Hapus!',
                content: 'Apakah anda ingin menghapus user <b>' + user + '</b> ?',
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
            var user = $(this).attr("data-username");
            $.confirm({
                title: 'Set Status User',
                content: 'Apakah anda ingin <b>' + msg + '</b> user <b>' + user + '</b> ?',
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
    });
    function formNew() {
        formMasterSetDisplay(0);
        $("#form-master input").not("input[id='tgl']").val();
        // $("#user_check_price_buy").prop("checked", false);
        // $("#user_check_price_sell").prop("checked", false);
        $("#btn-new").hide();
        $("#btn-save").show();
        $("#btn-cancel").show();
    }
    function formCancel() {
        formMasterSetDisplay(1);
        $("#form-master input").not("input[id='tgl']").val('');
        // $("#user_check_price_buy").prop("checked", false);
        // $("#user_check_price_sell").prop("checked", false);
        $("#form-master textarea").val('');
        $("#form-master select").val(0).trigger('change');
        $("#theme").val('black').trigger('change');
        $("#status").val(1).trigger('change');        
        $("#btn-new").css('display', 'inline');
        $("#btn-new").show();
        $("#btn-save").hide();
        $("#btn-update").hide();
        $("#btn-cancel").hide();
        $("#div-form-trans").hide(300);
    }
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
            "fullname",
            "place_birth",
            // "tgl",            
            "telepon_1",
            "email_1",
            "username",
            "password",
        ];
        for (var i = 0; i <= attrInput.length; i++) {
            $("" + form + " input[name='" + attrInput[i] + "']").attr('readonly', flag);
        }
        //Attr Textarea yang perlu di setel
        var attrText = [
            "alamat"
        ];
        for (var i = 0; i <= attrText.length; i++) {
            $("" + form + " textarea[name='" + attrText[i] + "']").attr('readonly', flag);
        }
        //Attr Select yang perlu di setel
        var atributSelect = [
            "tipe",
            "branch",
            "gender",
            "group",
            "theme",
            "status",
            "user_menu_style"
        ];
        for (var i = 0; i <= atributSelect.length; i++) {
            $("" + form + " select[name='" + atributSelect[i] + "']").attr('disabled', flag);
        }
    }
</script>