
<!-- Incluir el header principal estilos cargados y demás -->
<?php  
  //activar item
  $active = 1;
  //setear el título
  $title = "INOVALEC | Equipos Electricos Peru,  repuestos electricos,  productos por linea, materiales instalaciones electricas industrial, automatizacion industrial, conductores electricos, equipo de media tension control y proteccion, equipos de seguridad y maniobra, ferreteria de electrificacion, iluminacion peru, instrumentos de medicion, linea conduit, materiales aislantes, materiales para instalaciones residenciales, pararrayos, sistema puesta tierra y afines, seguridad industrial lima peru, repuestos electricos lima peru, material construccion electricos,  productos por marcas 3m, lima abb abro aibar, bremas  celsa cirmarker lima, coel crc elcope lima, exosolda general electric indeco peru, kss legrand leviton peru, loctite lumnia mennekes peru, schneider electric siemens peru, talma ide termoweld lima, solera jsl santos peru dexson tecnoflex ls repuestos peru, tecnofil bticino orbis metal&a opalux hurricane lima peru";

  //incluir plantilla header
  include('includes/main-header.php');

?>

<!-- Banner Inicios -->
<section id="banner-home" class="sectionBanner">
  <img src="<?= IMAGES ?>/banner/home/inicio_bn_1.jpg" alt="inicio_bn_1" class="responsive-img" />
  <img src="<?= IMAGES ?>/banner/home/inicio_bn_2.jpg" alt="inicio_bn_2" class="responsive-img" />
  <img src="<?= IMAGES ?>/banner/home/inicio_bn_3.jpg" alt="inicio_bn_3" class="responsive-img" />
  <img src="<?= IMAGES ?>/banner/home/inicio_bn_4.jpg" alt="inicio_bn_4" class="responsive-img" />
  <img src="<?= IMAGES ?>/banner/home/inicio_bn_5.jpg" alt="inicio_bn_5" class="responsive-img" />
  <img src="<?= IMAGES ?>/banner/home/inicio_bn_6.jpg" alt="inicio_bn_6" class="responsive-img" />

</section> <!-- /end of banner -->

<!-- Linea separadora -->
<span class="line-separator"></span>

  
  <!-- Contenedor Container -->
  <div class="container">
    <!-- Contendor background white -->
    <section class="bgPage--white">
      <!-- Sección de Area Comercialización -->
      <section class="sectionPortada__promociones">
        <h1 class="sectionCommon__title sectionCommon__title--blue text-uppercase">
          área de comercialización
        </h1>

        <section class="sectionPortada__promociones__content relative">
          <div class="row">
            
            <article class="sectionPortada__promociones__content__item col s12 m3">
              <div class="item-promocion">
                <h2 class="center text-uppercase">área doméstica</h2>
                <!-- Imagen -->
                <figure>
                  <img class="center-block responsive-img" src="images/areas/area-domestica.jpg" />
                </figure><!-- /figure -->
              </div> <!-- /.item-promocion -->
            </article><!-- /article -->             

            <article class="sectionPortada__promociones__content__item col s12 m3">
              <div class="item-promocion">
                <h2 class="center text-uppercase">área energía</h2>
                <!-- Imagen -->
                <figure>
                  <img class="center-block responsive-img" src="images/areas/area-energia.jpg" />
                </figure><!-- /figure -->
              </div> <!-- /. -->
            </article><!-- /article --> 

            <article class="sectionPortada__promociones__content__item col s12 m3">
               <div class="item-promocion">
                <h2 class="center text-uppercase">área industrial</h2>
                <!-- Imagen -->
                <figure>
                  <img class="center-block responsive-img" src="images/areas/area-industrial.jpg" />
                </figure><!-- /figure -->
              </div> <!-- /. -->
            </article><!-- /article --> 

            <article class="sectionPortada__promociones__content__item col s12 m3">
              <div class="item-promocion">
                <h2 class="center text-uppercase">sector minero</h2>
                <!-- Imagen -->
                <figure>
                  <img class="center-block responsive-img" src="images/areas/sector-minero.jpg" />
                </figure><!-- /figure -->
              </div> <!-- /. -->
            </article><!-- /article --> 

          </div> <!-- /.row -->

        </section> <!-- /.sectionPortada__promociones__content relative -->

          <?php  
            /*

          <section class="sectionPortada__promociones__content relative">
            <div id="carousel-promociones" class="">
              <?php 
                $row_producto_promocion = fetch_array($rpta_listar_promocion); 
                foreach( $row_producto_promocion as $producto_promo ) :
              ?>
                <div class="item">
                  <article class="sectionPortada__promociones__content__item relative">
                    <h2 class="center text-uppercase"><?= $producto_promo['titulo_promocion']; ?></h2>
                    <!-- Imagen -->
                    <figure>
                      <img class="center-block owl-lazy" data-src="images/productos/promociones/<?= $producto_promo['imagen_promocion']; ?>" />
                    </figure><!-- /figure -->
                    <!-- Span Contenedor  -->
                    <span class="bg_container__btn text-center">
                      <!-- Boton cotizar -->
                      <a href="" class="btn__cotizar">Cotizar</a>
                    </span><!-- /. bg_container__btn-->
                  </article><!-- /article -->
                </div>
              <?php endforeach; ?>
              </div>

            <!-- Arrows -->
            <a class="carousel-promotion-arrow carousel-promotion-arrow--left waves-effect">
              <img src="images/arrows/slider_1.jpg" alt="slider-1" class="responsive-img" />
            </a>
            <a class="carousel-promotion-arrow carousel-promotion-arrow--right waves-effect">
              <img src="images/arrows/slider_2.jpg" alt="slider-2" class="responsive-img" />
            </a>
          </section><!-- /.sectionPortada__promociones__content -->
            */
          ?>

      </section><!-- /.sectionPortada__promociones -->

      <!-- Linea separadora -->
      <div class="row" style="margin-bottom : 0">
        <span class="line-separator"></span>
      </div> <!-- /.row -->

      <!-- Secciones de Informacion de Empresa -->
      <section class="sectionPortada__nosotros">
        <div class="row">
          <article class="sectionPortada__nosotros__item col s12 m6">
              <!-- Imagen -->
              <figure>
                <img src="images/portada/sec-nosotros/inicio_bn_nosotros_1.jpg" alt="inicio_bn_nosotros_1" class="responsive-img" />
              </figure>
          </article><!-- /.sectionPortada__nosotros__item -->
          <article class="sectionPortada__nosotros__item sectionPortada__nosotros__item--desc col s12 m6">
            <!-- Imagen -->
              <figure>
                <img src="images/portada/sec-nosotros/inicio_bn_nosotros_2.jpg" alt="inicio_bn_nosotros_2" class="responsive-img" />
              </figure><!-- /figure -->
              <!-- Informacioón -->
              <div class="item-text">
                <h2 class="sectionCommon__title text-uppercase">bienvenidos</h2> <br/>
                <p class="sectionCommon__parragraph">INOVALEC PERU SAC. Es una empresa peruana dedicada a la comercialización de materiales eléctricos para área doméstica, industrial y minera le damos la bienvenida a nuestra página web donde podra encontrar todo sobre los productos y marcas que comercializamos.</p>
                <!-- Boton ver más -->
                <br/>
                <a href="inovalec-electric-historia-empresa-lima-peru.php" class="btn__more--orange right waves-effect">ver más</a>
                <!-- Clearfix --> <div class="clearfix"></div>
              </div><!-- /.item-text -->
          </article> <!-- /.sectionPortada__nosotros__item -->
        </div><!-- /.row -->
      </section><!-- /.sectionPortada__nosotros --> 

      <!-- Seccion incluir marcas -->
      <?php include("includes/section-marcas.php") ?>

    </section><!-- /.bgPage--white -->
  </div><!-- /.container -->

<!-- Incluir demás librerias javascript en el main footer -->
<?php include("includes/main-footer.php") ?>