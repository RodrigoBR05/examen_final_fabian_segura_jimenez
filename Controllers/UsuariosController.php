<?php namespace Controllers;
    use Models\Usuario as Usuario;      

    class UsuariosController{
        
        private $usuario;

        public function __construct(){
            $this->usuario = new Usuario();
        }
        
        public function index(){
            $datos = $this->usuario->toList();
            return $datos;            
        }
        
        public function create(){            
            if($_POST){                
                $this->usuario->set("nombre", $_POST['nombre']);
                $this->usuario->set("nick", $_POST['user']);
                $this->usuario->set("contrasenia", $_POST['password']);                
                $this->usuario->set("tipo_rol", $_POST['tipo_rol']);                  
                $this->usuario->create(); 
            }            
        }
        
        public function read($id){
            $this->usuario->set("id_usuario", $id);
            $datos = $this->usuario->read();
            return $datos;
        }
        
        public function update($id){
            if (!$_POST) {
                $this->usuario->set("id_usuario", $id);
                $datos = $this->usuario->read();
                return $datos;
            }else{
                $this->usuario->set("id_usuario", $id);
                $this->usuario->set("nombre", $_POST['nombre']);
                $this->usuario->set("apellidos", $_POST['apellidos']);
                $this->usuario->set("email", $_POST['email']);
                $this->usuario->set("telefono", $_POST['telefono']);
                $this->usuario->set("puesto", $_POST['puesto']);
                $this->usuario->set("id_tipo_usuario", $_POST['id_tipo_usuario']);
                $this->usuario->update();
                //Página de listado de usuarios
                header("Location: ".URL."usuarios");
            }
        }


        public function delete($id){
            $this->usuario->set("id_usuario",$id);
            $this->usuario->delete();
            header('Location:'.URL.'usuarios');
        }
        
        public function excel(){
          $datos = $this->usuario->toList();
          return $datos;
        }//excel
        
    }
    $usuarios = new UsuariosController();    
?>

