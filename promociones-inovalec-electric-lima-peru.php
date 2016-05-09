
<!-- Incluir el header principal estilos cargados y demás -->
<?php  
  //activar item
$active = 7;
  //setear el título
$title = "INOVALEC | Historia de la empresa, Eventos, Equipos Electricos Peru,  repuestos electricos,  productos por linea, materiales instalaciones electricas industrial, automatizacion industrial, conductores electricos, equipo de media tension control y proteccion, equipos de seguridad y maniobra, ferreteria de electrificacion, iluminacion peru, instrumentos de medicion, linea conduit, materiales aislantes, materiales para instalaciones residenciales, pararrayos, sistema puesta tierra y afines, seguridad industrial lima peru, repuestos electricos lima peru, material construccion electricos,  productos por marcas 3m, lima abb abro aibar, bremas  celsa cirmarker lima, coel crc elcope lima, exosolda general electric indeco peru, kss legrand leviton peru, loctite lumnia mennekes peru, schneider electric siemens peru, talma ide termoweld lima, solera jsl santos peru dexson tecnoflex ls repuestos peru, tecnofil bticino orbis metal&a opalux hurricane lima peru";

  //incluir plantilla header
include('includes/main-header.php');

//

?>

<!-- Incluir Banner de Pagina -->
<?php  
$title_page = "promociones";
$ruta_img   = "images/banner/promociones_bn_principal-.jpg";
include("includes/page/banner.php");
?>

<!-- Linea separadora -->
<span class="line-separator"></span>

<!-- sectionHistoria Pagina Nosotros -->
<section class="sectionPage__marcas">
  <div class="container">
    <!-- Contendor background white -->
    <section class="bgPage--white">
      <!-- Titulo -->
      <h2 class="sectionCommon__title-page sectionPage__marcas__title text-uppercase center"> recientes</h2>

      <section class="sectionPortada__promociones__content relative">
        <div class="row">
          <?php 
            $row_producto_promocion = fetch_array($rpta_listar_promocion); 
            foreach( $row_producto_promocion as $producto_promo ) :
          ?>
            <article class="sectionPortada__promociones__content__item col s12 m3">
              <div class="item-promocion">
                <h2 class="center text-uppercase"><?= $producto_promo['titulo_promocion']; ?></h2>
                <!-- Imagen -->
                <figure>
                  <img class="center-block owl-lazy" src="images/productos/promociones/<?= $producto_promo['imagen_promocion']; ?>" />
                </figure><!-- /figure -->
                <!-- Span Contenedor  -->
                <span class="bg_container__btn text-center">
                  <!-- Boton cotizar -->
                  <a href="" class="btn__cotizar">Cotizar</a>
                </span><!-- /. bg_container__btn-->
              </div> <!-- /.item-promocion -->
            </article><!-- /article -->
          <?php endforeach; ?>
          </div> <!-- /.row -->
      </section><!-- /.sectionPortada__promociones__content -->

      <!-- Linea separadora -->
      <span class="line-separator"></span>

      <!-- Saltos de Línea --> <br/><br/>

      <!-- Seccion incluir marcas -->
      <?php include("includes/section-marcas.php") ?>

    </section> <!-- /.bgPage--white -->
  </div><!-- /.container -->
</section><!-- /.sectionPage__nosotros__historia -->


<!-- Incluir demás librerias javascript en el main footer -->
<?php include("includes/main-footer.php") ?>