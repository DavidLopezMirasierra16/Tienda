<?php

require_once("BaseDatos.php");
require_once 'Productos.php';

class GestionCarrito{

    /**
     * Constructor que me crea una sesion de carrito si no está iniciado
     */
    public function __construct(){
        if(!isset($_SESSION["carrito"])){
            $_SESSION["carrito"] = [];
        }
    }

    /**
     * Añado al carrito el id que le paso
     */
    public function añadirCarrito($id, $cantidad = 1){
        //Si la sesion ya tiene el id, ya le hemos dado antes a comprar
        if(isset($_SESSION["carrito"][$id])){
            $_SESSION["carrito"][$id]["cantidad"] += $cantidad; //Añadimos otro 
        }else{
            //Comprueba el id en la bd 
            $resultado = GestionProductos::getElementById($id, PDO::FETCH_ASSOC);
            if($resultado){
                $_SESSION["carrito"][$id] = $resultado;
                $_SESSION["carrito"][$id]["cantidad"] = 1;
            }

        }

    }

    /**
     * Funcion que me elimina del carrito en funcion de su id
     */
    public function eliminarProducto($id){
        //Si existe el carrito
        if(isset($_SESSION["carrito"])){
            //Elimina el producto con ese id
            unset($_SESSION["carrito"][$id]);
        }

    }

    /**
     * Funcion que actualiza la cantidad del producto que está en el carrito
     */
    public function actualizarCantidadProducto($id, $cantidad){
        if(isset($_SESSION["carrito"][$id])){
            //Si la cantidad es mayor que cero
            if($cantidad > 0){
                //Me añades otra cantidad
                $_SESSION["carrito"][$id]["cantidad"]= $cantidad;
            }else{
                //Me lo eliminas
                $this->eliminarProducto($id);
            }
        }
    }

    /**
     * Nos calcula en precio total de la compra
     */
    public function precioTotal(){
        $cuenta = 0;
        //Recorremos el carrito para que el total se incremente
        foreach ($_SESSION["carrito"] as $producto) {
            $cuenta += $producto["precio"] * $producto["cantidad"];
        }
        return $cuenta;
    }
    
    /**
     * Funcion que nos devuelve todos lo productos
     */
    public function obtenerCarrito(){
        return $_SESSION["carrito"];
    }

    public function obtenerPorId($id){
        return isset($_SESSION["carrito"][$id]) ? $_SESSION["carrito"][$id] : null;
    }

    /**
     * Nos vacia el carrito
     */
    public function vaciarCarrito(){
        $_SESSION["carrito"]=[];
    }

    //-BD-

    /**
     * Funcion que nos inserta en la BD compras
     */
    public static function comprasBD($usuario_id, $fecha, $total, $type_fetch=PDO::FETCH_OBJ){
        $stmt = BaseDatos::getConection()->prepare("INSERT INTO tienda_php2.compras (`usuario_id`, `fecha`, `total`) VALUES(:usuario_id, :fecha, :total)");
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':total', $total);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    /**
     * Funcion que nos inserta los datos en la BD de deetalles_compras
     */
    public static function detalleCompra($producto_id, $cantidad, $precio, $type_fetch = PDO::FETCH_OBJ){
        $stmt = BaseDatos::getConection()->prepare("INSERT INTO tienda_php2.detalle_compras (`producto_id`, `cantidad`, `precio`) VALUES (:producto_id, :cantidad, :precio)");
        $stmt->bindParam(':producto_id', $producto_id);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':precio', $precio);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

}

//Creamos una instancia
$carro = new GestionCarrito();

?>