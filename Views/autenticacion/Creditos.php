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
          <div class="nav-wrapper"><a class="page-title">Centro Diurno Paraíso</a></div>
        </div>
    </nav>
</header>

    <main>                
        <h4 class="center">Acerca de            
        </h4>
        <div class="container">
         <p class="black-text"> El Sistema de Control de Activos e Inventarios (SCAI) fue desarrollado como parte de un proyecto 
                    de la carrera Informática Empresarial del Recinto de Paraíso de la Universidad de Costa Rica. Agradecemos al Centro
                    Diurno de Paraíso por confiar en nosotros y brindarnos el espacio.</p>
        </div>

        <div class="row">

        <!--GRID-->
        <div class="col s12 m4">

          <div class="card-panel light-blue darken-1">
            <div class="col s6">
              <img src="<?php echo URL; ?>Views/assets/img/hombre.png" alt="foto de perfil" class="responsive-img circle">
            </div>
            <span class="white-text">Rodrigo Brenes R.</span>
            <p class="white-text">Estudiante de informática empresarial, UCR</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="card-panel light-blue darken-1">
            <div class="col s6">
              <img src="<?php echo URL; ?>Views/assets/img/mujer.png" alt="foto de perfil" class="responsive-img circle">
            </div>
            <span class="white-text">Rocío Oconitrillo S.</span>
            <p class="white-text">Estudiante de informática empresarial, UCR</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="card-panel light-blue darken-1">
            <div class="col s6">
              <img src="<?php echo URL; ?>Views/assets/img/hombre.png" alt="foto de perfil" class="responsive-img circle">
            </div>
            <span class="white-text">Melvin Marín N.</span>
            <p class="white-text">Estudiante de informática empresarial, UCR</p>
          </div>
        </div>

        </div>

    </main>
<?php }else{ header('Location: '.URL.'autenticacion');}?>

