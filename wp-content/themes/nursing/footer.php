<?php $content = get_option('general_settings'); ?>

<footer>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="footer-columns">
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="footer-logo">
                            <div class="logo">
                                <a href="<?php echo get_site_url(); ?>">
                                    <img class="logo-img img-responsive"
                                         src="<?php echo isset($content['footer_logo']) ? wp_get_attachment_url($content['footer_logo']) : ""; ?>"
                                         alt="School Logo">
                                </a>
                            </div>
                            <div class="social">
                                <h3>Follow Us</h3>
                                <div class="social-icons">
                                    <ul>
                                        <li class="facebook"><a
                                                    href="<?php echo isset($content['facebook']) ? $content['facebook'] : ""; ?>"
                                                    target="_blank"><span><i
                                                            class="fab fa-facebook-f"></i></span></a></li>
                                        <li class="twitter"><a
                                                    href="<?php echo isset($content['twitter']) ? $content['twitter'] : ""; ?>"
                                                    target="_blank"><span><i
                                                            class="fab fa-twitter"></i></span></a>
                                        </li>
                                        <li class="instagram"><a
                                                    href="<?php echo isset($content['instagram']) ? $content['instagram'] : ""; ?>"
                                                    target="_blank"><span><i
                                                            class="fab fa-instagram"></i></span></a></li>
                                        <li class="pinterest"><a
                                                    href="<?php echo isset($content['pinterest']) ? $content['pinterest'] : ""; ?>"
                                                    target="_blank"><span><i
                                                            class="fab fa-pinterest-p"></i></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="address footer-text">
                            <h3>Address</h3>
                            <p>Address: <?php echo isset($content['address']) ? $content['address'] : "";
                                echo isset($content['city']) ? ", " . $content['city'] : "";
                                echo isset($content['pincode']) ? " - " . $content['pincode'] : "";
                                echo isset($content['state']) ? ", " . $content['state'] : "";
                                echo isset($content['country']) ? ", " . $content['country'] : "";
                                ?></p>
                            <p>
                                <a href="tel:">Phone: <?php echo isset($content['phone']) ? "+91" . $content['phone'] : ""; ?></a>
                            </p>
                            <p>
                                <a href="tel:">Mobile: <?php echo isset($content['mobile']) ? "+91" . $content['mobile'] : ""; ?></a>
                            </p>
                            <p>
                                <a href="mailto:">Email: <?php echo isset($content['email']) ? $content['email'] : ""; ?></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="other-links footer-text">
                            <h3>Other Links</h3>
                            <ul>
                                <?php
                                $nav_menu = wp_nav_menu(array(
                                    'theme_location' => 'footer-menu',
                                    'container_class' => 'custom-menu-class'));
                                print_r($nav_menu); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="map footer-text">
                            <h3>Get Directions</h3>
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="copyright-text"><?php echo isset($content['copyright']) ? $content['copyright'] : ""; ?></div>
    </div>
</footer>
<div class="popups" style="display: none;">
    <div class="search-box">
        <div class="close-btn"><i class="fas fa-times"></i></div>
        <input type="search" id="keyword-search" placeholder="Type your keywords">
        <button class="btn search-button">Search</button>
    </div>
</div>
<script type="text/javascript">
    var surat, options, map, map1, marker, marker1;

    function initMap() {
        surat = {
            lat: <?php echo isset($content['latitude']) ? $content['latitude'] : "";?>,
            lng: <?php echo isset($content['longitude']) ? $content['longitude'] : "";?>};
        options = {
            zoom: 12,
            center: surat
        };
        map = new google.maps.Map(document.getElementById('map'), options);
        marker = new google.maps.Marker({
            position: surat,
            map: map
        });
        var id = jQuery("#contact").val();
        if (id == 1) {
            map1 = new google.maps.Map(document.getElementById('map1'), options);
            marker1 = new google.maps.Marker({
                position: surat,
                map: map1
            });
        }
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOK8ESprzTG2gl1hV0InRbfrlnyaKX-rE&callback=initMap"></script>
</body>
</html>