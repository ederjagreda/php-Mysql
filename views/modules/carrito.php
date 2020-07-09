
<?php
//print_r($_GET);
 
session_start();
$mvc = new MvcController();

if (isset($_SESSION['carrito'])){
    if(isset($_GET['id'])){
        $arreglo=$_SESSION['carrito'];
        $encontro=false;
        $numero=0;
        for($i=0;$i<count($arreglo);$i++){
            if($arreglo[$i]['Id']==$_GET['id']){
                $encontro=true;
                $numero=$i;
            }
        }
        if($encontro==true){
            $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+$_GET['qty'];
            $_SESSION['carrito']=$arreglo;
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
                            'Nombre'=>$nombre,
                            'Precio'=>$precio,
                            'Imagen'=>$imagen,
                            'Cantidad'=>$_GET['qty']);

            array_push($arreglo, $datosNuevos);
            $_SESSION['carrito']=$arreglo;

        }//else
        header("Location: index.php?action=carrito");
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
                         'Nombre'=>$nombre,
                         'Precio'=>$precio,
                         'Imagen'=>$imagen,
                         'Cantidad'=> $_GET['qty']);
        $_SESSION['carrito'] = $arreglo;
    
    }//if
}//else

//print_r($_SESSION['carrito']);
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