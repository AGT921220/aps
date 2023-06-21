<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="navbar_top">
        <img id="logo_aps" src="{{ asset('images/aps_logo.svg') }}">
        <div class="navbar_text">
            <h3>Artículos Promocionales de Chihuahua</h3>
            <h5>Experiencia y Calidad a su Servicio</h5>
        </div>
    </div>



    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse navbar_bottom" id="navbarSupportedContent">
        <ul class="navbar-nav ">

            <li class="nav-item active">
                <a href="/new" class="nav-link ">Inicio <span class="sr-only">(current)</span></a>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Productos
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                    @foreach ($categories as $item)
                        <li><a href="/categorias/{{ $item->family }}"
                                class="dropdown-item category_product">{{ $item->type }}</a></li>
                    @endforeach
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link linking" data-id="contacto">Contacto</a>
            </li>

            <li class="nav-item">
                <a class="nav-link linking" data-id="nosotros">Nosotros</a>
            </li>


        </ul>


        <ul class="navbar-nav ">
            <li class="nav-item ">
                <a class="nav-link" href="tel:+6144103328">614 410 3328</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="tel:+6144103328">614 410 3328</a>
            </li>
        </ul>


    </div>

</nav>
