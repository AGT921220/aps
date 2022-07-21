<li class="{{ ( Route::is('ver_facturas','agregar_factura')) ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fas fa-file-invoice-dollar"></i>
            <span>Facturas</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('ver_facturas')) ? 'active' : '' }}"><a href="{{ route('ver_facturas') }}"><i class="fa fa-list"></i>Ver Facturas</a></li>
      <li class="{{ ( Route::is('agregar_factura')) ? 'active' : '' }}"><a href="{{ route('agregar_factura') }}"><i class="fa fa-plus"></i>Agregar Factura</a></li>
    </ul>
</li>
