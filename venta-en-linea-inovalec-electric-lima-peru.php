
<!-- Incluir el header principal estilos cargados y demás -->
<?php  
  //activar item
$active = 6;
  //setear el título
$title = "INOVALEC| Ventas en linea para equipos electricos,  repuestos electricos,  productos por linea, materiales instalaciones electricas industrial, automatizacion industrial, conductores electricos, equipo de media tension control y proteccion, equipos de seguridad y maniobra, ferreteria de electrificacion, iluminacion peru, instrumentos de medicion, linea conduit, materiales aislantes, materiales para instalaciones residenciales, pararrayos, sistema puesta tierra y afines, seguridad industrial lima peru, repuestos electricos lima peru, material construccion electricos,  productos por marcas 3m, lima abb abro aibar, bremas  celsa cirmarker lima, coel crc elcope lima, exosolda general electric indeco peru, kss legrand leviton peru, loctite lumnia mennekes peru, schneider electric siemens peru, talma ide termoweld lima, solera jsl santos peru dexson tecnoflex ls repuestos peru, tecnofil bticino orbis metal&a opalux hurricane lima peru";

  //incluir plantilla header
include('includes/main-header.php');

?>

<!-- Incluir Banner de Pagina -->
<?php  
$title_page = "ventas en linea";
$ruta_img   = "images/banner/ventas_online_bn_principal.jpg";
include("includes/page/banner.php");
?>

<!-- Linea separadora -->
<span class="line-separator"></span>

<!-- Pagina Ventas -->
<section class="sectionPage__ventas">
  <div class="container">
    <!-- Contendor background white -->
    <section class="bgPage--white">
      <div class="row">
        <!-- Titulo -->
        <h2 class="sectionCommon__title-page text-uppercase">ventas en línea</h2>
        <!-- Descripción -->
        <p><strong>INOVALEC S.A.C</strong> pone a disposición de sus clientes un moderno sistema de cotización en linea, mediante el cual nos podra enviar su cotización de nuestros productos y nosotros lo estaremos respondiendo en la brevedad posible de esta manera pretendemos brindarle mayor facilidad para que usted estimado cliente realize una compra adecuada a sus necesidades.</p>

        <!-- Salto de Línea --> <br/><br/>
        
        <!-- Sección de Formulario -->
        <div id="content_form" class="content_form">
          <form name="formulario" id="formulario" method="post" class="sectionPage__ventas__form">

            <div class="col s12 m6">

              <label class="form_lab">Empresa:</label>
              <input type="text" maxlength="30" size="" id="empresa1" class="validate[required] borde_texto form_input" name="empresa1" /> 

              <!-- Salto --> <br/><br/>

              <label class="form_lab">Telefono:</label>
              <input type="text" maxlength="10" size="" id="telefono1" class="validate[required,custom[number],minSize[6]] borde_telefono form_input" name="telefono1" />    

            </div><!-- /.col s12 m6 -->

            <div class="col s12 m6">

              <label class="form_lab">E-mail:</label>
              <input type="text" id="email" class="validate[required,custom[email] borde_texto form_input" size="" name="email" />   
                
              <!-- Salto --> <br/><br/>

              <label class="form_lab">Fecha:</label>
              <input type="text" id="fecha" class="validate[required] borde_fecha form_input--fecha" size="" maxlength="30" name="fecha" value="<?= date('d/m/Y'); ?>" />  
            </div><!-- /.col s12 m6 -->

            <!-- Limpiar floats --> <div class="clearfix"></div>
            <!-- Linea separadora -->
            <div class="sectionPage__ventas__divisor-line"></div>

            <!-- Cotizacion -->
            <section class="col s12">
              <table border="0" align="center" cellpadding="0" cellspacing="0" id="table-cotizar" class="sectionCotizacion__table">
                <thead>
                  <tr class="bg-cotizador">
                    <th class="cantidad"><span>Cantidad</span></th>
                    <th class="producto"><span>Producto</span></th>
                    <th class="marca"><span>Marca</span></th>
                  </tr>
                </thead> <!-- /.thead -->
                <tbody>
                  <tr><td height="10" colspan="3"></td></tr>
                  <tr>
                    <td><input name="cantidad[]" type="text" class="input_text_cantidad" /></td>
                    <td><input type="text" name="producto[]" class="input_text_producto" /></td>
                    <td>
                      <select name="marcas[]" class="select_box select_text_marca">
                        <option value="">--Marca--</option>
                        <?php 
                          $sql_marcas  = "SELECT * FROM marcas ORDER BY nombre_marca ASC";
                          $rpta_marcas = query($sql_marcas) or die(mysql_error());
                          $row_marcas = fetch_array($rpta_marcas);

                          foreach( $row_marcas as $marca ) : ?>
                            <option value="<?= $marca['nombre_marca'] ?>"><?= $marca['nombre_marca']  ?></option>
                        <?php endforeach; ?>           
                      </select>
                    </td>
                  </tr>
                </tbody><!-- /tbody -->
              </table> <!-- /table -->

              <!-- Input oculto informacion de marcas -->
              <script>
                var array_marcas = <?= json_encode($row_marcas); ?>;
                console.log( array_marcas );
              </script>

              <!-- Botoneras -->
              <section class="sectionCotizacion__botoneras text-center">
                <!-- Boton agregar -->
                <button type="button" value="" id="botonagregar" name="enviar">Agregar</button>
                <!-- Boton solicitar cotizacion -->
                <button type="button" value="" id="botoncotizar" name="cotizar">
                Solicitar cotización</button>
              </section><!-- /.sectionCotizacion__botoneras -->


            </section><!-- /.col s12 -->

            <!-- Clearfix --> <div class="clearfix"></div>

          </form>  <!-- /.form -->                  
        </div><!-- content_form -->

      </div><!-- /.row -->
    </section> <!-- /.bgPage--white -->
  </div><!-- /.container -->
</section><!-- /.sectionPage__nosotros__historia -->

<!-- Estructura de modal contiene informacion que sera desplegada al finalizar la cotización -->
<div id="modal-cotizar" class="modal">
  <div class="modal-content">
    <h4>Estado:</h4>
    <h2 id="text-form-cotizar"></h2>
  </div> <!-- /modal content -->
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
  </div><!-- /modal-footer -->
</div> <!-- /modal -->

<!-- Linea separadora -->
<span class="line-separator"></span>

<div class="container">
  <!-- Seccion incluir marcas -->
  <?php include("includes/section-marcas.php") ?>
</div>

<!-- Incluir demás librerias javascript en el main footer -->
<?php include("includes/main-footer.php") ?>