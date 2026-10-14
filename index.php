<?php
/**
 * ===================================================
 * CONTROLADOR FRONTAL (FRONT CONTROLLER) - index.php
 * Proyecto: CRUD PHP con MVC y DAO
 * Actividad: Parqueo (Auto) & Tienda (Producto)
 * ===================================================
 */

require_once "config/database.php";

$modulo = $_GET["modulo"] ?? "autos";
$accion = $_GET["accion"] ?? "index";

if ($modulo === "productos") {
    // Módulo Productos (Base de datos: tienda1) - Guía PDF
    require_once "controlador/ProductoController.php";
    
    $db = new Database("tienda1");
    $conexion = $db->conectar();
    $dao = new ProductoDao($conexion);
    $controlador = new ProductoController($dao);

    switch ($accion) {
        case "nuevo":
            $controlador->nuevo();
            break;
        case "guardar":
            $controlador->guardar();
            break;
        case "editar":
            $controlador->editar();
            break;
        case "actualizar":
            $controlador->actualizar();
            break;
        case "eliminar":
            $controlador->eliminar();
            break;
        case "index":
        default:
            $controlador->index();
            break;
    }
} else {
    // Módulo Autos (Base de datos: parqueo) - Asignación específica
    require_once "controlador/AutoController.php";

    $db = new Database("parqueo");
    $conexion = $db->conectar();
    $dao = new AutoDao($conexion);
    $controlador = new AutoController($dao);

    switch ($accion) {
        case "nuevo":
            $controlador->nuevo();
            break;
        case "guardar":
            $controlador->guardar();
            break;
        case "editar":
            $controlador->editar();
            break;
        case "actualizar":
            $controlador->actualizar();
            break;
        case "eliminar":
            $controlador->eliminar();
            break;
        case "index":
        default:
            $controlador->index();
            break;
    }
}
