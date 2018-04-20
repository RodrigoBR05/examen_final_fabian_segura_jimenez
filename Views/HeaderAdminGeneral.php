<header class="grey">
    <div class="container">
      <a href="#" data-activates="slide-out" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons white-text">menu</i></a>

      <ul id="slide-out" class="side-nav fixed light-blue darken-1">
        <li><div class="userView">
          <img class="circle" src="<?php echo URL; ?>Views/assets/img/logo.png">
        </div></li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">  
                
              <li class="bold"><a class="collapsible-header  waves-effect waves-light white-text"><i class="material-icons left white-text">person_pin</i>MI CUENTA</a>
                <div class="collapsible-body light-blue darken-1">
                  <ul>
                    <li><a class="white-text" href="<?php echo URL; ?>usuarios/userInformation/<?php echo $_SESSION['admin']; ?>"><i class="material-icons left white-text">info_outline</i>Información personal</a></li>
                    <li><a class="white-text" href="<?php echo URL; ?>usuarios/changePassword/<?php echo $_SESSION['admin']; ?>"><i class="material-icons left white-text">https</i>Seguridad</a></li>
                  </ul>
                </div>

              </li>
              <li><div class="divider"></div></li> 
              <li class="bold"><a class="collapsible-header  waves-effect waves-light white-text"><i class="material-icons left white-text">supervisor_account</i>USUARIOS</a>
                <div class="collapsible-body light-blue darken-1">
                  <ul>
                    <li><a class="white-text" href="<?php echo URL; ?>usuarios/create"><i class="material-icons left white-text">playlist_add</i>Agregar usuario</a></li>
                    <li><a class="white-text" href="<?php echo URL; ?>usuarios"><i class="material-icons left white-text">list</i>Listado de usuarios</a></li>
                  </ul>
                </div>
              </li>
              <li><div class="divider"></div></li>

              <li class="bold"><a class="collapsible-header waves-effect waves-light white-text"><i class="material-icons left white-text">home</i>DEPARTAMENTOS</a>
                <div class="collapsible-body light-blue darken-1">
                  <ul>
                    <li><a class="white-text" href="<?php echo URL; ?>departamentos/create"><i class="material-icons left white-text">playlist_add</i>Agregar departamento</a></li>
                    <li><a class="white-text" href="<?php echo URL; ?>departamentos"><i class="material-icons left white-text">list</i>Listado de departamentos</a></li>
                  </ul>
                </div>
              </li>
              <li><div class="divider"></div></li> 

              <li class="bold"><a class="collapsible-header  waves-effect waves-light white-text"><i class="material-icons left white-text">work</i>ACTIVOS</a>
                <div class="collapsible-body light-blue darken-1">
                  <ul>
                    <li><a class="white-text" href="<?php echo URL; ?>activos/Create"><i class="material-icons left white-text">playlist_add</i>Agregar activo</a></li>
                    <li><a class="white-text" href="<?php echo URL; ?>activos"><i class="material-icons left white-text">list</i>Listado de activos</a></li>
                  </ul>
                </div>
              </li>
              <li><div class="divider"></div></li>

              <li class="bold"><a class="collapsible-header  waves-effect waves-light white-text"><i class="material-icons left white-text">shopping_cart</i>INVENTARIO COMEDOR</a>
                <div class="collapsible-body light-blue darken-1">
                  <ul>
                    <li><a class="white-text" href="<?php echo URL; ?>productos/Create"><i class="material-icons left white-text">playlist_add</i>Agregar producto</a></li>
                    <li><a class="white-text" href="<?php echo URL; ?>productos"><i class="material-icons left white-text">list</i>Listado de productos</a></li>
                  </ul>
                </div>
              </li>
              
              <li><div class="divider"></div></li>

              <li class="bold"><a class="collapsible-header waves-effect waves-light white-text" href="<?php echo URL; ?>autenticacion/Creditos"><i class="material-icons left white-text">info_outline</i>ACERCA DE</a>
              </li>
              
              <li><div class="divider"></div></li>

              <li class="bold"><a class="collapsible-header waves-effect waves-light white-text" href="<?php echo URL; ?>autenticacion/Logout"><i class="material-icons left white-text">power_settings_new</i>CERRAR SESIÓN</a>
              </li>
              <li><div class="divider"></div></li>
            </ul>
          </li>
          <div class="row center">
              <p class="white-text">Copyright © 2017 Centro Diurno Paraíso</p>
          </div>
      </ul>
    </div>
  </header>
