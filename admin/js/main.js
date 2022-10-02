function delRoom(id){
   jQuery.post("rooms/delete.php",{id:id})
   .done(function(data){
    console.log(data)
  location.reload(true);
   })
}

function openSendEmail(user,id){
   jQuery("#userContactLabel").empty().append("Contatta "+user);
   jQuery("#mailContent").val('');
   jQuery('#userContact').modal('show');
   jQuery("#selectedRes").val(id)
}

function sendEmail(id){
  
 closeModal(id)
 var status=document.getElementById("status_l").value.split(",");
changeStatus(3,status[3],document.getElementById("selectedRes").value)

}


function closeModal(id){
     jQuery('#'+id).modal('hide');

}

function changeStatus(idstatus,status,id){
     jQuery.post("reservation/editstatus.php",{id:id,status:idstatus})
   .done(function(data){
    console.log(data)
  
   })
   editTableStatus(status)
}

function editTableStatus(status){
   jQuery('#table_id').DataTable().row(this).cell(":nth-child(7)").data("<span style='color:blue'>"+status+"</span>");
}