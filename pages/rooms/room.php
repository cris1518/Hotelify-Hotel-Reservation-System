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
                    style="background-image: url('<?php echo  getSiteUrl()."/images/".$room_info['Immagine']; ?>');"></a>
                <div class="text">
                    <span class="d-block mb-4"><span class="display-4 text-primary"><?php echo $room_info['Prezzo']; ?>€</span>
                        <span class="text-uppercase letter-spacing-2">/ a notte</span> </span>

                    <p>
                        <?php echo $room_info['Descrizione']; ?>
                    </p>
                    <p><button type="button" class="btn btn-primary text-white" data-toggle="collapse"
                            data-target="#collRes" aria-expanded="false" aria-controls="colRes">Prenota Subito</button>
                    </p>
                    <div class="collapse" id="collRes">
                        <div class="card card-body">
                            <div class="card" style="border:none">
                                <div class="card-body" style="padding:0px !important">
                                    <div class="containter">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="ck-in">Check In</label>
                                                <input type="text" class="form-control" id='ck-in' required>
                                                <div class="invalid-feedback" id="err-ck-in">Inserire Check-In
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="ck-out">Check Out</label>
                                                <input type="text" class="form-control" id='ck-out' required>
                                                <div class="invalid-feedback" id="err-ck-out">Inserire Check-Out
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="ck-in">Person</label>
                                                <!-- <input type="text" class="form-control" id='person' required> -->

                                                <select class="form-control" id='person'>
                                                    <?php
                                                for ($i=0;$i<intval($room_info['Numero_Persone']);$i++) {
                                                    $y=$i+1;
                                                    echo ' <option value="'.$y.'">'.$y.'</option>';
                                                }
?>
                                                </select>
                                                <div class="invalid-feedback" id="err-person">Inserire Numero
                                                    Persone
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <button class="btn btn-success"
                                onclick="addToCart(<?php echo $room_info['id'].',\''. $room_info['Nome'].'\''?>)">Prenota</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <br><br><br><br>

    <?php
       require_once("../../includes/footer.php");

require_once("../../includes/js.php"); ?>
    <script>
        roomCalPick();
    </script>
</body>

</html>