<?php
session_start(); 
if (!isset($_SESSION['admin'],$_SESSION['tipo'])) {
    $_SESSION['tipo'] = $_GET['tipo'];
    $_SESSION['admin'] = $_GET['admin'];
}
if (isset($_SESSION['admin'],$_SESSION['tipo'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/examen_final_fabian_segura_jimenez/Views/Head.php'; 
    if($_SESSION['tipo']==1){
        include $_SERVER['DOCUMENT_ROOT'].'/examen_final_fabian_segura_jimenez/Views/HeaderAdmin.php';
    }elseif($_SESSION['tipo']==2){
        include $_SERVER['DOCUMENT_ROOT'].'/examen_final_fabian_segura_jimenez/Views/HeaderVendedor.php';
    }
?>

<header>
    <nav class="top-nav">
        <div class="container center">
          <div class="nav-wrapper"><a class="page-title">Agregar usuario</a></div>
        </div>
    </nav>
</header>

<main>
    <div class="container">
    <div class="row">
        <form class="col s12" method="POST" id="agregar_form">
          <div class="row">
            <div class="input-field col s12">
              <input type='text' id="nombre" name="nombre" class="validate" required>
              <label for="nombre" data-error="inválido" data-success="válido">Nombre</label>
            </div>            
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input type='text' id="user" name="user" class="validate" required>
              <label for="user" data-error="inválido" data-success="válido">Usuario</label>
            </div>
            <div class='input-field col s6'>
              <input type='text' name='password' id='password' class='validate' required/>
              <label for='password' data-error="inválido" data-success="válido">Contraseña</label>
            </div>             
          </div>

          <div class="row">
             
             <div class="input-field col s12">                 
                 <select class="browser-default" name="tipo_rol" required>
                  <option value="" disabled selected>Seleccione el tipo de usuario</option>
                  <option value="1">Administrador</option>
                  <option value="2">Vendedor</option>
                </select>
              </div>
          </div>
            <div class='row center'>
                <button data-target="modalAgregarUsuario" name='btn_login' class='col s12 l4 offset-l4 btn waves-effect blue darken-4'>Registrar usuario</button>
            </div>
        </form>
    </div>
    </div>
    <!--MODAL DE CONFIRMACIÓN-->
    <div id="modalAgregarUsuario" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Agregar usuario</h4>
          <p>¿Desea agregar el usuario?</p>
        </div>
        <div class="modal-footer">
            <button type="reset" form="agregar_form" class="modal-action modal-close waves-light waves-green btn-flat black-text">Cancelar</button>
            <button type="submit" form="agregar_form" class="modal-action modal-close waves-light waves-green btn-flat white-text blue darken-4">Aceptar</button>
        </div>
      </div>
</main>
<?php }else{ header('Location: '.URL.'autenticacion');}?>