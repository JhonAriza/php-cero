<?php
//se valida atravez del metodo post se verifica si el boton se oprimio 
if (!empty($_POST["btnregistrar"])) {
     if (!empty($_POST["nombre"])
     and !empty($_POST["apellido"])
     and !empty($_POST["dni"] )
     and !empty($_POST["fecha"] )
     and !empty($_POST["correo"])) {
  $nombre=$_POST["nombre"];
  $apellido=$_POST["apellido"];
  $dni=$_POST["dni"];
  $fecha=$_POST["fecha"];
  $correo=$_POST["correo"];
  
  $sql=$conexion->query("insert into persona(
                                           nombre,
                                           apellido,
                                           dni,
                                           fecha,
                                           correo)values('$nombre','$apellido','$dni','$fecha','$correo')");
                                                          if ($sql==1) {
                                                             echo '<div class="alert alert-success">Persona registrda correctmente </div>';
                                                          } else {
                                                            echo '<div class="alert alert-danger">Persona  nnoo registrda correctmente </div>';
                                                          }
                                                          
    }else{   
        echo '<div class="alert alert-danger">alguno de los campos estra vacio </div>';}

}

















?>