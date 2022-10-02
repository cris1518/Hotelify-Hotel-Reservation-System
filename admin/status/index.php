<?php
require_once("includes/head.php");
require_once("includes/functions.php");
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col col-lg-8">
            <div>
                <h4 class="fw-bold py-3 mb-4">Elenco Stati Prenotazioni</h4>

            </div>

        </div>
    </div>
    <div class="alert alert-danger" role="alert">
        Gli stati con id 0 e 1 sono obbligatori per visualizzare correttamente le prenotazioni.<br>
        Di default lo stato con id 0 è una prenotazione "In attesa di conferma "<Br>
        lo stato con id 1 è una prenotazione "Confermata"
    </div><br>


    <!-- Examples -->

    <table id="table_id" class="display" style="width:100%;">
        <thead>
            <tr>
                <th>id</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php
         $rows=getStatusList();
echo $rows;
?>
        </tbody>
    </table>





    <?php
    require("includes/js.php");
?>

    <script>
        jQuery(document).ready(function() {
            jQuery('#table_id').DataTable();
        });
    </script>