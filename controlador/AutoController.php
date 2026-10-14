<?php
require_once "modelo/Auto.php";
require_once "modelo/AutoDao.php";

class AutoController
{
    private $dao;

    // CONSTRUCTOR
    public function __construct($dao)
    {
        $this->dao = $dao;
    }

    // LISTAR
    public function index()
    {
        $autos = $this->dao->listar();
        require "vista/autos/index.php";
    }

    // NUEVO
    public function nuevo()
    {
        $auto = new Auto();
        require "vista/autos/formulario.php";
    }

    // GUARDAR
    public function guardar()
    {
        $auto = new Auto();
        $auto->setPlaca($_POST["placa"] ?? "");
        $auto->setColor($_POST["color"] ?? "");
        $auto->setModelo($_POST["modelo"] ?? "");
        $auto->setTipoauto($_POST["tipoauto"] ?? "");

        // Manejo de fotografía (archivo subido o URL directa)
        $fotografia = trim($_POST["fotografia"] ?? "");
        if (isset($_FILES["foto_archivo"]) && $_FILES["foto_archivo"]["error"] === UPLOAD_ERR_OK) {
            $nombreArchivo = time() . "_" . preg_replace("/[^a-zA-Z0-9._-]/", "", basename($_FILES["foto_archivo"]["name"]));
            $rutaDestino = "public/uploads/" . $nombreArchivo;
            if (move_uploaded_file($_FILES["foto_archivo"]["tmp_name"], $rutaDestino)) {
                $fotografia = $rutaDestino;
            }
        }
        $auto->setFotografia($fotografia);

        $this->dao->insertar($auto);
        header("Location: index.php");
        exit;
    }

    // EDITAR
    public function editar()
    {
        $id = $_GET["id"];
        $auto = $this->dao->buscarPorId($id);
        require "vista/autos/formulario.php";
    }

    // ACTUALIZAR
    public function actualizar()
    {
        $auto = new Auto();
        $auto->setId($_POST["id"]);
        $auto->setPlaca($_POST["placa"] ?? "");
        $auto->setColor($_POST["color"] ?? "");
        $auto->setModelo($_POST["modelo"] ?? "");
        $auto->setTipoauto($_POST["tipoauto"] ?? "");

        $fotografia = trim($_POST["fotografia"] ?? "");
        if (isset($_FILES["foto_archivo"]) && $_FILES["foto_archivo"]["error"] === UPLOAD_ERR_OK) {
            $nombreArchivo = time() . "_" . preg_replace("/[^a-zA-Z0-9._-]/", "", basename($_FILES["foto_archivo"]["name"]));
            $rutaDestino = "public/uploads/" . $nombreArchivo;
            if (move_uploaded_file($_FILES["foto_archivo"]["tmp_name"], $rutaDestino)) {
                $fotografia = $rutaDestino;
            }
        }
        // Si no subió foto nueva ni cambió la url, conservar la foto anterior
        if (empty($fotografia) && !empty($_POST["foto_actual"])) {
            $fotografia = $_POST["foto_actual"];
        }
        $auto->setFotografia($fotografia);

        $this->dao->actualizar($auto);
        header("Location: index.php");
        exit;
    }

    // ELIMINAR
    public function eliminar()
    {
        $id = $_GET["id"];
        $this->dao->eliminar($id);
        header("Location: index.php");
        exit;
    }
}
