<li class="treeview">
    <a href="#">
      {{-- <i class="fas fa-users"></i> --}}
      <i class="fa fa-briefcase" aria-hidden="true"></i>

      <span>Ordenes de Trabajo</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('ordenes-de-trabajo')) ? 'active' : '' }}"><a href="/ordenes-de-trabajo"><i class="fa fa-list"></i>Ver Órdenes</a></li>
      <li class="/ordenes-de-trabajo/create"><a href="/ordenes-de-trabajo/create"><i class="fa fa-plus"></i>Agregar Órden</a></li>
    </ul>
</li>
