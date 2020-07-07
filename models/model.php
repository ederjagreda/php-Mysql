<?php

require_once "conexion.php";

class EnlacesPaginas{

    public function enlacesPaginasModel($enlace){

        if ($enlace == 'comidas' ||
            $enlace == 'bebidas' ||
            $enlace == 'carrito'
            ){
                $module = "views/modules/".$enlace.".php";
            }
        else if($enlace == 'index.php'){
            $module = "views/modules/inicio.php";
        }
        else{
            $module = "views/modules/inicio.php";
        }
        return $module;

    }


    public function getFoodModel($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();

        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;

    }
}

?>