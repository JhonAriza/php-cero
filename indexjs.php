 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>curso php y mysql</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
<script>
  function eliminar(){
    var respuesta=confirm("estas seguro de eliminar");
    return respuesta
  }
</script>

  </head>
<body>
    <h1 class="text-center p-3">hola mundo</h1>
    <?php include "modelo/conexion.php";   
  include "controlador/eliminar_persona.php"; ?>
<div class="container-fluid row ">
<form class="col-4 border mt-4" method="POST">
    <h3 class="text-center">registro de personas</h3>
    <?php  
   include "controlador/registro_persona.php"; 
 ?>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">nombre</label>
    <input type="text" class="form-control" id="nombre" aria-describedby="nombre" name="nombre">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">apellido</label>
    <input type="text" class="form-control" id="apellido" aria-describedby="apellido" name="apellido">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">dni</label>
    <input type="text" class="form-control" id="dni" aria-describedby="dni" name="dni">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">fecha</label>
    <input type="date" class="form-control" id="fecha" aria-describedby="fecha" name="fecha">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">correo</label>
    <input type="text" class="form-control" id="correo" aria-describedby="correo" name="correo">
  </div>
  
 
  <button type="submit" class="btn btn-primary" name="btnregistrar" value="OK">registrar</button>
</form>


<div class="col-8 p-4">

<?php


 


$where = '';

if (isset($_GET['enviar'])) {
  $busqueda = $_GET['busqueda'];
  if (isset($_GET['busqueda'])) {
   $where = "WHERE persona.id LIKE'%".$busqueda."%' 
                      OR nombre LIKE'%".$busqueda."%'";
  }
}


?>
       <div class="container-fluid">
  <form class="d-flex">
      <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" 
      placeholder="Buscar con JS">
      <hr>
      </form>
  </div>

            <br>
            <br>
  <table class="table table-striped table-dark table_id">
  <thead class="">
    <tr>
      <th scope="col">#</th>
      <th scope="col">nombre</th>
      <th scope="col">apellido</th>
      <th scope="col">dni</th>
      <th scope="col">fechanacimiento</th>
      <th scope="col">correo</th>
      <th scope="col"><i class="fa-regular fa-pen-to-square"></i> </th>
      <th scope="col"><i class="fa-solid fa-trash"></i> </th>
     </tr>
  </thead>
  <tbody>
    <?php  include "modelo/conexion.php" ;
    $conexion=mysqli_connect("localhost","root","","crud_php");
 $SQL ="SELECT  persona.id,
 persona.nombre,
 persona.apellido,
 persona.dni,
 persona.fecha,
 persona.correo FROM persona $where ";

 $dato =mysqli_query($conexion, $SQL);
 if($dato -> num_rows > 0){
    while ($datos=mysqli_fetch_array($dato)) {?>
    <tr>
      <th scope="row"><?=$datos['id'] ?></th>
      <td><?= $datos['nombre']; ?></td>
      <td><?= $datos['apellido']; ?></td>
      <td><?= $datos['dni']; ?></td>
      <td><?= $datos['fecha']; ?></td>
      <td><?= $datos['correo']; ?></td>
      <td><span></span>
        <a href="modificar_persona.php?id=<?=$datos['id'] ?>
      "class="btn btn-small btn-info"> <span><i class="fa-regular fa-pen-to-square"></i></span>modificar</a>
    </td>
    <td><a onclick="return eliminar()" href="index.php?id=<?=$datos['id'] ?>
      " class="btn btn-small btn-danger"><i class="fa-solid fa-delete-left"></i></a></td>  

     </tr>





<?php        
    }}
  ?>

 
  </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
 
<script src="acciones.js"></script>
<script src="buscador.js"></script>
</div>
</div>
 
 </body>
</html>
 