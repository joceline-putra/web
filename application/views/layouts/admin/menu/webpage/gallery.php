<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
    .note-editable{
        height: 400px;
    }
</style>
<div class="row">
    <div class="col-md-12">
    <?php include '_navigation_page.php'; ?>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div id="div-form-trans" style="display:none;" class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">
                    <div class="grid simple">
                        <div class="hidden grid-title">
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#grid-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="grid-body">
                            <div class="col-md-6 col-xs-12 col-sm-12" style="padding-left: 0;">
                                <h5><b><?php echo $title; ?></b></h5>
                            </div>  
                            <!--               
                            <div class="col-md-6 col-xs-12 col-sm-12 padding-remove-right">
                                <div class="pull-right">
                                      <button id="btn-cancel" class="btn btn-default btn-small" type="reset"
                                        style="display: inline;">
                                        <i class="fas fa-times"></i>
                                        Tutup
                                      </button>                            
                                </div>
                            </div>  -->                                       
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 padding-remove-side">
                                    <form id="form-master" name="form-master" method="" action="" enctype="multipart/form-data">   
                                        <div class="col-md-12">
                                            <input id="id_document" name="id_document" type="hidden" value="" placeholder="id" readonly>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12">
                                            <div class="gambar"></div>
                                        </div>  
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Gambar </label>
                                                <div class="custom-file">
                                                    <input type="file" id="files" name="files[]" multiple class="form-control">
                                                    <label class="custom-file-label">
                                                        <?php
                                                        echo "Ukuran Max per File : " . ($allowed_file_size / 1024) . " MB<br>";
                                                        #echo "Format Diizinkan: " . str_replace('|', ', ', $allowed_file_type);
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-lg-12 col-md-12 col-xs-12 padding-remove-side">
                                                <div class="form-group">
                                                    <label class="form-label">Nama <?php echo $title; ?> *</label>
                                                    <input id="title" name="title" type="text" value="" class="form-control">
                                                </div>
                                            </div>                                                                                                                                  
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <!-- <div class="col-lg-12 col-md-12 col-xs-12 padding-remove-side">
                                                <div class="form-group">
                                                    <label>Deskripsi Singkat</label>
                                                    <textarea id="short" name="short" type="text" class="form-control" readonly='true' rows="4"/></textarea>
                                                </div>
                                            </div> -->
                                            <div class="col-lg-12 col-md-12 col-xs-12 padding-remove-side">
                                                <div class="form-group">
                                                    <label>Deskripsi</label>
                                                    <textarea id="content-description" name="content-description" type="text" class="form-control" readonly='true' rows="4" style="height:200px;"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-lg-6 col-md-6 col-xs-12 padding-remove-side">
                                                <div class="form-group">
                                                    <label class="form-label">Url *</label>
                                                    <input id="url" name="url" type="text" value="" class="form-control" readonly='true'/>
                                                </div>
                                            </div>   
                                            <div class="col-lg-6 col-md-6 col-xs-12 padding-remove-side">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <select id="status" name="status" class="form-control" disabled readonly>
                                                        <option value="1">Tampil di Website</option>
                                                        <option value="0">Tidak tampil di Website</option>                            
                                                    </select>
                                                </div>
                                            </div>                                                                                                                                  
                                        </div>                                        
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 col-xs-12 col-sm-12" style="margin-top: 10px;">
                                            <div class="form-group">
                                                <div class="pull-right">          
                                                    <button id="btn-cancel" class="btn btn-warning btn-small" type="button" style="display:none;">
                                                        <i class="fas fa-ban"></i>                                 
                                                        Batal
                                                    </button>                                                                                 
                                                    <button id="btn-save" onClick="" class="btn-save btn btn-primary btn-small" type="button" style="display:none;">
                                                        <i class="fas fa-save"></i>                                 
                                                        Save
                                                    </button>                                        
                                                    <button id="btn-update" class="btn-save btn btn-info btn-small" type="button" style="display: none;">
                                                        <i class="fas fa-edit"></i> 
                                                        Update
                                                    </button> 
                                                    <button id="btn-delete" class="btn btn-danger btn-small" type="button" style="display: none;">
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
                <div class="grid simple">
                    <div class="hidden grid-title">
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                            <a href="#grid-config" data-toggle="modal" class="config"></a>
                            <a href="javascript:;" class="reload"></a>
                            <a href="javascript:;" class="remove"></a>
                        </div>
                    </div>
                    <div class="grid-body">   
                        <div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">
                            <div class="col-md-6 col-xs-12 col-sm-12" style="padding-left: 0;">
                                <h5><b>Data <?php echo $title; ?></b></h5>
                            </div>
                            <div class="col-md-6 col-xs-12 col-sm-12 padding-remove-right">
                                <div class="pull-right">      
                                    <button id="btn-new" onClick="" class="btn btn-success btn-small" type="button"
                                            style="display: inline;">
                                        <i class="fas fa-plus"></i>
                                        Buat <?php echo $title; ?> Baru
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side" style="padding-top:8px;">
                            <div class="col-lg-8 col-md-3 col-xs-12 col-sm-12 form-group padding-remove-left">
                                <label class="form-label">Cari</label>
                                <input id="filter_search" name="filter_search" type="text" value="" class="form-control" placeholder="Pencarian" />
                            </div>                          
                            <div class="col-lg-2 col-md-3 col-xs-12 col-sm-12 form-group padding-remove-left">
                                <div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">
                                    <label class="form-label">Status</label>
                                    <select id="filter_flag" name="filter_flag" class="form-control">
                                        <option value="1">Aktif</option>
                                        <option value="0">Nonaktif</option>
                                        <option value="All">Semua</option>                                        
                                    </select>
                                </div>
                            </div>                               
                            <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12 form-group padding-remove-side">
                                <label class="form-label">Tampil</label>
                                <select id="filter_length" name="filter_length" class="form-control">
                                    <option value="10">10 Baris</option>
                                    <option value="25">25 Baris</option>
                                    <option value="50">50 Baris</option>
                                    <option value="100">100 Baris</option>
                                </select>
                            </div>                   
                        </div>              
                        <div class="col-md-12 col-xs-12 col-sm-12 table-responsive padding-remove-side">                    
                            <table id="table-data" class="table table-bordered">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab2">      
            </div>
        </div>	
    </div>
</div>