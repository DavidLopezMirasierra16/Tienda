<?php

    require_once("env.php");
    
    class BaseDatos{
        
        private static $pdo_conexion;
        
        /**
         * Funcion que nos conecta a la base de datos
         */
        public static function getConection(){
            if(self::$pdo_conexion===null){
                try{
                    //El self hace referencia al $pdo_conexion, es como el this de java
                    self::$pdo_conexion = new PDO("mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'],$_ENV['DB_USER'],$_ENV['DB_PASS']);
                    self::$pdo_conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }catch (PDOException $e){
                    echo "Error de conexion: ". $e->getMessage();
                }

            }
            return self::$pdo_conexion;

        }

        /**
         * Funcion que cierra la conexion con la base de datos
         */
        public static function closeConection(){
            self::$pdo_conexion = null;
        }

    }

?>