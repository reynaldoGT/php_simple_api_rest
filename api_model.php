<?php

include_once 'database.php';
include_once 'alumnos.php';

class APImodel extends Database
{
    function getAll()
    {
        $alumnos = array();
        $alumnos['items'] = array();

        $query = $this->connect()->query("SELECT * FROM alumnos");

        if ($query->rowCount()) {
            while ($row = $query->fetch()) {
                $alumno = new Alumno();
                $alumno->setid($row['id']);
                $alumno->setNombre($row['nombre']);

                array_push($alumnos['items'], $alumno->toArray());
            }
            echo json_encode($alumnos);
        }
    }

    function getById($id)
    {
        $alumnos = array();
        $alumnos['items'] = array();

        $query = $this->connect()->prepare("SELECT * FROM alumnos WHERE id= :id");
        $query->execute(['id' => $id]);

        if ($query->rowCount()) {
            while ($row = $query->fetch()) {
                $alumno = new Alumno();
                $alumno->setid($row['id']);
                $alumno->setNombre($row['nombre']);

                array_push($alumnos['items'], $alumno->toArray('total'));
            }
            echo json_encode($alumnos);
        }
    }
    function newItem($item)
    {
        try {
            $query = $this->connect()->prepare("INSERT INTO alumnos(nombre) VALUES(:nombre)");
            $query->execute(['nombre' => $item->getNombre()]);
            echo json_encode(array('success' => 'Nuevo alumno añadido'));
        } catch (\PDOException $e) {
            echo json_encode(array('error' => 'No se pudo insertar un nuevo usuario'));
        }
    }
    function deleteItem($id)
    {
        try {
            $query = $this->connect()->prepare("DELETE FROM alumnos WHERE id = :id");
            if ($query->execute(['id' => $id]) && $query->rowCount())
                echo json_encode(array('success' => 'Se ha borrando el registro'));
            else
                echo json_encode(array('error' => 'Hubo un error ... '));
        } catch (\PDOException $e) {
            echo json_encode(array('error' => 'Hubo un error'));
        }
    }
    function updateItem($id, $newItem)
    {
        try {
            $query =
                $this->connect()->prepare("UPDATE alumnos SET nombre=:nombre WHERE id = :id");
            if ($query->execute([
                'id' => $id,
                'nombre' => $newItem->getNombre()
            ]) && $query->rowCount())
                echo json_encode(array('ok' => 'Se ha actualizado correctamente'));
            else
                echo json_encode(array('error' => 'Hubo un error al editar'));
        } catch (\PDOException $e) {
            echo json_encode(array('error' => 'Hubo un error'));
        }
    }
}
