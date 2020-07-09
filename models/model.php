<?php

require_once "conexion.php";

class EnlacesPaginas{

    public function enlacesPaginasModel($enlace){

        if ($enlace == 'comidas' ||
            $enlace == 'bebidas' ||
            $enlace == 'carrito' ||
            $enlace == 'detalles'
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

    public function getFoodById($tabla, $ID){
        $consulta = "SELECT * FROM $tabla where id=".$ID;
        $stmt = Conexion::conectar()->prepare($consulta);
        $stmt->execute();

        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;

    }
}

?>