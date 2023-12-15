<?php

require_once ("conexion.php");
class moto{
    private $id;
    private $placa;
    private $marca;
    private $año;

    private $id_cliente;
    
    const TABLA = 'moto';

      public function getId() {
        return $this ->id;
      }
      public function getPlaca(){
        return $this->placa;
      }
      public function getMarca(){
        return $this ->marca;
      }
      public function getAño(){
        return $this ->año;
      }
      
      public function getId_cliente(){
        return $this ->id_cliente;
      }
    

      public function setId($id){
        $this->id = $id;
      }
      public function setPlaca($placa){
        $this->placa = $placa;
      }
      public function setMarca($marca){
        $this->marca = $marca;
      }
      public function setAño($año){
        $this->año= $año;
      }

  
      public function setId_cliente($id_cliente){
        $this->id_cliente= $id_cliente;
      }
      
      public function __construct($placa,$marca,$año, $id_cliente, $id=null ){
        $this->id = $id;
        $this->placa = $placa;
        $this->marca = $marca;
        $this->año = $año;
        $this->id_cliente = $id_cliente;
      }
      public function guardarMoto() {
        try {
            $conexion = new Conexion();
            $consulta = $conexion->prepare('INSERT INTO moto (placa,marca,año, id_cliente) VALUES (:placa, :marca, :anio, :id_cliente)');
            $consulta->bindParam(':placa', $this->placa);
            $consulta->bindParam(':marca', $this->marca);
            $consulta->bindParam(':anio', $this->año);
            $consulta->bindParam(':id_cliente', $this->id_cliente);
            $consulta->execute();
            $conexion = null;
            return "Moto guardada correctamente";
        } catch (PDOException $e) {
          echo "Error al guardar moto: " . $e->getMessage();
          return false;
        }
    }

    public static function mostrarMoto(){
      $conexion = new Conexion();
      $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' ORDER BY marca');
      $consulta -> execute();
      $registros = $consulta->fetchAll();
      return $registros;

  }
}