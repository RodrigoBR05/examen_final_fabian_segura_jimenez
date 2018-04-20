<?php  
session_start(); 
if (!isset($_SESSION['admin'],$_SESSION['tipo'])) {
    $_SESSION['tipo'] = $_GET['tipo'];
    $_SESSION['admin'] = $_GET['admin'];
}
if (isset($_SESSION['admin'],$_SESSION['tipo'])) {
    //include $_SERVER['DOCUMENT_ROOT'].'/examen_final_fabian_segura_jimenez/Views/Head.php'; 

    if($_SESSION['tipo']==1){
        include $_SERVER['DOCUMENT_ROOT'].'/examen_final_fabian_segura_jimenez/Views/HeaderAdmin.php';
    }elseif($_SESSION['tipo']==2){
        include $_SERVER['DOCUMENT_ROOT'].'/examen_final_fabian_segura_jimenez/Views/HeaderVendedor.php';
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
          <div class="nav-wrapper"><a class="page-title">Usuarios</a></div>
        </div>
    </nav>
</header>

<main >
    <div class="container center">
        <div class="input-field  col l3 offset-l1"><a class="waves-effect waves-light btn light-blue darken-1"
          href="<?php echo URL; ?>usuarios/excel">Generar reporte</a></div>             
    </div>
    <br>    
    
    <div class="divider"></div>
    <div class="row responsive-table">       
    
    <table class="display" id="tableUsuarios">
            <thead>
              <tr>
                  <th class="center">Id</th>
                  <th class="center">Nombre</th>
                  <th class="center">Apellidos</th>
                  <th class="center">Email</th>
                  <th class="center">Teléfono</th>
                  <th class="center">Puesto</th>
                  <th class="center">Acciones</th>
              </tr>
            </thead>

            <tbody>
                <?php
                if (!empty($datos)) {
                    while($row = mysqli_fetch_array($datos)){ ?>
                    <tr>
                        <td class="center"><?php echo $row['id_usuario']; ?></td>
                        <td class="center"><?php echo $row['nombre']; ?></td>
                        <td class="center"><?php echo $row['apellidos']; ?></td>
                        <td class="center"><?php echo $row['email']; ?></td>
                        <td class="center"><?php echo $row['telefono']; ?></td>
                        <td class="center"><?php echo $row['puesto']; ?></td>
                        <td class="center">
                            <a class="btn-floating waves-effect waves-light green" title="casa" href="<?php echo URL; ?>usuarios/read/<?php echo $row['id_usuario']; ?>"><i class="material-icons">zoom_in</i></a>                       
                            <a class="btn-floating waves-effect waves-light orange" href="<?php echo URL; ?>usuarios/update/<?php echo $row['id_usuario']; ?>"><i class="material-icons">build</i></a>                       
                            <a class="open-Modal btn_delete btn-floating waves-effect waves-light red" data-id="<?php echo $row['id_usuario']; ?>" href="#modalEliminarUsuario"><i class="material-icons">delete_forever</i></a>

                        </td>
                    </tr>
                <?php }
                }?>               
              
            </tbody>
          </table>
        </div>
        <!--MODAL DE CONFIRMACIÓN-->
       <div id="modalEliminarUsuario" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Eliminar usuario</h4>
          <p>¿Desea eliminar el usuario?</p>
        </div>
        <div class="modal-footer">
            <button type="reset" form="actualizar_form" class="modal-action modal-close waves-light waves-green btn-flat black-text">Cancelar</button>
            <a  href="" id="eliminar" class="modal-action modal-close waves-light waves-green btn-flat white-text blue darken-4">Aceptar</a>
        </div>
      </div>
</main>

<script>
    $(document).on("click", ".open-Modal", function () {
        var id = $(this).data('id');
        document.getElementById( "eliminar" ).href = '<?php echo URL; ?>usuarios/delete/' + id;
    });    
</script>
<?php }else{ header('Location: '.URL.'autenticacion');}?>