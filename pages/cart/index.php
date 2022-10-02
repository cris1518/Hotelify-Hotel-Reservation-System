<?php require_once("../../includes/initialize.php") ?>

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


    <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">Cart</h1>
                    <ul class="custom-breadcrumbs mb-4">
                        <li><a href="index.html">Home</a></li>
                        <li>&bullet;</li>
                        <li>Cart</li>
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
    <div class="card cart-card">
        <div class="card-body">

            <table class="table table-bordered table-sm" id="cart-table">
                <thead>
                    <th></th>
                    <th>Stanza</th>
                    <th>Persone</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Prezzo</th>
                    <th></th>


                </thead>
                <tbody id="cart-body">
                    <?php
    $cart_content=cartContent();
echo $cart_content;

?>
                </tbody>
            </table>
            <div class="row">
                <div class="col col-lg-8">
                    Totale:&nbsp;<span id="main-cart-total"><?php echo $_SESSION['cart_total']; ?></span>€

                </div>
                <div class="col col-lg-4"> <button class="btn btn-light" style="float:right;" onclick="goCheckout()"><i
                            class="fa fa-credit-card"></i>&nbsp;Procedi all'ordine</button></div>
            </div>

        </div>
    </div>

    <br><br>






    <?php
  require_once("../../includes/footer.php");

require_once("../../includes/js.php"); ?>
</body>


</html>