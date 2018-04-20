<?php
session_start(); 
if (!isset($_SESSION['admin'],$_SESSION['tipo'])) {
    $_SESSION['tipo'] = $_GET['tipo'];
    $_SESSION['admin'] = $_GET['admin'];
}
if (isset($_SESSION['admin'],$_SESSION['tipo'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/SCAI/Views/Head.php'; 
    if($_SESSION['tipo']==1){
        include $_SERVER['DOCUMENT_ROOT'].'/SCAI/Views/HeaderAdminGeneral.php';
    }elseif($_SESSION['tipo']==2){
        include $_SERVER['DOCUMENT_ROOT'].'/SCAI/Views/HeaderAdminActivos.php';
    }elseif($_SESSION['tipo']==3){
        include $_SERVER['DOCUMENT_ROOT'].'/SCAI/Views/HeaderAdminInventarioComedor.php';
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
            <div class="input-field col s6">
              <input type='text' id="nombre" value="<?php echo $datos['nombre']; ?>" name="nombre" class="validate" required>
              <label for="nombre" data-error="inválido" data-success="válido">Nombre</label>
            </div>
            <div class="input-field col s6">
              <input type='text' id="apellidos" value="<?php echo $datos['apellidos']; ?>" name="apellidos" class="validate" required>
              <label for="apellidos" data-error="inválido" data-success="válido">Apellidos</label>
            </div>              
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input type="email" id="email" value="<?php echo $datos['email']; ?>" name="email"  class="validate" required>
              <label for="email" data-error="inválido" data-success="válido">Email</label>
            </div>
            <div class="input-field col s6">
              <input type="tel" id="telefono" value="<?php echo $datos['telefono']; ?>" name="telefono"  class="validate" placeholder="00000000" required>
              <label for="telefono" data-error="inválido" data-success="válido">Teléfono</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input type='text' id="puesto" value="<?php echo $datos['puesto']; ?>" name="puesto" class="validate" required>
              <label for="puesto" data-error="inválido" data-success="válido">Puesto</label>
            </div>            

             <div class="col s6"> 
                <label>Tipo de usuario</label>
                <select class="browser-default" name="id_tipo_usuario" id="id_tipo_usuario">
                  <option value="1" <?php if($datos['id_tipo_usuario']=="1") echo "selected";?>>Administrador general</option>
                  <option value="2" <?php if($datos['id_tipo_usuario']=="2") echo "selected";?>>Administrador de activos</option>
                  <option value="3" <?php if($datos['id_tipo_usuario']=="3") echo "selected";?>>Administrador de inventario comedor</option>
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