<?php
class Database{
    private $dbhost = 'localhost:8080';
    private  $dbname = 'alumnos';
    private  $username = 'larz';
    private  $password = 'larz';
    private  $charset = 'utf8mb4';

    function connect(){
        try {
            $conexion = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
            $this->options = [
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES=>FALSE
                
            ];
            $pdo=new PDO($conexion,$this->username,$this->password,$this->options);
            echo "Conectad";
            return $pdo;
            
        } catch (PDOException $e) {
            print_r('Error en la conexion '.$e->getMessage());
        }
    }
}

?>