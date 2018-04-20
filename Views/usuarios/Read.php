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
          <div class="nav-wrapper"><a class="page-title">Detalles del usuario</a></div>
        </div>
    </nav>
</header>

<main>
    <div class="container">
    <div class="row">
        <form class="col s12" method="POST">
          <div class="row">
            <div class="input-field col s6">
                <input disabled type='text' value="<?php echo $datos['nombre']; ?>" id="nombre" name="nombre" class="validate black-text" required>
              <label  class="grey-text text-darken-3" for="nombre">Nombre</label>
            </div>              
            <div class="input-field col s6">
              <input disabled  type='text' value="<?php echo $datos['apellidos']; ?>" id="apellidos" name="apellidos" class="validate black-text" required>
              <label class="grey-text text-darken-3" for="apellidos" data-error="inválido" data-success="válido">Apellidos</label>
            </div>              
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input disabled  type="email" value="<?php echo $datos['email']; ?>" id="email" name="email"  class="validate black-text" required>
              <label class="grey-text text-darken-3" for="email" data-error="inválido" data-success="válido">Email</label>
            </div>
            <div class="input-field col s6">
                <input disabled  type="tel" value="<?php echo $datos['telefono']; ?>" id="telefono" name="telefono"  class="validate black-text" placeholder="00000000" required>
              <label class="grey-text text-darken-3" for="telefono" data-error="inválido" data-success="válido">Teléfono</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input disabled  type='text' value="<?php echo $datos['puesto']; ?>" id="puesto" name="puesto" class="validate black-text" required>
              <label class="grey-text text-darken-3" for="puesto" data-error="inválido" data-success="válido">Puesto</label>
            </div>            
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input disabled  type='text' value="<?php echo $datos['usuario']; ?>" id="user" name="user" class="validate black-text" required>
              <label class="grey-text text-darken-3" for="user" data-error="inválido" data-success="válido">Usuario</label>
            </div>
            <div class="input-field col s6">
              <input disabled  type='text' value="<?php echo $datos['tipo_usuario']; ?>" id="tipo_usuario" name="tipo_usuario" class="validate black-text" required>
              <label class="grey-text text-darken-3" class="grey-text text-darken-3" for="tipo_usuario" data-error="inválido" data-success="válido">Tipo de usuario</label>
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