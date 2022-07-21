<li class="{{ ( Route::is('ver_usuarios','agregar_usuario')) ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fa fa-user"></i> 
      <span>Usuarios</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('ver_usuarios')) ? 'active' : '' }}"><a href="{{ route('ver_usuarios') }}"><i class="fa fa-list"></i>Ver Usuarios</a></li>
      <li class="{{ ( Route::is('agregar_usuario')) ? 'active' : '' }}"><a href="{{ route('agregar_usuario') }}"><i class="fa fa-plus"></i>Agregar Usuario</a></li>
    </ul>
</li>
