<header class="grey">
    <div class="container">
      <a href="#" data-activates="slide-out" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons white-text">menu</i></a>

      <ul id="slide-out" class="side-nav fixed light-blue darken-1">
        <li><div class="userView">
          <img class="circle" src="<?php echo URL; ?>Views/assets/img/logo.png">
        </div></li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">

              <li><div class="divider"></div></li>

              <li class="bold"><a class="collapsible-header waves-effect waves-light white-text"><i class="material-icons left white-text">group_add</i>CLIENTES</a>
                <div class="collapsible-body light-blue darken-1">
                  <ul>
                    <li><a class="white-text" href="<?php echo URL; ?>cliente/create"><i class="material-icons left white-text">playlist_add</i>Agregar cliente</a></li>
                    <li><a class="white-text" href="<?php echo URL; ?>cliente"><i class="material-icons left white-text">list</i>Listado de clientes</a></li>
                  </ul>
                </div>
              </li>
              <li><div class="divider"></div></li>

              <li class="bold"><a class="collapsible-header  waves-effect waves-light white-text"><i class="material-icons left white-text">work</i>PRODUCTO</a>
                <div class="collapsible-body light-blue darken-1">
                  <ul>
                    <li><a class="white-text" href="<?php echo URL; ?>productos/Create"><i class="material-icons left white-text">playlist_add</i>Agregar producto</a></li>
                    <li><a class="white-text" href="<?php echo URL; ?>productos"><i class="material-icons left white-text">list</i>Listado de productos</a></li>
                  </ul>
                </div>
              </li>
              <li><div class="divider"></div></li>

              <li class="bold"><a class="collapsible-header  waves-effect waves-light white-text"><i class="material-icons left white-text">shopping_cart</i>COTIZACIONES</a>
                <div class="collapsible-body light-blue darken-1">
                  <ul>
                    <li><a class="white-text" href="#"><i class="material-icons left white-text">playlist_add</i>Agregar cotización</a></li>
                    <li><a class="white-text" href="#"><i class="material-icons left white-text">list</i>Listado de cotizaciones</a></li>
                  </ul>
                </div>
              </li>

              <li><div class="divider"></div></li>

              <li class="bold"><a class="collapsible-header waves-effect waves-light white-text" href="<?php echo URL; ?>autenticacion/Logout"><i class="material-icons left white-text">power_settings_new</i>CERRAR SESIÓN</a>
              </li>
              <li><div class="divider"></div></li>
            </ul>
          </li>
          <div class="row center">
              <p class="white-text">Copyright © 2018</p>
          </div>
      </ul>
    </div>
  </header>
