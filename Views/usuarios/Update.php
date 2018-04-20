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
          <div class="nav-wrapper"><a class="page-title">Actualizar usuario</a></div>
        </div>
    </nav>
</header>

<main>
    <div class="container">
    <div class="row">
        <form class="col s12" method="POST" id="actualizar_form">
          <div class="row">
            <div class="input-field col s12">
              <input type='text' id="nombre" value="<?php echo $datos['nombre']; ?>" name="nombre" class="validate" required>
              <label for="nombre" data-error="inválido" data-success="válido">Nombre</label>
            </div>             
          </div>

          <div class="row">
            <div class="input-field col s12">
              <input type='text' id="user" name="user" class="validate" value="<?php echo $datos['nick']; ?>" required>
              <label for="user" data-error="inválido" data-success="válido">Usuario</label>
            </div>            
          </div>

          <div class="row">           
             <div class="col s12"> 
                <label>Tipo de usuario</label>
                <select class="browser-default" name="tipo_rol" id="tipo_rol">
                  <option value="1" <?php if($datos['tipo_rol']=="1") echo "selected";?>>Administrador</option>
                  <option value="2" <?php if($datos['tipo_rol']=="2") echo "selected";?>>Vendedor</option>
                </select>
             </div>            
          </div>
            
             
            <div class='row center'>
              <button data-target="modalActualizarUsuario" name='btn_login' class='col s12 l4 offset-l4 btn waves-effect blue darken-4'>Actualizar usuario</button>
            </div>
        </form>
    </div>
    </div>
    <!--MODAL DE CONFIRMACIÓN-->
    <div id="modalActualizarUsuario" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Actualizar usuario</h4>
          <p>¿Desea actualizar el usuario?</p>
        </div>
        <div class="modal-footer">
            <button type="reset" form="actualizar_form" class="modal-action modal-close waves-light waves-green btn-flat black-text">Cancelar</button>
            <button type="submit" form="actualizar_form" class="modal-action modal-close waves-light waves-green btn-flat white-text blue darken-4">Aceptar</button>
        </div>
      </div>
</main>
<?php }else{ header('Location: '.URL.'autenticacion');}?>