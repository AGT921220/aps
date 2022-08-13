<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(isset($urlMeta))
    <meta name="meta" content="{{$urlMeta}}">

    @endif

    
    @yield('metas')
    <title>Aps</title>


    <!-- Icons font CSS-->
    <link href="{{ asset('colorlib/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('colorlib/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="{{ asset('css/principal.css') }}" rel="stylesheet" media="all">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <link href="{{asset('css/principal.css')}}" rel="stylesheet" media="all">

    <!--SCRIPT ANALYTICS-->
    @include('dashboard.partials.analytics')


</head>

<body>
    @include('page.nabvar')

    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo" style="margin-top: 15%">
        @yield('content')
    </div>






    <div class="llamenos_content" >
        <img src="{{asset('images/monito_busca.png')}}" alt="">
        <div>
          <h4>NO ENCUENTRA LO QUE BUSA??    </h4>
          <h4 class="llamenos_red">LLAMENOS</h4>
          <h4>CON GUSTO LO HAREMOS POR USTED</h4>    
      
          <div class="phones_wpp">
            <div>
              <i class="fas fa-phone"></i>
              <a class="nav-link" href="tel:+6144103328">614 410 3328</a>
            </div>
            <div>
              <i class="fas fa-phone"></i>
              <a class="nav-link" href="tel:+6142623801">614 262 3801</a>
            </div>
            <div>
              <a class="wpp_icon" href="https://api.whatsapp.com/send?phone=5216141599509"><i class="fab fa-whatsapp"></i></a>
              <a class="nav-link" href="https://api.whatsapp.com/send?phone=5216141599509">614 159 95 09</a>
            </div>
          </div>        
        </div>
      </div>
      
    
    



<section id="contacto" class="contact" >
    <h2 class="mb-5">Contacto</h2>
  <p class="contact_top">En Artículos Promocionales APS nos esforzamos por darle un excelente servicio así como calidad de nuestros productos a un buen precio.</p>
  <p class="contact_top">Si no encontrara el Producto que requiere, háganoslo saber, con gusto lo apoyaremos ya sea con su fabricación o localización, para nosotros es importante el brindarle la atención que Usted merece.</p>
      <div class="row">
        <div class="col-sm-10 mb-5">
          <div class="contact-map box">
            <div id="map" class="contact-map">
              <iframe style="width: 100%" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7004.551201668715!2d-106.057594!3d28.621501!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe83e50b6810b84da!2sPromocionales%20APS!5e0!3m2!1ses-419!2smx!4v1615765441152!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
        </div>
  
  
        <div class="col-sm-10">
          <div class="row mb-5">
            <div class="col-md-7">
  
  
  
              <form name="sentMessage" method="POST" action="mail/contact_me.php" id="contactForm">
                  <div class="control-group">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input class="form-control" id="name" type="text" placeholder="Nombre" required="required" data-validation-required-message="Ingrese su nombre." aria-invalid="false">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2 floating-label-form-group-with-value">
                      <label>Correo electrónico</label>
                      <input class="form-control" id="email" type="email" placeholder="correo" required="required" data-validation-required-message="Ingrese su correo electrónico." aria-invalid="false">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2 floating-label-form-group-with-value">
                      <label>Teléfono</label>
                      <input class="form-control" id="phone" type="tel" placeholder="Telefono" required="required" data-validation-required-message="Ingrese su teléfono." aria-invalid="false">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2 floating-label-form-group-with-value">
                      <label>Mensaje</label>
                      <textarea class="form-control" id="message" rows="5" placeholder="Mensaje" required="required" data-validation-required-message="Por favor, ingrese algún comentario." aria-invalid="false"></textarea>
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>
                  <br>
  
                  <input type="hidden" name="google-response-token" id="google-response-token">
  
                  <div id="success">
                   </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Enviar</button>
  
                  </div>
  
  
  
                </form>
  
  
  
  
  
  
  
  
            </div>
            <div class="col-md-5 contact_datos">
              <div>
                <div>
                  <div class="contact_title">
                    <i class="fas fa-location-arrow"></i>
                    <h4 class="icon-title">Datos de contacto</h4>
                  </div>
                  <div class="contact_subtitle">
                    <p class="mb-1">Correos.
                      <br>
                      <a href="mailto:admin@promocionalesaps.com.mx">
                        <i class="fas fa-envelope-open-text"></i>
                          <span style="cursor: pointer;" class="color-a">admin@promocionalesaps.com.mx</span>
                      </a>
                      <br>
                      <a href="mailto:ventas@promocionalesaps.com.mx">
                        <i class="fas fa-envelope-open-text"></i>
                          <span style="cursor: pointer;" class="color-a">ventas@promocionalesaps.com.mx</span>
                      </a>
                    </p>
                    <p class="mb-1">Teléfono.
                      <a href="tel:+6144103328">
                        <i class="fas fa-phone"></i>
                        <span style="cursor: pointer;" class="color-a">614 410 33 28</span>
                      </a>
                    </p>
                    <p class="mb-1">Whatsapp.
                      <a href="https://api.whatsapp.com/send?phone=5216141599509">
                        <i class="fab fa-whatsapp wpp_icon"></i>
                        <span style="cursor: pointer;" class="color-a">614 159 95 09</span>
                      </a>
                    </p>
                  </div>
                </div>
              </div>
  
              <div>
                <div >
                  <div class="contact_title">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4 class="icon-title">Ubicación</h4>
                  </div>
                  <div class="contact_subtitle">
                    <p class="mb-1">
                          Juan Zubirán #801 Col. Santa Rosa
                      <br> Chihuahua, Chih.
                    </p>
                  </div>
                </div>
              </div>
              
              <div>
                <div>
                  <div class="contact_title">
                    <i class="fas fa-share-square"></i>
                    <h4 class="icon-title">Redes sociales</h4>
                  </div>
                  <div class="contact_subtitle">
                    <div class="socials-footer">
                      <ul class="list-inline">
                        <li class="list-inline-item">
                          <a href="https://www.facebook.com/Articulos-Promocionales-APS-102957764495550" target="_blank" class="link-one">
                            <i class="fab fa-facebook-square"></i>
                          </a>
                        </li>
  
  
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  
  
      </div>
  
  </section>
  
  
  
  <section id="nosotros" class="nosotros" >
  
    <h2 class="mb-5">Nosotros</h2>
  
    <div class="nosotrosContent">
  
    <div class="col-md-4 mb-5">
      <h4>QUIÉNES SOMOS</h4>
      <p>Somos una empresa con más de 30 años de experiencia en el ramo de las artes gráficas
        en el estado de Chihuahua.    
        Nos distingue nuestra excelente calidad.</p>  
    </div>
  
      <div class="col-md-4 mb-5">
        <h4>NUESTRO COMPROMISO</h4>
        <p>El conocer  las necesidades de nuestros clientes y ofrecerles un  mejor servicio con productos  de calidad para  su satisfacción , dando nuestro mejor esfuerzo, compromiso y capacitación constante.</p>
        <p>Brindar a nuestros clientes un amplio y mejor catálogo de productos , así como mejores precios   y crear un modo fácil y seguro de comprar <span>ARTÍCULOS PROMOCIONALES</span>.</p>
      </div>
  
      <div class="col-md-4 mb-5">
        <h4>NUESTRA POLÍTICA</h4>
        <p>Ser una empresa con principios de honestidad, puntualidad, lealtad y sobre todo responsable
    
          a con nuestros clientes para su satisfacción total.</p>  
      </div>
    </div>
  
  </section>




  <footer>
    <div class="footer_top">
      <img id="logo_aps" src="{{asset("images/aps_logo.svg")}}" >
      {{-- <div class="navbar_text">
          <h3>Artículos Promocionales de Chihuahua</h3>
          <h5>Experiencia y Calidad a su Servicio</h5>
      </div> --}}
      <div>
        <p>Tels: <a class="nav-link" href="tel:+6144103328">614 410 3328 </a>-<a class="nav-link" href="tel:+6142623801"> 614 262 3801</a></p>
        <p>Correos:
          <br>
          <a href="mailto:admin@promocionalesaps.com.mx">
            {{-- <i class="fas fa-envelope-open-text"></i> --}}
              <span style="cursor: pointer;" class="color-a"> admin@promocionalesaps.com.mx </span>
          </a>
          <br>
          <a href="mailto:ventas@promocionalesaps.com.mx">
            {{-- <i class="fas fa-envelope-open-text"></i> --}}
              <span style="cursor: pointer;" class="color-a"> ventas@promocionalesaps.com.mx </span>
          </a>
        </p>
        <p>Dirección:Juan Zubirán #801 Col. Santa Rosa C.P. 31050 Chihuahua, Chih., Méx.</p>
  
      </div>
    </div>
    <div class="footer_bottom">
    </div>
  </footer>
  
  
  
  
  <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
  
  <a href="#" class="btn-flotante btn_cotizar">Cotizar</a>
  
  <script>
  
  </script>
  <script src="{{ asset('js/dropdown.js') }}" defer></script>
  
  
  
  
  
  


    <!-- Jquery JS-->
    <script src="{{ asset('bower_components/jquery/jquery.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LcD3YAaAAAAAI-ZlZjLwc0DjHpuPW1-o9GGGcLh"></script>


</body>

</html>
