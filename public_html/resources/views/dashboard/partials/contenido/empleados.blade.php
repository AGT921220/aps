<li class="{{ ( Route::is('ver_empleados','agregar_empleado')) ? 'active' : '' }} treeview">
    <a href="#">
      <i class="fa fa-user"></i> 
      <span>Empleados</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('ver_empleados')) ? 'active' : '' }}"><a href="{{ route('ver_empleados') }}"><i class="fa fa-list"></i>Ver empleados</a></li>
      <li class="{{ ( Route::is('agregar_empleado')) ? 'active' : '' }}"><a href="{{ route('agregar_empleado') }}"><i class="fa fa-plus"></i>Agregar Empleado</a></li>
    </ul>
</li>