
<script>
    $.getScript("https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js");

    $(document).ready(function () {
        var url = "<?= base_url('news/manage'); ?>";
        // var url_image = '<?= base_url('assets/webarch/img/default-user-image.png'); ?>';
        var url_image = '<?= base_url('upload/noimage.png'); ?>';
        var url_preview = '<?php echo site_url(); ?>';
        var view = "<?php echo $_view; ?>";
        var set_url = "<?php echo base_url(); ?>";        
        var newsID = 0;

        // tinymce.init({
        //     selector: '#content',
        //     plugins: 'lists link image code table preview',
        //     toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code preview',
        //     height: 400
        // });

        // CKEDITOR.replace('konten');
        // CKEDITOR.replace('ck_content');
        
        $(".nav-tabs").find('li[class="active"]').removeClass('active');
        $(".nav-tabs").find('li[data-name="article/article"]').addClass('active');
        // console.log(view);
        // $("#img-preview1").attr('src', url_image);
        $("select").select2();
        $(".date").datepicker({
            // defaultDate: new Date(),
            format: 'yyyy-mm-dd',
            autoclose: true,
            enableOnReadOnly: true,
            language: "id",
            todayHighlight: true,
            weekStart: 1
        });
        const autoNumericOption = {
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalCharacterAlternative: ',',
            decimalPlaces: 0,
            watchExternalChanges: true //!!!        
        };

        // new AutoNumeric('#harga_jual', autoNumericOption);
        // new AutoNumeric('#harga_beli', autoNumericOption);    
        setTimeout(() => {

            // Summernote
            $('#short').summernote({
                placeholder: 'Short here!',
                dialogsInBody:true,
                tabsize: 4,
                height: 350,
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
            $('#news_content').summernote({
                placeholder: 'Content description here!',
                dialogsInBody:true,
                tabsize: 4,
                height: 350,
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

            // Quill Js
            // const quill = new Quill('#news_content', {
            //     modules: {
            //         toolbar: [
            //             ['bold', 'italic', 'underline'],        // toggled buttons
            //             [{ 'font': [] }],
            //             [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            //             [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            //             [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            //             ['link', 'image', 'video'],
            //             [{ 'list': 'bullet'}, { 'list': 'ordered'}],
            //             [{ 'align': [] }],
            //             ['blockquote', 'code-block'],
            //             // [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            //             // [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            //             // [{ 'direction': 'rtl' }],                         // text direction
            //             // ['clean']                                         // remove formatting button
            //         ]
            //     },
            //     theme: 'snow'
            // });      
            // CKeditor
            // CKEDITOR.replace('news_content');     
        }, 3000);

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
                    // d.tipe = identity;
                    // d.start = $("#table-data").attr('data-limit-start');
                    // d.length = $("#table-data").attr('data-limit-end');
                    d.tipe = 0;
                    d.length = $("#filter_length").find(':selected').val();
                    d.category = $("#filter_categories").find(':selected').val();
                    d.flag = $("#filter_flag").find(':selected').val();
                    d.search = {
                        value: $("#filter_search").val()
                    };
                },
                dataSrc: function (data) {
                    return data.result;
                }
            },
            "columnDefs": [
                {"targets": 0, "title": "Judul", "searchable": true, "orderable": false},
                {"targets": 1, "title": "Isi", "searchable": true, "orderable": false},
                {"targets": 2, "title": "Status", "searchable": true, "orderable": false},
                {"targets": 3, "title": "Kunjungan", "searchable": true, "orderable": false, "className": 'dt-body-right'},
                {"targets": 4, "title": "Action", "searchable": true, "orderable": false, "className": 'dt-body-right'}
            ],
            "order": [
                [0, 'asc']
            ],
            "columns": [{
                    'data': 'news_title',
                    className: 'text-left',
                    render: function (data, meta, row) {
                        var dsp = '';
                        // dsp += '<button class="btn-edit btn btn-mini btn-primary" data-id="'+ row.news_id +'">';
                        // dsp += '<span class="fas fa-edit"></span>Edit';
                        // dsp += '</button>';
                        dsp += '<a href="#" class="btn-edit" data-id="' + row.news_id + '"><i class="fas fa-newspaper"></i>&nbsp;' + row.news_title + '</a>';
                        return dsp;
                    }
                }, {
                    'data': 'news_short',
                    render: function (data, meta, row) {
                        var dsp = '';
                        var myString = row.news_short;
                        // if(a.length > 0){
                        //     a = a.substring(0, 20);
                        // }  
                        if (myString !== null) {  
                            console.log(myString.length);
                            myString = myString.substring(0, 20);
                            dsp += myString;
                        } else {  
                            // console.log('myString is null');
                            dsp += '';  
                        }                          
                        // return a;
                        return dsp;
                    }                    
                }, {
                    'data': 'news_flag',
                    className: 'text-left',
                    render: function (data, meta, row) {
                        var dsp = '';
                        if (parseInt(row.news_flag) === 1) {
                            dsp += 'Publish';
                        }else{
                            dsp += 'Unpublish';
                        }
                        return dsp;
                    }
                }, {
                    'data': 'news_visitor',
                    className: 'text-right',
                    render: function (data, meta, row) {
                        // return row.news_visitor+' <i class="fas fa-eye"></i>';
                        return row.news_visitor;
                    }
                }, {
                    'data': 'news_id',
                    className: 'text-left',
                    render: function (data, meta, row) {
                        var dsp = '';
                        dsp += '&nbsp;<button class="btn btn-edit btn-mini btn-primary"';
                        dsp += 'data-nama="' + row.news_title + '" data-url="' + row.news_url + '" data-id="' + data + '" data-flag="' + row.news_flag + '" data-category="' + row.category_url + '">';
                        dsp += '<span class="fas fa-edit"></span> Edit</button>';

                        dsp += '&nbsp;<button class="btn btn-preview btn-mini btn-info"';
                        dsp += 'data-nama="' + row.news_title + '" data-url="' + row.news_url + '" data-id="' + data + '" data-flag="' + row.news_flag + '" data-category="' + row.category_url + '">';
                        dsp += '<span class="fas fa-eye"></span> Preview</button>';

                        if (parseInt(row.news_flag) === 0) {
                            dsp += '&nbsp;<button class="btn btn-set-active btn-mini btn-success"';
                            dsp += 'data-nama="' + row.news_title + '" data-kode="' + row.news_title + '" data-id="' + data + '" data-flag="' + row.news_flag + '">';
                            dsp += '<span class="fas fa-check-square primary"></span> </button>';
                        } else {
                            dsp += '&nbsp;<button class="btn btn-set-active btn-mini btn-danger"';
                            dsp += 'data-nama="' + row.news_title + '" data-kode="' + row.news_title + '" data-id="' + data + '" data-flag="' + row.news_flag + '">';
                            dsp += '<span class="fas fa-times danger"></span> </button>';
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
        $("#filter_search").on('input', function (e) {
            var ln = $(this).val().length;
            if (parseInt(ln) > 3) {
                index.ajax.reload();
            }
        });

        $("#title").on("input", function () {
            console.log($(this));
            var src = $(this).val();

            var ts = src.toLowerCase().replace(/ /g, "-");
            $("#url").val(ts);
        });

        // Save Button
        // $(document).on("click", "#btn-save", function (e) {
        //     e.preventDefault();
        //     var next = true;

        //     if (next == true) {
        //         if ($("input[id='title']").val().length == 0) {
        //             notif(0, 'Title wajib diisi');
        //             $("#title").focus();
        //             next = false;
        //         }
        //     }

        //     if (next == true) {
        //         if ($("input[id='url']").val().length == 0) {
        //             notif(0, 'URL wajib diisi');
        //             $("#url").focus();
        //             next = false;
        //         }
        //     }

        //     if (next == true) {
        //         if ($("select[id='categories']").find(':selected').val() == 0) {
        //             notif(0, 'Categories wajib dipilih');
        //             next = false;
        //         }
        //     }

        //     if (next == true) {
        //         // var prepare = {
        //         //   title: $("input[id='title']").val(),
        //         //   tags: $("input[id='tags']").val(),
        //         //   keywords: $("input[id='keywords']").val(),
        //         //   url: $("input[id='url']").val(),                
        //         //   content: $("textarea[id='content']").val(),
        //         //   categories: $("select[id='categories']").find(':selected').val(),
        //         //   status: $("select[id='status']").find(':selected').val()
        //         // }
        //         var form = new FormData();
        //         form.append('action', 'create');
        //         form.append('tipe', 0);                  
        //         // form.append('upload1', $('#upload1')[0].files[0]);
        //         // form.append('categories', $('#categories').find(':selected').val());
        //         form.append('status', $('#status').find(':selected').val());
        //         form.append('title', $('#title').val());
        //         form.append('url', $('#url').val());
        //         form.append('tags', $('#tags').val());
        //         form.append('keywords', $('#keywords').val());
        //         form.append('short', $('#short').val());
        //         form.append('content', $('#news_content').val());
        //         form.append('posisi', $('#posisi').find(':selected').val());
        //         // var prepare_data = JSON.stringify(formData);
        //         // var data = {
        //         //   action: 'create',
        //         //   data: prepare_data
        //         // };
        //         // console.log(data);
        //         $.ajax({
        //             type: "POST",
        //             url: url,
        //             data: form,
        //             dataType: 'json',
        //             cache: false,
        //             contentType: false,
        //             processData: false,
        //             beforeSend: function () {},
        //             success: function (d) {
        //                 if (parseInt(d.status) == 1) { /* Success Message */
        //                     notif(1, d.message);
        //                     index.ajax.reload();
        //                 } else { //Error
        //                     notif(0, d.message);
        //                 }
        //             },
        //             error: function (xhr, Status, err) {
        //                 notif(0, 'Error');
        //             }
        //         });
        //     }
        // });
        $(document).on("click", "#btn-update", function (e) {
            e.preventDefault();
            var next = true;

            // if (next == true) {
            //     if ($("input[id='title']").val().length == 0) {
            //         notif(0, 'Title wajib diisi');
            //         $("#title").focus();
            //         next = false;
            //     }
            // }

            // if (next == true) {
            //     if ($("input[id='url']").val().length == 0) {
            //         notif(0, 'URL wajib diisi');
            //         $("#url").focus();
            //         next = false;
            //     }
            // }

            // if (next == true) {
            //     if ($("select[id='categories']").find(':selected').val() == 0) {
            //         notif(0, 'Categories wajib dipilih');
            //         next = false;
            //     }
            // }

            if (next == true) {
                var form = new FormData();
                form.append('action', 'create_project_or_gallery');
                form.append('tipe', 0);
                let files = document.getElementById('files').files;
                for (let i = 0; i < files.length; i++) {
                    form.append('files[]', files[i]);
                }      
                if(newsID > 0){
                    form.append('id',newsID);
                }          
                // form.append('upload1', $('#upload1')[0].files[0]);                
                form.append('status', $('#status').find(':selected').val());
                form.append('title', $('#title').val());
                form.append('url', $('#url').val());
                // form.append('tags', $('#tags').val());
                // form.append('keywords', $('#keywords').val());
                form.append('short', $('#short').val());
                form.append('content', $('#news_content').val());
                form.append('posisi', $('#posisi').find(':selected').val());
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {},
                    success: function (d) {
                        if (parseInt(d.status) == 1) { /* Success Message */
                            notif(1, d.message);
                            index.ajax.reload();
                            loadFiles(d.result.id);
                            projectID = d.result.id;
                        } else { //Error
                            notif(0, d.message);
                        }

                        $("#files").val('');
                        if(projectID > 0){
                            $("#btn-save").hide();
                            $("#btn-update").show();                            
                        }else{
                            $("#btn-save").show();
                            $("#btn-update").hide();                            
                        }
                        console.log(projectID);
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
                beforeSend: function () {},
                success: function (d) {
                    if (parseInt(d.status) == 1) { /* Success Message */
                        $("#div-form-trans").show(300);
                        newsID = d.result.news_id;
                        loadFiles(newsID);                        
                        // activeTab('tab1'); // Open/Close Tab By ID
                        // notif(1,d.result.id);ss
                        $("#form-master input[name='id_document']").val(d.result.news_id);
                        $("#form-master input[name='tags']").val(d.result.news_tags);
                        $("#form-master input[name='keywords']").val(d.result.news_keywords);
                        $("#form-master input[name='title']").val(d.result.news_title);
                        $("#form-master input[name='url']").val(d.result.news_url);
                        // $("#form-master textarea[name='short']").val(d.result.news_short);
                        var markupShort = d.result.news_short;
                        var markupStr = d.result.news_content;                        
                        $('#short').summernote('code', markupShort);            
                        $('#news_content').summernote('code', markupStr);
                        // smr.code(markupStr);
                        // CKEDITOR.instances.news_content.setData(markupStr);
                        //News Image
                        // if (d.result.news_images == undefined) {
                        //     $('#img-preview1').attr('src', url_image);
                        // } else {
                        //     var image = "<?php echo site_url(); ?>" + d.result.news_image;
                        //     $('#img-preview1').attr('src', image);
                        // }

                        $("#form-master select[name='status']").val(d.result.news_flag).trigger('change');
                        $("#form-master select[name='posisi']").val(d.result.news_position).trigger('change');
                        // $("select[name='categories']").append('' +
                        //         '<option value="' + d.result.category_id + '">' +
                        //         d.result.category_name +
                        //         '</option>');
                        // $("select[name='categories']").val(d.result.category_id).trigger('change');

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
        // $(document).on("click", "#btn-update", function (e) {
        //     e.preventDefault();
        //     var next = true;
        //     var id = $("#form-master input[name='id_dokumen']").val();
        //     var title = $("#form-master input[name='title']");

        //     if (id == '') {
        //         notif(0, 'ID tidak ditemukan');
        //         next = false;
        //     }

        //     if (title.val().length == 0) {
        //         notif(0, 'Title wajib diisi');
        //         title.focus();
        //         next = false;
        //     }

        //     // if (next == true) {
        //     //     if ($("select[id='categories']").find(':selected').val() == 0) {
        //     //         notif(0, 'Categories wajib dipilih');
        //     //         next = false;
        //     //     }
        //     // }

        //     if (next == true) {
        //         // var prepare = {
        //         //   id: $("input[id=id_document]").val(),
        //         //   title: $("input[id='title']").val(),
        //         //   tags: $("input[id='tags']").val(),
        //         //   keywords: $("input[id='keywords']").val(),
        //         //   url: $("input[id='url']").val(),                
        //         //   content: $("textarea[id='content-description']").val(),
        //         //   categories: $("select[id='categories']").find(':selected').val(),
        //         //   status: $("select[id='status']").find(':selected').val()
        //         // }      
        //         var formDataUpdate = new FormData();
        //         formDataUpdate.append('action', 'update');
        //         formDataUpdate.append('id', $('#id_document').val());
        //         let files = document.getElementById('files').files;
        //         for (let i = 0; i < files.length; i++) {
        //             form.append('files[]', files[i]);
        //         }
        //         // formDataUpdate.append('upload1', $('#upload1')[0].files[0]);
        //         // formDataUpdate.append('categories', $('#categories').find(':selected').val());
        //         formDataUpdate.append('status', $('#status').find(':selected').val());
        //         formDataUpdate.append('title', $('#title').val());
        //         formDataUpdate.append('url', $('#url').val());
        //         formDataUpdate.append('tags', $('#tags').val());
        //         formDataUpdate.append('keywords', $('#keywords').val());
        //         formDataUpdate.append('short', $('#short').val());
        //         formDataUpdate.append('content', $('#news_content').val());
        //         // formDataUpdate.append('content', CKEDITOR.instances.news_content.getData());                
        //         formDataUpdate.append('posisi', $('#posisi').find(':selected').val());
        //         // var prepare_data = JSON.stringify(prepare);
        //         // var data = {
        //         //   action: 'update',
        //         //   data: prepare_data
        //         // };
        //         $.ajax({
        //             type: "POST",
        //             url: url,
        //             data: formDataUpdate,
        //             dataType: 'json',
        //             cache: false,
        //             contentType: false,
        //             processData: false,
        //             beforeSend: function () {},
        //             success: function (d) {
        //                 if (parseInt(d.status) == 1) {
        //                     // $("#btn-new").show();
        //                     // $("#btn-save").hide();
        //                     // $("#btn-update").hide();
        //                     // $("#btn-cancel").hide();
        //                     // $("#form-master input").val();
        //                     // formMasterSetDisplay(1);
        //                     notif(1, d.message);
        //                     index.ajax.reload(null, false);
        //                 } else {
        //                     notif(0, d.message);
        //                 }
        //             },
        //             error: function (xhr, Status, err) {
        //                 notif(0, 'Error');
        //             }
        //         });
        //     }

        // });

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
        $(document).on("click", ".btn_remove_file", function () {
            event.preventDefault();
            var id = $(this).attr("data-id");
            $.confirm({
                title: 'Hapus!',
                content: 'Apakah anda ingin menghapus gambar ini ?',
                buttons: {
                    confirm: {
                        btnClass: 'btn-danger',
                        text: 'Ya',
                        action: function () {
                            var data = {
                                action: 'remove_file',
                                id: id
                            }
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: data,
                                dataType: 'json',
                                cache: false,                                
                                success: function (d) {
                                    if (parseInt(d.status) == 1) {
                                        // notif(1, d.message);
                                        $("#gambar_"+id).remove();
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
                content: 'Apakah anda ingin <b>' + msg + '</b> dengan judul <b>' + nama + '</b> ?',
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

        // Set Preview
        $(document).on("click", ".btn-preview", function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            var title = $(this).attr("data-title");
            var urls = $(this).attr("data-url");
            var category = $(this).attr("data-category");
            var final_url = urls;
            // console.log(final_url);
            // $.alert('Harusnya Redirect to '+url_preview+urls);
            // window.open(url_preview+urls);
            $.confirm({
                title: 'Pengalihan Halaman',
                content: 'Anda akan diarahkan ke halaman <b>' + url_preview + final_url + '</b>',
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
            $("#btn-new").css('display', 'inline');
            // formTransCancel();
            // btnNew.classList.remove('animate__animated', 'animate__fadeOutRight');    
            $("#div-form-trans").hide(300);
        });
        function loadFiles(news_id){
            var data = {
                action: 'read_files',
                id: news_id
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
                        let rr = d.result;
                        if(rr.length > 0){
                            $(".gambar").html('');
                            var dsp = '';
                            rr.forEach(async (v, i) => {
                        
                                dsp += '<div class="col-md-3 col-sm-6" id="gambar_'+v['file_id']+'">';
                                    dsp += '<button class="btn btn-danger btn_remove_file" style="position:absolute;" data-id="'+v['file_id']+'"><i class="fas fa-trash"></i> Hapus</button>';
                                    dsp += '<img class="img-responsive" src="'+set_url + v['file_url']+'" style="width:100%;">';
                                dsp += '</div>';
                        
                            });
                            $(".gambar").html(dsp);
                        }                        
                    }
                },
                error: function (xhr, Status, err) {
                    notif(0, 'Error');
                }
            });                    
        }        
    });

    function formNew() {
        formMasterSetDisplay(0);
        $("#form-master input").val();
        $("#btn-new").hide();
        $("#btn-save").show();
        $("#btn-cancel").show();
    }
    function formCancel() {
        formMasterSetDisplay(1);
        $("#form-master input").val();
        $("#btn-new").show();
        $("#btn-save").hide();
        $("#btn-update").hide();
        $("#btn-cancel").hide();
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
            "tags",
            "keywords",
        ];

        for (var i = 0; i <= attrInput.length; i++) {
            $("" + form + " input[name='" + attrInput[i] + "']").attr('readonly', flag);
        }

        //Attr Textarea yang perlu di setel
        var attrText = [
            "short",
            "content-description"
        ];
        for (var i = 0; i <= attrText.length; i++) {
            $("" + form + " textarea[name='" + attrText[i] + "']").attr('readonly', flag);
        }

        //Attr Select yang perlu di setel
        var atributSelect = [
            "categories",
            "status",
            "posisi"
        ];
        for (var i = 0; i <= atributSelect.length; i++) {
            $("" + form + " select[name='" + atributSelect[i] + "']").attr('disabled', flag);
        }
    }
</script>