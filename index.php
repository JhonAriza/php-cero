 
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

<form action="busqueda.php" method="get">
        <input type="submit" value="Buscar"><input type="text" name="busqueda">
      </form>

<table class="table border">
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
 
    $sql=$conexion->query("select * from persona ");
    while ($datos = $sql->fetch_object()) {?>
    <tr>
      <th scope="row"><?=$datos->id ?></th>
      <td><?= $datos->nombre ?></td>
      <td><?= $datos->apellido ?></td>
      <td><?= $datos->dni ?></td>
      <td><?= $datos->fecha ?></td>
      <td><?= $datos->correo ?></td>
      <td><span></span>
        <a href="modificar_persona.php?id=<?=$datos->id ?>
      "class="btn btn-small btn-info"> <span><i class="fa-regular fa-pen-to-square"></i></span>modificar</a>
    </td>
    <td><a onclick="return eliminar()" href="index.php?id=<?=$datos->id ?>
      " class="btn btn-small btn-danger"><i class="fa-solid fa-delete-left"></i></a></td>  

     </tr>





<?php        
    }?>

 
  </tbody>
</table>
</div>
</div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     
 </body>
</html>