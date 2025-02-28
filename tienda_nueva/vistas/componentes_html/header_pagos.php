<div class="d-flex flex-wrap justify-content-between">
    <div class="">
        <a href="index.php" class="text-decoration-none"><h2 class="familia_texto text-dark">Tienda</h2></a>
    </div>
    <div>
        <h2>Tu carrito</h2>
    </div>
    <div>
        <?php
            if(!isset($_SESSION["usuario"])){
                echo "<a href='login.php'>Inicia Sesion</a>";
            }else{
                echo $_SESSION["usuario"]->nombre;
                echo "<a href='cerrar_sesion.php'>Cerrar Sesion</a>";
            }
        ?>
    </div>
</div>