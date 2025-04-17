
    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <?php 
                    if(!empty($link['menu'])){
                        foreach($link['menu'] as $v){
                            if(($v['news_position'] == 2) or ($v['news_position'] == 3)){
                            echo "<li><a href=".site_url().$v['news_url'].">".$v['news_title']."</a>"; 
                            }
                        }
                    }
                    ?>
                    <!-- <li><a href="<?php #echo $link['contact_us'];?>">Contact Us</a></li>     -->
                </ul>
                <ul class="mobile-menu mt-2 mb-2">      
                    <li class="open">
                        <a href="#">Produk</a>
                        <ul style="display:block;">                    
                            <?php 

                                if(!empty($link['product_category'])){
                                    foreach($link['product_category'] as $v){
                                        echo "<li><a href=".site_url().$link['routing']['product'].'/'.$v['category_url'].">".$v['category_name']."</a>"; 
                                    }
                                }   
                            ?>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Blogs</a>
                        <ul>
                            <?php 
                            if(!empty($link['blog'])){
                                foreach($link['blog'] as $v){
                                    echo "<li><a href='".site_url().$link['routing']['blog'].'/'.$v['category_url']."'>".$v['news_title']."</a></li>"; 
                                }
                            }                                
                            // if(!empty($link['article_category'])){
                            //     foreach($link['article_category'] as $v){
                            //         echo "<li><a href=".site_url().$link['routing']['blog'].'/'.$v['category_url'].">".$v['category_name']."</a>"; 
                            //     }
                            // }
                            ?>
                        </ul>
                    </li>                                       
                </ul>
            </nav>
            <form class="search-wrapper mb-2" action="#">
                <input type="text" class="form-control mb-0" placeholder="Search..." required />
                <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form>
        </div>
    </div>

    <!-- <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="demo4.html">
                <i class="icon-home"></i>Home
            </a>
        </div>
        <div class="sticky-info">
            <a href="category.html" class="">
                <i class="icon-bars"></i>Categosries
            </a>
        </div>
        <div class="sticky-info">
            <a href="wishlist.html" class="">
                <i class="icon-wishlist-2"></i>Wishlist
            </a>
        </div>
        <div class="sticky-info">
            <a href="login.html" class="">
                <i class="icon-user-2"></i>Account
            </a>
        </div>
        <div class="sticky-info">
            <a href="cart.html" class="">
                <i class="icon-shopping-cart position-relative">
					<span class="cart-count badge-circle">3</span>
				</i>Cart
            </a>
        </div>
    </div> -->

    <!--
    <div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form" style="background: #f1f1f1 no-repeat center/cover url(<?php #echo $asset; ?>assets/images/newsletter_popup_bg.jpg)">
        <div class="newsletter-popup-content">
            <img src="<?php #echo $asset; ?>assets/images/logo.png" width="111" height="44" alt="Logo" class="logo-newsletter">
            <h2>Subscribe to newsletter</h2>

            <p>
                Subscribe to the Porto mailing list to receive updates on new arrivals, special offers and our promotions.
            </p>

            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Your email address" required />
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
            <div class="newsletter-subscribe">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
                    <label for="show-again" class="custom-control-label">
						Don't show this popup again
					</label>
                </div>
            </div>
        </div>
        <button title="Close (Esc)" type="button" class="mfp-close">
			×
		</button>
    </div>
    -->

    <!-- End .newsletter-popup -->
    <style>
        #btn_chat {
            height:40px;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25D366;
            color: white;
            padding: 10px 15px;
            border-radius: 50px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            font-size: 16px;
            text-decoration: none;
        }
        #btn_chat i {
            margin-right: 5px;
            position:relative;
            bottom:8px;
            font-size:25px;            
        }
        #btn_chat span {
            /* margin-right: 5px; */
            position:relative;
            bottom:12px;
            font-size:18px;       
            font-family: "Open Sans", sans-serif;     
        }        
        #btn_chat:hover {
            background-color: #1DA851;
            text-decoration: none;
        }
        #scroll-top{
            bottom:82px;
        }
    </style>
    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>
    
    <?php 
    if(!empty($link['contact']['phone'][1]['phone'])){ ?> 
    <!-- <span id="cta" data-v="https://wa.me/<?php #echo $link['contact']['phone'][1]['phone'];?>?text=Halo,%20saya%20tertarik%20dengan%20informasi%20produk%20Mega%20Data%20" style="cursor:pointer;" onclick="window.open(this.getAttribute('data-v'), '_blank');">Chat Via WhatsApp</span>
    </a>-->
    <a id="btn_chat" class="text-white font1" title="Top" role="button" 
        href="https://wa.me/<?php echo $link['contact']['phone'][1]['phone'];?>?text=Halo,%20saya%20tertarik%20dengan%20informasi%20produk%20Mega%20Data%20" 
        target="_blank">
        <i class="ri-whatsapp-line"></i> 
        <span>Klik Untuk Chat</span>
    </a>
    <?php 
    } 
    ?>
    <!-- Plugins JS File -->
    <!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    <script src="<?php echo $asset; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo $asset; ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $asset; ?>assets/js/optional/isotope.pkgd.min.js"></script>
    <script src="<?php echo $asset; ?>assets/js/plugins.min.js"></script>
    <script src="<?php echo $asset; ?>assets/js/plugins/jquery.countTo.js"></script>
    <script src="<?php echo $asset; ?>assets/js/jquery.appear.min.js"></script>
    <script src="<?php echo $asset; ?>assets/js/nouislider.min.js"></script>  
    <!-- Main JS File -->
    <script src="<?php echo $asset; ?>assets/js/main.min.js"></script>
    <!-- <script>(function(){var js = "window['__CF$cv$params']={r:'7afd1b362a6789b3',m:'IF47KbX3l.N5w7LOgcq7.zZAxGSP_aJefP6i0ZouhzU-1680145269-0-AcC6/wbk2ySAMzyJHqt8/cUQ1aaAQP4NrOoLexw+7gNtRKLm2TM6y53GA1otFq9a4nx8ZgQU9m3tudiaoR8T1U4CT2RwHbCNhh7GlAWEE0yCFji0FVTS60L79eu99UU4zsyrM9hxz4V4sVdvxcnn87O8ZTe1N2n1DtEXrVgfj+EG',s:[0x6e2d9cbefd,0xfa802cad43],u:'/cdn-cgi/challenge-platform/h/b'};var now=Date.now()/1000,offset=14400,ts=''+(Math.floor(now)-Math.floor(now%offset)),_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../../cdn-cgi/challenge-platform/h/b/scripts/alpha/invisible5615.js?ts='+ts,document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.nonce = '';_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};}})();</script></body> -->
    
    <script src="https://cdn.jsdelivr.net/npm/compressorjs@1.1.1/dist/compressor.min.js"></script>
    <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGrJzgnYt1MWEtvYpBXGYxTR_EPNl7gjE&libraries=places" type="text/javascript"></script> -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script src="<?php echo base_url();?>assets/core/plugins/sweetalert2/sweetalert2.min.js"></script>    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>        
    <script>
        /* Notification */
        function notif(status, title, text = null) {
            var titlee = title.replace(/<\/?[^>]+(>|$)/g, "");
            if (parseInt(status) === 1) { //Success
                Toastify({
                    text: titlee,
                    // className: "success",
                    duration: 3000,
                    destination: "",
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "center", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "#4CAF50",
                        width:"20%",
                    },
                    theme:'dark',
                onClick: function(){} // Callback after click
                }).showToast();                    
            } else if (parseInt(status) === 2) { //Info
                Toastify({
                    text: titlee,
                    // className: "info",
                    duration: 3000,
                    destination: "",
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "center", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "#f7b84b",
                        width:"20%",                            
                    },
                onClick: function(){} // Callback after click
                }).showToast();                      
            } else if (parseInt(status) === 0) { //Error only
                Toastify({
                    text: titlee,
                    // className: "danger",
                    duration: 3000,
                    destination: "",
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "center", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "#f06548",
                        width:"20%",
                    },
                onClick: function(){} // Callback after click
                }).showToast();                         
            }
        }
        function numberToLabel(num) {
            if (num >= 1000000000) {
                return (num / 1000000000).toFixed(1).replace(/\.0$/, '') + ' B';
            }
            if (num >= 1000000) {
                return (num / 1000000).toFixed(1).replace(/\.0$/, '') + ' M';
            }
            if (num >= 1000) {
                return (num / 1000).toFixed(1).replace(/\.0$/, '') + ' k';
            }
            return num;
        }   
        function addCommas(string){
            string += '';
            var x = string.split('.');
            var x1 = x[0];
            var x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
        function removeCommas(string){

            return string.split(',').join("");
        }
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        /* Confirmation */
        function swalDelete(title,text){
            var html = `
                <div class="mt-3">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-5">
                        <h4>${title}</h4>
                        <p class="text-muted mx-4 mb-0">
                            ${text} ?
                        </p>
                    </div>
                </div>                
            `;                
            return Swal.fire({
                // title: 'Konfirmasi',
                html: html,
                // text: text,
                // icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                return new Promise((resolve, reject) => {
                    if(result.isConfirmed){
                        resolve(1);
                    }else{
                        resolve(0);
                    }
                });               
            });
        } 
        function swalConfirm(title,text,button1,button2){
            return Swal.fire({
                title: title,
                html: text,
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: button1,
                cancelButtonText: button2
            }).then((result) => {
                return new Promise((resolve, reject) => {
                    if(result.isConfirmed){
                        resolve(1);
                    }else{
                        resolve(0);
                    }
                });                    
            });
        }
        function swalConfirmDownload(title,text,image,button1,button2){
            var html = '<div class="mt-2">';
                html += '<img src="'+image+'" class="img-fluid" style="margin:0 auto;width:50%;">';
                html += '<div class="mt-2 fs-15 mx-5">';
                html += '<p class="text-muted mx-4 mb-0">';
                html += text+' ?</p></div></div>';

            return Swal.fire({
                title: title,
                html: html,
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: button1,
                cancelButtonText: button2
            }).then((result) => {
                return new Promise((resolve, reject) => {
                    // console.log(result.value);
                    if(result.value){
                        resolve(1);
                    }else{
                        resolve(0);
                    }
                });                    
            });
        }        
        function swalSuccess(title,text){
            var html = `
            <div class="mt-3">
                <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>
                <div class="mt-4 pt-2 fs-15"><h4>${title}</h4>
                    <p class="text-muted mx-4 mb-0">${text}</p>
                </div>
            </div>`;
            return Swal.fire({
                // title: title,
                // text: text,
                html:html,
                // icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tutup'
            }).then((result) => {
                return new Promise((resolve, reject) => {
                    if(result.isConfirmed){
                        resolve(1);
                    }else{
                        resolve(0);
                    }
                });                    
            });
        } 
        function swalSuccess2(title,text,button1){
            var html = `
            <div class="mt-3">
                <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>
                <div class="mt-4 pt-2 fs-15"><h4>${title}</h4>
                    <p class="text-muted mx-4 mb-0">${text}</p>
                </div>
            </div>`;
            return Swal.fire({
                // title: title,
                // text: text,
                html:html,
                // icon: 'info',
                showCancelButton: false,
                confirmButtonColor: '#364574',
                // cancelButtonColor: '#364574',
                confirmButtonText: button1,
                // cancelButtonText: 'Cancel'
            }).then((result) => {
                return new Promise((resolve, reject) => {
                    if(result.isConfirmed){
                        resolve(1);
                    }else{
                        resolve(0);
                    }
                });                    
            });
        }
        function swalInput(title,text,button1,button2){
            return Swal.fire({
                title: title,
                input: "text",
                value: text,
                inputValue: text,
                // inputLabel: "Your email address",
                inputPlaceholder: text,
                showCancelButton: true, // Display a cancel button
                confirmButtonColor: '#364574',
                cancelButtonColor: '#ced4da',                    
                confirmButtonText: button1, // Customize the confirm button text
                cancelButtonText: button2, // Optional: Customize the cancel button text                    
            }).then((result) => {
                return new Promise((resolve, reject) => {
                    if (result.isConfirmed) {
                        resolve(result.value); // Resolve with the input value
                    } else {
                        resolve(null); // Resolve with null if canceled
                    }
                    // resolve(result.value);
                });                    
            });
        }   
        function swalSelect(title,text,button1,button2,arraydata){
            // console.log(arraydata);
            var ahtml = '';
            for(var a=0; a<arraydata.length; a++){
                ahtml += '<option value="'+arraydata[a]+'">'+arraydata[a]+'</option>';
            }

            var html = `
                <div class="mt-3">
                    <div class="mt-4 pt-2 fs-15 mx-5">
                        <h4>${title}</h4>
                        <p class="text-muted mx-4 mb-0">
                            ${text} ?
                        </p>
                        <select id="swal-select" class="form-select swal2-input">
                            <option value="0">Pilih</option>
                            ${ahtml}
                        </select>
                    </div>
                </div>                
            `;                       


            return Swal.fire({
                // title: title,
                html:html,
                // input: "text",
                // value: text,
                // inputValue: text,
                // // inputLabel: "Your email address",
                // inputPlaceholder: text,
                showCancelButton: true, // Display a cancel button
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',                    
                confirmButtonText: button1, // Customize the confirm button text
                cancelButtonText: button2, // Optional: Customize the cancel button text                    
                preConfirm: () => {
                    // Ambil nilai dari <select>
                    const selectedValue = document.getElementById('swal-select').value;
                    if (!selectedValue) {
                        Swal.showValidationMessage('You need to select an option!');
                    }
                    return selectedValue;
                }
            }).then((result) => {
                return new Promise((resolve, reject) => {
                    if (result.isConfirmed) {
                        resolve(result.value); // Resolve with the input value
                    } else {
                        resolve(0); // Resolve with null if canceled
                    }
                    // resolve(result.value);
                });                    
            });
        }      
        function swalSelectIndex(title,text,button1,button2,arraydata){
            console.log(arraydata);
            var ahtml = '';
            for(var a=0; a<arraydata.length; a++){
                ahtml += '<option value="'+arraydata[a]['workspace_session']+'">'+arraydata[a]['workspace_name']+'</option>';
            }

            var html = `
                <div class="mt-3">
                    <div class="mt-4 pt-2 fs-15 mx-5">
                        <h4>${title}</h4>
                        <p class="text-muted mx-4 mb-0">
                            ${text} ?
                        </p>
                        <select id="swal-select" class="form-select swal2-input">
                            <option value="0">Pilih</option>
                            ${ahtml}
                        </select>
                    </div>
                </div>                
            `;                       


            return Swal.fire({
                // title: title,
                html:html,
                // input: "text",
                // value: text,
                // inputValue: text,
                // // inputLabel: "Your email address",
                // inputPlaceholder: text,
                showCancelButton: true, // Display a cancel button
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',                    
                confirmButtonText: button1, // Customize the confirm button text
                cancelButtonText: button2, // Optional: Customize the cancel button text                    
                preConfirm: () => {
                    // Ambil nilai dari <select>
                    const selectedValue = document.getElementById('swal-select').value;
                    if (!selectedValue) {
                        Swal.showValidationMessage('You need to select an option!');
                    }
                    return selectedValue;
                }
            }).then((result) => {
                return new Promise((resolve, reject) => {
                    if (result.isConfirmed) {
                        resolve(result.value); // Resolve with the input value
                    } else {
                        resolve(0); // Resolve with null if canceled
                    }
                    // resolve(result.value);
                });                    
            });
        }
        
        /* Confirmation JConfirm */
        function jConfirmInput(title,text,button1,button2) {
            let dsp     = `
                <div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">
                    <div class="form-group">
                        <input id="confirm-input" name="confirm-input" class="form-control" value="${text}" autofocus>
                    </div>
                </div>
            `;                
            return new Promise((resolve, reject) => {
                $.confirm({
                    title: title,
                    content: dsp,
                    // columnClass: 'col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1',  
                    // autoClose: 'button2|30000',
                    // closeIcon: true, closeIconClass: 'fas fa-times',
                    animation:'zoom', closeAnimation:'bottom', animateFromElement:false, useBootstrap:true,         
                    onOpenBefore: function () {
                        // this.$el.css('z-index', 1051); // Pastikan modal berada di atas
                    },     
                    onOpen: function () {
                        this.$content.find('#confirm-input').focus();
                    },                                  
                    buttons: {
                        confirm: {
                            text: button1,
                            btnClass: 'btn-primary',
                            action: function () {
                                let userInput = this.$content.find('#confirm-input').val();
                                resolve(userInput);
                            }
                        },
                        cancel: {
                            text: button2,
                            btnClass: 'btn-danger',                                
                            action: function () {
                                reject('User cancelled');
                                // return false;
                            }
                        }
                    }
                });
            });
        }
        /* Ajax */
        function ajax(url,data){
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: data,
                    dataType: 'json', cache: 'false', 
                    contentType: false, processData: false,                    
                    success: function(response) {
                        resolve(response);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error ajax(): '+error);
                        // notif(0,'Error, Please try again');
                        reject(error);
                    }
                });
            });                    
        }
    </script>
    <script>
    $(document).ready(function() {
        let url = "<?= base_url('webpage'); ?>";
        let url_redirect = "<?= base_url('webpage/osm'); ?>";         
        let imageRESULT;
        let vSET_TIMEOUT = 3000;

        //Map Config
        let mapLAT      = -6.200000;
        let mapLNG      = 106.816666;
        let mapZOOM     = 10;
        
        let geocoderADDRESS;

        let map; let geocoder;
        let marker; let marker2;
        let circle;
        let additionalCircles = [];
        let additionalMarkers = [];            
        let infowindow;

        let branchICON  = "<?php echo base_url('upload/map_icon/branch.png'); ?>";
        let meICON      = "<?php echo base_url('upload/map_icon/me.png'); ?>";        
        let redICON     = "<?php echo base_url('upload/map_icon/red.png'); ?>";
        let greenICON   = "<?php echo base_url('upload/map_icon/green.png'); ?>";

        let checkINPHOTO = "<?= site_url('upload/click_to_selfie.png'); ?>";
        let checkOUTPHOTO = "<?= site_url('upload/click_to_photo.png'); ?>";
        let sampleIMAGE = "<?= site_url('upload/sample.png'); ?>";

        function initMap() {
            // map = new google.maps.Map(document.getElementById('map'), {
            //     center: {lat: mapLAT, lng: mapLNG},
            //     zoom: mapZOOM,
            //     mapTypeControl: false, // Menonaktifkan kontrol jenis peta
            //     fullscreenControl: false, // Menonaktifkan kontrol fullscreen
            //     streetViewControl: false, // Menonaktifkan kontrol Street View   
            //     // draggable: true             
            // });
            // marker = new google.maps.Marker({
            //     position: {lat: mapLAT, lng: mapLNG},
            //     map: map,
            //     // icon: 'upload/map_icon/red.png'
            // });
            // geocoder = new google.maps.Geocoder();
            // marker.addListener('dragend', function(event) {
            //     const newPosition = {
            //         lat: event.latLng.lat(),
            //         lng: event.latLng.lng()
            //     };
            //     console.log('Marker baru:', newPosition);
            // });
            console.log(mapLAT,mapLNG,mapZOOM);
            map = L.map('map').setView([mapLAT, mapLNG], mapZOOM);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
                $(".leaflet-control-attribution").css('display','none');
            // L.marker([mapLAT, mapLNG]).addTo(map)
            //     .bindPopup('A pretty CSS popup.<br> Easily customizable.')
            //     .openPopup();                
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    console.log('getLocation() => :'+JSON.stringify(pos));  
                    updateLocation(pos);

                }, function() {
                    console.log('Error: The Geolocation service failed.');                    
                });
            } else {
                // Browser doesn't support Geolocation
                console.log('Error: The Geolocation service failed.');
            }
        }
        function updateLocation(position) { //marker
            const newPos = {
                lat: position.lat,
                lng: position.lng
            };                         
            $("#latlng").val(position.lat+', '+position.lng);
            updateGeoCoder(L.latLng(position.lat,position.lng));

            var setIcon = L.icon({
                iconUrl: meICON, // Ganti dengan URL gambar ikon berwarna merah
                iconSize: [64, 64], // Ukuran ikon
                iconAnchor: [19, 38], // Titik jangkar ikon, sesuai dengan posisi ikon di peta
                popupAnchor: [0, -38] // Titik jangkar popup, relatif terhadap titik jangkar ikon
            });
            
            // Menambahkan marker ke peta
            marker = L.marker([position.lat, position.lng], {icon: setIcon}).addTo(map)
                .bindPopup('Lokasi Saya')
                .openPopup();      
                
            map.setView([position.lat,position.lng], mapZOOM);
        }
        function updateGeoCoder(latlng) {
            var url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latlng.lat}&lon=${latlng.lng}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.address) {
                        // L.marker(latlng).addTo(map)
                        //     .bindPopup(data.display_name)
                        //     .openPopup();
                        // map.setView(latlng, 13);
                        // console.log(data.display_name);
                        geocoderADDRESS = data.display_name;
                    } else {
                        alert('Location not found');
                    }
                })
                .catch(err => console.error(err));
        }
        function getCircle(){ //Ajax
            console.log('getCircle() => ');
            let form = new FormData();
            form.append('action', 'get_location');
            form.append('branch', 2);
            $.ajax({
                type: "post",
                url: url,
                data: form, 
                dataType: 'json', cache: 'false', 
                contentType: false, processData: false,
                beforeSend:function(x){
                    // x.setRequestHeader('Authorization',"Bearer " + bearer_token);
                    // x.setRequestHeader('X-CSRF-TOKEN',csrf_token);
                },
                success:function(d){
                    let s = d.status;
                    let m = d.message;
                    let r = d.result;
                    if(parseInt(s) == 1){
                        // notif(s,m);
                        updateCircle(r);
                    }else{
                        // notif(s,m);
                    }
                },
                error:function(xhr,status,err){
                    // notif(0,err);
                }
            });
        }
        function updateCircle(positions){ //circle, marker2 => additionalCircles, additionalMarkers
            // console.log(positions);
            positions.forEach(v => {
                // Menambahkan lingkaran ke peta
                circle = L.circle([parseFloat(v['location_lat']), parseFloat(v['location_lng'])], {
                    color: 'red',
                    fillColor: '#f03',
                    fillOpacity: 0.5,
                    // radius: parseInt(v['location_allow_radius'])
                    radius:40
                }).addTo(map);           
                circle.bindTooltip(v['location_id']);

                // <img src="${sampleIMAGE}" alt="Sample Image" style="width:100px;margin:0 auto;">
                var popupContent = `
                    <div class="custom-popup">
                        <b>${v['location_name']}</b>
                        <p><strong>Alamat:</strong> ${v['location_address']}</p>
                        <p><strong>Kota/Kab:</strong> ${v['location_note']}</p>                        
                        <p><strong>Latitude:</strong> ${v['location_lat']}</p>
                        <p><strong>Longitude:</strong> ${v['location_lng']}</p>
                    </div>
                `;
                // Menambahkan tooltip ke lingkaran
                // circle.bindTooltip(v['location_name'], {
                //     permanent: true, // Menampilkan label secara permanen
                //     direction: 'center', // Menempatkan label di tengah lingkaran
                //     className: 'circle-tooltip' // Menambahkan kelas CSS khusus untuk styling
                // }).openTooltip();
                // Create a custom icon
                var customIcon = L.icon({
                    iconUrl: branchICON,  // Replace with your custom icon URL
                    iconSize: [48, 48],  // Size of the icon
                    iconAnchor: [16, 32], // Point of the icon that will correspond to the marker's location
                    popupAnchor: [0, -32] // Point from which the popup should open relative to the iconAnchor
                });
                marker2 = L.marker([parseFloat(v['location_lat']), parseFloat(v['location_lng'])], { icon: customIcon }).addTo(map)
                    .bindPopup(popupContent)
                    .openPopup();                 

                
                additionalCircles.push(circle);
                additionalMarkers.push(marker2)
                // console.log(additionalCircles);
                // circle.bindPopup(v['location_name']);     
            });
        }
        function removeCircle() {
            additionalCircles.forEach(circle => {
                // circle.setMap(null);
                map.removeLayer(circle);
            });
            additionalCircles = [];
        }            
        function removeMarker() {
            additionalMarkers.forEach(marker2 => {
                // marker2.setMap(null);
                map.removeLayer(marker2);
            });
            additionalMarkers = [];
        }      
        function checkIfMarkerInCircles() {
            // console.log(marker);
            // console.log(marker.getLatLng());
            // console.log(additionalCircles);
            // console.log(marker2);
            // if (!marker || additionalCircles.length === 0) {
            //     notif(0,'Marker / circle belum diload');
            //     console.log('Marker or circles not initialized.');
            //     return;
            // }

            let isInAnyCircle = false;
            let returnDistance = 0;

            additionalCircles.forEach(circle => {
                // sirc =  { 
                //     label: circle['_tooltip']['_content'],
                //     center: L.latLng(circle['_latlng']['lat'], circle['_latlng']['lng']), 
                //     radius: circle['_mRadius']
                // };

                var m1 = marker.getLatLng(); //Marker Saya
                var m2 = L.latLng(circle['_latlng']['lat'], circle['_latlng']['lng']); // Array Radius
                
                distanceToCircle = m1.distanceTo(m2);  
                // console.log(distanceToCircle.toFixed(2)+' meter');
                if (distanceToCircle <= circle['_mRadius']) {
                    isInAnyCircle = true;          
                    closestLabel = circle['_tooltip']['_content'];
                    // locationID = closestLabel;                    
                }                
                returnDistance = distanceToCircle;
            });

            // Memeriksa apakah marker berada dalam salah satu lingkaran
            if (isInAnyCircle) {
                // alert(`Marker berada di dalam salah satu lingkaran [${closestLabel}], ${returnDistance.toFixed(2)}`);
                return {status:1,meter:returnDistance.toFixed(2),label:closestLabel};
            } else {
                // alert(`Marker tidak berada di dalam kedua lingkaran, kurang ${returnDistance.toFixed(2)}`);
                return {status:0,meter:returnDistance.toFixed(2)};
            }         
        }                

        function checkDashboardActivity(limit_start) {
            // $.playSound("http://www.noiseaddicts.com/samples_1w72b820/3721.mp3");
            // var awal = $("#filter_date").attr('data-start');
            // var akhir = $("#filter_date").attr('data-end');
            // var user = $("#dashboard_user").val();
            var data = {
                action: 'load_activity',
                // start: awal,
                // end: akhir,
                // user: user,
                limit_start: limit_start,
                limit_end: 5,
            };
            $.ajax({
                type: "post",
                url: url,
                data: data,
                dataType: 'json',
                cache: false,
                beforeSend: function () {
                    $("#activity").append("<div class='loading-pages text-center' style='color: black;padding-top:10px'><i class='fas fa-spinner fa-spin m-2'></i> Sedang Memuat...</div>");
                },
                success: function (d) {
                    if (parseInt(d.total_records) > 0) {
                        $(".loading-pages").hide(200);
                        setTimeout(() => {
                            $(".loading-pages").remove();
                        }, 500);
                        $.each(d.result, function (i, val) {

                            var teks = '';
                            teks += `<div class="col-md-3 col-sm-12 col-xs-12 m-b-10">
                                        <div class="widget-item" style="border: 1px solid #e5e9ec;">
                                            <div class="controller overlay right">
                                                <a href="javascript:;" class="reload"></a>
                                                <a href="javascript:;" class="remove"></a>
                                            </div>
                                            <div class="tiles white p-t-15">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="profile-img-wrapper pull-left m-l-10">
                                                            <div class=" p-r-10">
                                                            <img src="${val['user_image']}" alt="" data-src="#" data-src-retina="#" width="35" height="35"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="user-name text-black bold large-text">&nbsp;&nbsp;<span class="semi-bold">${val['user_fullname']}</span> </div>
                                                        <div class="preview-wrapper">&nbsp;&nbsp;${val['location_name']}</div>
                                                    </div>
                                                </div>
                                                <div id="image-demo-carl" class="m-t-15 owl-carousel owl-theme" style="opacity: 1; display: block;">
                                                    <div class="owl-wrapper-outer autoHeight">
                                                        <div class="owl-wrapper" style="left: 0px; display: block;">
                                                            <div class="owl-item">
                                                                <div class="item col-md-12">
                                                                    <img src="${val['att_image']}" alt="" class="img-responsive" style="width:100%;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <p class="p-b-10 p-l-15 p-r-15">
                                                    <i>${val['att_note']}</i><br>
                                                    <b>${val['att_address']}</b><br>
                                                    <span style="color:#c2bdbd;">${val['time_ago']}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>`;
                            $("#activity").append(teks);
                        });
                        next_ = true;
                    } else {
                        next_ = false;
                        limit_start = 1;
                        $(".loading-pages").remove();
                        $("#activity").append("<div class='loading-pages text-center' style='color: black;padding-top:10px'>Tidak ada aktifitas</div>");
                    }
                },
                error: function (data) {
                    // checkInternet('offline');
                }
            });
            var waktu = setTimeout("checkDashboardActivity()", 6000000);
        }
        window.onload = function() {

            if ($('#map').length) {
                console.log('Element with ID "apa" is found.');
                initMap();
                getCircle();
                // setInterval(getLocation, 60000); // Polling setiap 10 detik
                setTimeout(() => {
                    getLocation();
                }, 3000);                
            } else {
                console.log('Element with ID "apa" is not found.');
            }

        };
        // getCircle();
        // Dashboard Scroll Activities
            var limit_start = 1;
            var next_ = true; // true = data ada dimuat kembali & false = data tidak ada!
            if (next_ == true) { //Start on Refresh Page
                next_ = false;
                checkDashboardActivity(limit_start);
            }
            $(window).on("scroll", function (e) {
                var scrollTop = Math.round($(window).scrollTop());
                var height = Math.round($(window).height());
                var dashboardHeight = Math.round($(document).height());
                if ($(window).scrollTop() + $(window).height() > ($(document).height() - 100) && next_ == true) {
                    next_ = false;
                    limit_start = limit_start + 1;
                    checkDashboardActivity(limit_start);
                }
            });
        // End of Dashboard School

        $(document).on("click","#btn_distance", function(e) {
            e.preventDefault();
            e.stopPropagation();
            checkIfMarkerInCircles();
        });
        $(document).on("click","#btn_move_location", function(e) {
            e.preventDefault();
            e.stopPropagation();
            var latlng = $("#latlng").val();
            var spl = latlng.split(', ');
            updateLocation({lat:parseFloat(spl[0]),lng:parseFloat(spl[1])});              
        });
        
        $(document).on("click","#btn_fetch_location", function(e){
            e.preventDefault();
            e.stopPropagation();
            getLocation();
        });
        $(document).on("click","#btn_fetch_circle", function(e){
            e.preventDefault();
            e.stopPropagation();
            getCircle();
        });            

        $(document).on("click","#btn_remove_circle", function(e){
            e.preventDefault();
            e.stopPropagation();
            removeCircle();
        });   
        $(document).on("click","#btn_remove_marker", function(e){
            e.preventDefault();
            e.stopPropagation();
            removeMarker();
        });                                       
        
        $(document).on("click","#btn_take_selfie, .btn_take_selfie", function(e){
            e.preventDefault();
            e.stopPropagation();
            // alert('btn_take_selfie');
            document.getElementById('camera_input').click();
        });  
        $(document).on("click","#btn_take_posting, .btn_take_posting", function(e){
            e.preventDefault();
            e.stopPropagation();
            document.getElementById('camera_input_posting').click();
        });   
        $(document).on("click","#btn_take_checkout, .btn_take_checkout", function(e){
            e.preventDefault();
            e.stopPropagation();
            document.getElementById('camera_input_checkout').click();
        });  
        $(document).on("click","#btn_take_izin, .btn_take_izin", function(e){
            e.preventDefault();
            e.stopPropagation();
            document.getElementById('camera_input_izin').click();
        });                                 
        $(document).on("click","#btn_take_sakit, .btn_take_sakit", function(e){
            e.preventDefault();
            e.stopPropagation();
            document.getElementById('camera_input_sakit').click();
        });                                         
        $(document).on("change","#camera_input", function(e){
            e.preventDefault();
            e.stopPropagation();
            const file = event.target.files[0];
            if (file) {
                console.log(file.size / 1024 + ' KB');
                new Compressor(file, {
                    quality: 0.4,
                    success(result) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            // imageRESULT = e.target.result;
                            // img.classList.add('img');
                            // img.setAttribute('data-image', e.target.result);
                            // img.style.maxWidth = '100%';
                            // document.body.appendChild(img);
                            $("#files_preview").attr('src',e.target.result);
                        };
                        reader.readAsDataURL(result);
                        // imageRESULT = result;
                        console.log('Compressed file size:', result.size / 1024, ' KB');
                    },
                    error(err) {
                        console.log(err.message);
                    },
                });
                // console.log(imageRESULT);
            }
        });
        $(document).on("change","#camera_input_checkout", function(e){
            e.preventDefault();
            e.stopPropagation();
            const file = event.target.files[0];
            if (file) {
                console.log(file.size / 1024 + ' KB');
                new Compressor(file, {
                    quality: 0.4,
                    success(result) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            // img.src = e.target.result;
                            // // imageRESULT = e.target.result;
                            // img.classList.add('img_checkout');
                            // img.setAttribute('data-image', e.target.result);
                            // img.style.maxWidth = '100%';
                            // document.body.appendChild(img);
                            $("#files_preview_checkout").attr('src',e.target.result);
                        };
                        reader.readAsDataURL(result);
                        // imageRESULT = result;
                        console.log('Compressed file size:', result.size / 1024, ' KB');
                    },
                    error(err) {
                        console.log(err.message);
                    },
                });
                // console.log(imageRESULT);
            }
        }); 
        $(document).on("change","#camera_input_posting", function(e){
            e.preventDefault();
            e.stopPropagation();
            const file = event.target.files[0];
            if (file) {
                console.log(file.size / 1024 + ' KB');
                new Compressor(file, {
                    quality: 0.4,
                    success(result) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            // img.src = e.target.result;
                            // // imageRESULT = e.target.result;
                            // img.classList.add('img_posting');
                            // img.setAttribute('data-image', e.target.result);
                            // img.style.maxWidth = '100%';
                            // document.body.appendChild(img);
                            $("#files_preview_posting").attr('src',e.target.result);
                        };
                        reader.readAsDataURL(result);
                        // imageRESULT = result;
                        console.log('Compressed file size:', result.size / 1024, ' KB');
                    },
                    error(err) {
                        console.log(err.message);
                    },
                });
                // console.log(imageRESULT);
            }
        }); 
        $(document).on("change","#camera_input_sakit", function(e){
            e.preventDefault();
            e.stopPropagation();
            const file = event.target.files[0];
            if (file) {
                console.log(file.size / 1024 + ' KB');
                new Compressor(file, {
                    quality: 0.4,
                    success(result) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            // img.src = e.target.result;
                            // // imageRESULT = e.target.result;
                            // img.classList.add('img_posting');
                            // img.setAttribute('data-image', e.target.result);
                            // img.style.maxWidth = '100%';
                            // document.body.appendChild(img);
                            $("#files_preview_sakit").attr('src',e.target.result);
                        };
                        reader.readAsDataURL(result);
                        // imageRESULT = result;
                        console.log('Compressed file size:', result.size / 1024, ' KB');
                    },
                    error(err) {
                        console.log(err.message);
                    },
                });
                // console.log(imageRESULT);
            }
        });
        $(document).on("change","#camera_input_izin", function(e){
            e.preventDefault();
            e.stopPropagation();
            const file = event.target.files[0];
            if (file) {
                console.log(file.size / 1024 + ' KB');
                new Compressor(file, {
                    quality: 0.4,
                    success(result) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            // img.src = e.target.result;
                            // // imageRESULT = e.target.result;
                            // img.classList.add('img_posting');
                            // img.setAttribute('data-image', e.target.result);
                            // img.style.maxWidth = '100%';
                            // document.body.appendChild(img);
                            $("#files_preview_izin").attr('src',e.target.result);
                        };
                        reader.readAsDataURL(result);
                        // imageRESULT = result;
                        console.log('Compressed file size:', result.size / 1024, ' KB');
                    },
                    error(err) {
                        console.log(err.message);
                    },
                });
                // console.log(imageRESULT);
            }
        });         
        
                
        $(document).on("click","#btn_checkin_new", function(e){
            e.preventDefault();
            e.stopPropagation();
            $("#files_preview").attr('src',checkINPHOTO);             
            $("#modal_checkin").modal('show');
        });
        $(document).on("click","#btn_checkout_new", function(e){
            e.preventDefault();
            e.stopPropagation();
            $("#files_preview_checkout").attr('src',checkOUTPHOTO);             
            $("#modal_checkout").modal('show');
        });
        $(document).on("click","#btn_posting_new", function(e){
            e.preventDefault();
            e.stopPropagation();
            $("#files_preview_posting").attr('src',checkOUTPHOTO);            
            $("#modal_posting").modal('show');
        });  
        $(document).on("click","#btn_izin_new", function(e){
            e.preventDefault();
            e.stopPropagation();
            $("#files_preview_izin").attr('src',checkOUTPHOTO);             
            $("#modal_izin").modal('show');
        });
        $(document).on("click","#btn_sakit_new", function(e){
            e.preventDefault();
            e.stopPropagation();
            $("#files_preview_sakit").attr('src',checkOUTPHOTO);            
            $("#modal_sakit").modal('show');
        });    

        $(document).on("click","#btn_checkin", function(e){
            e.preventDefault();
            e.stopPropagation();
            var markerPosition = marker.getLatLng();
            var mDistance = checkIfMarkerInCircles();
            // if(mDistance['status'] == 1){
                // console.log(markerPosition.lat());
                // console.log(markerPosition.lng());     
                // let form = new FormData($("#form_checkin")[0]);
                var form = new FormData();                    
                form.append('action', 'checkin');
                form.append('lat', markerPosition['lat']);         
                form.append('lng', markerPosition['lng']);  
                form.append('location_id', mDistance['label']);       
                form.append('file',$("#camera_input")[0].files[0]);
                form.append('address',geocoderADDRESS); 
                // form.append('file', $("#files_preview").attr('src'));  
                // form.append('file', $(".img").attr('src'));  
                // form.append('files',imageRESULT);           
                var next = true;
                var fileInput = $("#camera_input")[0].files[0];
                if (fileInput == null) {
                    next = false;
                    notif(0,'Photo wajib dipilih');
                }

                if(next){
                    $.ajax({
                        type: "post",
                        url: url,
                        data: form, 
                        dataType: 'json',
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend:function(x){
                            // notif(1,'Silahkan tunggu');
                            $("#btn_checkin").attr('disabled',true);
                            $("#btn_checkin").html('<i class="fas fa-spin fa-spinner"></i> Sedang Mengirim');
                        },
                        success:function(d){
                            let s = d.status;
                            let m = d.message;
                            let r = d.result;
                            if(parseInt(s) == 1){
                                notif(1,'Sukses Checkin');
                                $("#modal_checkin").modal('hide');                        
                                $("#btn_checkin").removeAttr('disabled');
                                $("#btn_checkin").html('<i class="fas fa-sign-in-alt"></i> Check IN'); 
                                setTimeout(() => {
                                    window.location.href = url_redirect;
                                }, vSET_TIMEOUT);
                            }else{
                                notif(s,m);
                                $("#btn_checkin").removeAttr('disabled');
                                $("#btn_checkin").html('<i class="fas fa-sign-in-alt"></i> Check IN');                             
                            }
                        },
                        error:function(xhr,status,err){
                            notif(0,err);
                        }
                    });
                }
            // }else{
            //     notif(0,'Anda berada diluar zona absensi');
            // }
        }); 
        $(document).on("click","#btn_checkout", function(e){
            e.preventDefault();
            e.stopPropagation();
            var markerPosition = marker.getLatLng();
            var mDistance = checkIfMarkerInCircles();
            // if(mDistance['status'] == 1){
                // console.log(markerPosition.lat());
                // console.log(markerPosition.lng());     
                var form = new FormData();
                form.append('action', 'checkout');
                form.append('lat', markerPosition['lat']);         
                form.append('lng', markerPosition['lng']);  
                form.append('location_id', mDistance['label']);  
                form.append('keterangan', $("#keterangan").val());  
                form.append('address',geocoderADDRESS); 
                // form.append('file', $(".img_checkout").attr('data-image')); 
                // form.append('file', $("#files_preview_checkout").attr('src'));    
                form.append('file',$("#camera_input_checkout")[0].files[0]);    
                
                var next = true;
                var fileInput = $("#camera_input_checkout")[0].files[0];
                if (fileInput == null) {
                    next = false;
                    notif(0,'Photo wajib dipilih');
                }

                if(next){                                                                                                                            
                    $.ajax({
                        type: "post",
                        url: url,
                        data: form, 
                        dataType: 'json', cache: 'false', 
                        contentType: false, processData: false,
                        beforeSend:function(x){
                            // notif(1,'Silahkan tunggu');
                            $("#btn_checkout").attr('disabled',true);
                            $("#btn_checkout").html('<i class="fas fa-spin fa-spinner"></i> Sedang Mengirim');
                        },
                        success:function(d){
                            let s = d.status;
                            let m = d.message;
                            let r = d.result;
                            if(parseInt(s) == 1){
                                notif(s,m);
                                $("#modal_checkout").modal('hide');                        
                                $("#btn_checkout").removeAttr('disabled');
                                $("#btn_checkout").html('<i class="fas fa-sign-out-alt"></i> Check OUT');  
                                setTimeout(() => {
                                    window.location.href = url_redirect;
                                }, vSET_TIMEOUT);                                               
                            }else{
                                notif(s,m);
                            }
                        },
                        error:function(xhr,status,err){
                            notif(0,err);
                        }
                    });      
                } 
            // }else{
            //         notif(0,'Anda berada diluar zona absensi');
            // }         
        }); 
        $(document).on("click","#btn_posting", function(e){
            e.preventDefault();
            e.stopPropagation();
            var markerPosition = marker.getLatLng();         
            var form = new FormData();
            form.append('action', 'posting');
            form.append('lat', markerPosition['lat']);         
            form.append('lng', markerPosition['lng']);    
            form.append('keterangan', $("#keterangan_posting").val());     
            form.append('address',geocoderADDRESS); 
            // form.append('file', $(".img_posting").attr('data-image'));   
            // form.append('file', $("#files_preview_posting").attr('src'));     
            form.append('file',$("#camera_input_posting")[0].files[0]);           
            
            var next = true;
            var fileInput = $("#camera_input_posting")[0].files[0];
            if (fileInput == null) {
                next = false;
                notif(0,'Photo wajib dipilih');
            }
                        
            if(next){            
                $.ajax({
                    type: "post",
                    url: url,
                    data: form, 
                    dataType: 'json', cache: 'false', 
                    contentType: false, processData: false,
                    beforeSend:function(x){
                        $("#btn_posting").attr('disabled',true);
                        $("#btn_posting").html('<i class="fas fa-spin fa-spinner"></i> Sedang Mengirim');
                    },
                    success:function(d){
                        let s = d.status;
                        let m = d.message;
                        let r = d.result;
                        if(parseInt(s) == 1){
                            notif(s,m);
                            $("#modal_posting").modal('hide');   
                            $("#keterangan_posting").val('');
                            $("#btn_posting").removeAttr('disabled');
                            $("#btn_posting").html('<i class="fas fa-sign-out-alt"></i> Kirim');  
                            setTimeout(() => {
                                window.location.href = url_redirect;
                            }, vSET_TIMEOUT);                        
                        }else{
                            notif(s,m);
                        }
                    },
                    error:function(xhr,status,err){
                        // notif(0,err);
                    }
                });      
            }       
        });       
        $(document).on("click","#btn_izin", function(e){
            e.preventDefault();
            e.stopPropagation();
            // var markerPosition = marker.getLatLng();         
            var form = new FormData();
            form.append('action', 'izin');
            // form.append('lat', markerPosition['lat']);         
            // form.append('lng', markerPosition['lng']);    
            form.append('keterangan', $("#keterangan_izin").val());     
            // form.append('address',geocoderADDRESS); 
            // form.append('file', $(".img_posting").attr('data-image'));   
            // form.append('file', $("#files_preview_izin").attr('src'));      
            form.append('file',$("#camera_input_izin")[0].files[0]);   
            var next = true;
            var fileInput = $("#camera_input_izin")[0].files[0];
            if (fileInput == null) {
                next = false;
                notif(0,'Photo wajib dipilih');
            }
                
            if(next){
                $.ajax({
                    type: "post",
                    url: url,
                    data: form, 
                    dataType: 'json', cache: 'false', 
                    contentType: false, processData: false,
                    beforeSend:function(x){
                        $("#btn_izin").attr('disabled',true);
                        $("#btn_izin").html('<i class="fas fa-spin fa-spinner"></i> Sedang Mengirim');
                    },
                    success:function(d){
                        let s = d.status;
                        let m = d.message;
                        let r = d.result;
                        if(parseInt(s) == 1){
                            notif(s,m);
                            $("#modal_izin").modal('hide');   
                            $("#keterangan_izin").val('');
                            $("#btn_izin").removeAttr('disabled');
                            $("#btn_izin").html('<i class="fas fa-sign-out-alt"></i> Kirim');  
                            setTimeout(() => {
                                window.location.href = url_redirect;
                            }, vSET_TIMEOUT);
                        }else{
                            notif(s,m);
                        }
                    },
                    error:function(xhr,status,err){
                        // notif(0,err);
                    }
                });      
            }       
        });   
        $(document).on("click","#btn_sakit", function(e){
            e.preventDefault();
            e.stopPropagation();
            // var markerPosition = marker.getLatLng();         
            var form = new FormData();
            form.append('action', 'sakit');
            // form.append('lat', markerPosition['lat']);         
            // form.append('lng', markerPosition['lng']);    
            form.append('keterangan', $("#keterangan_sakit").val());     
            // form.append('address',geocoderADDRESS); 
            // form.append('file', $(".img_posting").attr('data-image'));   
            // form.append('file', $("#files_preview_sakit").attr('src'));       
            form.append('file',$("#camera_input_sakit")[0].files[0]);       
            var next = true;
            var fileInput = $("#camera_input_sakit")[0].files[0];
            if (fileInput == null) {
                next = false;
                notif(0,'Photo wajib dipilih');
            }
                
            if(next){            
                $.ajax({
                    type: "post",
                    url: url,
                    data: form, 
                    dataType: 'json', cache: 'false', 
                    contentType: false, processData: false,
                    beforeSend:function(x){
                        $("#btn_sakit").attr('disabled',true);
                        $("#btn_sakit").html('<i class="fas fa-spin fa-spinner"></i> Sedang Mengirim');
                    },
                    success:function(d){
                        let s = d.status;
                        let m = d.message;
                        let r = d.result;
                        if(parseInt(s) == 1){
                            notif(s,m);
                            $("#modal_sakit").modal('hide');   
                            $("#keterangan_sakit").val('');
                            $("#btn_sakit").removeAttr('disabled');
                            $("#btn_sakit").html('<i class="fas fa-sign-out-alt"></i> Kirim');  
                            setTimeout(() => {
                                window.location.href = url_redirect;
                            }, vSET_TIMEOUT);
                        }else{
                            notif(s,m);
                        }
                    },
                    error:function(xhr,status,err){
                        // notif(0,err);
                    }
                });      
            }       
        });

        // Web Ajax
        $(document).on("click","#btn_form_contact_send", function(e) {
            e.preventDefault(); e.stopPropagation();
            let next = true;
            /* If id not exist, UPDATE if id exist */
            /*
            if ($("#form_id").val().length === 0 || parseInt($("#form_id").val()) === 0) {
                if ($("#form_id").val().length === 0) {
                    next = false;
                    notif(0,'ID wajib diisi');
                }
            }
        
            */
            if(next){
                if ($("#contact_name").val().length === 0) {
                    next = false;
                    notif(0,'Nama wajib diisi');
                    $("#contact_name").focus();
                }
            }
            
            if(next){
                if ($("#contact_phone").val().length === 0) {
                    next = false;
                    notif(0,'Telepon wajib diisi');
                    $("#contact_phone").focus();
                }
            }

            if(next){
                if ($("#contact_email").val().length === 0) {
                    next = false;
                    notif(0,'Email wajib diisi');
                    $("#contact_email").focus();
                }
            }

            if(next){
                if ($("#contact_message").val().length === 0) {
                    next = false;
                    notif(0,'Pesan wajib diisi');
                }
            }
        
            /* Prepare ajax for UPDATE */
            /* If Form Validation Complete checked */
            if(next){
                $("#btn_form_contact_send").attr('disabled',true);
                $("#btn_form_contact_send").html('<i class="fas fa-spin fa-spinner"></i> Sedang Mengirim');

                var form = new FormData($("#form_contact")[0]);
                form.append('action', 'send_email');
                // form.append('name', $("#contact_name").val());
                // form.append('email', $("#contact_email").val());
                // form.append('phone', $("#contact_phone").val());
                // form.append('message', $("#contact_message").val());
                ajax(url, form)
                    .then(d => {
                        let s = d.status; let m = d.message; let r = d.result;
                        if(parseInt(s) == 1){
                            // notif(s,m);
                            $("#form_contact")[0].reset();
                        }else{
                            notif(s,m);
                        }
                        $("#btn_form_contact_send").removeAttr('disabled');
                        $("#btn_form_contact_send").html('<i class="fas fa-paper-plane"></i> Kirim');                        
                    }).catch(error => {
                        notif(0,error);
                        $("#btn_form_contact_send").removeAttr('disabled');
                        $("#btn_form_contact_send").html('<i class="fas fa-paper-plane"></i> Kirim');
                    }
                )
            }   
        });

        $(document).on("click","#btn_download", function(e) {
            e.preventDefault();
            e.stopPropagation();
            var sr = $(this).attr('data-url');
            var img = 'upload/Company-Profile-Megadata-ISP.png';
            var c = swalConfirmDownload('Download Company Profile', 'Apakah anda yakin ingin mendownload Company Profile?',img,'Download','Batal');
            console.log(c);
            c.then((result) => {
                if (result == 1) {
                    window.open(sr, '_blank');
                    console.log('Opened in new tab');
                } else {
                    console.log('Cancel');
                }
            });
        });
        
    });      

</script>