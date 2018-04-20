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
                echo $verificarUser['tipo_rol'];
                /*
                if($verificarUser){
                    if ($verificarUser['id_tipo_usuario'] == 1) {
                        header('Location: '.URL.'usuarios?admin='.$verificarUser['id_usuario'].'&tipo='.$verificarUser['id_tipo_usuario']);
                        AutenticacionController::$idUsuario = $verificarUser['id_usuario'];
                    }elseif($verificarUser['id_tipo_usuario'] == 2){
                        header('Location: '.URL.'activos?admin='.$verificarUser['id_usuario'].'&tipo='.$verificarUser['id_tipo_usuario']);
                        //AutenticacionController::$idUsuario = $verificarUser['id_usuario'];
                    }elseif($verificarUser['id_tipo_usuario'] == 3){
                        header('Location: '.URL.'productos?admin='.$verificarUser['id_usuario'].'&tipo='.$verificarUser['id_tipo_usuario']);
                        //AutenticacionController::$idUsuario = $verificarUser['id_usuario'];
                    }
                    
                }
                */
            }//POST
        }//index
        
        private function login($usuario,$clave){
            $datos = $this->autenticacion->login($usuario,$clave);            
            return $datos;            
        }
        
        public function recuperarClave(){
            if ($_POST) {                
                $usuario = (isset($_POST['usuario']) ? $_POST['usuario'] : '');
                $verificarUser=$this->verificarUsuario($_POST['usuario'],$_POST['email']);
                if($verificarUser){
                    $nuevaClave = substr(md5(uniqid()), 0, 10);
                    // título
                    $título = 'Recuperación de clave';
                    // mensaje
                    $mensaje = '
                    <html>
                    <head>
                      <title>Recuperación de clave</title>
                    </head>
                    <body>
                      <p>
                        Las credenciales temporales para el ingreso al sistema SCAI son:
                        <br>
                        Usuario:'.$verificarUser['usuario'].'
                        <br>
                        Contraseña:'.$nuevaClave.'
                        <br>
                        Ingresa a <a href="http://localhost/SCAI/">www.scai.com</a>, y actualiza la contraseña.
                      </p>

                    </body>
                    </html>
                    ';

                    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                    $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                    // Cabeceras adicionales
                    $cabeceras .= 'From: SCAI <scai@scai.com>' . "\r\n";
                    // Enviarlo
                    $bool = mail($verificarUser['email'], $título, $mensaje, $cabeceras);
                    if($bool){
                        $this->nuevaClave($verificarUser['usuario'],$verificarUser['email'],$nuevaClave); 
                        header('Location: '.URL.'autenticacion');
                    }else{
                        echo "Error al enviar el correo electrónico";
                    }                     
                }
            }
        }//recuperarClave
        
        private function verificarUsuario($usuario,$email){
            $datos = $this->autenticacion->verificarUsuario($usuario,$email);            
            return $datos; 
        }

        private function nuevaClave($usuario,$email,$nuevaClave){
            $this->autenticacion->nuevaClave($usuario,$email,$nuevaClave);
        }

            public function creditos() {
            //debe existir solo para q cargue la vista
        }

        public function logout() {
            header('Location: '.URL.'autenticacion');
        }

    }
?>
