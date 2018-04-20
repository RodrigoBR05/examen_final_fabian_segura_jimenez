<?php
/* 
 Create producto
 */
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
          <div class="nav-wrapper"><a class="page-title">Agregar Producto</a></div>
        </div>
    </nav>
</header>

<main>
    <div class="container">
    <div class="row">
        <form class="col s12" method="POST" id="agregar_form" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s6">
              <input type='text' id="nombre" name="nombre" class="validate" required>
              <label for="nombre" data-error="inválido" data-success="válido">Nombre</label>
            </div> 
            <div class="input-field col s6">
              <input type='text' id="proveedor" name="proveedor" class="validate" required>
              <label for="proveedor" data-error="inválido" data-success="válido">Proveedor</label>
            </div>                          
          </div>
          <div class="row">
          <div class="input-field col s12">
              <textarea id="descripcion" name="descripcion" class="materialize-textarea" class="validate" required></textarea>
              <label for="descripcion" data-error="inválido" data-success="válido">Descripción del producto</label>
          </div>                
          </div>
          <div class="row">            
            <div class="input-field col s6">
              <input type='text' id="peso" name="peso" class="validate" required>
              <label for="peso" data-error="inválido" data-success="válido">Peso</label>
            </div>
            
            <div class="input-field col s6">                 
               <select class="browser-default" name="tipoPeso" required>
                <option value="" disabled selected>Seleccione el tipo</option>
                <option value="UNIDADES">Unidades</option>
                <option value="KILOGRAMOS">Kilogramos</option>
                <option value="GRAMOS">Gramos</option>
                <option value="LITROS">Litros</option>
                <option value="GALONES">Galones</option>
              </select>
            </div>
          </div>       
          <div class="row">
            <div class="input-field col s6">
                <input type="number" id="cantidadMinima" name="cantidadMinima" class="validate" required>
              <label for="cantidadMinima" data-error="inválido" data-success="válido">Cantidad Mínima</label>
            </div>            
            <div class="input-field col s6">
                <input type="number" id="cantidadActual" name="cantidadActual" class="validate" required>
              <label for="cantidadActual" data-error="inválido" data-success="válido">Cantidad actual</label>
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
              <button data-target="modalAgregarProducto" name='btn_reg_producto' class='col s12 l4 offset-l4 btn waves-effect blue darken-4'>Registrar producto</button>
            </div>
            <input type='text' id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['admin']; ?>" style="visibility:hidden">
        </form>
    </div>
    </div>
    <!--MODAL DE CONFIRMACIÓN-->
    <div id="modalAgregarProducto" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Agregar producto</h4>
          <p>¿Desea agregar el producto?</p>
        </div>
        <div class="modal-footer">
            <button type="reset" form="agregar_form" class="modal-action modal-close waves-light waves-green btn-flat black-text">Cancelar</button>
            <button type="submit" form="agregar_form" class="modal-action modal-close waves-light waves-green btn-flat white-text blue darken-4">Aceptar</button>
        </div>
      </div>
</main>
<?php }else{ header('Location: '.URL.'autenticacion');}?>


