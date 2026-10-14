<?php
require_once "modelo/Auto.php";

class AutoDao
{
    private $conexion;

    // CONSTRUCTOR
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    // LISTAR AUTOS
    public function listar()
    {
        $sql = "SELECT id, placa, color, modelo, tipoauto, fotografia
                FROM auto
                ORDER BY id DESC";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $autos = [];

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $auto = new Auto(
                $fila["id"],
                $fila["placa"],
                $fila["color"],
                $fila["modelo"],
                $fila["tipoauto"],
                $fila["fotografia"]
            );
            $autos[] = $auto;
        }
        return $autos;
    }

    // BUSCAR POR ID
    public function buscarPorId($id)
    {
        $sql = "SELECT id, placa, color, modelo, tipoauto, fotografia
                FROM auto
                WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(["id" => $id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new Auto(
                $fila["id"],
                $fila["placa"],
                $fila["color"],
                $fila["modelo"],
                $fila["tipoauto"],
                $fila["fotografia"]
            );
        }
        return null;
    }

    // INSERTAR
    public function insertar(Auto $auto)
    {
        $sql = "INSERT INTO auto
                (placa, color, modelo, tipoauto, fotografia)
                VALUES
                (:placa, :color, :modelo, :tipoauto, :fotografia)";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            "placa" => $auto->getPlaca(),
            "color" => $auto->getColor(),
            "modelo" => $auto->getModelo(),
            "tipoauto" => $auto->getTipoauto(),
            "fotografia" => $auto->getFotografia()
        ]);
    }

    // ACTUALIZAR
    public function actualizar(Auto $auto)
    {
        $sql = "UPDATE auto
                SET placa = :placa,
                    color = :color,
                    modelo = :modelo,
                    tipoauto = :tipoauto,
                    fotografia = :fotografia
                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            "id" => $auto->getId(),
            "placa" => $auto->getPlaca(),
            "color" => $auto->getColor(),
            "modelo" => $auto->getModelo(),
            "tipoauto" => $auto->getTipoauto(),
            "fotografia" => $auto->getFotografia()
        ]);
    }

    // ELIMINAR
    public function eliminar($id)
    {
        $sql = "DELETE FROM auto
                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            "id" => $id
        ]);
    }
}
