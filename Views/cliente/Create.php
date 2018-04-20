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
          <div class="nav-wrapper"><a class="page-title">Agregar departamento</a></div>
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
            <div class="input-field col s12">
              <textarea id="descripcion" name="descripcion" class="materialize-textarea" required></textarea>
              <label for="descripcion" data-error="inválido" data-success="válido">Descripción</label>
            </div>
          </div>
          <div class='row center'>
            <button data-target="modalAgregarDepartamento" name='btn_login' class='col s12 l4 offset-l4 btn waves-effect blue darken-4'>Registrar departamento</button>
          </div>
            <input type='text' id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['admin']; ?>" style="visibility:hidden">
        </form>
    </div>
    </div>
    <!--MODAL DE CONFIRMACIÓN-->
    <div id="modalAgregarDepartamento" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Agregar departamento</h4>
          <p>¿Desea agregar el departamento?</p>
        </div>
        <div class="modal-footer">
            <button type="reset" form="agregar_form" class="modal-action modal-close waves-light waves-green btn-flat black-text">Cancelar</button>
            <button type="submit" form="agregar_form" class="modal-action modal-close waves-light waves-green btn-flat white-text blue darken-4">Aceptar</button>
        </div>
      </div>
</main>
<?php }else{ header('Location: '.URL.'autenticacion');}?>