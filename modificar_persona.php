<?php
include "modelo/conexion.php";
$id=$_GET["id"];

$sql=$conexion->query("select * from persona where id=$id");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  

</head>
<body>
<h1 class="text-center p-3">hola mundo</h1>
<div class="container-fluid row">
<form class="col-4 m-auto" method="POST">
    <h3 class="text-center">modificarde personas</h3>
    <input type="hidden" name="id"   value="<?= $_GET["id"] ?>">
 <?php

 include "controlador/modificar_persona.php";
 
 while ($datos = $sql->fetch_object()) { ?>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">nombre</label>
    <input type="text" class="form-control" id="nombre" aria-describedby="nombre" name="nombre" value="<?= $datos->nombre ?>">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">apellido</label>
    <input type="text" class="form-control" id="apellido" aria-describedby="apellido" name="apellido" value="<?= $datos->apellido ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">dni</label>
    <input type="text" class="form-control" id="dni" aria-describedby="dni" name="dni" value="<?= $datos->dni ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">fecha</label>
    <input type="date" class="form-control" id="fecha" aria-describedby="fecha" name="fecha" value="<?= $datos->fecha ?>"> 
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">correo</label>
    <input type="text" class="form-control" id="correo" aria-describedby="correo" name="correo" value="<?= $datos->correo ?>">
  </div>
  
 

    <?php 
 } ?>
    <button type="submit" class="btn btn-primary" name="btnmodificar" value="OK">guardar modificado</button>
</form>
</body>
</html>