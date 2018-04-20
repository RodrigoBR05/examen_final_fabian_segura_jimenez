<?php Namespace Models;
/**
 * Description of Activo
 *
 * @author melma
 */
class Activo {
    
    private $idActivo;
    private $idUsuario;
    private $numeroSerie;
    private $nombre;
    private $descripcion;
    private $donadoPor;
    private $ubicacionDepartamento;
    private $valorAdquisicion;
    private $valorActual;
    private $rutaImagen;
    private $fechaIngreso;
    private $fechaModificacion;
    private $con;
    
     public function __construct() {
        $this->con=new Conexion();
        $this->fechaModificacion= date("Y/m/d");
        $this->fechaIngreso = date("Y/m/d");
    }//ctor
    
     public function set($atributo, $contenido){
	$this->$atributo = $contenido;
    }//set
    public function get($atributo){
	return $this->$atributo;
    }//get
    
    public function create(){
        $this->con->conectar();
        $sql = "INSERT INTO activo (id_usuario, numero_serie, nombre, descripcion, donado_por, ubicacion_departamento,
            valor_adquisicion, valor_actual, ruta_imagen, fecha_ingreso)
                VALUES ('{$this->idUsuario}', '{$this->numeroSerie}', '{$this->nombre}','{$this->descripcion}',
                    '{$this->donadoPor}','{$this->ubicacionDepartamento}','{$this->valorAdquisicion}','{$this->valorActual}', 
                    '{$this->rutaImagen}', '{$this->fechaIngreso}')";
        //print $sql;
        $this->con->consultaSimple($sql);
    }//create
    
    public function update(){
         $sql = "UPDATE activo set id_usuario = '{$this->idUsuario}' , numero_serie = '{$this->numeroSerie}', nombre = '{$this->nombre}', descripcion = '{$this->descripcion}',
          ruta_imagen= '{$this->rutaImagen}',donado_por = '{$this->donadoPor}', ubicacion_departamento = '{$this->ubicacionDepartamento}', 
          valor_adquisicion = '{$this->valorAdquisicion}', valor_actual = '{$this->valorActual}',
          fecha_modificacion = '{$this->fechaModificacion}' WHERE id_activo = '$this->idActivo'";
         //print $sql;
          $this->con->consultaSimple($sql);
    }//update
    
    public function delete(){
        $sql = "DELETE FROM activo where id_activo = '$this->idActivo'";
        $this->con->consultaSimple($sql);
    }//delete
    
    public function getActivo(){
        $sql = "SELECT t1.*, t2.nombre as nombre_usuario, t2.apellidos FROM activo t1 "
                . "INNER JOIN usuario t2 ON t1.id_usuario = t2.id_usuario WHERE id_activo = '{$this->idActivo}'";
        $datos = $this->con->consultaRetorno($sql);
	//Envia un array
	$row = mysqli_fetch_assoc($datos);
	return $row;
    }//getActivo
    
    public function getActivos(){
        $sql = "SELECT * FROM activo";
        $datos = $this->con->consultaRetorno($sql);    
        return $datos;        
    }////getActivos
    
    public function generarCodigo(){
        //Obtiene las primeras 3 letras del departamento
        $cod = substr($this->ubicacionDepartamento,0,3);
        $num = 1;
        $sql = "call sp_obtener_codigo('$this->ubicacionDepartamento')";
        $datos = $this->con->consultaRetorno($sql);
        $row = mysqli_fetch_array($datos);
        //print_r($datos);
        
        if (empty($row)) {
            $codigo = $cod . $num;
            //echo '***************************************************************Nuevooooo!!!!!!!';
        }
        else{
            $num = intval(substr($row['codigo'],3),10);
            $codigo = $cod . ($num+1);
            //echo '***************************************************************otroooooo!!!!!!!'. "num: ". $num . $codigo;
        }
       // mysqli_close($this->con);
        return $codigo;
    }//generarCodigo
    
    public function calcularValorDepreciacion(){
        //Por mientras se va a manejar el mismo valor
        //que el de adquisicion
    }//calcularValorDepreciacion
    
    public function getRutaImagen($id){
        $sql = "SELECT ruta_imagen FROM activo where id_activo = '$id'";
        $ruta = $this->con->consultaRetorno($sql);    
        return $ruta; 
    }//getRutaImagen
    
}//class
?>
