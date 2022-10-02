<?php
require_once("includes/head.php");
require_once("includes/functions.php");
$status=[];
$stat=getAllStatus();
for ($i=0;$i<count($stat);$i++) {
    $status[]=$stat[$i]['Nome'];
}



echo '<input type="hidden" value="'.implode(",", $status).'" id="status_l" >';

?>
<input type="hidden" id="selectedRes">
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col col-lg-8">
            <div>
                <h4 class="fw-bold py-3 mb-4">Elenco Prenotazioni</h4>
            </div>
        </div>
    </div>

    <!-- Examples -->

    <table id="table_id" class="display table table-bordered" style="width:100%;">
        <thead>
            <tr>
                <th>Utente</th>
                <th>Stanza</th>
                <th>Persone</th>
                <th>Check-in</th>
                <th>Check-Out</th>
                <th>Prezzo</th>
                <th>Stato</th>
                <th>Azioni</th>

            </tr>
        </thead>
        <tbody>
            <?php
         $rows=AllReservationsList();
echo $rows;
?>
        </tbody>
    </table>





    <?php
    require("includes/js.php");
?>
    <div class="modal fade" id="userContact" tabindex="-1" role="dialog" aria-labelledby="userContactLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userContactLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="closeModal('userContact')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger" role="alert">
                        Simulazione d'invio, l'utente non riceverà nessuna mail
                    </div>
                    <div class="form-group">
                        <label for="mailContent">Contenuto Mail</label>
                        <textarea class="form-control" id="mailContent" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="closeModal('userContact')">Annulla</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        onclick="sendEmail('userContact')">Invia</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function() {
            let myTable = jQuery('#table_id').DataTable({
                "pageLength": 5,
                "language": {
                    "lengthMenu": 'Mostra <select>' +
                        '<option value="5" selected>5</option>' +
                        '<option value="10" >10</option>' +
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



        });
    </script>