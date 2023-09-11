<?php

header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/Categoria.php");

$categoria = new Categoria();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"])
{
    case "GetAll":
        $datos = $categoria->get_categoria();
        echo json_encode($datos);
    break;

    case "GetId":
        $datos = $categoria->get_categoria_per_ID($body["cat_id"]);
        echo json_encode($datos);
    break;

    case "Insert":
        $datos = $categoria->insert_categoria($body["cat_nom"], $body["cat_obs"]);
        echo json_encode("insertado Correctamente");
    break;

    case "Update":
        $datos = $categoria->update_categoria($body["cat_id"], $body["cat_nom"], $body["cat_obs"]);
        echo json_encode("Updated Correctamente");

        break;

    case "Delete":
        $datos = $categoria->delete_categoria($body["cat_id"]);
        echo json_encode("Desactivado Correctamente 00 Deactivate succesfully");
        break;
        
    
}

?>