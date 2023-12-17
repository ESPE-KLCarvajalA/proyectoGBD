<?php
class Cconexion{
    public static function ConexionBD(){

        $host='localhost';
        $dbname='PROYECTOU1';
        $username='sa';
        $pasword ='Administrador1234';
        $puerto=1433;


        try{
            $conn = new PDO ("sqlsrv:Server=$host,$puerto;Database=$dbname",$username,$pasword);
        }
        catch(PDOException $exp){
            echo ("No se logró conectar correctamente con la base de datos: $dbname, error: $exp");
        }

        return $conn;
    }

}

?>