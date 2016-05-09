
<!-- Incluir el header principal estilos cargados y demás -->
<?php  
  //activar item
  $active = 2;
  //setear el título
  $title = "INOVALEC | Historia de la empresa, Eventos, Equipos Electricos Peru,  repuestos electricos,  productos por linea, materiales instalaciones electricas industrial, automatizacion industrial, conductores electricos, equipo de media tension control y proteccion, equipos de seguridad y maniobra, ferreteria de electrificacion, iluminacion peru, instrumentos de medicion, linea conduit, materiales aislantes, materiales para instalaciones residenciales, pararrayos, sistema puesta tierra y afines, seguridad industrial lima peru, repuestos electricos lima peru, material construccion electricos,  productos por marcas 3m, lima abb abro aibar, bremas  celsa cirmarker lima, coel crc elcope lima, exosolda general electric indeco peru, kss legrand leviton peru, loctite lumnia mennekes peru, schneider electric siemens peru, talma ide termoweld lima, solera jsl santos peru dexson tecnoflex ls repuestos peru, tecnofil bticino orbis metal&a opalux hurricane lima peru";

  //incluir plantilla header
  include('includes/main-header.php');

?>

<!-- Incluir Banner de Pagina -->
<?php  
    $title_page = "empresa";
    $ruta_img   = "images/banner/nosotros_bn_principal.jpg";
    include("includes/page/banner.php");
?>

<!-- Linea separadora -->
<span class="line-separator"></span>

<!-- Contenedor Container -->
<div class="container">
  <!-- Contendor background white -->
  <section class="bgPage--white">

    <!-- sectionHistoria Pagina Nosotros -->
    <section class="sectionPage__nosotros__historia">
      <div class="row">
          <div class="col s12 m6">
              <figure><img src="images/pages/nosotros/historia.jpg" alt="" class="responsive-img" /></figure>
          </div><!-- /.col s12 m6 -->
          <div class="col s12 m6">
              <h2 class="sectionPage__nosotros__title text-uppercase">historia</h2>
              <p class="sectionPage__nosotros__paragraph">INOVALEC PERU S.A.C es una empresa peruana dedicada a la comercialización y distribución suministros eléctricos, de automatización e instalaciones eléctricas que dada la amplia variedad de productos abastece a los sectores mineros, industrial, energía y naval.</p>
              <p class="sectionPage__nosotros__paragraph">Actualmente contamos con una tienda en el distrito de cercado de lima en Jr. Lampa 1121 Int. 30 </p>
              <p class="sectionPage__nosotros__paragraph">Desde su creación venimos trabajando con eficiencia y calidad buscando satisface plenamente a las necesidades de nuestros clientes.</p>
          </div><!-- /.col s12 m6 -->
      </div><!-- /.row -->
    </section><!-- /.sectionPage__nosotros__historia -->

    <!-- sectionHistoria Pagina Nosotros -->
    <section class="sectionPage__nosotros__aptitudes">
      <div class="row">

        <article class="col s12 m6">
          <figure class="col s4"><img src="images/pages/nosotros/nosotros_mision.jpg" alt="" class="responsive-img"></figure>

          <div class="col s8">
            <h2 class="sectionPage__nosotros__title text-uppercase">misión</h2>
            <p class="sectionPage__nosotros__paragraph">"Somos una empresa comercializadora de materiales eléctricos y fabricante de productos para la Generación, Transmisión y Distribución de Energía Eléctrica; con un amplio stock de productos para abastecer en forma oportuna y eficiente a nuestros clientes logrando su satisfacción total."</p>
          </div> <!-- /-.col s8 -->
        </article><!-- /.col s12 m6 -->
        
        <article class="col s12 m6">
          <figure class="col s4"><img src="images/pages/nosotros/nosotros_valores.jpg" alt="" class="responsive-img"></figure>

          <div class="col s8">
            <h2 class="sectionPage__nosotros__title text-uppercase">valores</h2>
            <p class="sectionPage__nosotros__paragraph">
              - Integridad. <br>
              - Compromiso y entrega. <br>
              - Trabajo en equipo. <br>
              - Relaciones a largo plazo. <br>
              - Innovación y apertura.
            </p>             
          </div> <!-- /.col s8 -->
        </article><!-- /.col s12 m6 -->
      </div> <!-- /.row -->

      <div class="row">
        <article class="col s12 m6">

          <figure class="col s4"><img src="images/pages/nosotros/nosotros_vision.jpg" alt="" class="responsive-img"></figure>

          <div class="col s8">
            <h2 class="sectionPage__nosotros__title text-uppercase">visión</h2>
            <p class="sectionPage__nosotros__paragraph">"Posicionarnos como la primera empresa en brindar soluciones integrales desarrollando ingeniería y ejecutando proyectos industriales, con la innovación y calidad como características principales de nuestros productos y servicios."</p>
          </div> <!-- /col s8 -->
          <div class="clearfix"></div> <!-- /.clearfix -->
        </article><!-- /.col s12 m6 -->

        <article class="col s12 m6">

          <figure class="col s4"><img src="images/pages/nosotros/nosotros_filosofia.jpg" alt="" class="responsive-img"></figure>

          <div class="col s8">
            <h2 class="sectionPage__nosotros__title text-uppercase">filosofía</h2>
            <p class="sectionPage__nosotros__paragraph">El trabajo, constancia, orden y disciplina es el factor del éxito de nuestra empresa. Somos una empresa que nos esforzamos día a día para dar a nuestros clientes lo mejor de nosotros a fin de brindarle una buena y cordial atención y así copar todas sus necesidades dentro del rubro en el cual nos hemos desarrollado. Estamos dispuestos a emplear todo nuestro potencial, conocimiento y calidad humana para cumplir nuestros objetivos.</p>
            <div class="clearfix"></div> <!-- /.clearfix -->
          </div> <!-- /col s8  -->
          
        </article><!-- /.col s12 m6 -->
      </div> <!-- /.row -->

    </section><!-- /.sectionPage__nosotros__aptitudes -->

    <!-- Seccion incluir marcas -->
    <?php include("includes/section-marcas.php") ?>

  </section><!-- /.bgPage--white -->
</div><!-- /.container -->

<!-- Linea separadora -->
<span class="line-separator"></span>


<!-- Incluir demás librerias javascript en el main footer -->
<?php include("includes/main-footer.php") ?>