
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
                    <li>
                        <a href="product.html">Products</a>
                        <ul>
                            <li>
                                <a href="#" class="nolink">PRODUCT PAGES</a>
                                <ul>
                                    <li><a href="#">SIMPLE PRODUCT</a></li>
                                    <li><a href="#">VARIABLE PRODUCT</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="nolink">PRODUCT LAYOUTS</a>
                                <ul>
                                    <li><a href="#">EXTENDED LAYOUT</a></li>
                                    <li><a href="#">BUILD YOUR OWN</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Produk</a>
                        <ul>                    
                            <?php 
                                if(!empty($link['products'])){                                
                                    foreach($link['products'] as $a => $v){ ?>
                                        <li><a href="<?php echo base_url().$link['routing']['product'].'/'.$v['category_url'].'/'.$v['product_url'];?>"><?php echo $v['product_name'];?></a></li>
                                        <?php 
                                    } 
                                }
                            ?>
                        </ul>
                    <li>
                        <a href="#">Blogs</a>
                        <ul>
                            <?php 
                            if(!empty($link['article_category'])){
                                foreach($link['article_category'] as $v){
                                    echo "<li><a href=".site_url().$link['routing']['blog'].'/'.$v['category_url'].">".$v['category_name']."</a>"; 
                                }
                            }
                            ?>
                        </ul>
                    </li>                       
                    <li>
                        <a href="#">Projects</a>
                        <ul>
                            <?php 
                            if(!empty($link['project'])){
                                foreach($link['project'] as $v){
                                    echo "<li><a href=".site_url().$link['routing']['project'].'/'.$v['news_url'].">".$v['news_title']."</a>"; 
                                }
                            }
                            ?>
                        </ul>
                    </li>     
                    <li>
                        <a href="#">Gallery<span class="tip tip-hot">Baru!</span></a>
                        <ul>
                            <?php 
                            if(!empty($link['gallery'])){
                                foreach($link['gallery'] as $v){
                                    echo "<li><a href=".site_url().$link['routing']['gallery'].'/'.$v['news_url'].">".$v['news_title']."</a>"; 
                                }
                            }
                            ?>
                        </ul>
                    </li>                                        
                </ul>

                <ul class="mobile-menu">
                    <?php 
                    if(!empty($link['menu'])){
                        foreach($link['menu'] as $v){
                            echo "<li><a href=".site_url().$v['news_url'].">".$v['news_title']."</a>"; 
                        }
                    }
                    ?>
                    <li><a href="<?php echo $link['contact_us'];?>">Contact Us</a></li>
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

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

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
                iconUrl: greenICON, // Ganti dengan URL gambar ikon berwarna merah
                iconSize: [38, 38], // Ukuran ikon
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

                var popupContent = `
                    <div class="custom-popup">
                        <img src="${sampleIMAGE}" alt="Sample Image" style="width:100px;margin:0 auto;">
                        <h3>${v['location_name']}</h3>
                        <p><strong>Address:</strong> ${v['location_address']}</p>
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

                marker2 = L.marker([parseFloat(v['location_lat']), parseFloat(v['location_lng'])]).addTo(map)
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
            initMap();
            getCircle();
            // setInterval(getLocation, 60000); // Polling setiap 10 detik
            setTimeout(() => {
                getLocation();
            }, 3000);
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
        
        // $("#modal_test").modal('show');
        // $(document).on("change","#camera_input_test", function(e){
        
        // });
    });        
</script>