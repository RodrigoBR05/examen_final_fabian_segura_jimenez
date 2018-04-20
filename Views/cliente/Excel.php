<?php
//$fechaVal = strval(date("d/m/y"));
//$fecha = str_replace("_", "/", $fechaVal);
$nombreArchivo = 'reporteDepartamentos'. date("d/m/Y");
        
header("Content-type: application/vnd.ms-excel"); /* Indica que tipo de archivo es que va a descargar */
header("Content-Disposition: attachment;filename=$nombreArchivo.xls"); /* El nombre del archivo y la extensiòn */
header("Pragma: no-cache");
header("Expires: 0");
?>

<head>
    <meta charset="utf-8" />
</head>

<header>
    <h2 align="center">Reporte de departamentos</h2>
    <h3>Fecha: <?php echo date("d/m/Y");?> </h3>   
    
</header>

    <table width="80%" border="1" align="center" id="tableUsuarios">
            <thead>
              <tr>
                 <FONT SIZE=5><th align="center" bgcolor="#1cfa7e">Código</th></FONT>
                  <th align="center" bgcolor="#1cfa7e">Nombre</th>
                  <th align="center" bgcolor="#1cfa7e">Descripción</th>
                  <th align="center" bgcolor="#1cfa7e">Fecha ingreso</th>
                  <th align="center" bgcolor="#1cfa7e">Fecha modificación</th>
              </tr>
            </thead>

            <tbody>
                <?php
                if (!empty($datos)) {
                    while($row = mysqli_fetch_array($datos)){ ?>
                    <tr>
                        <td align="center"><?php echo $row['codigo']; ?></td>
                        <td align="center"><?php echo $row['nombre']; ?></td>
                        <td align="center"><?php echo $row['descripcion']; ?></td>
                        <td align="center"><?php echo $row['fecha_ingreso']; ?></td>
                        <td align="center"><?php echo $row['fecha_modificacion']; ?></td>
                    </tr>
                <?php }
                }?>              
              
            </tbody>
          </table>
<h5>Copyright © <?php echo '20'. date("y");?> Centro Diurno Paraíso</h5>

