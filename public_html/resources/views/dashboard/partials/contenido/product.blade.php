<li class="treeview">
    <a>
      <i class="fa fa-shopping-cart" aria-hidden="true"></i>

      <span>Productos</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
       <li class="{{ ( Route::is('products')) ? 'active' : '' }}"><a href="/products"><i class="fa fa-list"></i>Ver Productos</a></li>
      {{-- <li><a href="/products/create"><i class="fa fa-plus"></i>Agregar Cliente</a></li> --}}
    </ul>
</li>
