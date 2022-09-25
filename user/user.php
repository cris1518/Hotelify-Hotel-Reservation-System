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
     <?php require_once("../includes/css.php");
     require_once("../includes/initialize.php");

     if ($_SERVER["REQUEST_METHOD"]=="POST") {
         updateUser($_SESSION['id'], $_POST['name'], $_POST['surname'], $_POST['phone'], $_POST['email']);
     }

     ?>
 </head>

 <body>

     <?php require_once("../includes/header.php"); ?>
     <!-- END head -->


     <section class="site-hero inner-page overlay" style="background-image: url(../images/hero_4.jpg)"
         data-stellar-background-ratio="0.5">
         <div class="container">
             <div class="row site-hero-inner justify-content-center align-items-center">
                 <div class="col-md-10 text-center" data-aos="fade">
                     <h1 class="heading mb-3">Account</h1>
                     <ul class="custom-breadcrumbs mb-4">
                         <li><a href="index.html">Home</a></li>
                         <li>&bullet;</li>
                         <li>Account</li>
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

     <section class="section contact-section" id="next">
         <div class="container">
             <div class="row">
                 <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
                     <?php

                 $user= getUser($_SESSION['id']);

     ?>
                     <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
                         <div class="row">
                             <div class="col-md-6 form-group">
                                 <label for="name">Nome</label>
                                 <input type="text" id="name" name="name" class="form-control "
                                     value="<?php echo $user['Nome']; ?>">
                             </div>
                             <div class="col-md-6 form-group">
                                 <label for="surname">Cognome</label>
                                 <input type="text" id="surname" name="surname" class="form-control "
                                     value="<?php echo $user['Cognome']; ?>">
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-md-6 form-group">
                                 <label for="username">Username</label>
                                 <input type="text" id="username" class="form-control "
                                     value="<?php echo $user['Username']; ?>"
                                     disabled="true">
                             </div>

                             <div class="col-md-6 form-group">
                                 <label for="email">Email</label>
                                 <input type="email" id="email" name="email" class="form-control "
                                     value="<?php echo $user['Email']; ?>">
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6 form-group">
                                 <label for="phone">Telefono</label>
                                 <input type="text" id="phone" name="phone" class="form-control "
                                     value="<?php echo $user['Telefono']; ?>">
                             </div>

                             <div class="col-md-6 form-group">
                                 <button class="btn btn-success" style="
    margin-top: 35px;
">SALVA</button>
                             </div>
                         </div>
                     </form>

                 </div>

             </div>
         </div>
     </section>









     <?php
     require_once("../includes/footer.php");
     require_once("../includes/js.php");
     ?>
 </body>

 </html>