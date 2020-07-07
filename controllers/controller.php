<?php

class MvcController{
    
    public function plantilla(){
        include "views/template.php";
    }

    public function enlacesPaginasController(){

        if(isset($_GET['action'])){
            $enlace = $_GET['action'];
        }
        else{
            $enlace = "index.php";
        }
        

        $miClase = new EnlacesPaginas();
        include $miClase->enlacesPaginasModel($enlace);

    }

    public function getPlatosController(){

        $tabla = "platos";
        $miClase = new EnlacesPaginas();
        $respuesta = $miClase->getFoodModel($tabla);
        return $respuesta;
    }

    public function getBebidasController(){

        $tabla = "bebidas";
        $miClase = new EnlacesPaginas();
        $respuesta = $miClase->getFoodModel($tabla);
        return $respuesta;
    }


}



?>