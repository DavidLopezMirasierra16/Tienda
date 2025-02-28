<?php
require_once("../modelos/Carrito.php");
$todos_productos = $carro->obtenerCarrito();
$preco_final = $carro->precioTotal();
// print_r($_SESSION["carrito"]);
?>
<div class="contenedor">
    <table class="border">
        <?php

        if (empty($_SESSION["carrito"])) {
            echo "Carrito vacío";
        } else {
            echo "<tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Cantidad</td>
                <td>Precio</td>
                </tr>";
            foreach ($todos_productos as $productos) {
                echo "<tr>
                    <td>" . $productos["id"] . "</td>
                    <td>" . $productos["nombre"] . "</td>
                    <td>" . $productos["descripcion"] . "</td>
                    <td>" . $productos["cantidad"]. "</td>
                    <td>" . $productos["precio"] . "</td>
                </tr>";
            }
        }
        ?>
    </table>
    <div>
        <?php
        if ($preco_final>0) {
            echo "Total: ".$preco_final;
            echo "<br><a href='fomulario_pago.php'>Terminar compra</a>";
        }
        ?>
    </div>
</div>