<li class="{{ ( Route::is('ver_categorias','agregar_categoria')) ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fa fa-clone"></i>
      <span>Página Web Contenido</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">



      <li class="{{ ( Route::is('ver_carousel','agregar_carousel')) ? 'active' : '' }}  treeview">
        <a href="#">
          <i class="fa fa-clone"></i>
          <span>Inicio</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ( Route::is('inicio_titulo')) ? 'active' : '' }}"><a href="{{ route('inicio_titulo') }}"><i class="fa fa-list"></i>Ver Textos</a></li>

          <li class="{{ ( Route::is('ver_carousel','agregar_carousel')) ? 'active' : '' }}  treeview">
            <a href="#">
              <i class="fa fa-clone"></i>
              <span>Carousel</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ( Route::is('ver_carousel')) ? 'active' : '' }}"><a href="{{ route('ver_carousel') }}"><i class="fa fa-list"></i>Ver Carousel</a></li>
              <li class="{{ ( Route::is('agregar_carousel')) ? 'active' : '' }}"><a href="{{ route('agregar_carousel') }}"><i class="fa fa-plus"></i>Agregar Imagen</a></li>
            </ul>
        </li>
        

        <li class="{{ ( Route::is('ver_inicio_imagenes','agregar_inicio_imagen')) ? 'active' : '' }}  treeview">
          <a href="#">
            <i class="fa fa-clone"></i>
            <span>Imágenes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ( Route::is('ver_inicio_imagenes')) ? 'active' : '' }}"><a href="{{ route('ver_inicio_imagenes') }}"><i class="fa fa-list"></i>Ver Imágenes</a></li>
            <li class="{{ ( Route::is('agregar_inicio_imagen')) ? 'active' : '' }}"><a href="{{ route('agregar_inicio_imagen') }}"><i class="fa fa-plus"></i>Agregar Imagen</a></li>
          </ul>
      </li>
        


        </ul>
    </li>
    
    





    <li class="{{ ( Route::is('ver_categorias','agregar_categoria')) ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fa fa-clone"></i>
      <span>Categorías</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('ver_categorias')) ? 'active' : '' }}"><a href="{{ route('ver_categorias') }}"><i class="fa fa-list"></i>Ver Categorías</a></li>
      <li class="{{ ( Route::is('agregar_categoria')) ? 'active' : '' }}"><a href="{{ route('agregar_categoria') }}"><i class="fa fa-plus"></i>Agregar Categoría</a></li>
    </ul>
  </li>





  <li class="{{ ( Route::is('ver_subcategorias','agregar_subcategoria')) ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fa fa-clone"></i>
      <span>Subcategorías</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('ver_subcategorias')) ? 'active' : '' }}"><a href="{{ route('ver_subcategorias') }}"><i class="fa fa-list"></i>Ver Sub Categorías</a></li>
      <li class="{{ ( Route::is('agregar_subcategoria')) ? 'active' : '' }}"><a href="{{ route('agregar_subcategoria') }}"><i class="fa fa-plus"></i>Agregar Sub Categoría</a></li>
    </ul>
</li>



<li class="{{ ( Route::is('ver_productos','agregar_producto')) ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fa fa-clone"></i>
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



    </ul>
</li>
