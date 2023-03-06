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
    public static function getAllOpositores(): ?array
    {
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
            $resultado->bindParam(':inicio', $inicio,PDO::PARAM_INT);
            $resultado->bindParam(':longitud', $numeroElementos, PDO::PARAM_INT);
            $resultado->execute();
            $arrayOpositores = [];
            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                $arrayOpositores[] = new Opositores($fila);
            }
            return $arrayOpositores;
        }catch (Exception $e)
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
    public static function insertarOpositor($dniopo, $nomopo, $ciuopo, $cpopo, $tfalu, $tribunalOpo): string
    {
        $sql = "INSERT INTO oposiciones.opositores values (
        :dniopo, :nomopo, :ciuopo, :cpopo, :tfalu, :tribunalopo
        )";
        $conexion = BD::realizarConexion();
        $resultado = $conexion->prepare($sql);
        $resultado->bindParam(':dniopo', $dniopo);
        $resultado->bindParam(':nomopo', $nomopo);
        $resultado->bindParam(':ciuopo', $ciuopo);
        $resultado->bindParam(':cpopo', $cpopo);
        $resultado->bindParam(':tfalu', $tfalu);
        $resultado->bindParam(':tribunalopo', $tribunalOpo);
        $resultado->execute();
        $afectados = $resultado->rowCount();
        $conexion = null;
        $resultado->closeCursor();
        if ($afectados == 1) {
            return "Modificacion realizada";
        }else {
            return "Modificacion Fallida";
        }
    }

    /*
     * Funcion para actualizar un Registro conociendo su clave primaria
     */

    public static function actualizarOpositor($dniopo,$nomopo, $ciuopo,$cpopo, $tfalu, $tribunalopo){
        $sql = "UPDATE oposiciones.opositores set NOMOPO = :nomopo , CIUOPO = :ciuopo,
                TFALU = :tfalu, TRIBUNALOPO= :tribunalopo, CPOPO = :cpopo
                where DNIOPO = :dniopo";

        $conexion = BD::realizarConexion();
        $resultado = $conexion->prepare($sql);
        $resultado->bindParam(':dniopo', $dniopo);
        $resultado->bindParam(':nomopo', $nomopo);
        $resultado->bindParam(':ciuopo', $ciuopo);
        $resultado->bindParam(':cpopo', $cpopo);
        $resultado->bindParam(':tfalu', $tfalu);
        $resultado->bindParam(':tribunalopo', $tribunalopo);
        $resultado->execute();
        $afectados = $resultado->rowCount();
        $conexion = null;
        $resultado->closeCursor();
        if ($afectados == 1) {
            return "Modificacion realizada";
        }else {
            return "Modificacion Fallida";
        }
    }

    /*
    Funcion para borrar registros de la base de datos
    */

    public static function borrarOpositor($dniopo) {
        $sql = "Delete from oposiciones.opositores
                    where DNIOPO = :dniopo";
        $conexion = BD::realizarConexion();
        $resultado = $conexion->prepare($sql);
        $resultado->bindParam(':dniopo' , $dniopo);
        $resultado->execute();
        $afectados = $resultado->rowCount();
        $resultado->closeCursor();
        $conexion = null;
        if ($afectados == 1) {
            return "Borrado realizado";
        }else {
            return "Borrado Fallido";
        }
    }
}
