<div class="d-flex align-items-center">
    <div class="col-4">
        <a href="index.php" class="text-decoration-none"><h2 class="familia_texto text-dark">Tienda</h2></a>
    </div>
    <div class="col-4 text-center mt-2">
        <label for="numero"></label>
        <form method="GET">
            <input type="text" id="numero" placeholder="Busca el producto" name="nombre">
            <input type="submit" id="enviar">
        </form>
        <select name="categorias" id="categoria_id">
            <?php
                //echo __DIR__ ." / ".__FILE__;
                require_once("../modelos/Productos.php");
                foreach (GestionProductos::getAllCategoria() as $key => $value) {
                    $id = isset($_GET["categoria_id"]) ? $_GET["categoria_id"] : -1;
                    $selected = ($id == $value->id) ? "selected='true'" : "";
                    echo "<option $selected value='$value->id'>$value->nombre</option>";
                }
            ?>
        </select>
        <a href="mostrar_carrito.php"><i class="bi bi-bag"></i></a>
    </div>
    <div class="col-4 text-end">
        <h6 class="col-12">
            <?php

                if (!isset($_SESSION["usuario"])) {
                    echo "<a href='login.php' class='text-decoration-none'>Iniciar Sesion</a>" . "<br>";
                } else {
                    echo $_SESSION["usuario"]->nombre . "<br>";
                    echo "<a href='cerrar_sesion.php' class='col-12 text-end text-decoration-none' id='cerrar_sesion'>Cerrar Sesion</a>";
                }

            ?>
        </h6>
    </div>
</div>
<div class="col-12">
    <p id="mostrarTexto"></p>
</div>
<script>
    const btn_borrar_token = document.getElementById("cerrar_sesion");

    if(btn_borrar_token==null){

    }else{
        btn_borrar_token.addEventListener("click", ()=>{
            localStorage.removeItem("Token");
        })
    }

</script>