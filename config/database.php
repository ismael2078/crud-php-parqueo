<?php
class Database
{
    private $host = "localhost";
    private $db_name = "parqueo";
    private $username = "root";
    private $password = "Admin26$";

    public function __construct($db_name = "parqueo")
    {
        $this->db_name = $db_name;
    }

    public function conectar()
    {
        // Prueba primero la contraseña de la máquina local y luego la vacía de XAMPP
        $passwords = array_unique([$this->password, "Admin26$", ""]);

        foreach ($passwords as $pwd) {
            try {
                $conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4",
                    $this->username,
                    $pwd
                );
                $conexion->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
                $conexion->setAttribute(
                    PDO::ATTR_DEFAULT_FETCH_MODE,
                    PDO::FETCH_ASSOC
                );
                return $conexion;
            } catch (PDOException $e) {
                // Siguiente intento
            }
        }

        die("Error de conexión a la base de datos '{$this->db_name}'.");
    }
}
