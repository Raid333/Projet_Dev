<?php include ('includes/header.html'); ?>
<script>
    function initMap() {
        var uluru = {lat: 48.8778, lng: 2.2735};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>

			<!-- Main -->
				<div class="wrapper">
					<div class="container" id="main">
						<div class="row 150%">
							<div class="4u 12u(narrower)">

								<!-- Sidebar -->
									<section id="sidebar">
										<section>
											<header>
												<h3>Informations</h3>
											</header>
											<ul>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Du 25/08 au 30/08</li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Etre majeur obligatoirement</li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Toute sortie du parc est définitive</li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Possibilité de manger et de se laver sur place</li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Un parking ainsi qu'une plaine pour vos voitures & tentes seront mis à disposition</li>
                                            </ul>
<!--											<ul class="actions">-->
<!--												<li><a href="#1" class="button">Suivant</a></li>-->
<!---->
<!--											</ul>-->
										</section>
										<section>
                                            <header>
                                                <h3>Comment venir ? et repartir ?</h3>
                                            </header>
                                            <p><strong>Métro</strong></p>
                                            <p><strong>RER</strong></p>
                                            <p><strong>BUS</strong></p>
                                            <a href="#" class="image featured"><img src="images/pic07.jpg" alt="" /></a>
                                        </section>
                                        <section>
                                            <header>
                                                <h3>Où s'inscrire ?</h3>
                                            </header>
                                            <p>Vous pouvez vous s'inscrire à l'événement en suivant ce lien :</p>
                                            <ul class="actions">
                                                <li><a href="#" class="button">S'inscrire</a></li>
                                            </ul>
                                        </section>
									</section>

							</div>
							<div class="8u 12u(narrower) important(narrower)">

								<!-- Content -->
									<article id="content">
										<header>
											<h2>Informations pratiques</h2>
											<p>Vous allez trouver sur cette page toutes les informations sur l'événement afin qu'il se déroule au mieux pour vous</p>
										</header>
                                        <h2>Adresse</h2>
                                        <p><strong>Ile des Impressionistes | 78400 Chatou</strong></p>
                                        <div id="map" style="width: 100%; height: 400px"></div>
                                        <script async defer
                                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKxh5cvbJrB1KbIAL1les5MRjImXwaySA&callback=initMap">
                                        </script>
<!--                                        // AIzaSyAebq3De1maVDqt1FcZybwDEj3LDcJlcbc-->

									</article>

							</div>
						</div>
						<d
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<div id="footer" class="container">
						<header class="major">
							<h2>Réseaux Sociaux</h2>
							<p>Rejoignez nous sur les réseaux sociaux afin de faire partager avec le monde votre techno folie !</p>
						</header>
						<div class="row" style="text-align: center">

							<section class="12u 12u(narrower)">
								<div class="row 0%">
									<ul class="divided icons 6u 12u(mobile)">
										<li class="icon fa-twitter"><a href="#"><span class="extra">twitter.com/</span>untitled</a></li>
										<li class="icon fa-facebook"><a href="#"><span class="extra">facebook.com/</span>untitled</a></li>
										<li class="icon fa-dribbble"><a href="#"><span class="extra">dribbble.com/</span>untitled</a></li>
									</ul>
									<ul class="divided icons 6u 12u(mobile)">
										<li class="icon fa-instagram"><a href="#"><span class="extra">instagram.com/</span>untitled</a></li>
										<li class="icon fa-youtube"><a href="#"><span class="extra">youtube.com/</span>untitled</a></li>
										<li class="icon fa-pinterest"><a href="#"><span class="extra">pinterest.com/</span>untitled</a></li>
									</ul>
								</div>
							</section>
						</div>
					</div>
					<div id="copyright" class="container">
						<ul class="menu">
							<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>
				</div>

		</div>

		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
