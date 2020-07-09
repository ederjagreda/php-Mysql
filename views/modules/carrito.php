
<?php

 
session_start();
//print_r($_GET);
$enlace_actual = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$mvc = new MvcController();

if (isset($_SESSION['carrito'])){
    if(isset($_GET['id'])){
        $arreglo=$_SESSION['carrito'];
        $encontro=false;
        $numero=0;
        for($i=0;$i<count($arreglo);$i++){
            print_r("arreglo".$arreglo[$i]['Tabla']);
            print_r("get".$_GET['tabla']);
            if(($arreglo[$i]['Id']==$_GET['id']) && ($arreglo[$i]['Tabla']==$_GET['tabla'])){
                $encontro=true;
                $numero=$i;
            }
        }
        if($encontro==true){
            $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+$_GET['qty'];
            $_SESSION['carrito']=$arreglo;
            try{
                header("Location: index.php?action=carrito");
            }catch(Exception $e){

            }

        }else{
            $nombre="";
            $precio=0;
            $imagen="";
            $platos = $mvc->getBPlatosbyIdController($_GET['tabla'],$_GET['id']);
            foreach($platos as $key=>$value){
            $nombre = $value['nombres'];
            $precio = $value['precio'];
            $imagen = $value['rutaImagen'];
            }
            $datosNuevos=array('Id'=>$_GET['id'],
                            'Tabla'=>$_GET['tabla'],
                            'Nombre'=>$nombre,
                            'Precio'=>$precio,
                            'Imagen'=>$imagen,
                            'Cantidad'=>$_GET['qty']);

            array_push($arreglo, $datosNuevos);
            $_SESSION['carrito']=$arreglo;

        }//else
        try{
            header("Location: index.php?action=carrito");
        }catch(Exception $e){
        }
        //header("Location: index.php?action=carrito");
}//if

}else{
    if(isset($_GET['id'])){
        $nombre ="";
        $precio = 0;
        $imagen = "";
    
        
        $platos = $mvc->getBPlatosbyIdController($_GET['tabla'],$_GET['id']);
        foreach($platos as $key=>$value){
            $nombre = $value['nombres'];
            $precio = $value['precio'];
            $imagen = $value['rutaImagen'];
    
        }//foreach
    
        $arreglo[] = array('Id'=>$_GET['id'],
                         'Tabla'=>$_GET['tabla'],
                         'Nombre'=>$nombre,
                         'Precio'=>$precio,
                         'Imagen'=>$imagen,
                         'Cantidad'=> $_GET['qty']);
        $_SESSION['carrito'] = $arreglo;
        try{
            header("Location: index.php?action=carrito");
        }catch(Exception $e){

        }
    
    }//if
    //header("Location: index.php?action=carrito");
}//else


$total = 0;
if(isset($_SESSION['carrito'])){
    $datos=$_SESSION['carrito'];
    ?>

    <table class="resultCarrito">
        <tr>
            <td>Producto</td>
            <td>Imagen</td>
            <td>Precio/u</td>
            <td>Cantidad</td>
            <td>Subtotal</td>
        </tr>
    <?php for($i=0; $i<count($datos);$i++){?>
        
        <tr class="CarritoElement">
            <td><?php echo $datos[$i]['Nombre'];?></td>
            <td> <img class="imgCarrito" src= <?php echo $datos[$i]['Imagen']; ?>> </td>
            <td><?php echo "S/".$datos[$i]['Precio'];?></td>
            <!--<td><input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"></td>-->
            <td><?php echo $datos[$i]['Cantidad'];?></td>
            <?php $subtotal = $datos[$i]['Cantidad'] * $datos[$i]['Precio'];
            $total = $total + $subtotal;
            ?>
            <td><?php echo "S/".$subtotal ;?></td>
        </tr>
        <?php 
      }//for
      ?>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>total</td>
        <td><?php echo "S/".$total ?></td>
    </tr>
     <?php 
    }else{
    echo '<center><h2 class="carroVacio"> El carrito de compras esta vacio </h2></center>';
    }?>