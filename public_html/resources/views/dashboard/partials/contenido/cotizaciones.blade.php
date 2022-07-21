
<li class="{{ ( Route::is('ver_cotizaciones','agregar_cotizacion')) ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fa fa-shopping-cart"></i>
      <span>Cotizaciones</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('historial_cotizaciones')) ? 'active' : '' }}">
        <a href="{{ route('historial_cotizaciones') }}"><i class="fa fa-list"></i>
        Historial de cotizaciones
    </a></li>
      <li class="{{ ( Route::is('ver_cotizaciones')) ? 'active' : '' }}">
        <a href="{{ route('ver_cotizaciones') }}"><i class="fa fa-list"></i>
        Ver Cotizaciones
        </a>
    </li>
      <li class="{{ ( Route::is('ver_concursos')) ? 'active' : '' }}">
        <a href="{{ route('ver_concursos') }}"><i class="fa fa-plus"></i>Concursos</a></li>
    </ul>
</li>
