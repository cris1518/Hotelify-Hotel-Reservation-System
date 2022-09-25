<?php
require_once("includes/head.php");
require_once("includes/functions.php");
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col col-lg-8">
            <div>
                <h4 class="fw-bold py-3 mb-4">Elenco Utenti</h4>
            </div>
        </div>
    </div>

    <!-- Examples -->

    <table id="table_id" class="display" style="width:100%;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Username</th>
                <th>Telefono</th>
                <th>Email</th>

            </tr>
        </thead>
        <tbody>
            <?php
         $rows=getUsers();
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