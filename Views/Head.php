<!DOCTYPE html>
 <html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Sistema de Control de Activos e Inventario</title>
    <!--Import Google Icon Font-->
    <link href="<?php echo URL; ?>Views/assets/css/index.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo URL; ?>Views/assets/css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo URL; ?>Views/assets/css/cssfsj.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo URL; ?>Views/assets/css/jquery.dataTables.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
    <style>
        body {
            background-color: #eeeeee;
        }
    </style>
    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="<?php echo URL; ?>Views/assets/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>Views/assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>Views/assets/js/jquery.dataTables.min.js"></script>

    <!--Inicio de los elementos-->
    <script type="text/javascript">
      $( document ).ready(function(){
        $(".button-collapse").sideNav({
          menuWidth: 300
        });
        $('.modal').modal();        
        $('select').material_select();
      });
    </script>
  </head>
