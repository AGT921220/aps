<li class="treeview">
    <a href="#">
      <i class="fas fa-users"></i>
      <span>Clientes</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('clientes')) ? 'active' : '' }}"><a href="/clientes"><i class="fa fa-list"></i>Ver Clientes</a></li>
      <li class="/clientes/create"><a href="/clientes/create"><i class="fa fa-plus"></i>Agregar Clientes</a></li>
    </ul>
</li>
