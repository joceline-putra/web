<script>
    $.getScript("https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js");

    $(document).ready(function () {
        var identity = "<?php echo $identity; ?>";
        var url = "<?= base_url('kategori/manage'); ?>";
        var view = "<?php echo $_view; ?>";
        var url_image = "<?= site_url('upload/noimage.png'); ?>";
        var url_dir = "<?= base_url(); ?>";        

        var blog_routing = "<?php echo $_route; ?>";
        var url_preview = '<?php echo site_url(); ?>' + blog_routing +'/';

        $(".nav-tabs").find('li[class="active"]').removeClass('active');
        $(".nav-tabs").find('li[data-name="category/product"]').addClass('active');
        
        let image_width = "<?= $image_width;?>";
        let image_height = "<?= $image_height;?>"; 


        const editor = grapesjs.init({
            container: '#gjs',
            height: '100%',
            width: 'auto',
            fromElement: true,
            storageManager: false,
            blockManager: {
            appendTo: 'body'
            }
        });

        // Tambahkan blok teks
        editor.BlockManager.add('text-block', {
            label: 'Teks',
            content: '<div><p>Teks dari jQuery</p></div>'
        });

        // Tambahkan blok gambar
        editor.BlockManager.add('image-block', {
            label: 'Gambar',
            content: '<img src="https://via.placeholder.com/150" />'
        });
                
        $(".date").datepicker({
            // defaultDate: new Date(),
            format: 'yyyy-mm-dd',
            autoclose: true,
            enableOnReadOnly: true,
            language: "id",
            todayHighlight: true,
            weekStart: 1
        });

        setTimeout(() => {
            // $('#category_short').summernote({
            //     placeholder: 'Content description here!',
            //     dialogsInBody:true,
            //     tabsize: 4,
            //     height: 350,
            //     toolbar: [
            //         ["font", ["bold", "italic", "underline", "clear"]],
            //         ["fontname", ["fontname"]],
            //         ['fontsize', ['fontsize']],
            //         ["style", ["color","style"]],
            //         ["para", ["ul", "ol", "paragraph","height"]],
            //         ["insert", ["table","link","picture","hr"]],
            //         ["view", ["fullscreen","codeview", "help"]],
            //     ]
            // });
            $('#category_content').summernote({
                placeholder: 'Content description here!',
                dialogsInBody:true,
                tabsize: 4,
                height: 400,
                toolbar: [
                    ["font", ["bold", "italic", "underline", "clear"]],
                    ["fontname", ["fontname"]],
                    ['fontsize', ['fontsize']],
                    ["style", ["color","style"]],
                    ["para", ["ul", "ol", "paragraph","height"]],
                    ["insert", ["table","link","picture","hr"]],
                    ["view", ["fullscreen","codeview", "help"]],
                ]
            });
        }, 3000);
        
        //Croppie
        var upload_crop_img = null;
        upload_crop_img = $('#modal-croppie-canvas').croppie({
            enableExif: true,
            viewport: {width: image_width, height: image_height},
            boundary: {width: parseInt(image_width)+10, height: parseInt(image_height)+10},
            url: url_image,
        });

        let selectedAttr = [];
        // $('#attribute').select2({
        //     placeholder: '--- Pilih ---',
        //     minimumInputLength: 0,
        //     allowClear: true,
        //     ajax: {
        //         type: "get",
        //         url: "<?= base_url('search/manage'); ?>",
        //         dataType: 'json',
        //         delay: 250,
        //         data: function (params) {
        //             var query = {
        //                 search: params.term,
        //                 source: 'attributes'
        //             }
        //             return query;
        //         },
        //         processResults: function (data) {
        //             return {
        //                 results: data
        //             };
        //         },
        //         cache: true
        //     },
        //     escapeMarkup: function (markup) {
        //         return markup; // Biarkan HTML
        //     },                            
        //     templateResult: function(datas){ //When Select on Click
        //         return datas.text;
        //     },            
        //     templateSelection: function (data, container) {
        //         // Add custom attributes to the <option> tag for the selected option
        //         // $(data.element).attr('data-custom-attribute', data.customValue);
        //         // $("input[name='satuan']").val(data.satuan);
        //         return data.text;
        //     }
        // });
        $('#attribute').select2({
            placeholder: '--- Pilih ---',
            minimumInputLength: 0,
            allowClear: true,
            ajax: {
                type: "post",
                url: "<?= base_url('attributes'); ?>",
                dataType: 'json',
                delay: 250,
                cache: true,
                data: function (params) {
                    var query = {
                        search: params.term,
                        action: 'search_attr',
                        page: params.page || 1
                    }
                    return query;
                },
                processResults: function (result, params){
                    params.page = params.page || 1;
                    let datas = [];
                    $.each(result.data, function(key, val){
                        datas.push({
                            'id' : val.id,
                            'text' : val.text
                        });
                    });
                    return {
                        results: datas,
                        pagination: {
                            more: (params.page * 10) < result.count_filtered
                        }
                    };
                }
            },
            escapeMarkup: function (markup) {
                return markup; // Biarkan HTML
            },                            
            templateResult: function(datas){ //When Select on Click
                return datas.text;
            },            
            templateSelection: function (data, container) {
                // Add custom attributes to the <option> tag for the selected option
                // $(data.element).attr('data-custom-attribute', data.customValue);
                // $("input[name='satuan']").val(data.satuan);
                return data.text;
            }
        });        
        $('#attribute').on('change', function() {
            selectedAttr = [];
            $(this).find(':selected').each(function() {
                selectedAttr.push({
                    value: $(this).val(),
                    text: $(this).text()
                });
            });
            console.log(selectedAttr);
        });
            
        var index = $("#table-data").DataTable({
            // "processing": true,
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
                    d.filter_flag = $("#filter_flag").find(':selected').val();
                    d.search = {
                        value: $("#filter_search").val()
                    };
                },
                dataSrc: function (data) {
                    return data.result;
                }
            },
            "columnDefs": [
                {"targets": 0, "title": "Nama Kategori", "searchable": true, "orderable": false},
                {"targets": 1, "title": "URL", "searchable": true, "orderable": false},
                {"targets": 2, "title": "Jumlah Produk", "searchable": true, "orderable": false},
                {"targets": 3, "title": "Action", "searchable": true, "orderable": false, "className": 'dt-body-right'}
            ],
            "order": [
                [0, 'asc']
            ],
            "columns": [{
                    'data': 'category_name'
                }, {
                    'data': 'category_url'
                }, {
                    'data': 'category_count_data',
                    className: 'text-right',
                    render: function (data, meta, row) {
                        var dsp = '';
                        dsp += row.category_count_data;
                        return dsp;
                    }
                }, {
                    'data': 'category_id',
                    className: 'text-left',
                    render: function (data, meta, row) {
                        var dsp = '';
                        // disp += '<a href="#" class="activation-data mr-2" data-id="' + data + '" data-stat="' + row.flag + '">';

                        dsp += '<button class="btn-edit btn btn-mini btn-primary" data-id="' + data + '">';
                        dsp += '<span class="fas fa-edit"></span>Edit';
                        dsp += '</button>';

                        dsp += '&nbsp;<button class="btn-preview btn btn-mini btn-info" data-id="' + data + '" data-url="'+row.category_url+'" data-title="'+row.category_name+'">';
                        dsp += '<span class="fas fa-eye"></span>Preview';
                        dsp += '</button>';                        

                        if (parseInt(row.category_flag) === 1) {
                            dsp += '&nbsp;<button class="btn btn-set-active btn-mini btn-success"';
                            dsp += 'data-nama="' + row.category_name + '" data-id="' + data + '" data-flag="' + row.category_flag + '">';
                            dsp += '<span class="fas fa-check-square primary"></span> Aktif</button>';
                        } else {
                            dsp += '&nbsp;<button class="btn btn-set-active btn-mini btn-danger"';
                            dsp += 'data-nama="' + row.category_name + '" data-id="' + data + '" data-flag="' + row.category_flag + '">';
                            dsp += '<span class="fas fa-times danger"></span> Nonaktif</button>';
                            
                            dsp += '&nbsp;<button class="btn btn-delete btn-mini btn-danger"';
                            dsp += 'data-nama="' + row.category_name + '" data-kode="' + row.category_code + '" data-id="' + data + '" data-flag="' + row.category_flag + '">';
                            dsp += '<span class="fas fa-trash danger"></span></button>';   
                        }

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
            console.log('Showing page: ' + info.page + ' of ' + info.pages);
            console.log(limit_start, limit_end);
            $("#table-data-in").attr('data-limit-start', limit_start);
            $("#table-data-in").attr('data-limit-end', limit_end);
        });

        $("#nama").on("input", function () {
            console.log($(this));
            var src = $(this).val();

            var ts = src.toLowerCase().replace(/ /g, "-");
            $("#url").val(ts);
        });

        $(document).on("click","#btn-new", function (e) {
            e.preventDefault();
            e.stopPropagation();
            formNew();

            $("#files_link").attr('href',url_image);
            $("#files").val('');
            $("#files_preview").attr('src',url_image);
            $("#files_preview").attr('data-save-img','');      
            
            $("#div-form-trans").show(300);
            // $(this).hide();            
        });

        $(document).on("click","#btn-cancel", function (e) {
            e.preventDefault();
            e.stopPropagation();
            formCancel();
            $("#files_link").attr('href',url_image);
            $("#files").val('');
            $("#files_preview").attr('src',url_image);
            $("#files_preview").attr('data-save-img','');                               
        });    

        // Save Button
        $(document).on("click", "#btn-save", function (e) {
            e.preventDefault();
            var next = true;

            var nama = $("#form-master input[name='nama']");

            if (next == true) {
                if ($("input[id='nama']").val().length == 0) {
                    notif(0, 'Nama wajib diisi');
                    $("#nama").focus();
                    next = false;
                }
            }

            if (next == true) {
                if ($("input[id='url']").val().length == 0) {
                    notif(0, 'Url wajib diisi');
                    $("#url").focus();
                    next = false;
                }
            }

            if (next == true) {
                var prepare = {
                    tipe: identity,
                    nama: $("input[id='nama']").val(),
                    parent: $("select[id='parent_category']").find(':selected').val(),
                    url: $("input[id='url']").val(),
                    icon: $("input[id='icon']").val(),
                    status: $("select[id='status']").find(':selected').val(),
                    upload1: $("#files_preview").attr('data-save-img')                    
                }
                var prepare_data = JSON.stringify(prepare);
                var data = {
                    action: 'create',
                    data: prepare_data,
                    category_short: $('#category_short').val(),
                    category_content: $('#category_content').val()                    
                };
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: 'json',
                    cache: false,
                    beforeSend: function () {},
                    success: function (d) {
                        if (parseInt(d.status) == 1) { /* Success Message */
                            notif(1, d.message);
                            index.ajax.reload();
                            updateCategoryAttribute(d.result.id, selectedAttr);
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
            $("#form-master input[name='kode']").attr('readonly', true);
            $("#files_link").attr('href',url_image);
            $("#files").val('');
            $("#files_preview").attr('src',url_image);
            $("#files_preview").attr('data-save-img','');  
            e.preventDefault();
            var id = $(this).data("id");
            var data = {
                action: 'read',
                tipe: identity,
                id: id
            }
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: 'json',
                cache: false,
                beforeSend: function () {},
                success: function (d) {
                    if (parseInt(d.status) == 1) { /* Success Message */
                        // activeTab('tab1'); // Open/Close Tab By ID
                        $("#div-form-trans").show(300);
                        // notif(1,d.result.id);ss
                        $("#form-master input[name='id_document']").val(d.result.category_id);
                        $("#form-master input[name='nama']").val(d.result.category_name);
                        $("#form-master select[name='parent']").val(d.result.category_parent_id).trigger('change');
                        $("#form-master input[name='url']").val(d.result.category_url);
                        $("#form-master input[name='icon']").val(d.result.category_icon);
                        $("#form-master select[name='status']").val(d.result.category_flag).trigger('change');

                        var markupSht = d.result.category_short;                
                        var markupStr = d.result.category_content;                                                
                        // $('#category_short').summernote('code', markupSht);     
                        $("#category_short").val(markupSht);
                        $('#category_content').summernote('code', markupStr);                             

                        $("#btn-new").hide();
                        $("#btn-save").hide();
                        $("#btn-update").show();
                        $("#btn-cancel").show();
                        //scrollUp('content');
                        if((d.result.category_image != undefined) || (d.result.category_image != null)){
                            $("#files_preview").attr('src',url_dir + d.result.category_image);
                            $(".files_link").attr('href',url_dir + d.result.category_image);
                        }else{
                            $("#files_preview").attr('src',url_image);
                            $(".files_link").attr('href',url_image);                            
                        }           
                        getCategoryAttribute(d.result.category_id);               
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
            var id = $("input[id=id_document]").val();
            var nama = $("#form-master input[name='nama']");

            if (id == '') {
                notif(0, 'ID tidak ditemukan');
                next = false;
            }

            if (nama.val().length == 0) {
                notif(0, 'Nama wajib diisi');
                nama.focus();
                next = false;
            }

            if (next == true) {
                var prepare = {
                    tipe: identity,
                    id: $("input[id=id_document]").val(),
                    nama: $("input[id='nama']").val(),
                    parent: $("select[id='parent_category']").find(':selected').val(),
                    url: $("input[id='url']").val(),
                    icon: $("input[id='icon']").val(),
                    status: $("select[id='status']").find(':selected').val(),
                    upload1: $("#files_preview").attr('data-save-img')          
                }
                var prepare_data = JSON.stringify(prepare);
                var data = {
                    action: 'update',
                    data: prepare_data,
                    category_short: $('#category_short').val(),
                    category_content: $('#category_content').val()                    
                };
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    cache: false,
                    dataType: "json",
                    beforeSend: function () {},
                    success: function (d) {
                        if (parseInt(d.status) == 1) {
                            // $("#btn-new").show();
                            // $("#btn-save").hide();
                            // $("#btn-update").hide();
                            // $("#btn-cancel").hide();
                            $("#form-master input").val();
                            formMasterSetDisplay(1);
                            notif(1, d.message);
                            index.ajax.reload(null, false);
                            updateCategoryAttribute(id, selectedAttr);
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
                                id: id,
                                tipe: identity
                            }
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: data, dataType: 'json',
                                success: function (d) {
                                    if (parseInt(d.status) == 1) {
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
            var nama = $(this).attr("data-nama");
            $.confirm({
                title: 'Set Status',
                content: 'Apakah anda ingin <b>' + msg + '</b> dengan nama <b>' + nama + '</b> ?',
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
                                tipe: identity,
                                id: id,
                                flag: set_flag,
                                nama: nama,
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
        $(document).on("click", ".btn-preview", function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            var title = $(this).attr("data-title");
            var urls = $(this).attr("data-url");
            var final_url = urls;
            $.confirm({
                title: 'Pengalihan Halaman',
                content: 'Anda akan diarahkan ke halaman <b>' + url_preview + urls + '</b>',
                columnClass: 'col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1',
                autoClose: 'button_2|10000',
                closeIcon: true,
                closeIconClass: 'fas fa-times',
                buttons: {
                    button_1: {
                        text: 'Lanjutkan',
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function () {
                            window.open(url_preview + final_url);
                        }
                    },
                    button_2: {
                        text: 'Tutup',
                        btnClass: 'btn-danger',
                        keys: ['Escape'],
                        action: function () {
                            //Close
                        }
                    }
                }
            });

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
            $("#btn-new").hide();
            $("#btn-save").show();
            $("#btn-cancel").show(); 
        }
        function formCancel() {
            formMasterSetDisplay(1);
            $("#form-master input").val('');
            $("#btn-new").show();
            $("#btn-save").hide();
            $("#btn-update").hide();
            $("#btn-cancel").hide();

            $("#div-form-trans").hide(300);            
        }

        function updateCategoryAttribute(id, selectedAttr){
            let url = "<?= base_url('attributes'); ?>";
            
            let form = new FormData();
            form.append('action', 'update_category_attr');
            form.append('category_id', id);
            form.append('attribute',JSON.stringify(selectedAttr));                        
            $.ajax({
                type: "post",
                url: url,
                data: form, 
                dataType: 'json', cache: 'false', 
                contentType: false, processData: false,
                success:function(d){
                    let s = d.status;
                    let m = d.message;
                    let r = d.result;
                    if(parseInt(s) == 1){
                        notif(s,m);
                    }else{
                        notif(s,m);
                    }
                },
                error:function(xhr,status,err){
                    notif(0,err);
                }
            });
        }
        function getCategoryAttribute(id){
            let url = "<?= base_url('attributes'); ?>";
            
            let form = new FormData();
            form.append('action', 'load_category_attr');
            form.append('category_id', id);                     
            $.ajax({
                type: "post",
                url: url,
                data: form, 
                dataType: 'json', cache: 'false', 
                contentType: false, processData: false,
                success:function(d){
                    let s = d.status;
                    let m = d.message;
                    let r = d.result;
                    if(parseInt(s) == 1){
                        notif(s,m);
                        updateSelect2(r);
                    }else{
                        // notif(s,m);
                        r = [];
                        updateSelect2(r);
                    }
                },
                error:function(xhr,status,err){
                    notif(0,err);
                }
            });
        }  
        function updateSelect2(datas){
            // console.log('datas');
            // console.log(datas);            
            // $('#attribute').val(0).change(); 
            $('#attribute option').not('[value="0"]').remove();         
            $('#attribute').val(null).trigger('change');   
            
            var selectedVal = [];
            selectedAttr = [];

            if(datas.length > 0){
                datas.forEach(i => {    
                    let newOption = new Option(i.attr_name, i.attr_session, false, false);
                    $('#attribute').append(newOption);          

                    selectedVal.push(i.attr_session);  
                    
                    // selectedAttr.push({
                    //     value: i.attr_session,
                    //     text: i.attr_name
                    // });                
                });
                // console.log(selectedVal);
                // console.log(selectedAttr);
            }else{
                selectedAttr = [];
                selectedVal.push(0);
            }
            $('#attribute').val(selectedVal).change(); 
            // $('#attribute').val(ii).trigger('change');   
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
            "nama",
            "icon"
        ];

        for (var i = 0; i <= attrInput.length; i++) {
            $("" + form + " input[name='" + attrInput[i] + "']").attr('readonly', flag);
        }

        // Attr Textarea yang perlu di setel
        var attrText = [
            "category_short",
            "category_content"
        ];
        for (var i=0; i<=attrText.length; i++) { $(""+ form +" textarea[name='"+attrText[i]+"']").attr('readonly',flag); }

        //Attr Select yang perlu di setel
        var atributSelect = [
            "status",
            "parent_category"
        ];
        for (var i = 0; i <= atributSelect.length; i++) {
            $("" + form + " select[name='" + atributSelect[i] + "']").attr('disabled', flag);
        }
    }
</script>