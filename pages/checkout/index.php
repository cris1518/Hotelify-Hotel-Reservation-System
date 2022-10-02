<?php
session_start();
require_once("../../includes/initialize.php") ;


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




    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index.html">Hotelify</a></div>
        <div class="col-6 col-lg-4 " data-aos="fade"> </div>
    </nav>
    <form action="" id="checkout-data">

        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-12">
                <div class="card cart-card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>Dettagli di fatturazione</h2>
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Nome <span class="form-req">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="<?php echo  $USER_INFO['Nome'] ?>">
                                        <div class="invalid-feedback" id="err-name">Inserire Nome
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="surname">Cognome <span class="form-req">*</span></label>
                                        <input type="text" class="form-control" id="surname" name="surname"
                                            value="<?php echo  $USER_INFO['Cognome'] ?>">
                                        <div class="invalid-feedback" id="err-surname">Inserire Cognome
                                        </div>
                                    </div>
                                    <div class=" form-group col-md-6">
                                        <label for="phone">Telefono <span class="form-req">*</span></label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="<?php echo  $USER_INFO['Telefono'] ?>">
                                        <div class="invalid-feedback" id="err-phone">Inserire Telefono
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email <span class="form-req">*</span></label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="<?php echo  $USER_INFO['Email'] ?>">
                                        <div class="invalid-feedback" id="err-email">Inserire Email
                                        </div>
                                    </div>
                                </div>
                                <div class=" form-group">
                                    <label for="address">Indirizzo <span class="form-req">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="1234 Main St">
                                    <div class="invalid-feedback" id="err-address">Inserire Indirizzo
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="state">Stato <span class="form-req">*</span></label>
                                        <select id="state" name="state" class="form-control">
                                            <option value="">Scegli...</option>
                                            <?php
                                       $countries=countryList();
foreach ($countries as $key => $value) {
    echo ' <option value="'.$key.'">'.$value.'</option>';
}
?>
                                        </select>

                                        <div class="invalid-feedback" id="err-state">Selezionare Stato
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="city">Città <span class="form-req">*</span></label>
                                        <select id="city" name="city" class="form-control">
                                            <option value="">Scegli...</option>
                                            <?php

                                       $cities=citiesList();
foreach ($cities as $key) {
    echo ' <option value="'.$key.'">'.$key.'</option>';
}
?>
                                        </select>

                                        <div class="invalid-feedback" id="err-city">Selezionare
                                            Città
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-8">
                                        <label for="province">Provincia <span class="form-req">*</span></label>
                                        <select id="province" name="province" class="form-control">
                                            <option value="">Scegli...</option>

                                            <?php
                                       $countries=provinceList();
foreach ($countries as $key=>$v) {
    echo ' <option value="'.$key.'">'.$v.'</option>';
}
?>
                                        </select>

                                        <div class="invalid-feedback" id="err-province">
                                            Selezionare Provincia
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="zipcode">Cap <span class="form-req">*</span></label>
                                        <input type="text" class="form-control" id="zipcode" name="zipcode">
                                        <div class="invalid-feedback" id="err-zipcode">Inserire Cap
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-12">
                <div class="card cart-card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>Riepilogo Ordine</h2>
                        </div>
                        <table class="table   table-sm table-striped" id="cart-table">
                            <thead>

                                <th>Stanza</th>
                                <th>Prezzo</th>
                            </thead>
                            <tbody id="cart-body">
                                <?php
    $cart_content=ckcartContent();
echo $cart_content;

?>
                            </tbody>
                        </table>
                        <p>
                        <h4>Totale:&nbsp;<?php echo $_SESSION['cart_total'];?>€
                        </h4>
                        </p>
                        <div>
                            <div class="form-check form-check-group" style="background: #ffffff;
    padding: 20px 0px 15px 25px;
    border-bottom: 1px solid #dddd;
    border-top: 1px solid #dddd;">
                                <input class="form-check-input" type="radio" id="payment-method1" value="credit-card"
                                    checked>
                                <label class="form-check-label" for="payment-method1">
                                    Paga con Carta di Credito <img src="credit.png" width="24px">
                                </label>
                            </div>
                            <div class="form-check form-check-group" style="background: #f2f2f2;
    padding: 20px 0px 15px 25px;
    border-bottom: 1px solid #dddd;
    border-top: 1px solid #dddd;">
                                <input class="form-check-input" type="radio" id="payment-method2" value="paypal">
                                <label class="form-check-label" for="payment-method2">
                                    Paga con PayPal <img src="paypal.png" width="24px">
                                </label>
                            </div>
                            <input type="hidden" name="payment-method" id="payment-method" value="credit-card">
                        </div>

                        <br>
                        <div> <button type="button" class="btn btn-light" style="" onclick="newReservation()"><i
                                    class="fa fa-box "></i>&nbsp;Effettua
                                Ordine</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </form>
    <br><br>






    <?php
  require_once("../../includes/footer.php");

require_once("../../includes/js.php"); ?>

    <style>
        .navbar {
            padding: 13px !important;
            background: #ffff !important;
            box-shadow: 1px 1px 1px #0000002b !important;
        }

        .site-logo a {
            color: #000;
        }
    </style>


    <script>
        jQuery("#payment-method1").click(function() {
            jQuery("#payment-method").attr("value", "credit-card")
        })

        jQuery("#payment-method2").click(function() {
            jQuery("#payment-method").attr("value", "paypal")
        })
    </script>
</body>


</html>