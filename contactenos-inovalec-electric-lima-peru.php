
<!-- Incluir el header principal estilos cargados y demás -->
<?php  
  //activar item
  $active = 8;
  //setear el título
  $title = "INOVALEC | Contáctenos para solicitar equipos Electricos Peru,  repuestos electricos,  productos por linea, materiales instalaciones electricas industrial, automatizacion industrial, conductores electricos, equipo de media tension control y proteccion, equipos de seguridad y maniobra, ferreteria de electrificacion, iluminacion peru, instrumentos de medicion, linea conduit, materiales aislantes, materiales para instalaciones residenciales, pararrayos, sistema puesta tierra y afines, seguridad industrial lima peru, repuestos electricos lima peru, material construccion electricos,  productos por marcas 3m, lima abb abro aibar, bremas  celsa cirmarker lima, coel crc elcope lima, exosolda general electric indeco peru, kss legrand leviton peru, loctite lumnia mennekes peru, schneider electric siemens peru, talma ide termoweld lima, solera jsl santos peru dexson tecnoflex ls repuestos peru, tecnofil bticino orbis metal&a opalux hurricane lima peru";

  //incluir plantilla header
  include('includes/main-header.php');

?>

<!-- Incluir Banner de Pagina -->
<?php  
    $title_page = "contáctenos";
    $ruta_img   = "images/banner/contacto_bn_principal-.jpg";
    include("includes/page/banner.php");
?>

<!-- Linea separadora -->
<span class="line-separator"></span>

<!-- sectionHistoria Pagina Contacto -->
<section class="sectionPage__contacto">
    <div class="container">
      <!-- Contendor background white -->
      <section class="bgPage--white">
        <div class="row">
            <div class="col s12 m6">
              <!-- Seccion de datos generales -->
              <section class="sectionPage__contacto__datos">
                <!-- Titulo -->
                <h2 class="sectionPage__contacto__title sectionCommon__title-page text-uppercase"><strong>datos generales</strong>
                  <!-- Linea separadora --><span class="line-blue"></span>
                </h2>
                <!-- Parrafo -->
                <p class="sectionPage__contacto__paragraph">INOVALEC PERU SAC</p>
                <p class="sectionPage__contacto__paragraph">RUC: 20601131201</p>
                <!-- Lista de datos -->
                <ul class="sectionPage__contacto__list">
                  <!-- Direccion  -->
                  <li>
                    <!-- Icono -->
                    <i class="icon left"><img src="images/contacto/iconos_contacto_direccion.png" alt="direccion" class="responsive-img" /></i>
                    <!-- Texto -->
                    <h3 class="text-uppercase">Dirección: </h3>
                    <p>Jr Lampa 1121 Int 30 Cercado de Lima - Lima</p>
                    <!-- Clearfix --> <div class="clearfix"></div>
                  </li>
                  <!-- Telefono  -->
                  <li>
                    <!-- Icono -->
                    <i class="icon left"><img src="images/contacto/iconos_contacto_telefono.png" alt="telefono" class="responsive-img" /></i>
                    <!-- Texto -->
                    <h3 class="text-uppercase">teléfono: </h3>
                    <p> 493-4752 </p>
                    <!-- Clearfix --> <div class="clearfix"></div>
                  </li>
                  <!-- Mail -->
                  <li>
                    <!-- Icono -->
                    <i class="icon left"><img src="images/contacto/iconos_contacto_mail.png" alt="mail" class="responsive-img" /></i>
                    <!-- Texto -->
                    <h3 class="text-uppercase">Email: </h3>
                    <p> tquintana@inovalec.com.pe <br>
                        mcoba@inovalec.com.pe <br/>
                        ventas@inovalec.com.pe 
                    </p>
                    <!-- Clearfix --> <div class="clearfix"></div>
                  </li>
                </ul><!-- /.sectionPage__contacto__list -->
              </section><!-- /.sectionPage__contacto__datos -->
            </div><!-- /.col s12 m6 -->
            <div class="col s12 m6">
              <!-- Seccion de personas a contactar -->
              <section class="sectionPage__contacto__personas">
                <!-- Titulo -->
                <h2 class="sectionPage__contacto__title sectionCommon__title-page text-uppercase"><strong>personas a contactar</strong><!-- Linea separadora --><span class="line-blue"></span></h2>
                <!-- Parrafo -->
                <p class="sectionPage__contacto__paragraph">
                  Tomas Quintana Moreno <br>
                  Asesor Comercial
                </p>
                <!-- Lista de personas -->
                <ul class="sectionPage__contacto__list">
                  <!-- Telefono  -->
                  <li>
                    <!-- Icono -->
                    <i class="icon left"><img src="images/contacto/iconos_contacto_rpm.png" alt="celular" class="responsive-img" /></i>
                    <!-- Texto -->
                    <h3 class="text-uppercase">teléfono: </h3>
                    <p> 992 724 283 </p>
                    <!-- Clearfix --> <div class="clearfix"></div>
                  </li>
                  <!-- Mail -->
                  <li>
                    <!-- Icono -->
                    <i class="icon left"><img src="images/contacto/iconos_contacto_mail.png" alt="mail" class="responsive-img" /></i>
                    <!-- Texto -->
                    <h3 class="text-uppercase">Email: </h3>
                    <p> tquintana@inovalec.com.pe </p>
                    <!-- Clearfix --> <div class="clearfix"></div>
                  </li>
                </ul><!-- /.sectionPage__contacto__list -->

                <br />

                <!-- Parrafo -->
                <p class="sectionPage__contacto__paragraph">
                  Milton Coba Guebara <br>
                  Asesor de Proyectos
                </p>
                <!-- Lista de personas -->
                <ul class="sectionPage__contacto__list">
                  <!-- Telefono  -->
                  <li>
                    <!-- Icono -->
                    <i class="icon left"><img src="images/contacto/iconos_contacto_rpm.png" alt="celular" class="responsive-img" /></i>
                    <!-- Texto -->
                    <h3 class="text-uppercase">teléfono: </h3>
                    <p>997 528 228</p>
                    <!-- Clearfix --> <div class="clearfix"></div>
                  </li>
                  <!-- Mail -->
                  <li>
                    <!-- Icono -->
                    <i class="icon left"><img src="images/contacto/iconos_contacto_mail.png" alt="mail" class="responsive-img" /></i>
                    <!-- Texto -->
                    <h3 class="text-uppercase">Email: </h3>
                    <p> 
                      mcoba@inovalec.com.pe </p>
                    <!-- Clearfix --> <div class="clearfix"></div>
                  </li>
                </ul><!-- /.sectionPage__contacto__list -->

              </section><!-- /.sectionPage__contacto__personas -->
            </div><!-- /.col s12 m6 -->
        </div><!-- /.row -->
      </section><!-- /.bgPage--white -->
    </div><!-- /.container -->
</section><!-- /.sectionPage__contacto -->

<!-- Seccion del mapa -->
<section class="sectionPage__contacto__mapa">
  <div id="canvas-map"></div>
</section>

<!-- Linea separadora -->
<span class="line-separator"></span>

<!-- Container -->
<div class="container">
  <!-- Contendor background white -->
  <section class="bgPage--white">

    <!-- Seccion incluir marcas -->
    <?php include("includes/section-marcas.php") ?>
    
  </section> <!-- /.bgPage--white -->
</div><!-- /.container -->

  <!-- Google  maps -->  
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5TPL8p63MmkT7HKOfHGlFFKaZbpelFnM" type="text/javascript"></script>

<!-- Script de Mapa -->
<script type="text/javascript">
  <?php  
    $lat = -12.055132;  
    $lng = -77.034626;  
  ?>
    var map;
    var lat = <?= $lat ?>;
    var lng = <?= $lng ?>;
    function initialize() {
      //crear mapa
      map = new google.maps.Map(document.getElementById('canvas-map'), {
        center: {lat: lat, lng: lng},
        zoom  : 17
      });
      //infowindow
      var infowindow    = new google.maps.InfoWindow({
        content: <?= "'" . "Inovalec" . "'" ?>
      });
      //crear marcador
      marker = new google.maps.Marker({
        map      : map,
        draggable: false,
        animation: google.maps.Animation.DROP,
        position : {lat: lat, lng: lng},
        title    : "Inovalec"
      });
      //marker.addListener('click', toggleBounce);
      marker.addListener('click', function() {
        infowindow.open( map, marker);
      });
    }
    google.maps.event.addDomListener(window, "load", initialize);
</script>

<!-- Incluir demás librerias javascript en el main footer -->
<?php include("includes/main-footer.php") ?>