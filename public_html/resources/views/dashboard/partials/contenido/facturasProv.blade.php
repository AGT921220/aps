<li class="{{ ( Route::is('ver_facturasProv','agregar_factura')) ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fas fa-file-invoice-dollar"></i>
            <span>Facturas de Proovedores</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('ver_facturasProv')) ? 'active' : '' }}"><a href="{{ route('ver_facturasProv') }}"><i class="fa fa-list"></i>Ver Facturas</a></li>
      <li class="{{ ( Route::is('agregar_facturaProv')) ? 'active' : '' }}"><a href="{{ route('agregar_facturaProv') }}"><i class="fa fa-plus"></i>Agregar Factura</a></li>
    </ul>
</li>
