<?php
include_once 'api_model.php';
include_once 'alumnos.php';
// $db = new Database();
// $db->connect();

$api_model = new APImodel();
//$api_model->getAll();
//$api_model->getById(3);
$nuevo = new Alumno();
$nuevo->setNombre("editado prro");
//$api_model->newItem($nuevo);
//$api_model->deleteItem(1);
$api_model->updateItem(2, $nuevo);
