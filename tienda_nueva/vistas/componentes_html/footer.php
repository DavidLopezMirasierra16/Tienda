<div class="d-flex justify-content-between">
    <div>
        <h5>Derechos de la tienda reservados</h5>
    </div>
    <div>
        <?php
        $dia = date("d", time());
        $mes = date("m", time());
        $anio = date("Y", time());

        echo "Ultima modificacion: " . $dia . "/" . $mes . "/" . $anio;
        ?>
    </div>
</div>