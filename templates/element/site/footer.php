<div class="dtry">
    <ul class="vqa">
        <li><a href="<?= $social->fb ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
        <li><a href="https://wa.me/<?= $social->whatsapp_no ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
        <li><a href="<?= $social->instagram ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
        <li><a href="<?= $social->youtube ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
    </ul>
</div>
<div class="cursor"></div>
<div class="footer" style="background-image: url(/assets/images/footer-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="f-logo">
                    <a href="/"><img src="/assets/images/COLOR-LOGO.png"></a>
                </div>
                <div class="office">
                    <div class="content">
                        <div class="off-head">
                            <h6>Follow us on</h6>
                        </div>
                    </div>
                    <ul class="left-icon">
                        <li><a href="<?= $social->fb ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="<?= $social->youtube ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="<?= $social->instagram ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="f-head">
                    <h3>Quick Links</h3>
                </div>
                <ul class="sdr">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about-us">About</a></li>
                    <li><a href="/service">Services</a></li>
                    <li><a href="/gallery">Gallery</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <div class="f-head">
                    <h3>Get In Touch</h3>
                </div>
                <ul class="sdr">
                    <li>
                        <div class="icon"><i class="fa-solid fa-phone"></i></div>
                        <div class="c-text"><a href="tel:<?= $social->phone ?>"><span class="rwn"><?= $social->phone ?></span></a></div>
                    </li>
                    <li>
                        <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                        <div class="c-text"><a href="mailto:<?= $social->email ?>"><span class="rwn"><?= $social->email ?></span></a></div>
                    </li>
                    <li>
                        <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="c-text"><span class="rwn"><?= $social->address ?></span></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="copy-right">
    <div class="container">
        <p>Copyright © 2025. All Rights Reserved</p>
    </div>
</div>