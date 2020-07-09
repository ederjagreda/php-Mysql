<?php
$mvc = new MvcController();
$platos = $mvc->getPlatosController();
?>
<div class='listadoProductos'>
<table class="tabla">
    <?php foreach($platos as $key=>$value): ?>
        <tr class="tablaElement">
            <td><?php echo $value['nombres']; ?></td>
            <td> <img class ='platoComida'src=<?php echo $value['rutaImagen'];?>></td>
            <td id="precio"><?php echo "S/.".$value['precio']; ?></td>
            <td><a href="index.php?action=detalles&tabla=platos&id=<?php echo $value['id'];?>" class="btn btn-default">ver</a></td>

        </tr>
    <?php endforeach; ?>
</table>