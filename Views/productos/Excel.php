<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$nombreArchivo = 'reporteProductos'. date("d/m/Y");
        
header("Content-type: application/vnd.ms-excel"); /* Indica que tipo de archivo es que va a descargar */
header("Content-Disposition: attachment;filename=$nombreArchivo.xls"); /* El nombre del archivo y la extensiòn */
header("Pragma: no-cache");
header("Expires: 0");
?>

<head>
    <meta charset="utf-8" />
</head>

<header>
    <h2 align="center">Reporte de productos</h2>
    <h3>Fecha: <?php echo date("d/m/Y");?> </h3>   
    
</header>

    <table width="80%" border="1" align="center" id="tableUsuarios">
            <thead>
              <tr>
                 <FONT SIZE=5><th align="center" bgcolor="#C39BD3">Nombre</th></FONT>
                  <th align="center" bgcolor="#C39BD3">Descripción</th>
                  <th align="center" bgcolor="#C39BD3">Peso</th>
                  <th align="center" bgcolor="#C39BD3">Tipo peso</th>
                  <th align="center" bgcolor="#C39BD3">Proveedor</th>
                  <th align="center" bgcolor="#C39BD3">Cantidad mínima</th>
                  <th align="center" bgcolor="#C39BD3">Cantidad actual</th>
                  <th align="center" bgcolor="#C39BD3">Fecha ingreso</th>
                  <th align="center" bgcolor="#C39BD3">Fecha modificación</th>
              </tr>
            </thead>

            <tbody>
                <?php
                if (!empty($datos)) {
                    while($row = mysqli_fetch_array($datos)){ ?>
                    <tr>
                        <td align="center"><?php echo $row['nombre']; ?></td>
                        <td align="center"><?php echo $row['descripcion']; ?></td>
                        <td align="center"><?php echo $row['peso']; ?></td>
                        <td align="center"><?php echo $row['tipo_peso']; ?></td>
                        <td align="center"><?php echo $row['proveedor']; ?></td>
                        <td align="center"><?php echo $row['cantidad_minima']; ?></td>
                        <td align="center"><?php echo $row['cantidad_actual']; ?></td>
                        <td align="center"><?php echo $row['fecha_ingreso']; ?></td>
                        <td align="center"><?php echo $row['fecha_modificacion']; ?></td>
                    </tr>
                <?php }
                }?>              
              
            </tbody>
          </table>
<h5>Copyright © <?php echo '20'. date("y");?> Centro Diurno Paraíso</h5>
