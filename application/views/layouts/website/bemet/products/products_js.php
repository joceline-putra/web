
<script>
    $(document).ready(function() {   
        let url = "<?= base_url(); ?>";

        // Dashboard Scroll Product
            var limit_start = 4;
            var next_ = true; // true = data ada dimuat kembali & false = data tidak ada!
            if (next_ == true) { //Start on Refresh Page
                // next_ = false;
                // loadProduct(limit_start);
            }
            $(window).on("scroll", function (e) {
                var scrollTop = Math.round($(window).scrollTop());
                // console.log(scrollTop);
                var height = Math.round($(window).height());
                var dashboardHeight = Math.round($(document).height());
                if ($(window).scrollTop() + $(window).height() > ($(document).height() - 100) && next_ == true) {
                    next_ = false;
                    limit_start = limit_start + 4;
                    loadProduct(limit_start);
                }
            });
        // End of Dashboard Product

        function loadProduct(limit_start){
            // var user = $("#dashboard_user").val();
            var data = {
                // action: 'dashboard',
                categories: "<?php echo $pages['sitelink']['categories']['id'];?>",
                total_row: "",
                limit_start: limit_start,
                limit_end: 4,
            };
            $.ajax({
                type: "post",
                url: "<?= base_url('product/reload/'); ?>",
                data: data,
                dataType: 'json',
                cache: false,
                beforeSend: function () {
                    $("#div_product_loading").append("<div class='loading-pages text-center' style='color: black;padding-top:10px'><i class='fas fa-spinner fa-spin m-2'></i> Sedang Memuat...</div>");
                },
                success: function (d) {
                    if (parseInt(d.total_records) > 0) {
                        $(".loading-pages").remove();
                        $.each(d.result, function (i, val) {
                            var dsp = '';
                            // dsp += val.product_id;
                            var surl = d.site+"/"+val.category_url+'/'+val.product_url;
                            var curl = d.site+"/"+val.category_url;
                            var dd = '';
                            if(val.product_stock < 1){
                                var dd = '<span class="batch">Stok Habis';
                            }

                            var pimg = "<?php echo site_url(); ?>"+val.product_image;
                            if(val.product_image == undefined){
                                pimg = "<?php echo site_url(); ?>"+"upload/noimage.png";
                            }

                            dsp += `<div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-item-three inner-product-item" style="height:420px;">
                                    <div class="product-thumb-three">
                                        <a href="${surl}"><img src="${pimg}" alt=""></a>
                                    </div>
                                    <div class="product-content-three">
                                        <a href="${curl}" class="tag">${val.product_id} , ${val.category_name}</a>
                                        <h2 class="title"><a href="${surl}">${val.product_name}</a></h2>
                                        <h2 class="price">${numberWithCommas(Math.floor(val.product_price_sell))} / ${val.product_unit}</h2>
                                        ${dd}
                                    </div>
                                    <div class="product-shape-two">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 303 445" preserveAspectRatio="none">
                                            <path d="M319,3802H602c5.523,0,10,5.24,10,11.71l-10,421.58c0,6.47-4.477,11.71-10,11.71H329c-5.523,0-10-5.24-10-11.71l-10-421.58C309,3807.24,313.477,3802,319,3802Z" transform="translate(-309 -3802)" />
                                        </svg>
                                    </div>
                                </div>
                            </div>`;                            
                            $("#div_product_loading").append(dsp);
                        });
                        next_ = true;
                    } else {
                        next_ = false;
                        limit_start = 1;
                        $(".loading-pages").remove();
                        alert('here');
                        $("#div_product_loading").append("<div class='loading-pages text-center' style='color: black;padding-top:10px'>Data sudah dimuat semua</div>");
                    }
                },
                error: function (data) {
                    // checkInternet('offline');
                }
            });
            var waktu = setTimeout("loadProduct()", 6000000);
        }
		function numberWithCommas(x) {
		    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}        
    });
</script>