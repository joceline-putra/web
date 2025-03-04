
<?php
$first_date = date("Y-m-d");
$end_date = date("Y-m-d");
$hour = date("H");
$identity = 1;
?>
<style>
    .popover {z-index: 9999;}
    select{min-height: 28px!important; height: 28px!important;}
    .form-control{padding:0px 8px!important;}
    /* Large desktops and laptops */
    @media (min-width: 1200px) {
        .table-responsive{ overflow-x: unset; }
        .prs-15{padding-left: 15px!important;padding-right: 15px!important;}
    }
    /* Landscape tablets and medium desktops */
    @media (min-width: 992px) and (max-width: 1199px) {
        .table-responsive{ overflow-x: unset; }
        .prs-15{padding-left: 15px!important;padding-right: 15px!important;}
    }
    /* Portrait tablets and small desktops */
    @media (min-width: 768px) and (max-width: 991px) {
        .table-responsive{ overflow-x: unset; }
        .prs-15{padding-left: 15px!important;padding-right: 15px!important;}
    }
    /* Landscape phones and portrait tablets */
    @media (max-width: 767px) {
        .prs-15{padding-left: 15px!important;padding-right: 15px!important;}
    }
    /* Portrait phones and smaller */
    @media (max-width: 480px) {
        .prs-15{padding-left: 15px!important;padding-right: 15px!important;}
        .pull-right{height: auto!important;}
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="row">
    <div class="col-md-12">
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">
                    <div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">
                        <div class="grid simple">
                            <div class="grid-body">
                                <div class="col-md-12 col-sm-12 col-xs-12 padding-remove-side">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12 col-sm-12">
                                            <div class="col-md-6 col-xs-12 col-sm-12" style="padding-left: 0;">
                                                <h5><b>Data <?php echo $title;?></b></h5>
                                            </div>
                                            <div class="col-md-6 col-xs-12 col-sm-12 padding-remove-right">
                                                <div class="pull-right">
                                                    <!-- <button id="btn_export_card" onClick="" class="btn btn-default btn-small" type="button" style="display: inline;">
                                                        <i class="fas fa-file-excel"></i>
                                                        Ekspor Excel
                                                    </button> -->
                                                    <button id="btn_new_card" class="btn btn-success btn-small" type="button" style="display: inline;">
                                                        <i class="fas fa-plus"></i>
                                                        Buat <?php echo $title; ?> Baru
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side" style="padding-top:8px;">
                                            <!-- <div class="col-lg-2 col-md-2 col-xs-6 col-sm-6 form-group padding-remove-right prs-15">
                                                <label class="form-label">Periode Awal</label>
                                                <div class="col-md-12 col-sm-12 padding-remove-side">
                                                    <div class="input-append success date col-md-12 col-lg-12 no-padding">
                                                        <input name="filter_start_date" id="filter_start_date" type="text" class="form-control input-sm" readonly="true" value="<?php echo $first_date;?>">
                                                        <span class="add-on date-add"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-xs-6 col-sm-6 form-group padding-remove-right prs-15">
                                                <label class="form-label">Periode Akhir</label>
                                                <div class="col-md-12 col-sm-12 padding-remove-side">
                                                    <div class="input-append success date col-md-12 col-lg-12 no-padding">
                                                        <input name="filter_end_date" id="filter_end_date" type="text" class="form-control input-sm" readonly="true" value="<?php echo $end_date;?>">
                                                        <span class="add-on date-add"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div> -->
                                            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12 form-group padding-remove-right prs-15">
                                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 padding-remove-side">
                                                    <label class="form-label">Cari</label>
                                                    <input id="filter_search" name="filter_search" type="text" value="" class="form-control" placeholder="Pencarian" />
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-xs-6 col-sm-6 form-group padding-remove-right prs-15">
                                                <div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">
                                                    <label class="form-label">Status</label>
                                                    <select id="filter_flag" name="filter_flag" class="form-control">
                                                        <option value="All">Semua</option>
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Nonaktif</option>
                                                        <option value="4">Terhapus</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-xs-6 col-sm-6 form-group">
                                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 padding-remove-side">
                                                    <label class="form-label">Tampil</label>
                                                    <select id="filter_length" name="filter_length" class="form-control">
                                                        <option value="10">10 Baris</option>
                                                        <option value="25">25 Baris</option>
                                                        <option value="50">50 Baris</option>
                                                        <option value="100">100 Baris</option>
                                                        <option value="-1">Semuanya</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xs-12 col-sm-12" style="padding-top:10px;">
                                            <div class="table-responsive">
                                                <table id="table_card" class="table table-bordered" style="width:100%;">
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab2">
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_croppie" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div id="modal_croppie_canvas"></div>
            </div>
            <div class="modal-footer">
                <button id="modal_croppie_cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button id="modal_croppie_save" type="button" class="btn btn-primary">Crop</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_card" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Form card</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <form id="form_card" name="form_card" method="" action="">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <input id="card_id" name="card_id" type="hidden" value="" placeholder="id" readonly>
                                    <input id="card_session" name="card_session" type="hidden" value="" placeholder="session" readonly>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-12 col-md-12 col-xs-12 padding-remove-side">
                                    <div class="form-group">
                                        <label class="form-label">Nama Jenis Kartu</label>
                                        <input id="card_name" name="card_name" type="text" value="" class="form-control" readonly='true'/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12 padding-remove-side">
                                    <div class="form-group">
                                        <label class="form-label">Format Depan Kartu</label>
                                        <input id="card_initial" name="card_initial" type="text" value="" class="form-control" readonly='true'/>
                                    </div>
                                </div>                                
                                <div class="col-lg-6 col-md-6 col-xs-12 padding-remove-side">
                                    <div class="form-group">
                                        <label class="form-label">Jumlah Kartu Beredar</label>
                                        <input id="card_count" name="card_count" type="number" value="" class="form-control" readonly='true'/>
                                    </div>
                                </div>  
                            </div>
                            <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 form-group padding-remove-side">
                                    <label class="form-label">Tanggal</label>
                                    <div class="col-md-12 col-sm-12 padding-remove-side">
                                        <div class="input-append success date col-md-12 col-lg-12 no-padding">
                                            <input name="card_date" id="card_date" type="text" class="form-control input-sm" readonly="true" value="<?php echo $end_date;?>">
                                            <span class="add-on date-add"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 padding-remove-side">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 form-group padding-remove-side">
                                        <label class="form-label">Jam</label>
                                        <div class="col-md-12 col-sm-12 padding-remove-side">
                                            <div class="input-group transparent clockpicker col-md-12">
                                                <input name="card_hour" id="card_hour" type="text" class="form-control input-sm" value="<?php echo $hour; ?>" >
                                                <span class="input-group-addon clock-add"><i class="fas fa-clock"></i></span>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 padding-remove-side">
                                    <div class="form-group">
                                        <label class="form-label">Gambar *</label>
                                        <img id="img-preview1" class="img-responsive" 
                                            data-is-new="0"
                                            style="width:100%"
                                            src=""/>
                                        <a class="files_link" href="https://via.placeholder.com/450x450?text=Belumadagambar">
                                            <img id="files_preview" src="https://via.placeholder.com/150x150?text=Belum+ada+gambar" class="img-responsive" height="125px" width="125px" style="margin-bottom:5px;"/>
                                        </a>
                                        <div class="custom-file">
                                            <input class="form-control" id="files" name="files" type="file" tabindex="1">
                                            <label class="custom-file-label">Pilih Gambar</label>
                                        </div>
                                    </div>
                                </div> 
                            </div> -->
                            <div class="clearfix"></div>
                            <div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-label">Ketentuan Kartu</label>
                                        <textarea id="card_note" name="card_note" type="text" value="" class="form-control" rows="4"/></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12 col-sm-12" style="margin-top: 10px;">
                                <div class="form-group">
                                    <div class="pull-right">
                                        <button id="btn_cancel_card" class="btn btn-warning btn-small" type="reset" style="display: none;">
                                            <i class="fas fa-ban"></i> 
                                            Cancel
                                        </button>
                                        <button id="btn_save_card" class="btn btn-primary btn-small" type="button" style="display:none;">
                                            <i class="fas fa-save"></i>
                                            Save
                                        </button>                                        
                                        <button id="btn_update_card" class="btn btn-info btn-small" type="button" style="display: none;">
                                            <i class="fas fa-edit"></i> 
                                            Update
                                        </button> 
                                        <button id="btn_delete_card" class="btn btn-danger btn-small" type="button" style="display: none;">
                                            <i class="fas fa-trash"></i> 
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>