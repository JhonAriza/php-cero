<?php
class Consulta{
    //Este método muestra el listatdo de todas las películas
    public function listarPeliculas($conexion,$crud_php){
        $sql = "select * from $crud_php";
        $query = $conexion->prepare($sql);
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $peliculas;
    }
    //Método para listar los generos, estos son usudados luego tanto en agregar como en editar películas
 
 
  
    //Este es el método que controla la busqueda de las películas
    public function buscarPelicula($conexion,$persona,$busqueda){
        $sql = "select * from $persona where title like :busqueda";
        $query = $conexion->prepare($sql);
        $query->bindValue(':busqueda',"%".$busqueda."%");
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $peliculas;
    }
 
  
  
}