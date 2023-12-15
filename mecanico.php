<?php

require_once ("conexion.php");
class mecanico{
    private $id;
    private $nombre;
    private $apellido;

    private $celular;
    private $especializacion;
    
    const TABLA = 'mecanico';

      public function getId() {
        return $this ->id;
      }
      public function getNombre(){
        return $this->nombre;
      }
      public function getApellido(){
        return $this ->apellido;
      }

      public function getCelular(){
        return $this ->celular;
      }
      public function getEspecializacion(){
        return $this ->especializacion;
      }
      
      public function setId($id){
        $this->id = $id;
      }
      public function setNombre($nombre){
        $this->nombre = $nombre;
      }
      public function setApellido($apellido){
        $this->apellido = $apellido;
      }

      public function setCelular($celular){
        $this->celular = $celular;
      }
      public function setEspecializacion($especializacion){
        $this->especializacion= $especializacion;
      }
      

      public function __construct($nombre,$apellido, $celular, $especializacion,$id=null ){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->celular = $celular;
        $this->especializacion = $especializacion;
        
      }
       public function guardarMecanico (){

        {

                $conexion = new Conexion();
                $consulta = $conexion->prepare('INSERT INTO ' .self::TABLA .'(nombre, apellido, celular,  especializacion) VALUES (:nombre, :apellido, :celular, :especializacion)');
                $consulta -> bindParam(':nombre', $this->nombre);
                $consulta -> bindParam(':apellido', $this->apellido);
                $consulta -> bindParam(':celular', $this->celular);
                $consulta -> bindParam(':especializacion', $this->especializacion);
                $consulta -> execute();
                $this->id = $conexion->lastInsertId();
                $conexion = null;
            
                // Redirigir a la página que muestra los mecánicos después de guardar
                header("Location: mostrarMeca.php");
                exit(); // Asegura que se detenga la ejecución después del redireccionamiento
            }
          }
          public static function obtenerMecanicoPorId($id){
            try {
                $conexion = new Conexion();
                $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id_mecanico = :id_mecanico');
                $consulta->bindParam(':id_mecanico', $id);
                $consulta->execute();
                $mecanico = $consulta->fetch(PDO::FETCH_ASSOC);
        
                //var_dump($id); // Verificar el valor de $id
                //var_dump($cliente); // Verificar el resultado de la consulta
        
                return $mecanico; // Retorna el cliente encontrado
        
            } catch (PDOException $e) {
                // Manejo de errores si la consulta falla
                echo "Error al obtener el cliente: " . $e->getMessage();
                return null;
            }
        }
        
        public static function eliminarMecanicoPorId($id){
          try {
              $conexion = new Conexion();
              $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id_mecanico = :id_mecanico');
              $consulta->bindParam(':id_mecanico', $id);
              $eliminado = $consulta->execute();
      
              return $eliminado; // Retorna true si se eliminó correctamente, false si hubo un error
      
          } catch (PDOException $e) {
              // Manejo de errores si la consulta falla
              echo "Error al eliminar el mecanico: " . $e->getMessage();
              return false;
          }
      }
        
      
    public static function mostrarMeca(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' ORDER BY nombre');
        $consulta -> execute();
        $registros = $consulta->fetchAll();
        return $registros;

    }
}
?>