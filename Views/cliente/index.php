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

<!--Inicio de los elementos-->
<script>
    $(document).ready(function(){
        $('#tableClientes').DataTable({
            "dom": '<"left"f>rt<"bottom"ip><"clear">',
            "order": [[0,"asc"]],
            "language": {
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron registros coincidentes",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
        });

    });

</script>

<header>
    <nav class="top-nav">
        <div class="container center">
          <div class="nav-wrapper"><a class="page-title">Clientes</a></div>
        </div>
    </nav>
</header>

<main >
    <div class="row responsive-table">

    <table class="display" id="tableClientes">
            <thead>
              <tr>
                  <th class="center">Identificador</th>
                  <th class="center">Tipo de cédula</th>
                  <th class="center">Cédula</th>
                  <th class="center">Nombre</th>
                  <th class="center">Apellidos</th>
                  <th class="center">País</th>
                  <th class="center">Email</th>
                  <th class="center">Teléfono fijo</th>
                  <th class="center">Teléfono celular</th>
                  <th class="center">Provincia</th>
                  <th class="center">Cantón</th>
                  <th class="center">Distrito</th>
                  <th class="center">Dirección exacta</th>                  
                  <th class="center">Vendedor</th>
              </tr>
            </thead>

            <tbody>
                <?php
                if (!empty($datos)) {
                    while($row = mysqli_fetch_array($datos)){ ?>
                    <tr>
                        <td class="center"><?php echo $row['identificador']; ?></td>
                        <td class="center"><?php echo $row['tipo_cedula']; ?></td>
                        <td class="center"><?php echo $row['cedula']; ?></td>
                        <td class="center"><?php echo $row['nombre']; ?></td>
                        <td class="center"><?php echo $row['apellidos']; ?></td>
                        <td class="center"><?php echo $row['pais']; ?></td>
                        <td class="center"><?php echo $row['email']; ?></td>
                        <td class="center"><?php echo $row['telefono_fijo']; ?></td>
                        <td class="center"><?php echo $row['telefono_celular']; ?></td>
                        <td class="center"><?php echo $row['provincia']; ?></td>
                        <td class="center"><?php echo $row['canton']; ?></td>
                        <td class="center"><?php echo $row['distrito']; ?></td>
                        <td class="center"><?php echo $row['direccion_exacta']; ?></td>
                        <td class="center"><?php echo $row['nombre_usuario']; ?></td>
                        <td class="center">
                            <a class="btn-floating waves-effect waves-light orange" href="<?php echo URL; ?>cliente/update/<?php echo $row['identificador']; ?>"><i class="material-icons">build</i></a>
                            <a class="open-Modal btn_delete btn-floating waves-effect waves-light red" data-id="<?php echo $row['identificador']; ?>" href="#modalEliminarDepartamento"><i class="material-icons">delete_forever</i></a>
                        </td>
                    </tr>
                <?php }
                }?>

            </tbody>
          </table>
        </div>

       <!--MODAL DE CONFIRMACIÓN-->
       <div id="modalEliminarDepartamento" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Eliminar departamento</h4>
          <p>¿Desea eliminar el departamento?</p>
        </div>
        <div class="modal-footer">
            <button type="reset" form="eliminar_form" class="modal-action modal-close waves-light waves-green btn-flat black-text">Cancelar</button>
            <a  href="" id="eliminar" class="modal-action modal-close waves-light waves-green btn-flat white-text blue darken-4">Aceptar</a>
        </div>
      </div>

</main>

<script>
    $(document).on("click", ".open-Modal", function () {
        var id = $(this).data('id');
        document.getElementById( "eliminar" ).href = '<?php echo URL; ?>cliente/delete/' + id;
    });
</script>
<?php }else{ header('Location: '.URL.'autenticacion');}?>
