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
          <div class="nav-wrapper"><a class="page-title">Agregar cliente</a></div>
        </div>
    </nav>
</header>

<main>
    <div class="container">
    <div class="row">
        <form class="col s12" method="POST" id="agregar_form">

          <div class="row">
            <div class="input-field col s6">
              <input type='text' id="tipo_cedula" name="tipo_cedula" class="validate" required>
              <label for="tipo_cedula" data-error="inválido" data-success="válido">Tipo de cédula</label>
            </div>
            <div class="input-field col s6">
              <input type='text' id="cedula" name="cedula" class="validate" required>
              <label for="cedula" data-error="inválido" data-success="válido">Cédula</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s6">
              <input type='text' id="nombre" name="nombre" class="validate" required>
              <label for="nombre" data-error="inválido" data-success="válido">Nombre</label>
            </div>
            <div class="input-field col s6">
              <input type='text' id="apellidos" name="apellidos" class="validate" required>
              <label for="apellidos" data-error="inválido" data-success="válido">Apellidos</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s6">
              <input type='text' id="pais" name="pais" class="validate" required>
              <label for="pais" data-error="inválido" data-success="válido">País</label>
            </div>
            <div class="input-field col s6">
              <input type='email' id="email" name="email" class="validate" required>
              <label for="email" data-error="inválido" data-success="válido">Email</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s6">
              <input type='text' id="telefono_fijo" name="telefono_fijo" class="validate" required>
              <label for="telefono_fijo" data-error="inválido" data-success="válido">Teléfono fijo</label>
            </div>
            <div class="input-field col s6">
              <input type='text' id="telefono_celular" name="telefono_celular" class="validate" required>
              <label for="telefono_celular" data-error="inválido" data-success="válido">Teléfono celular</label>
            </div>
          </div>


          <div class="row">
            <div class="input-field col s12">
              <textarea id="direccion_exacta" name="direccion_exacta" class="materialize-textarea" required></textarea>
              <label for="direccion_exacta" data-error="inválido" data-success="válido">Dirección exacta</label>
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
                                while($usuario = mysqli_fetch_array($datos)){ ?>
                                    ?>
                  <option value="<?php echo $usuario['id'];?>"><?php echo $usuario['nombre'];?></option>
                   <?php
                                }
                            }
                            ?>
                </select>
          </div>
          </div>

          <div class='row center'>
            <button data-target="modalAgregarCliente" name='btn_login' class='col s12 l4 offset-l4 btn waves-effect blue darken-4'>Registrar departamento</button>
          </div>
            <input type='text' id="identificador" name="identificador" value="<?php echo $_SESSION['admin']; ?>" style="visibility:hidden">
        </form>
    </div>
    </div>
    <!--MODAL DE CONFIRMACIÓN-->
    <div id="modalAgregarCliente" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Agregar cliente</h4>
          <p>¿Desea agregar el cliente?</p>
        </div>
        <div class="modal-footer">
            <button type="reset" form="agregar_form" class="modal-action modal-close waves-light waves-green btn-flat black-text">Cancelar</button>
            <button type="submit" form="agregar_form" class="modal-action modal-close waves-light waves-green btn-flat white-text blue darken-4">Aceptar</button>
        </div>
      </div>
</main>
<?php }else{ header('Location: '.URL.'autenticacion');}?>
