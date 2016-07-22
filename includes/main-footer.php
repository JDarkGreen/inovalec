  
<footer class="mainFooter">
	<!-- Seccion de contenido de footer -->
	<section class="mainFooter__content">
		<div class="container">
	  		<div class="row">
			  	<!-- Informacion Footer -->
			  	<article class="mainFooter__item col s12 m4">
			  		<h2 class="sectionCommon__subtitle">Inovalec PERÚ S.A.C</h2>
			  		<!-- Imagen -->
			  		<figure class="mainFooter__image"><img src="images/footer/inicio_pie_foto.jpg" alt="inicio_pie_foto" class="responsive-img"></figure>
			  		<!-- Contenido -->
			  		<p class="mainFooter__paragraph">Es una empresa peruana dedicada a la comercialización de materiales eléctricos para área doméstica, industrial y minera le damos la bienvenida a nuestra página web donde podra encontrar todo sobre los productos y marcas que comercializamos.</p>
			  	</article><!-- mainFooter__item col s12 m4 -->

			  	<!-- Informacion de Contacto -->
			  	<article class="mainFooter__item col s12 m4">
			  		<h2 class="sectionCommon__subtitle">contacto</h2> <br />

			  		<p class="mainFooter__paragraph">Póngase en contacto con nosotros.</p>

			  		<!-- Lista de Informacion -->
			  		<ul class="mainFooter__list-contact">
			  			<!-- Dirección -->
			  			<li><i><img src="images/contacto/iconos_contacto_direccion.png" alt="iconos_contacto_dirección" class="responsive-img"></i> Jr Lampa 1121 Int 30 <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cercado de Lima - Lima </li>
			  			<!-- Telefono -->
			  			<!--li><i><img src="images/contacto/iconos_contacto_telefono.png" alt="iconos_contacto_telefono" class="responsive-img"></i> Telf: 427-3928 </li-->

			  			<!-- Email -->
			  			<!--li>
			  				<i><img src="images/contacto/iconos_contacto_mail.png" alt="iconos_contacto_mail" class="responsive-img"></i> 
			  				Asesores Comerciales: <br/> tquintana@inovalec.com.pe  </li-->	

			  			<!-- Central de ventas -->
			  			<li>  Central de Ventas: <br><br>
			  				<i><img src="images/contacto/iconos_contacto_telefono.png" alt="iconos_contacto_rpm" class="responsive-img"></i> 
			  				Tel: 4934752
			  			</li>	

			  			<!-- Celular -->
			  			<li><i><img src="images/contacto/iconos_contacto_rpm.png" alt="iconos_contacto_rpm" class="responsive-img"></i> Cel: 992724283 / 997528228</li>	

			  			<!-- Email -->
			  			<!--li><i><img src="images/contacto/iconos_contacto_mail.png" alt="iconos_contacto_mail" class="responsive-img"></i> mcoba@inovalec.com.pe  </li-->

			  			<!-- Celular -->
			  			<!--li><i><img src="images/contacto/iconos_contacto_rpm.png" alt="iconos_contacto_rpm" class="responsive-img"></i> Cel: 997528228 </li-->

			  			<!-- Correos -->
			  			<li>  Correos: <br><br>
			  				<i><img src="images/contacto/iconos_contacto_mail.png" alt="iconos_contact
			  				o" class="responsive-img"></i> 
			  				ventas@inovalec.com.pe
			  			</li>

			  		</ul><!-- /. -->
			  	</article>

			  	<!-- Ventas en Linea -->
			  	<article class="mainFooter__item col s12 m4">
			  		<h2 class="sectionCommon__subtitle">ventas en línea <a href="venta-en-linea-inovalec-electric-lima-peru.php" class="btn__more--orange waves-effect">ver más</a></h2> <br/>
						
			  		<h2 class="sectionCommon__subtitle">redes sociales </h2>
			  		<ul class="social-links">
			  			<li><a href="" target="_blank"><img class="responsive-img" src="images/redes-sociales/iconos_redes_facebook.png" alt="iconos_redes_facebook"></a></li>
			  			<li><a href="" target="_blank"><img class="responsive-img" src="images/redes-sociales/iconos_redes_twitter.png" alt="iconos_redes_twitter"></a></li>
			  			<li><a href="" target="_blank"><img class="responsive-img" src="images/redes-sociales/iconos_redes_youtube.png" alt="iconos_redes_youtube"></a></li>
			  		</ul>
			  	</article> <!-- /.mainFooter__item col s12 m4 -->

	 		 </div><!-- /.row -->
		</div> <!-- /.container -->
	</section><!-- /.mainFooter__content -->
	<!-- Barra de desarrollo -->
	<section class="mainFooter__develop">
		<p class="center text-uppercase">copyright <?= date('Y') ?> &copy; POWERBY 
			<a style="color:white;" target="_blank" href="http://www.ingenioart.com/">Ingenioart</a>
		</p>
	</section>
</footer><!-- /.mainFooter -->
	
  <!-- Variable url -->
  <script> 
  	var base_url = "<?= "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/' ?>";
  	console.log( base_url );
  </script>


  <!-- Script Materialize -->
  <script src="js/materialize/materialize.min.js"></script>
  <!-- Cubeslider -->
  <script src="js/cubeslider/cubeslider-min.js"></script>
  <!-- owlcarousel-->
  <script src="js/owlcarousel/owl.carousel.min.js"></script>

  
  <!-- Cargar script contenedor -->
  <script src="js/script.js"></script>
  
  </body>
</html>