<li class="treeview">
    <a>
      <i class="fa fa-shopping-cart" aria-hidden="true"></i>

      <span>Cotizaciones</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
       <li class="{{ ( Route::is('quotations')) ? 'active' : '' }}"><a href="/quotations"><i class="fa fa-list"></i>Ver Cotizaciones</a></li>
      <li><a href="/quotations/create"><i class="fa fa-plus"></i>Agregar Cotización</a></li>
    </ul>
</li>
