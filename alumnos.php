<?php

class Alumno
{
    private $id;
    private $nombre;

    public function setid($id)
    {
        $this->id = $id;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }

    function toArray(){
        return array(
            'id'=>$this->id,
            'nombre'=>$this->nombre
        );
        
    }
}
