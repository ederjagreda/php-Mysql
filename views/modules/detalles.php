<?php


$mvc = new MvcController();
$platos = $mvc->getBPlatosbyIdController($_GET['tabla'],$_GET['id']);
foreach($platos as $key=>$value){

}
?>



<?php foreach($platos as $key=>$value):
    ?>

    <table class="detalles">
        <tr>
            <td><?php echo $value['nombres']; ?></td>
        </tr>
        <tr>
            <?php $ruta = $value['rutaImagen'];?>
            <td> <img class ='platoComida'src=<?php echo $ruta;?> ></td>
            <td><a>Descripción: </a><?php echo $value['nombres'];?><br>
                <a>Precio:</a> <?php echo "S/.".$value['precio'];?> </td>

        </tr>
        <tr class="adder">
            <td class="simbolo" name="minus"><i class="fas fa-minus"></i></td>
            <td class="cantidad" name="numero">0</td>
            <td class="simbolo" name="plus"><i class="fas fa-plus"></i></td>
            <td><a class='sender'href="index.php?action=carrito&tabla=<?php echo $_GET['tabla']?>&id=0<?php echo $value['id'];?>&qty=" class="btn btn-default">Agregar al carrito</a></td>
        </tr>
    

    
    </table>

<?php endforeach;


?>

