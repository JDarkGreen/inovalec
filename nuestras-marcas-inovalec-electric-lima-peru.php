
<!-- Incluir el header principal estilos cargados y demás -->
<?php  
  //activar item
$active = 5;
  //setear el título
$title = "INOVALEC | Historia de la empresa, Eventos, Equipos Electricos Peru,  repuestos electricos,  productos por linea, materiales instalaciones electricas industrial, automatizacion industrial, conductores electricos, equipo de media tension control y proteccion, equipos de seguridad y maniobra, ferreteria de electrificacion, iluminacion peru, instrumentos de medicion, linea conduit, materiales aislantes, materiales para instalaciones residenciales, pararrayos, sistema puesta tierra y afines, seguridad industrial lima peru, repuestos electricos lima peru, material construccion electricos,  productos por marcas 3m, lima abb abro aibar, bremas  celsa cirmarker lima, coel crc elcope lima, exosolda general electric indeco peru, kss legrand leviton peru, loctite lumnia mennekes peru, schneider electric siemens peru, talma ide termoweld lima, solera jsl santos peru dexson tecnoflex ls repuestos peru, tecnofil bticino orbis metal&a opalux hurricane lima peru";

  //incluir plantilla header
include('includes/main-header.php');

?>

<!-- Incluir Banner de Pagina -->
<?php  
$title_page = "marcas";
$ruta_img   = "images/banner/marca_bn_principal.jpg";
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
      <h2 class="sectionCommon__title-page sectionPage__marcas__title text-uppercase center"><strong>suministros</strong> eléctricos</h2>

      <div class="row">

        <!-- TODAS LAS MARCAS -->
        <!-- Item -->
        <div class="col s12 m3">
          <figure class="item-marca">
            <img src="images/marcas/mapa-jbg-electric-lima-peru.jpg" class="responsive-img" />  
          </figure><!-- /.item-marca -->
        </div><!-- /.col s12 m3 -->

        <!-- Item -->
        <div class="col s12 m3">
          <figure class="item-marca">
            <img src="images/marcas/marca-3m-jbg.jpg" class="responsive-img" />  
          </figure><!-- /.item-marca -->
        </div><!-- /.col s12 m3 -->

        <!-- Item -->
        <div class="col s12 m3">
          <figure class="item-marca">
            <img src="images/marcas/marca-3m.jpg" class="responsive-img" />  
          </figure><!-- /.item-marca -->
        </div><!-- /.col s12 m3 -->

        <!-- Item -->
        <div class="col s12 m3">
          <figure class="item-marca">
            <img src="images/marcas/marca-abb-jbg.jpg" class="responsive-img" />  
          </figure><!-- /.item-marca -->
        </div><!-- /.col s12 m3 -->

        <!-- Item -->
        <div class="col s12 m3">
          <figure class="item-marca">
            <img src="images/marcas/marca-abb-sumelect.jpg" class="responsive-img" />  
          </figure><!-- /.item-marca -->
        </div><!-- /.col s12 m3 -->

        <!-- Item -->
        <div class="col s12 m3">
          <figure class="item-marca">
            <img src="images/marcas/marca-abb.jpg" class="responsive-img" />  
          </figure><!-- /.item-marca -->
        </div><!-- /.col s12 m3 -->

        <!-- Item -->
        <div class="col s12 m3">
          <figure class="item-marca">
            <img src="images/marcas/marca-aibar.jpg" class="responsive-img" />  
          </figure><!-- /.item-marca -->
        </div><!-- /.col s12 m3 -->

        <!-- Item -->
        <div class="col s12 m3">
          <figure class="item-marca">
            <img src="images/marcas/marca-amp-netconnect.jpg" class="responsive-img" />  
          </figure><!-- /.item-marca -->
        </div><!-- /.col s12 m3 -->

        <!-- Item -->
        <div class="col s12 m3">
          <figure class="item-marca">
            <img src="images/marcas/marca-bremas.jpg" class="responsive-img" />  
          </figure><!-- /.item-marca -->
        </div><!-- /.col s12 m3 -->

        <!-- Item -->
        <div class="col s12 m3">
          <figure class="item-marca">
            <img src="images/marcas/marca-bticino-jbg.jpg" class="responsive-img" />  
          </figure><!-- /.item-marca -->
        </div><!-- /.col s12 m3 -->

        <!-- Item -->
        <div class="col s12 m3">
          <figure class="item-marca">
            <img src="images/marcas/marca-celsa-sumelect.jpg" class="responsive-img" />  
          </figure><!-- /.item-marca -->
        </div><!-- /.col s12 m3 -->

        <!-- Item -->
        <div class="col s12 m3">
          <figure class="item-marca">
            <img src="images/marcas/marca-centelsa.jpg" class="responsive-img" />  
          </figure><!-- /.item-marca -->
        </div><!-- /.col s12 m3 -->

      </div><!-- /.row -->

      <!-- Linea separadora -->
      <span class="line-separator"></span>

    </section> <!-- /.bgPage--white -->
  </div><!-- /.container -->
</section><!-- /.sectionPage__nosotros__historia -->


<!-- Incluir demás librerias javascript en el main footer -->
<?php include("includes/main-footer.php") ?>