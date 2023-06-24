<li class="treeview">
    <a href="#">
      <i class="fa fa-truck" aria-hidden="true"></i>

      <span>Proveedores</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
       <li class="{{ ( Route::is('suppliers')) ? 'active' : '' }}"><a href="/suppliers"><i class="fa fa-list"></i>Ver Proveedores</a></li>
      <li><a href="/suppliers/create"><i class="fa fa-plus"></i>Agregar Proveedor</a></li>
    </ul>
</li>
