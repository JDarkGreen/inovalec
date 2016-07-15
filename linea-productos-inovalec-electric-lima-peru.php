
<!-- Incluir el header principal estilos cargados y demás -->
<?php  
  //activar item
  $active = 3;

  $subseccion  = empty($_GET['idsubnivel']) ? $subseccion : '';
  $texto       = empty($_GET['idmarca']) ? 'linea' : 'marca';
  
  // para las marcas.
  $idseccion   = isset( $_GET['idseccion'] ) ? $_GET['idseccion'] : "";
  $idmarca     = isset( $_GET['idmarca'] ) ? $_GET['idmarca'] : ""; 
  $nom_marca   = isset( $_GET['nom_marca'] ) ? $_GET['nom_marca'] : "";
  $seccion     = isset( $_GET['seccion'] ) ? $_GET['seccion'] : "";
  $subseccion1 = isset( $_GET['subseccion1'] ) ? $_GET['subseccion1'] : "";    
  $subnivel    = isset( $_GET['subnivel'] ) ? $_GET['subnivel'] : "";   

  //setear el título
  $title = "INOVALEC S.A.C | Detalle del producto para equipos electricos Peru,  repuestos electricos,  productos por linea, materiales instalaciones electricas industrial, automatizacion industrial, conductores electricos, equipo de media tension control y proteccion, equipos de seguridad y maniobra, ferreteria de electrificacion, iluminacion peru, instrumentos de medicion, linea conduit, materiales aislantes, materiales para instalaciones residenciales, pararrayos, sistema puesta tierra y afines, seguridad industrial lima peru, repuestos electricos lima peru, material construccion electricos,  productos por marcas 3m, lima abb abro aibar, bremas  celsa cirmarker lima, coel crc elcope lima, exosolda general electric indeco peru, kss legrand leviton peru, loctite lumnia mennekes peru, schneider electric siemens peru, talma ide termoweld lima, solera jsl santos peru dexson tecnoflex ls repuestos peru, tecnofil bticino orbis metal&a opalux hurricane lima peru";

  //incluir plantilla header
  include('includes/main-header.php');

  // llamo a la funcion productos para mostrar la lista de los items registrados.
  $resultado = productos($subseccion);
  
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
      
          <h2 class="sectionPage__productos__title--blue text-capitalize"><?= $nom_marca . "->" . $seccion . "->" . $subnivel ?></h2>
          
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
                        <a href="marca-jbg-electric-lima-peru.php?marca=<?= $marca['idmarca']; ?>&nom_marca=<?= $marca['nombre_marca']; ?>#marca" title="<?= $marca['nombre_marca']; ?>"><?= ucfirst( strtoupper($marca['nombre_marca']) ); ?></a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </section><!-- /.sidebarMenu hidden -->

              </aside><!-- /.sidebarMenu -->
            </div><!-- /.col s12 m4 -->
            */ ?>

            <div class="col s12 12">
              <!-- Tabla de productos -->
              <table width="" border="0" cellpadding="0" cellspacing="0" align="">
                <tr class="titulos">
                  <td width="98" align="center">Imagen</td>
                  <td width="74" align="center">Codigo</td>
                  <td width="175" align="center">Producto</td>
                  <td width="113" align="center">Marca</td>
                  <td width="112" align="center"> Modelo</td>
                  <td width="98" align="center">Descripción</td>
                </tr>
                <!-- Dejar espaciado -->
                <tr><td height="5" colspan="6" class="no-padding"></td></tr>
                <!-- Producto -->
                <?php 
                  $row1 = fetch_array($resultado); 
                  foreach( $row1 as $producto ) :
                ?>
                  <tr>
                    <!-- Imagen -->
                    <td align="center" class="tdrow1">
                      <?php if( empty($producto['imagen']) ) : ?>
                        <div style="heigth:47px; width:92px;">no-foto</div>
                      <?php else: ?>
                        <img src="images/productos/<?= $producto['imagen']; ?>" width="92" height="75" />
                      <?php endif; ?>
                    </td><!-- /.center" class="tdrow1" -->
                    <!-- Codigo producto -->
                    <td align="center" class="tdrow1"><?= $producto['codigo_prod']; ?></td>
                    <!-- Nombre producto -->
                    <td align="center" class="tdrow1"><?= $producto['nombre_producto']; ?></td>
                    <!-- marca producto -->
                    <td align="center" class="tdrow1"><?= $producto['nombre_marca']; ?></td>
                    <!-- modelo producto -->
                    <td align="center" class="tdrow1"><?= $producto['modelo']; ?></td>
                    <!-- Detalle -->
                    <td align="center" class="tdrow1">
                      <a href="inovalec-electric-detalle-producto-lima-peru.php?idmarca=<?= $idmarca; ?>&idseccion=<?= $idseccion; ?>&nom_marca=<?= $nom_marca; ?>&seccion=<?= $seccion; ?>&subseccion=<?= $subseccion1; ?>&subnivel=<?= $subnivel; ?>&producto=<?= $producto['idproducto']; ?>#marca" class="vermas_productos"><img src="images/ver-detalle.png" width="90" height="29" /></a>
                    </td><!-- /center -->
                  </tr>
                <?php endforeach; ?>
              </table>
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