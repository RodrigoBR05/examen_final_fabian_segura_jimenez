<?php
$departamentos = $activos->getDepartamentos();
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
          <div class="nav-wrapper"><a class="page-title">Actualizar activo</a></div>
        </div>
    </nav>
</header>

<main>
    <div class="container">
    <div class="row">
        <form class="col s12" method="POST" id="actualizar_form" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s6">
              <input type='text' id="numSerie" name="numSerie" class="validate" value="<?php echo $datos['numero_serie']; ?>" required>
              <label for="numSerie" data-error="inválido" data-success="válido">Número de serie</label>
            </div>         
              <div class="input-field col s6">
              <input type='text' id="nombre" name="nombre" class="validate" value="<?php echo $datos['nombre']; ?>" required>
              <label for="nombre" data-error="inválido" data-success="válido">Nombre</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
                <textarea id="descripcion" name="descripcion" class="materialize-textarea" class="validate"><?php echo $datos['descripcion']; ?></textarea>
                <label for="descripcion" data-error="inválido" data-success="válido">Descripción del activo</label>
            </div>
            <div class="input-field col s6">
                <input type="text" id="donadoPor" name="donadoPor"  class="validate" value="<?php echo $datos['donado_por']; ?>" required>
              <label for="donadoPor" data-error="inválido" data-success="válido">Donado por</label>
            </div>
              <div class="input-field col s6">                 
                 <select class="browser-default" name="departamento" required>
                 <?php
                            if (!empty($departamentos)) {
                                while($departamento = mysqli_fetch_array($departamentos)){ ?>
                                    ?>
                  <option value="<?php echo $departamento['nombre'];?>"
                      <?php if($datos['ubicacion_departamento'] == $departamento['nombre']){?> selected="selected" <?php }?>>
                      <?php echo $departamento['nombre'];?> 
                      </option>
                   <?php
                                }
                            }
                            ?>
                </select>
          </div>
          </div>       
            <div class="row">
            <div class="input-field col s6">
                <input type="number" id="valorAdquisicion" name="valorAdquisicion" class="validate" placeholder="Colones"
                       value="<?php echo $datos['valor_adquisicion']; ?>" required>
              <label for="valorAdquisicion" data-error="inválido" data-success="válido">Valor de aquisición</label>
            </div>            
            <div class="input-field col s6">
                <input type="number" id="valorActual" name="valorActual" class="validate" placeholder="Colones" 
                       value="<?php echo $datos['valor_actual']; ?>" required>
              <label for="valorActual" data-error="inválido" data-success="válido">Valor actual</label>
            </div>            
          </div>
          <div class="row center">
            <img src="<?php echo URL.$datos['ruta_imagen']; ?>" width="150" height="150" alt="" class="circle responsive-img">
          </div>
            <div class="row">       
            <div class="input-field col s6">
                <label for="imagen">Cambiar imagen</label>
                 </div>
            </div>
            <div class="row">                
                <div class="input-field col s6">
                    <input type="file" name="imagen" id="imagen" >
                </div>
            </div>
            <div class='row center'>
              <button data-target="modalActualizarActivo" name='btn_act_activo' class='col s12 l4 offset-l4 btn waves-effect blue darken-4'>Actualizar activo</button>
            </div>
             <input type='text' id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['admin']; ?>" style="visibility:hidden">
        </form>
    </div>
    </div>
     <!--MODAL DE CONFIRMACIÓN-->
    <div id="modalActualizarActivo" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Actualizar activo</h4>
          <p>¿Desea actualizar el activo?</p>
        </div>
        <div class="modal-footer">
            <button type="reset" form="actualizar_form" class="modal-action modal-close waves-light waves-green btn-flat black-text">Cancelar</button>
            <button type="submit" form="actualizar_form" class="modal-action modal-close waves-light waves-green btn-flat white-text blue darken-4">Aceptar</button>
        </div>
      </div>
</main>
<?php }else{ header('Location: '.URL.'autenticacion');}?>

