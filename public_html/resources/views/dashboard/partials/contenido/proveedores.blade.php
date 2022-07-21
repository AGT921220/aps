<li class="{{ ( Route::is('ver_proveedores','agregar_proveedor')) ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fas fa-truck"></i>
      <span>Proveedores</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('ver_proveedores')) ? 'active' : '' }}"><a href="{{ route('ver_proveedores') }}"><i class="fa fa-list"></i>Ver Proveedores</a></li>
      <li class="{{ ( Route::is('agregar_proveedor')) ? 'active' : '' }}"><a href="{{ route('agregar_proveedor') }}"><i class="fa fa-plus"></i>Agregar Proveedor</a></li>
    </ul>
</li>
