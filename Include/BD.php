<?php
include 'Opositores.php';

class BD
{



/*
 * Funcion para Realizar Conexion
 */

    public static function realizarConexion(){
        try {
            /*
             * Cambiar la dbName y el usuario si es necesario
             */
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



    /*
     * Funcion para obtener todas las entradas de una clase
     */
    public static function getAllOpositores() {
        try {

            /*
             * Cambiar la Tabla si lo que necesito es otra cosa
             */

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
            /*
            * Si la funciona da error retornara Null;
            */
            echo "Error al realizar la conexión: " . $e->getMessage();
            return null;
        }
    }

    /*
     * Funcion para Obtener 1 resultado con un valor dado
     */

    public  static function getOpositorByCodigo($codigo): ?Opositores
    {
        try {

            /*
             * Cambiar la Tabla si lo que necesito es otra cosa
             */

            $sql = 'Select * 
            From oposiciones.opositores
            where DNIOPO = :codigo';

            $conexion = self::realizarConexion();
            $resultado = $conexion->prepare($sql);

            $resultado->bindParam(':codigo', $codigo);
            $resultado->execute();
            $opositor = new Opositores($resultado->fetch(PDO::FETCH_ASSOC));

            return $opositor;
        }
        catch (Exception $e)
        {
            /*
             * Si la funciona da error retornara Null;
             */
            echo "Error al realizar la conexión: " . $e->getMessage();
            return null;
        }
    }
    /*
         * Funcion para obtener las entradas de forma paginada
         */
    public static function getOpositoresPaginado($inicio, $numeroElementos): ?array
    {
        try {

            /*
             * Cambiar la Tabla si lo que necesito es otra cosa
             */

            $sql = 'Select * 
            From oposiciones.opositores
            limit :inicio , :longitud';
            $conexion = self::realizarConexion();
            $resultado = $conexion->prepare($sql);
            /*
             * Importante el Param INT para que no de errores
             */
            $resultado->bindParam(':inicio' , $inicio, PDO::PARAM_INT);
            $resultado->bindParam(':longitud',$numeroElementos,PDO::PARAM_INT);
            $resultado->execute();
            $arrayOpositores = [];
            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                $arrayOpositores[] = new Opositores($fila);
            }
            return $arrayOpositores;
        }
        catch (Exception $e)
        {
            /*
            * Si la funciona da error retornara Null;
            */
            echo "Error al realizar la conexión: " . $e->getMessage();
            return null;
        }
    }

    /*
     * Funcion de insercion de datos a la tabla
     * Vamos a hacerla con Codigo, si fuera incremental no seria necesario
     */


}
