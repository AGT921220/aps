<li class="{{ ( Route::is('ver_productos','agregar_producto')) ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fa fa-shopping-cart"></i> 
      <span>Productos</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('ver_productos')) ? 'active' : '' }}"><a href="{{ route('ver_productos') }}"><i class="fa fa-list"></i>Ver Productos</a></li>
      <li class="{{ ( Route::is('agregar_producto')) ? 'active' : '' }}"><a href="{{ route('agregar_producto') }}"><i class="fa fa-plus"></i>Agregar Producto</a></li>
    </ul>
</li>