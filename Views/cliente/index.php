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

<!--Inicio de los elementos-->
<script>
    $(document).ready(function(){
        $('#tableDepartamentos').DataTable({
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
          <div class="nav-wrapper"><a class="page-title">Departamentos</a></div>
        </div>
    </nav>
</header>

<main >
    <div class="container center">
        <div class="input-field  col l3 offset-l1"><a class="waves-effect waves-light btn light-blue darken-1"
            href="<?php echo URL; ?>departamentos/excel">Generar reporte</a></div>             
    </div>
    <br>    
    
    <div class="divider"></div>
    <div class="row responsive-table">       
    
    <table class="display" id="tableDepartamentos">
            <thead>
              <tr>
                  <th class="center">Id</th>
                  <th class="center">Registrado/Modificado por</th>
                  <th class="center">Código</th>
                  <th class="center">Nombre</th>
                  <th class="center">Acciones</th>
              </tr>
            </thead>

            <tbody>
                <?php
                if (!empty($datos)) {
                    while($row = mysqli_fetch_array($datos)){ ?>
                    <tr>
                        <td class="center"><?php echo $row['id_departamento']; ?></td>
                        <td class="center"><?php echo $row['nombre_usuario']; ?></td>
                        <td class="center"><?php echo $row['codigo']; ?></td>
                        <td class="center"><?php echo $row['nombre']; ?></td>
                        <td class="center">
                            <a class="btn-floating waves-effect waves-light green" href="<?php echo URL; ?>departamentos/read/<?php echo $row['id_departamento']; ?>"><i class="material-icons">zoom_in</i></a>                       
                            <a class="btn-floating waves-effect waves-light orange" href="<?php echo URL; ?>departamentos/update/<?php echo $row['id_departamento']; ?>"><i class="material-icons">build</i></a>                       
                            <a class="open-Modal btn_delete btn-floating waves-effect waves-light red" data-id="<?php echo $row['id_departamento']; ?>" href="#modalEliminarDepartamento"><i class="material-icons">delete_forever</i></a>
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
        document.getElementById( "eliminar" ).href = '<?php echo URL; ?>departamentos/delete/' + id;
    });    
</script>
<?php }else{ header('Location: '.URL.'autenticacion');}?>