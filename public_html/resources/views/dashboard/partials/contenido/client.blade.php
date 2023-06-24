<li class="treeview">
    <a>
      <i class="fa fa-handshake-o" aria-hidden="true"></i>

      <span>Clientes</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
       <li class="{{ ( Route::is('clients')) ? 'active' : '' }}"><a href="/clients"><i class="fa fa-list"></i>Ver Clientes</a></li>
      <li><a href="/clients/create"><i class="fa fa-plus"></i>Agregar Cliente</a></li>
    </ul>
</li>
