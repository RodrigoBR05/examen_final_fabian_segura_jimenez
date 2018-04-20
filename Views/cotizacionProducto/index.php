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
        $('#tableUsuarios').DataTable({
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
          <div class="nav-wrapper"><a class="page-title">Activos</a></div>
        </div>
    </nav>
</header>

<main >
    <div class="container center">
        <div class="input-field  col l3 offset-l1"><a class="waves-effect waves-light btn light-blue darken-1" 
        href="<?php echo URL; ?>activos/excel">Generar reporte</a></div>             
    </div>
    <br>    
    
    <div class="divider"></div>
    <div class="row responsive-table">       
    
    <table class="display" id="tableUsuarios">
            <thead>
              <tr>
                  <!--<th class="center">Codigo</th>-->
                  <th class="center">Número serie</th>
                  <th class="center">Nombre</th>
                  <th class="center">Departamento</th>
                  <th class="center">Valor adquisición</th>
                  <th class="center">Valor actual</th>
                  <th class="center">Acciones</th>
              </tr>
            </thead>

            <tbody>
                <?php
                if (!empty($datos)) {
                    while($row = mysqli_fetch_array($datos)){ ?>
                    <tr>
                        <!--<td class="center"><?php echo $row['codigo']; ?></td>-->
                        <td class="center"><?php echo $row['numero_serie']; ?></td>
                        <td class="center"><?php echo $row['nombre']; ?></td>
                        <td class="center"><?php echo $row['ubicacion_departamento']; ?></td>
                        <td class="center"><?php echo $row['valor_adquisicion']; ?></td>
                        <td class="center"><?php echo $row['valor_actual']; ?></td>
                        <td class="center">
                            <a class="btn-floating waves-effect waves-light green" href="<?php echo URL; ?>activos/read/<?php echo $row['id_activo']; ?>"><i class="material-icons">zoom_in</i></a>                       
                            <a class="btn-floating waves-effect waves-light orange" href="<?php echo URL; ?>activos/update/<?php echo $row['id_activo']; ?>">
                                <i class="material-icons">build</i></a>                       
                            <a class="open-Modal btn_delete btn-floating waves-effect waves-light red" href="#modalEliminarActivo" data-id="<?php echo $row['id_activo']; ?>"><i class="material-icons">delete_forever</i></a>
                        </td>
                    </tr>
                <?php }
                }?>              
              
            </tbody>
          </table>
        </div>
         <!--MODAL DE CONFIRMACIÓN-->
       <div id="modalEliminarActivo" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Eliminar activo</h4>
          <p>¿Desea eliminar el activo?</p>
        </div>
        <div class="modal-footer">
            <button type="reset" class="modal-action modal-close waves-light waves-green btn-flat black-text">Cancelar</button>
            <a  href="" id="eliminar" class="modal-action modal-close waves-light waves-green btn-flat white-text blue darken-4">Aceptar</a>
        </div>
      </div>
</main>

<script>
    $(document).on("click", ".open-Modal", function () {
        var id = $(this).data('id');
        document.getElementById( "eliminar" ).href = '<?php echo URL; ?>activos/delete/' + id;
    });    
</script>
<?php }else{ header('Location: '.URL.'autenticacion');}?>

