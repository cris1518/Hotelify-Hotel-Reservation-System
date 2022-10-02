<?php
session_start();
require_once("../../includes/initialize.php") ?>

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
    <?php require_once("../../includes/css.php");
?>
</head>

<body>

    <?php require_once("../../includes/header.php") ;


?>
    <!-- END head -->


    <section class="site-hero inner-page overlay" style="background-image: url(../../images/hero_4.jpg)"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">Prenotazioni</h1>
                    <ul class="custom-breadcrumbs mb-4">
                        <li><a href="index.html">Home</a></li>
                        <li>&bullet;</li>
                        <li>Prenotazioni</li>
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

            <table class="table table-bordered table-sm" id="reservations-table">
                <thead>
                    <th></th>
                    <th>Stanza</th>
                    <th>Persone</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Prezzo</th>
                    <th>Stato</th>
                    <th></th>

                </thead>
                <tbody id="cart-body">
                    <?php


echo ReservationsList($USER_INFO['id']);

?>
                </tbody>
            </table>

        </div>
    </div>

    <br><br>






    <?php
  require_once("../../includes/footer.php");

require_once("../../includes/js.php"); ?>
</body>
<script>
    jQuery('#reservations-table').dataTable({
        "pageLength": 5,
        "language": {
            "lengthMenu": 'Mostra <select>' +
                '<option value="5" selected>5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="-1">Tutte</option>' +
                '</select> prenotazioni',
            "paginate": {
                "previous": "Indietro",
                "next": "Avanti"
            }
        },
        "info": false

    });
</script>

</html>