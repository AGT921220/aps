<li class="{{ ( Route::is('ver_clientes','agregar_cliente')) ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fas fa-users"></i>
      <span>Clientes</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('ver_clientes')) ? 'active' : '' }}"><a href="{{ route('ver_clientes') }}"><i class="fa fa-list"></i>Ver Clientes</a></li>
      <li class="{{ ( Route::is('agregar_cliente')) ? 'active' : '' }}"><a href="{{ route('agregar_cliente') }}"><i class="fa fa-plus"></i>Agregar Clientes</a></li>
    </ul>
</li>
