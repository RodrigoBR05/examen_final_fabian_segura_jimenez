<?php namespace Controllers;

    use Models\Autenticacion as Autenticacion;

    class AutenticacionController{

        private $autenticacion;
        public static $idUsuario;

        public function __construct() {
            $this->autenticacion = new Autenticacion();
        }

        public function index(){
            if ($_POST) {
                $usuario = (isset($_POST['usuario']) ? $_POST['usuario'] : '');
                $verificarUser=$this->login($_POST['usuario'],$_POST['password']);
                if($verificarUser){
                    if ($verificarUser['tipo_rol'] == 1) {
                      header('Location: '.URL.'usuarios?admin='.$verificarUser['id'].'&tipo='.$verificarUser['tipo_rol']);
                    }elseif($verificarUser['tipo_rol'] == 2){
                      header('Location: '.URL.'usuarios?admin='.$verificarUser['id'].'&tipo='.$verificarUser['tipo_rol']);

                        //header('Location: '.URL.'productos?admin='.$verificarUser['id'].'&tipo='.$verificarUser['tipo_rol']);
                    }

                }
            }//POST
        }//index

        private function login($usuario,$clave){
            $datos = $this->autenticacion->login($usuario,$clave);
            return $datos;
        }

        private function verificarUsuario($usuario,$email){
            $datos = $this->autenticacion->verificarUsuario($usuario,$email);
            return $datos;
        }

        public function logout() {
            header('Location: '.URL.'autenticacion');
        }

    }
?>
