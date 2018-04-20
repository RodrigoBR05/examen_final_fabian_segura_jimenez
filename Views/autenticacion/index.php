<?php
//phpinfo(); 
    session_start();
    $login = new Login();

    class Login{
        
        public function __construct() {
?>
         <!DOCTYPE html>
         <html lang="es">
          <head>
            <meta charset="UTF-8">
            <title>Cotización de productos</title>
            <!--Import Google Icon Font-->
            <link href="<?php echo URL; ?>Views/assets/css/index.css" rel="stylesheet">
            <!--Import materialize.css-->
            <link type="text/css" rel="stylesheet" href="<?php echo URL; ?>Views/assets/css/materialize.css"  media="screen,projection"/>
            <link type="text/css" rel="stylesheet" href="<?php echo URL; ?>Views/assets/css/cssfsj.css"  media="screen,projection"/>

            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
            <style>
                body {
                    background-color: #eeeeee;
                }
            </style>
          </head>

          <body>  
              
              <div class="container">
                    <div class="section"></div>
                    <div class="section"></div>

                    <div class="container center">
                      <div class="z-depth-5 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                        <form class="col s12" method="POST">
                          <div class='row'>
                            <div class='col s12'>
                            </div>
                          </div>
                            
                          <div class="row">
                            <div class="input-field col s12 center">
                              <img src="<?php echo URL; ?>Views/assets/img/logo.png" width="150" height="150" alt="" class="circle responsive-img">
                            </div>
                          </div>
                            

                          <div class='row'>
                            <div class='input-field col s12'>
                              <i class="material-icons prefix">account_circle</i>
                              <input class='validate' type='text' name='usuario' id='usuario' required/>
                              <label for='usuario' data-error="inválido" data-success="válido">Ingrese su usuario</label>
                            </div>
                          </div>

                          <div class='row'>
                            <div class='input-field col s12'>
                              <i class="material-icons prefix">vpn_key</i>
                              <input class='validate' type='password' name='password' id='password' required/>
                              <label for='password' data-error="inválido" data-success="válido">Ingrese su contraseña</label>
                            </div>
                          </div>

                          <br />
                          <center>
                            <div class='row'>
                              <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect blue darken-1'>Iniciar sesión</button>
                            </div>
                          </center>
                        </form>
                      </div>
                    </div>                  
                    
             </div>               
            
<?php            
        }
        
        public function __destruct() {
 ?>
        
        <!--Import jQuery before materialize.js-->
            <script type="text/javascript" src="<?php echo URL; ?>Views/assets/js/jquery-2.1.1.min.js"></script>
            <script type="text/javascript" src="<?php echo URL; ?>Views/assets/js/materialize.min.js"></script>
          </body>
        </html>
 <?php
            
        }
    }
    
    ?>