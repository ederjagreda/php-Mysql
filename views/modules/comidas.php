<?php
$mvc = new MvcController();
$platos = $mvc->getPlatosController();
?>
<div class='listadoProductos'>
<table class="tabla">
    <?php foreach($platos as $key=>$value): ?>
        <tr class="tablaElement">
            <td><input type="hidden" value="<?php echo $value['id'];?>"></td>
            <td><?php echo $value['nombres']; ?></td>
            <td> <img id='platoComida'src=<?php echo $value['rutaImagen'];?>></td>
            <td id="precio"><?php echo "S/.".$value['precio']; ?></td>
            <td class="simbolo" name="minus"><i class="fas fa-minus"></i></td>
            <td class="cantidad" name="numero">0</td>
            <td class="simbolo" name="plus"><i class="fas fa-plus"></i></td>

            <td><button class= "btn" type="button"><i class="fas fa-plus"></button></td>
        </tr>
    <?php endforeach; ?>
</table>