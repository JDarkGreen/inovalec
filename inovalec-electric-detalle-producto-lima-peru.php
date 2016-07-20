
<!-- Incluir el header principal estilos cargados y demás -->
<?php  
  //activar item
  $active = 3;

  $idseccion   = $_GET['idseccion'];
  $idmarca     = $_GET['idmarca']; 
  $nom_marca   = $_GET['nom_marca'];
  $seccion     = $_GET['seccion'];
  $subseccion  = $_GET['subseccion'];
  $subseccion1 = $_GET['subseccion'];    
  $subnivel    = $_GET['subnivel'];  


  //setear el título
  $title = "INOVALEC S.A.C | Detalle del producto para equipos electricos Peru,  repuestos electricos,  productos por linea, materiales instalaciones electricas industrial, automatizacion industrial, conductores electricos, equipo de media tension control y proteccion, equipos de seguridad y maniobra, ferreteria de electrificacion, iluminacion peru, instrumentos de medicion, linea conduit, materiales aislantes, materiales para instalaciones residenciales, pararrayos, sistema puesta tierra y afines, seguridad industrial lima peru, repuestos electricos lima peru, material construccion electricos,  productos por marcas 3m, lima abb abro aibar, bremas  celsa cirmarker lima, coel crc elcope lima, exosolda general electric indeco peru, kss legrand leviton peru, loctite lumnia mennekes peru, schneider electric siemens peru, talma ide termoweld lima, solera jsl santos peru dexson tecnoflex ls repuestos peru, tecnofil bticino orbis metal&a opalux hurricane lima peru";

  //incluir plantilla header
  include('includes/main-header.php');

  $rpta_detalle_producto = mostrarDetalleProducto($_GET['producto']);
  $row_detalle_producto  = fetch_array($rpta_detalle_producto);
  //
  $sql_submarcas  = "SELECT p.*, s.*, m.*, s.seccion as subseccion FROM productos p, secciones s, marcas m
            WHERE p.idseccion = s.idseccion
            AND p.idmarca = m.idmarca
            AND p.idseccion = '".$idseccion."'
            AND p.idmarca = '".$idmarca."'";
  $rpta_submarcas = query($sql_submarcas) or die(mysql_error());
  $row_submarca   = fetch_array($rpta_submarcas); 

?>

<!-- Incluir Banner de Pagina -->
<?php  
    $title_page = "productos";
    $ruta_img   = "images/banner/nosotros_bn_principal.jpg";
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
            <h2 class="sectionCommon__title-page text-uppercase align-left"><strong>
            Productos por Marcas</strong>
            </h2>

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
      
          <h2 class="sectionPage__productos__title--blue text-capitalize">
            <!-- Imprimir marca -->
            <?= $nom_marca ?>
            <!-- Imprimir seccion -->
            <?= isset($seccion) && !empty($seccion) ? "->" . $seccion : ""; ?>
            <!-- Imprimir subsección -->
            <?= isset($subseccion1) && !empty($subseccion1) ? "->" . $subseccion1 : ""; ?>
            <!-- Imprimir subnivel -->
            <?= isset($subnivel) && !empty($subnivel) ? "->" . $subnivel : ""; ?>
          </h2>
          
          <!-- SECCION PRODUCTOS -->
          <section id="productos" class="">

            <?php /*
            <div class="col s12 m4">
              <aside id="sidebarMenu">
                <!-- MENUS -->
                <div id="sidebarSwitcherContainer" class="sidebarMenu__title center">
                  <input type="button" data-link="js-menu-lineas" class="sidebarSwitcher sidebarMarcasBtn " value="LÍNEAS" title="lineas"/>
                  <input type="button" data-link="js-menu-marcas" class="sidebarSwitcher sidebarLineasBtn sidebarSwitcherOff" value="MARCAS" title="marcas"/>
                </div><!-- /.sidebarSwitcherContainer -->

                <!-- LISTA por lineas-->
                <section id="js-menu-lineas" class="sidebarMenu">
                  <?php
                    $padre = !isset($padre) && empty($padre) ? "IS NULL" : " " . $padre;
                    $sql_lineas  = "SELECT * FROM secciones WHERE idpadre ".$padre." ORDER BY seccion ASC";
                    $rpta_lineas = query($sql_lineas);
                    $row_lineas  = fetch_array($rpta_lineas);
                  ?>
                  <ul>
                  <?php foreach( $row_lineas as $lineas ) : ?>
                    <li>
                      <a href="lista-lineas-subseccion.php?nom_marca=<?= $lineas['seccion'] ?>&subseccion=<?= $lineas['idseccion'] ?>" title="<?= $lineas['seccion']; ?>">
                        <?= ucwords( strtolower( recortar_texto($lineas['seccion']) ) ); ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                  </ul>
                </section><!-- /.id="sidebarScrollable1" class="sidebarMenu" -->

                <!-- LISTA por marca -->
                <section id="js-menu-marcas" class="sidebarMenu hide">
                  <?php 
                    $sql_marcas  = "SELECT * FROM marcas ORDER BY idmarca ASC";
                    $rpta_marcas = query($sql_marcas) or die(mysql_error()); 
                    $row_marcas  = fetch_array($rpta_marcas);
                  ?>
                  <ul>
                    <?php foreach( $row_marcas as $marca ) : ?>
                      <li>
                        <a href="marcas-inovalec-electric-lima-peru.php?marca=<?= $marca['idmarca']; ?>&nom_marca=<?= $marca['nombre_marca']; ?>" title="<?= $marca['nombre_marca']; ?>"><?= ucfirst( strtoupper($marca['nombre_marca']) ); ?></a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </section><!-- /.sidebarMenu hidden -->

              </aside><!-- /.sidebarMenu -->
            </div><!-- /.col s12 m4 -->
            */ ?>


            <div class="col s12 m12">
              <!-- Descripcion productos -->
              <section class="sectionPage__productos__description">
                <!-- Breadcums -->
                <?php  
                  $nombre_marca       = ucwords( strtolower($nom_marca) );
                  $nombre_seccion     = ucwords( strtolower($seccion) );
                  $nombre_subseccion  = ucwords( strtolower($subseccion) );
                  $nombre_subnivel    = ucwords( strtolower($subnivel) );
                ?>
                <div class="breadcums">
                  <!-- Imprimir marca -->
                  <?= $nombre_marca ?>
                  <!-- Imprimir seccion -->
                  <?= isset($nombre_seccion) && !empty($nombre_seccion) ? "->" . $nombre_seccion : ""; ?>
                  <!-- Imprimir subsección -->
                  <?= isset($nombre_subseccion) && !empty($nombre_subseccion) ? "->" . $nombre_subseccion : ""; ?>
                  <!-- Imprimir subnivel -->
                  <?= isset($nombre_subnivel) && !empty($nombre_subnivel) ? "->" . $nombre_subnivel : ""; ?>                  
                </div><!-- /breadcums -->

                <!-- titulo -->
                <h3 class="sectionPage__productos__description__title"><?= $row_detalle_producto[0]['nombre_producto'] ?></h3>

                <!-- Logo de Marca -->
                <div class="col s12">
                   <!-- Imagen de marca -->
                  <figure class="">
                    <img src="images/marcas/<?= $row_detalle_producto[0]['imagen_marca']; ?>" />
                  </figure> <!-- /figure -->
                </div> <!-- /. -->

                <!-- secciones de informacion -->
                <section class="col s12 m6">

                  <!-- tabla -->
                  <table class="sectionPage__productos__description__table" border="0" cellpadding="0" cellspacing="0" align="">
                    <tbody>
                      <tr>
                        <td class="bg-icon">CÓDIGO</td>
                        <td class=""><?= !empty($row_detalle_producto[0]['codigo_prod']) ? $row_detalle_producto[0]['codigo_prod'] : "---------------" ?></td>
                      </tr>
                      <tr>
                        <td class="bg-icon">MODELO</td>
                        <td class=""><?= $row_detalle_producto[0]['modelo']; ?></td>
                      </tr>
                      <tr>
                        <td class="bg-icon">MARCA</td>
                        <td class=""><?= $row_detalle_producto[0]['nombre_marca']; ?></td>
                      </tr>
                    </tbody>
                  </table><!-- /.sectionPage__productos__description__table -->

                  <!-- Seleccion de opciones -->
                  <section class="tabSelector">
                    <div class="tabSelector__content">
                      <a href="product-description" class="active">Descripción</a>
                      <a href="product-pdf" class="pdf">PDF</a>
                    </div><!-- /.tabSelector__content -->
                    <div class="tabSelector__panel">
                      <!-- Descripcion -->
                      <div id="product-description" class="tabSelector__panel-item">
                        <?= !empty( $row_detalle_producto[0]['descripcion'] ) ? $row_detalle_producto[0]['descripcion'] : "No descripción" ; ?>
                      </div>
                      <!-- PDF -->
                      <div id="product-pdf" class="tabSelector__panel-item hide">
                        <a href="pdf/<?= $row_detalle_producto[0]['pdf'] ?>" target="_blank">Descargar PDF</a>
                      </div>
                    </div><!-- /.tabSelector__panel -->
                  </section><!-- /tabSelector -->

                </section><!-- /.col s12 m6 -->
                <section class="col s12 m6">
                  <!-- Imagen de Producto -->
                  <figure class="sectionPage__productos__imagen">
                    <img src="images/productos/<?= $row_detalle_producto[0]['imagen_detalle']; ?>" class="responsive-img" />
                  </figure>
                </section><!-- /.col s12 m6 -->
              </section><!-- /.sectionPage__productos__description -->

            </div><!-- /.col s12 m8 -->
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