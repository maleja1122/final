<?php
class conexion extends PDO {
    private $tipo_da_base = "mysql";
    private $host = "localhost";
    private $nombre_de_base = "tallermotos";
    private $usuario = "root";
    private $contraseña = "";

    public function __construct() {
        try {
            parent::__construct("{$this->tipo_da_base}:dbname={$this->nombre_de_base};host={$this->host};charset=utf8", $this->usuario, $this->contraseña);

        } catch (PDOException $e) {
            echo "Ha surgido un error y no se puede conectar a la base de datos. Detalle: " . $e->getMessage();
            exit;
        }
    }
}

try {
    $conexion = new Conexion();
    
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
