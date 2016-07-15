
<!-- Incluir el header principal estilos cargados y demás -->
<?php  
  //activar item
  $active    = 3;
  $subactive = 3.1;

  //marca id
  $idmarca        = $_GET['marca'];
  //marca nombre
  $nom_marca      = $_GET['nom_marca'];

  //setear el título
  $title = "INOVALEC | Productos por marcas para equipos electricos peru,  repuestos electricos,  productos por linea, materiales instalaciones electricas industrial, automatizacion industrial, conductores electricos, equipo de media tension control y proteccion, equipos de seguridad y maniobra, ferreteria de electrificacion, iluminacion peru, instrumentos de medicion, linea conduit, materiales aislantes, materiales para instalaciones residenciales, pararrayos, sistema puesta tierra y afines, seguridad industrial lima peru, repuestos electricos lima peru, material construccion electricos,  productos por marcas 3m, lima abb abro aibar, bremas  celsa cirmarker lima, coel crc elcope lima, exosolda general electric indeco peru, kss legrand leviton peru, loctite lumnia mennekes peru, schneider electric siemens peru, talma ide termoweld lima, solera jsl santos peru dexson tecnoflex ls repuestos peru, tecnofil bticino orbis metal&a opalux hurricane lima peru , $nom_marca";

  //incluir plantilla header
  include('includes/main-header.php');

  //  funcion para mostrar las promociones.
  $rpta_listar_promocion = listar_promociones(1);

  //capturar las secciones 
  $sql_secciones  = "SELECT p.*, s.*, m.* FROM productos p, secciones s, marcas m
                      WHERE p.idseccion = s.idseccion
                      AND p.idmarca = m.idmarca
                      AND p.idmarca = '".$_GET['marca']."'
                      GROUP BY p.idseccion ORDER BY s.seccion ASC";
  $rpta_secciones = query($sql_secciones);
  $num_marcas     = num_rows($rpta_secciones);

?>

<!-- Incluir Banner de Pagina -->
<?php  
    $title_page = "productos por marca";
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
            <h2 class="sectionCommon__title-page text-uppercase align-left"><strong>Productos por Marcas</strong></h2>
          </div><!-- /.col s12 m6 -->
          <div class="col s12 m6">
            <!-- Buscador -->
            <div id="form_buscar-1">
              <form action="inovalec-electric-resultados-busqueda-lima-peru.php" method="post" id="frmbuscar" name="frmbuscar">
                <p>Buscar producto</p>
                <p><input type="text" value="" class="borde_texto" id="buscar" name="buscar" /></p>
              </form><!-- /.form -->
            </div> <!-- /#formn_buscar-1 -->
          </div><!-- /.col s12 m6 -->
        </div> <!-- ./.row -->

        <!-- Solo muestra las marcas -->
        <div class="row">
      
          <h2 class="text-capitalize"><strong><?= $nom_marca; ?></strong></h2>
          
          <!-- Contenedor de marcas -->
          <section class="sectionPage__producto__content-marcas">
            <?php  
              $fila_marca = fetch_array($rpta_secciones);
              if( count($fila_marca) > 0 ) : 
              foreach( $fila_marca as $marca ):
            ?>
              <ul class="dos_columnas">
                <li>
                  <a href="inovalec-electric-seccion-marcas-lima-peru.php?idseccion=<?= $marca['idseccion'] ?>&idmarca=<?= $idmarca ?>&nom_marca=<?= $nom_marca ?>#marca"> <?= $marca['seccion'] ?>
                  </a>
                </li>
              </ul><!-- /dos_columas -->
            <?php endforeach; else : ?> 
              <p>La marca no tiene registros</p>
            <?php endif; ?>
          </section> <!-- /.sectionPage__producto__content-marcas -->

          <div class="clearfix"></div> <!-- /clearfix -->

          <!-- Saltos de Linea -->
          <br/><br/>

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