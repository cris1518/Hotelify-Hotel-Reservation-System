<?php

require_once("../../includes/initialize.php");
if ($_SERVER['REQUEST_METHOND']=="POST") {
}

if (isset($_GET['id'])) {
    $room_info=getRoom($_GET['id']);
} else {
    header("Location:../../index.php?p=rooms");
}

?>



<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sogo Hotel by Colorlib.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <?php require_once("../../includes/css.php") ?>
</head>

<body>

    <?php require_once("../../includes/header.php") ?>
    <!-- END head -->

    <section class="site-hero inner-page overlay"
        style="background-image: url(<?php echo  getSiteUrl()."/"; ?>images/hero_4.jpg)"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">Rooms</h1>
                    <ul class="custom-breadcrumbs mb-4">
                        <li><a href="index.html">Home</a></li>
                        <li>&bullet;</li>
                        <li>Rooms</li>
                    </ul>
                </div>
            </div>
        </div>

        <a class="mouse smoothscroll" href="#next">
            <div class="mouse-icon">
                <span class="mouse-wheel"></span>
            </div>
        </a>
    </section>
    <!-- END section -->



    <section class="section pb-4">

        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h2 class="heading" data-aos="fade"><?php echo $room_info['Nome']; ?>
                    </h2>

                </div>
            </div>

            <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
                <a href="#" class="image d-block bg-image-2"
                    style="background-image: url('<?php echo  getSiteUrl()."/"; ?>images/img_1.jpg');"></a>
                <div class="text">
                    <span class="d-block mb-4"><span class="display-4 text-primary"><?php echo $room_info['Prezzo']; ?>€</span>
                        <span class="text-uppercase letter-spacing-2">/ a notte</span> </span>

                    <p>
                        <?php echo $room_info['Descrizione']; ?>
                    </p>
                    <p><a href="#" class="btn btn-primary text-white">Prenota Subito</a></p>
                </div>
            </div>


        </div>
    </section>

    <br><br><br><br>
    <footer class="section footer-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-3 mb-5">
                    <ul class="list-unstyled link">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Rooms</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-5">
                    <ul class="list-unstyled link">
                        <li><a href="#">The Rooms &amp; Suites</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Restaurant</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-5 pr-md-5 contact-info">
                    <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
                    <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span>
                        <span> 198
                            West 21th Street, <br> Suite 721 New York NY 10016</span>
                    </p>
                    <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span>
                        <span> (+1)
                            435 3533</span>
                    </p>
                    <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span>
                        <span>
                            info@domain.com</span>
                    </p>
                </div>
                <div class="col-md-3 mb-5">
                    <p>Sign up for our newsletter</p>
                    <form action="#" class="footer-newsletter">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email...">
                            <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row pt-5">
                <p class="col-md-6 text-left">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart-o"
                        aria-hidden="true"></i> by
                    <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>

                <p class="col-md-6 text-right social">
                    <a href="#"><span class="fa fa-tripadvisor"></span></a>
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-twitter"></span></a>
                    <a href="#"><span class="fa fa-linkedin"></span></a>
                    <a href="#"><span class="fa fa-vimeo"></span></a>
                </p>
            </div>
        </div>
    </footer>
    <?php require_once("../../includes/js.php"); ?>
</body>

</html>