<?php
require("../includes/functions.php");

require("../../includes/config.php");
require("../../includes/functions.php");

$err_descr=$err_image=$err_name=$err_num_person=$err_num_rooms=$err_price=$err_sdescr="";
if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (!empty(trim($_POST['name'])) && trim($_POST['name'])!=='') {
    } else {
        $err_name="Inserire Nome";
    }


    if (!empty(trim($_POST['price'])) && trim($_POST['price'])!=='') {
    } else {
        $err_price="Inserire Prezzo";
    }



    if (!empty(trim($_POST['person'])) && trim($_POST['name'])!=='') {
    } else {
        $err_num_person="Inserire Numero Persone";
    }


    if (!empty(trim($_POST['nrooms'])) && trim($_POST['nrooms'])!=='') {
    } else {
        $err_num_rooms="Inserire Numero Stanze";
    }


    if (isset($_POST['short_desc'])==true && !empty(trim($_POST['short_desc'])) && trim($_POST['short_desc'])!=='') {
    } else {
        $err_sdescr="Inserire Breve Descrizione";
    }


    if (!empty(trim($_POST['descr'])) && trim($_POST['descr'])!=='') {
    } else {
        $err_descr="Inserire Descrizione";
    }

    /*if ($_GET['t']=="edit" && $_FILES['img']['size']==0) {
        $err_image="Inserire Immagine";
    }*/


    if ($_GET['t']=="new" && $_FILES['img']['size']==0) {
        $err_image="Inserire Immagine";
    }


    if ($err_descr=="" && $err_image=="" && $err_name=="" && $err_num_person=="" && $err_num_rooms=="" && $err_price=="" && $err_sdescr=="") {
        //Save the new edits
        if ($_GET['t']=="edit") {
            updateRoom($_POST['name'], $_POST['price'], $_POST['short_desc'], $_POST['descr'], $_POST['nrooms'], $_POST['person'], $_FILES['img'], $_GET['id']);
        } else {
            createRoom($_POST['name'], $_POST['price'], $_POST['short_desc'], $_POST['descr'], $_POST['nrooms'], $_POST['person'], $_FILES['img']);
        }
    }
}

if (isset($_GET['id'])) {
    $room_info=getRoom($_GET['id']);
}

?>


<!DOCTYPE html>
<html lang="en" class="light-style" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once("../includes/head.php"); ?>

</head>

<body>
    <h4 class="fw-bold p-4" style="
    width: 80%;
    margin-left: 10%;
        padding-left: 0px !important;
">Modifica Stanza</h4>


    <form enctype="multipart/form-data" action="" method="post">
        <div class="card" style="
    width: 80%;
    margin-left: 10%;
">
            <div class="card-body ">
                <div class="row" style="
    align-content: center;
">
                    <div class="mb-3 col-lg-4  offset-lg-1">
                        <label for="name" class="form-label">Nome</label> <span class="err_form"><?php echo($err_name) ?></span>
                        <input type="text" class="form-control" id="name" name="name"
                            value='<?php echo(isset($room_info) ? $room_info['Nome'] : $_POST['name']); ?>'>
                    </div>


                    <div class="mb-3 col-lg-4 offset-lg-2">
                        <label for="name" class="form-label">Prezzo</label> <span class="err_form"><?php echo($err_price) ?></span>
                        <input type="number" inputmode="decimal" class="form-control" id="price" name="price"
                            value='<?php echo(isset($room_info) ? $room_info['Prezzo'] : $_POST['price']); ?>'>
                    </div>

                    <div class="mb-3 col-lg-4  offset-lg-1">
                        <label for="name" class="form-label">Numero Persone Per Stanza</label> <span
                            class="err_form"><?php echo($err_num_person) ?></span>
                        <input type="number" class="form-control" id="person" name="person"
                            value='<?php echo(isset($room_info) ? $room_info['Numero_Persone'] : $_POST['person']); ?>'>
                    </div>

                    <div class="mb-3 col-lg-4 offset-lg-2">
                        <label for="name" class="form-label">Numero Stanze</label> <span class="err_form"><?php echo($err_num_rooms)?></span>
                        <input type="number" class="form-control" id="nrooms" name="nrooms"
                            value='<?php echo(isset($room_info) ? $room_info['Numero_Stanze'] : $_POST['nrooms']); ?>'>
                    </div>

                    <div class="mb-3 col-lg-4 offset-lg-1">
                        <label for=" name" class="form-label">Breve Descrizione</label> <span class="err_form"><?php echo($err_sdescr) ?></span>
                        <input type="text" maxlength="100" class="form-control" id="short_desc" name="short_desc"
                            value='<?php echo(isset($room_info) ? $room_info['Breve_Descrizione'] : $_POST['short_desc']); ?>'>
                    </div>

                    <div class="mb-3 col-lg-4 offset-lg-2">
                        <label for="name" class="form-label">Immagine</label> <span class="err_form"><?php echo($err_image) ?></span>

                        <input type="file" class="form-control" id="img" name="img">
                    </div>

                    <div class="mb-3 col-lg-5 offset-lg-7">
                        <?php echo(isset($room_info) ? '<img style="width:100px;" src="'.getSiteUrl()."/images/".$room_info['Immagine'].'">' : ''); ?>
                    </div>




                    <div class="mb-3 col-lg-10 offset-lg-1">
                        <label for="descrizione" class="form-label">Descrzione</label> <span class="err_form"><?php echo($err_descr) ?></span>
                        <textarea class="form-control" id="descr" name="descr" rows="5"><?php echo(isset($room_info) ? $room_info['Descrizione'] : $_POST['descr']);?>
</textarea>
                    </div>


                    <div class="mb-3 col-lg-4 offset-lg-1">
                        <BUTTON class="btn btn-primary">SALVA</BUTTON>
                        <BUTTON type="button" class="btn btn-danger"><a href="../index.php?p=rooms">ANNULLA</a>
                        </BUTTON>
                    </div>

                </div>

            </div>
        </div>
    </form>

    <?php require_once("../includes/js.php") ?>

    <script>
        tinymce.init({
            selector: 'textarea#descr',
            plugins: 'lists advlist',
            toolbar: "undo redo | styleselect fontsizeselect | " +
                "bold italic underline | forecolor backcolor | " +
                "alignleft aligncenter alignright alignjustify | " +
                "bullist numlist | outdent indent | " +
                "table | link unlink | visualblocks",
            language: 'it'
        });
    </script>
</body>

</html>