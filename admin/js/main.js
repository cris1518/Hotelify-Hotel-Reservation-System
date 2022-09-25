function delRoom(id){
   jQuery.post("rooms/delete.php",{id:id})
   .done(function(data){
    console.log(data)
  location.reload(true);
   })
}