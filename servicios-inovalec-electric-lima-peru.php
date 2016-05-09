
<!-- Incluir el header principal estilos cargados y demás -->
<?php  
  //activar item
  $active = 4;
  //setear el título
  $title = "INOVALEC | Historia de la empresa, Eventos, Equipos Electricos Peru,  repuestos electricos,  productos por linea, materiales instalaciones electricas industrial, automatizacion industrial, conductores electricos, equipo de media tension control y proteccion, equipos de seguridad y maniobra, ferreteria de electrificacion, iluminacion peru, instrumentos de medicion, linea conduit, materiales aislantes, materiales para instalaciones residenciales, pararrayos, sistema puesta tierra y afines, seguridad industrial lima peru, repuestos electricos lima peru, material construccion electricos,  productos por marcas 3m, lima abb abro aibar, bremas  celsa cirmarker lima, coel crc elcope lima, exosolda general electric indeco peru, kss legrand leviton peru, loctite lumnia mennekes peru, schneider electric siemens peru, talma ide termoweld lima, solera jsl santos peru dexson tecnoflex ls repuestos peru, tecnofil bticino orbis metal&a opalux hurricane lima peru";

  //incluir plantilla header
  include('includes/main-header.php');

?>

<!-- Incluir Banner de Pagina -->
<?php  
    $title_page = "servicio";
    $ruta_img   = "images/banner/servicios_bn_principal.jpg";
    include("includes/page/banner.php");
?>

<!-- Linea separadora -->
<span class="line-separator"></span>

<!-- sectionHistoria Pagina Nosotros -->
<section class="sectionPage__servicio">
    <div class="container">

      <!-- Contendor background white -->
      <section class="bgPage--white">
        <!-- Titulo -->
        <h2 class="sectionCommon__title-page text-uppercase center">principales</h2>

        <div class="row">
          <!-- Articulos 1 -->
          <article class="sectionPage__servicio__article col s12 m6 l4">
            <!-- Imagen -->
            <figure><img src="images/pages/servicio/servicio_1.jpg" alt="servicio-1" class="responsive-img" /></figure>
            <!-- Parrafo -->
            <br/>
            <p class="article-paragraph center text-uppercase">Instalación de equipo de puestas a tierra</p>
          </article><!-- /.sectionPage__servicio__article -->
          <!-- Articulos 1 -->
          <article class="sectionPage__servicio__article col s12 m6 l4">
            <!-- Imagen -->
            <figure><img src="images/pages/servicio/servicio_2.jpg" alt="servicio-2" class="responsive-img" /></figure>
            <!-- Parrafo -->
            <br />
            <p class="article-paragraph text-uppercase center">instalaciones y mantenimiento electricas domiciliarias </p>
          </article><!-- /.sectionPage__servicio__article -->
          <!-- Articulos 1 -->
          <article class="sectionPage__servicio__article col s12 m6 l4">
            <!-- Imagen -->
            <figure><img src="images/pages/servicio/servicio_3.jpg" alt="servicio-3" class="responsive-img" /></figure>
            <!-- Parrafo -->
            <br />
            <p class="article-paragraph text-uppercase center">instalaciones y mantenimiento electricas industriales</p>
          </article><!-- /.sectionPage__servicio__article -->
          <!-- Articulos 1 -->
          <article class="sectionPage__servicio__article col s12 m6 l4">
            <!-- Imagen -->
            <figure><img src="images/pages/servicio/servicio_4.jpg" alt="servicio-4" class="responsive-img" /></figure>
            <!-- Parrafo -->
            <br />
            <p class="article-paragraph text-uppercase center"> instalación de luminarias de interiores y exteriores </p>
          </article><!-- /.sectionPage__servicio__article -->
          <!-- Articulos 1 -->
          <article class="sectionPage__servicio__article col s12 m6 l4">
            <!-- Imagen -->
            <figure><img src="images/pages/servicio/servicio_5.jpg" alt="servicio-5" class="responsive-img" /></figure>
            <!-- Parrafo -->
            <br />
            <p class="article-paragraph text-uppercase center">instalación de entubado de conduit </p>
          </article><!-- /.sectionPage__servicio__article -->
          <!-- Articulos 1 -->
          <article class="sectionPage__servicio__article col s12 m6 l4">
            <!-- Imagen -->
            <figure><img src="images/pages/servicio/servicio_6.jpg" alt="servicio-6" class="responsive-img" /></figure>
            <!-- Parrafo -->
            <br />
            <p class="article-paragraph text-uppercase center">fabricación e instalación de tableros electricos </p>
          </article><!-- /.sectionPage__servicio__article -->

          <div class="clearfix"></div> <!-- /clearfix -->

          <!-- Seccion incluir marcas -->
          <?php include("includes/section-marcas.php") ?>

        </div><!-- /.row -->
      </div><!-- /.container -->

    </section> <!-- /.bgPage--white -->
</section><!-- /.sectionPage__nosotros__historia -->

<!-- Linea separadora -->
<span class="line-separator"></span>


<!-- Incluir demás librerias javascript en el main footer -->
<?php include("includes/main-footer.php") ?>