<?php 

    include_once 'database.php';
    include_once 'alumnos.php';
    
    class APImodel extends Database {
        function getAll(){
            $alumnos = array();
            $alumnos['items']=array();

            $query =$this->connect()->query("SELECT * FROM alumno");   

            if ($query->rowCount()) {
                while ($row = $query->fetch()) {
                    $alumno = new Alumno();
                    $alumno->setid($row['id']);
                    $alumno->setNombre($row['nombre']);

                    array_push($alumnos['items'],$alumno->toArray());
                }
                echo json_encode($alumnos);
            }

        }

        function getById(){
            
        }

      

    }
