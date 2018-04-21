<!DOCTYPE html>
 <html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Sistema de Cotización de Productos</title>
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


    <script>
        //CANTONES
        function getCantones(provinciaId){
          $.ajax({
              dataType: "json",
              url: "https://ubicaciones.paginasweb.cr/provincia/"+provinciaId+"/cantones.json",
              data: {},
              success: function (data) {
                  var html = '<select class="browser-default" name="canton" id="canton" required onchange="getDistrito(provinciaId, this.value);">';
                  for(key in data) {
                      html += "<option value='"+key+"'>"+data[key]+"</option>";
                  }
                  html += "</select";

                  $('#cantones').html(html);
              }
          });
        }//getCantones

        //Distritos
        function getDistrito(provincia, id){
          console.log(provincia);
          console.log(id);
        }//getDistrito

        $(document).ready(function () {
          //PROVINCIAS
          $("#enlaceajaxprovincias").click(function (evento) {
              $.ajax({
                  dataType: "json",
                  url: "https://ubicaciones.paginasweb.cr/provincias.json",
                  data: {},
                  success: function (data) {
                      var html = '<select class="browser-default" name="provincia" id="provincia" required  onchange="getCantones(this.value);">';
                      for(key in data) {
                          html += "<option value='"+key+"'>"+data[key]+"</option>";
                      }
                      html += "</select";

                      $('#provincias').html(html);
                  }
              });
          });

          $("#enlaceajaxcantones").click(function (evento) {

          });
        })
    </script>
  </head>
