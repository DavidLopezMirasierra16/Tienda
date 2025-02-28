<?php

    require_once 'BaseDatos.php';
    require_once 'Carrito.php';

    class GestionProductos{

        /**
         * -----------------------------------------------------CONSULTAS-----------------------------------------------------
         */

        /**
         * Funcion que nos devuelve todos los productos
         */
        public static function getAllProductos($type_fetch = PDO::FETCH_OBJ){
            $stmt = BaseDatos::getConection()->prepare("SELECT * FROM productos;");
            $stmt->execute();
            return $stmt->fetchAll($type_fetch);
        }

        /**
         * Funcion que nos devuelve un producto con una categoria en concreto
         */
        public static function getProductosByCategoria($categoria_id, $type_fetch = PDO::FETCH_OBJ){
            $stmt = BaseDatos::getConection()->prepare("SELECT * FROM productos WHERE categoria_id = :categoria_id;");
            $stmt->bindParam(':categoria_id', $categoria_id);
            $stmt->execute();
            return $stmt->fetchAll($type_fetch);
        }

        /**
         * Funcion que te devuelve el id de una categoria en funcion del nombre que le pasas
         */
        public static function getIdCategoria($nombre, $type_fetch = PDO::FETCH_OBJ){
            $stmt = BaseDatos::getConection()->prepare("SELECT id FROM categorias WHERE nombre = :nombre;");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->execute();
            return $stmt->fetchAll($type_fetch);
        }

        /**
         * Funcion que nos devuelve un producto con un id en concreto
         */
        public static function getElementById($id, $type_fetch = PDO::FETCH_OBJ){
            $stmt = BaseDatos::getConection()->prepare("SELECT * FROM productos WHERE id = :id;");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch($type_fetch);
        }

        /**
         * Funcion que nos devuelve un producto con un nombre
         */
        public static function getElementByNombre($nombre, $type_fetch = PDO::FETCH_OBJ){
            $stmt = BaseDatos::getConection()->prepare("SELECT * FROM productos WHERE nombre LIKE :nombre;");

            $nombre = "%".$nombre."%"; //Que contenga esa palabra

            $stmt->bindParam(':nombre', $nombre);
            $stmt->execute();
            return $stmt->fetchAll($type_fetch);
        }

        /**
         * Funcion que nos devuelve si un producto contiene un nombre en la categoria que nosotros le pasamos
         */
        public static function getElementNombreByCategoria(/*$nombre,*/ $categoria_id, $type_fetch = PDO::FETCH_OBJ){
            $stmt = BaseDatos::getConection()->prepare("SELECT * FROM productos WHERE categoria_id = :categoria_id /*AND nombre LIKE :nombre*/");

            //$nombre = "%".$nombre."%"; //Que contenga esa palabra

            $stmt->bindParam(':categoria_id', $categoria_id);
            //$stmt->bindParam(':nombre', $nombre);
            $stmt->execute();
            return $stmt->fetchAll($type_fetch);
        }

        /**
         * Funcion que nos devuelve todas las categorias de los productos.
         */
        public static function getAllCategoria($type_fetch = PDO::FETCH_OBJ){
            $stmt = BaseDatos::getConection()->prepare("SELECT * FROM categorias;");
            $stmt->execute();
            return $stmt->fetchAll($type_fetch);
        }

        /**
         * Funcion que nos pinta el producto
         */
        public static function pintarProducto($producto){
            global $carro;
            $btn_eliminar = $carro->obtenerPorId($producto->id) ? "<a href='carrito/delete.php?id=$producto->id'>Eliminar</a>" : "";
            
            echo "<div class='card'>".
            "<p>Nombre: ".$producto->nombre."</p>".
            "<p>Descripion: ".$producto->descripcion."</p>".
            "<p>Precio: ".$producto->precio."</p>".
            "<p>Stock: ".$producto->stock."</p>".
            "<p>Categoria ID: ".$producto->categoria_id."</p>".
            "<p>ID: ".$producto->id."</p>".
            "<a href='carrito/add.php?id=$producto->id' id='carro' class='none'>Añadir a carrito</a>"
            .$btn_eliminar."</div>";
        }

    }

?>