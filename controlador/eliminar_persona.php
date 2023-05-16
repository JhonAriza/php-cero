<?php if (!empty($_GET["id"])) {
    //se almacena en la variable el id
$id=$_GET["id"];
// en la variable sql llama la conexion y se hace la consulta
                              // y se crea la sentencia sql delete from persona where id=$id
$sql=$conexion->query("delete from persona where id=$id");
if ($sql == 1) {
    echo '<div class="alert alert-danger">persona eliminado</div>';
  } else {
   echo '<div class="alert alert-danger">error  al eliminar</div>';
}
} 
?>