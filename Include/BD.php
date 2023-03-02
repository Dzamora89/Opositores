<?php
include 'Opositores.php';

class BD
{

    public static function realizarConexion(){
        try {
            $conexion = new PDO("mysql:host=localhost; dbname=oposiciones","root","");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");
            return $conexion;
        }
        catch(Exception $e)
        {
            echo "Error al realizar la conexión: " . $e->getMessage();
        }
    }


    public static function getAllOpositores() {
        try {
            $sql = 'Select * 
            From oposiciones.opositores';
            $conexion = self::realizarConexion();
            $resultado = $conexion->prepare($sql);
            $resultado->execute();
            $arrayOpositores = [];
            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                $arrayOpositores[] = new Opositores($fila);
            }
            return $arrayOpositores;
        }
        catch (Exception $e)
        {
            echo "Error al realizar la conexión: " . $e->getMessage();
        }
    }

}