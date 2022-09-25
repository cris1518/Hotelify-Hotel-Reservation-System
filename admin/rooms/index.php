<?php require("includes/functions.php"); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col col-lg-8">
            <div>
                <h4 class="fw-bold py-3 mb-4">Elenco Stanze</h4>
            </div>
        </div>
        <div class="col col-lg-4" style="text-align:right;">
            <button class="btn btn-primary btn-action"><a style="color:#fff;" href="rooms/edit.php?t=new">CREA
                    STANZA</a></button>
        </div>

    </div>

    <!-- Examples -->
    <div class="row mb-4">
        <?php

AdmRoomsList();

?>

    </div>

    <?php
    require_once("../includes/js.php");
