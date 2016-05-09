
<!-- Incluir el header principal estilos cargados y demás -->
<?php  
  //activar item
  $active    = 3;
  $subactive = 3.2;
  //setear el título
  $title = "INOVALEC | Productos por linea para equipos electricos peru,  repuestos electricos,  productos por linea, materiales instalaciones electricas industrial, automatizacion industrial, conductores electricos, equipo de media tension control y proteccion, equipos de seguridad y maniobra, ferreteria de electrificacion, iluminacion peru, instrumentos de medicion, linea conduit, materiales aislantes, materiales para instalaciones residenciales, pararrayos, sistema puesta tierra y afines, seguridad industrial lima peru, repuestos electricos lima peru, material construccion electricos,  productos por marcas 3m, lima abb abro aibar, bremas  celsa cirmarker lima, coel crc elcope lima, exosolda general electric indeco peru, kss legrand leviton peru, loctite lumnia mennekes peru, schneider electric siemens peru, talma ide termoweld lima, solera jsl santos peru dexson tecnoflex ls repuestos peru, tecnofil bticino orbis metal&a opalux hurricane lima peru";

  //incluir plantilla header
  include('includes/main-header.php');

  $linea             = $_GET['nom_marca'];
  $subseccion        = $_GET['subseccion']; 
  
  $sql_subsecciones  = "SELECT * FROM secciones WHERE idpadre ='".$_GET['subseccion']."'";
  $rpta_subsecciones = query($sql_subsecciones) or die(mysql_error());
  $num_subsecciones  = num_rows($rpta_subsecciones);

?>

<!-- Incluir Banner de Pagina -->
<?php  
    $title_page = "productos por línea";
    $ruta_img   = "images/banner/productos_bn_principal.jpg";
    include("includes/page/banner.php");
?>

<!-- Linea separadora -->
<span class="line-separator"></span>

<!-- sectionHistoria Pagina Nosotros -->
<section class="sectionPage__productos">
    <div class="container">

      <!-- Contendor background white -->
      <section class="bgPage--white">

        <div class="row">
          <div class="col s12 m6">
            <!-- Titulo -->
            <h2 class="sectionCommon__title-page text-uppercase align-left"><strong>Productos por Línea</strong></h2>
          </div><!-- /.col s12 m6 -->
          <div class="col s12 m6">
            <!-- Buscador -->
            <div id="form_buscar-1">
              <form action="jbg-electric-resultados-busqueda-lima-peru.php" method="post" id="frmbuscar" name="frmbuscar">
                <p>Buscar producto</p>
                <p><input type="text" value="" class="borde_texto" id="buscar" name="buscar" /></p>
              </form><!-- /.form -->
            </div> <!-- /#formn_buscar-1 -->
          </div><!-- /.col s12 m6 -->
        </div> <!-- ./.row -->

        <!-- Solo muestra las marcas -->
        <div class="row">

          <!-- Titulo de la linea -->
          <h3><strong><?= $linea; ?></strong></h3>
          
          <!-- Contenedor de marcas -->
          <section class="sectionPage__producto__content-marcas">
            <?php  
              $row_subseccion = fetch_array($rpta_subsecciones);

              foreach ($row_subseccion as $row ) : 
            ?>
              <ul class="dos_columnas">
                <li>
                  <a href="lista-nivel-lineas-jbg-electric-lima-peru.php?idsubseccion=<?= $row['idseccion'] ?>&nom_marca=<?= $linea ?>&seccion=<?= $row['seccion'] ?>&subseccion=<?= $subseccion ?>#lineas"><?= $row['seccion'] ?>
                  </a> <!-- /. -->
                </li> <!-- /li -->
              </ul> <!-- /dos_columnas -->
            <?php endforeach; ?>
          </section> <!-- /.sectionPage__producto__content-marcas -->

          <div class="clearfix"></div> <!-- /clearfix -->

          <!-- Seccion incluir marcas -->
          <?php include("includes/section-marcas.php") ?>

        </div><!-- /.row -->
      </div><!-- /.container -->

    </section> <!-- /.bgPage--white -->
</section><!-- /.sectionPage__productos -->

<!-- Linea separadora -->
<span class="line-separator"></span>


<!-- Incluir demás librerias javascript en el main footer -->
<?php include("includes/main-footer.php") ?>