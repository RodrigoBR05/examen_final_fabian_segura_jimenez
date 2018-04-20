<?php
/* 
 Read Producto
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
          <div class="nav-wrapper"><a class="page-title">Detalles del producto</a></div>
        </div>
    </nav>
</header>

<main>
    <div class="container">
    <div class="row">
        <form class="col s12" method="POST" enctype="multipart/form-data">
          <div class="row">                    
            <div class="input-field col s6">
              <input type='text' id="nombre" name="nombre" class="validate" value="<?php echo $datos['nombre']; ?>" readonly="">
              <label for="nombre" data-error="inválido" data-success="válido">Nombre</label>
            </div>
            <div class="input-field col s6">
              <input type="text" id="proveedor" name="proveedor"  class="validate" value="<?php echo $datos['proveedor']; ?>" readonly="">
              <label for="proveedor" data-error="inválido" data-success="válido">Proveedor</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
                <textarea id="descripcion" name="descripcion" class="materialize-textarea" class="validate" readonly=""><?php echo $datos['descripcion']; ?></textarea>
                <label for="descripcion" data-error="inválido" data-success="válido">Descripción del producto</label>
            </div>
            
              
            <div class="input-field col s6">
                <input type='text' id="peso" name="peso" class="validate" value="<?php echo $datos['peso']; ?>" readonly="">
              <label for="peso" data-error="inválido" data-success="válido">Peso</label>
            </div>   
              
          </div>       
            <div class="row">
            <div class="input-field col s6">
                <input type="number" id="cantidadMinima" name="cantidadMinima" class="validate"
                       value="<?php echo $datos['cantidad_minima']; ?>" readonly="">
              <label for="cantidadMinima" data-error="inválido" data-success="válido">Cantidad Mínima</label>
            </div>            
            <div class="input-field col s6">
                <input type="number" id="cantidadActual" name="cantidadActual" class="validate" 
                       value="<?php echo $datos['cantidad_actual']; ?>" readonly="">
              <label for="cantidadActual" data-error="inválido" data-success="válido">Cantidad actual</label>
            </div>            
          </div>
          <div class="row center">
                <img src="<?php echo URL.$datos['ruta_imagen']; ?>" width="150" height="150" alt="" class="circle responsive-img">
          </div>
         <div class="row">
            <div class="input-field col s12">
              <input disabled  type='text' value="<?php echo $datos['nombre_usuario']." ".$datos['apellidos']; ?>" id="puesto" name="puesto" class="validate black-text" required>
              <label class="grey-text text-darken-3" for="puesto" data-error="inválido" data-success="válido">Registrado/Modificado por</label>
            </div>            
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input disabled  type='text' value="<?php echo $datos['fecha_ingreso']; ?>" id="fecha_ingreso" name="fecha_ingreso" class="validate black-text" required>
              <label class="grey-text text-darken-3" for="fecha_ingreso" data-error="inválido" data-success="válido">Fecha ingreso</label>
            </div>
            <div class="input-field col s6">
              <input disabled  type='text' value="<?php echo $datos['fecha_modificacion']; ?>" id="fecha_modificacion" name="fecha_modificacion" class="validate black-text" required>
              <label class="grey-text text-darken-3" for="fecha_modificacion" data-error="inválido" data-success="válido">Fecha modificación</label>
            </div>             
          </div>  
        </form>
    </div>
    </div>
</main>
<?php }else{ header('Location: '.URL.'autenticacion');}?>




