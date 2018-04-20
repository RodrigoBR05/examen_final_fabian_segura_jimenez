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
          <div class="nav-wrapper"><a class="page-title">Agregar activo</a></div>
        </div>
    </nav>
</header>

<main>
    <div class="container">
    <div class="row">
        <form class="col s12" method="POST" id="agregar_form" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s6">
              <input type='text' id="numSerie" name="numSerie" class="validate" required>
              <label for="numSerie" data-error="inválido" data-success="válido">Número de serie</label>
            </div>         
              <div class="input-field col s6">
              <input type='text' id="nombre" name="nombre" class="validate" required>
              <label for="nombre" data-error="inválido" data-success="válido">Nombre</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
                <textarea id="descripcion" name="descripcion" class="materialize-textarea" class="validate" required></textarea>
                <label for="descripcion" data-error="inválido" data-success="válido">Descripción del activo</label>
            </div>
            <div class="input-field col s6">
                <input type="text" id="donadoPor" name="donadoPor"  class="validate" required>
              <label for="donadoPor" data-error="inválido" data-success="válido">Donado por</label>
            </div>
              <div class="input-field col s6">                 
                 <select class="browser-default" name="departamento" required>
                  <option value="" disabled selected>Seleccione el departamento</option>
                  
                  <?php
                            if (!empty($datos)) {
                                while($departamento = mysqli_fetch_array($datos)){ ?>
                                    ?>
                  <option value="<?php echo $departamento['nombre'];?>"><?php echo $departamento['nombre'];?></option>
                   <?php
                                }
                            }
                            ?>
                </select>
          </div>
          </div>       
            <div class="row">
            <div class="input-field col s6">
                <input type="number" id="valorAdquisicion" name="valorAdquisicion" class="validate" placeholder="Colones" required>
              <label for="valorAdquisicion" data-error="inválido" data-success="válido">Valor de aquisición</label>
            </div>            
            <div class="input-field col s6">
                <input type="number" id="valorActual" name="valorActual" class="validate" placeholder="Colones">
              <label for="valorActual" data-error="inválido" data-success="válido">Valor actual</label>
            </div>            
            </div>

                <div class="row">                
                    <div class="input-field col s6">
                        <label for="imagen">Agregar imagen</label>
                    </div>
                </div>
                <div class="row">                
                    <div class="input-field col s6">
                        <input type="file" name="imagen" id="imagen" >
                    </div>
                </div>
                <div class='row center'>
                    <button data-target="modalAgregarActivo" name='btn_reg_activo' class='col s12 l4 offset-l4 btn waves-effect blue darken-4'>Registrar activo</button>
            </div>
            <input type='text' id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['admin']; ?>" style="visibility:hidden">
        </form>
     
    </div>
    </div>
    <!--MODAL DE CONFIRMACIÓN-->
    <div id="modalAgregarActivo" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Agregar activo</h4>
          <p>¿Desea agregar el activo?</p>
        </div>
        <div class="modal-footer">
            <button type="reset" form="agregar_form" class="modal-action modal-close waves-light waves-green btn-flat black-text">Cancelar</button>
            <button type="submit" form="agregar_form" class="modal-action modal-close waves-light waves-green btn-flat white-text blue darken-4">Aceptar</button>
        </div>
      </div>
</main>
<?php }else{ header('Location: '.URL.'autenticacion');}?>
