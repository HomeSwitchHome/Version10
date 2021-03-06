<?php require_once("config.php"); ?>
<!DOCTYPE>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Home Switch Home</title>
		<link href="style.css" rel="stylesheet" />
		<?php
			$banner = mt_rand(1,14);
			if ($banner == '1') {echo("<link href=\"banner/banner.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />");}
			if ($banner == '2') {echo("<link href=\"banner/banner2.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />");}
			if ($banner == '3') {echo("<link href=\"banner/banner3.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />");}
			if ($banner == '4') {echo("<link href=\"banner/banner4.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />");}
			if ($banner == '5') {echo("<link href=\"banner/banner5.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />");}
			if ($banner == '6') {echo("<link href=\"banner/banner6.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />");}
			if ($banner == '7') {echo("<link href=\"banner/banner7.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />");}
			if ($banner == '8') {echo("<link href=\"banner/banner8.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />");}
			if ($banner == '9') {echo("<link href=\"banner/banner9.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />");}
			if ($banner == '10') {echo("<link href=\"banner/banner10.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />");}
			if ($banner == '11') {echo("<link href=\"banner/banner11.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />");}
			if ($banner == '12') {echo("<link href=\"banner/banner12.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />");}
			if ($banner == '13') {echo("<link href=\"banner/banner13.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />");}
			if ($banner == '14') {echo("<link href=\"banner/banner14.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />");}
		?>
			<script language="javascript">
            function confirme( identifiantLogement ){
                var confirmation = confirm( "Voulez vous vraiment supprimer cette annonce ?" ) ;
                if( confirmation ){
                    document.location.href = "confirmSuppr.php?idlog="+identifiantLogement ;
                }
            }
		</script>

		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.onvisible.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/popupccm.js"></script>
	</head>

	<body>
		<div id="wrapper">
			<?php include("header.php"); ?>
	
		<section id="banner">
			<div id="logo">
				
				<h1>Home Switch Home</h1>
				<p>Le site d'échange de logement entre particuliers</p>
				<a href="#html2" id="lien_button_transparent" onClick="popup('popUpDiv')"><p><div id="button_transparent">Comment ça marche ?</div></p></a>	
			</div>
			</section>			
			<div id="page" class="container">
		
				<div class="entry">

					<p>Home Switch Home est un site d'échange de logement gratuits entre particulliers. Avez-vous déjà songé partir en vacances, 2 semaines, un mois, ou plus, et ce gratuitement ? Si oui, ce site est fait pour vous. Vous y trouverez toutes les raisons d'essayer un nouveau mode de vacances, celui de l'échange de maisons. Vous aimeriez voyager en étant chez vous tout en respectant votre budget? La formule d'échange d'appartement ou de maison vous conviendra... Villa, maison, appartement: troquez - les et vive les vacances gratuites! </p>
				
				</div>
		
			</div>
			<div id="titre_carousel">
				<h1><strong>Logements les plus récents</strong></h1>
			</div>
			<section class="carousel">
				<?php $q=$bdd->query("SELECT * FROM logements ORDER BY id desc");
        		$ligne = $q-> fetch();?>
				<div class="reel">

					<article>
						<div class="tbox1">
				
					<div class="box-style">
						<?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>

						<div class="content">
				
							<div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" id="imgcarousel" /></div>
								
								<h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                <?php $ligne = $q-> fetch();?>
				
							</div>
			
						</div>
		
					</div>						
					</article>
				
					<article>
						<div class="tbox1">
				
					<div class="box-style">
						<?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>

						<div class="content">
				
							<div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" id="imgcarousel" /></div>
								
								<h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $q-> fetch();?>
				
							</div>
			
						</div>
		
					</div>					
					</article>
				
					<article>
						<div class="tbox1">
				
					<div class="box-style">
						<?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>

						<div class="content">
				
							<div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" id="imgcarousel" /></div>
								
								<h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $q-> fetch();?>
				
							</div>
			
						</div>
		
					</div>							
					</article>
				
					<article>
						<div class="tbox1">
				
					<div class="box-style">
						<?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>

						<div class="content">
				
							<div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" id="imgcarousel" /></div>
								
								<h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $q-> fetch();?>
				
							</div>
			
						</div>
		
					</div>						
					</article>
				
					<article>
						<div class="tbox1">
				
					<div class="box-style">
						<?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>

						<div class="content">
				
							<div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" id="imgcarousel" /></div>
								
								<h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $q-> fetch();?>
				
							</div>
			
						</div>
		
					</div>					
					</article>
				
					<article>
						<div class="tbox1">
				
					<div class="box-style">
						<?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>

						<div class="content">
				
							<div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" id="imgcarousel" /></div>
								
								<h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $q-> fetch();?>
				
							</div>
			
						</div>
		
					</div>							
					</article>
			</section>

		</br>
		<div id="titre_carousel">
				<h1><strong>Logements les plus populaires</strong></h1>
		</div>
		<section class="carousel">
				<?php $p=$bdd->query("SELECT * FROM logements ORDER BY nombreClick desc");
        		$ligne = $p-> fetch();?>
				<div class="reel">

					<article>
						<div class="tbox1">
				
					<div class="box-style-orange">
						<?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>

						<div class="content">
				
							<div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" id="imgcarousel" /></div>
								
								<h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                <?php $ligne = $p-> fetch();?>
				
							</div>
			
						</div>
		
					</div>						
					</article>
				
					<article>
						<div class="tbox1">
				
					<div class="box-style-orange">
						<?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>

						<div class="content">
				
							<div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" id="imgcarousel" /></div>
								
								<h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $p-> fetch();?>
				
							</div>
			
						</div>
		
					</div>					
					</article>
				
					<article>
						<div class="tbox1">
				
					<div class="box-style-orange">
						<?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>

						<div class="content">
				
							<div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" id="imgcarousel" /></div>
								
								<h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $p-> fetch();?>
				
							</div>
			
						</div>
		
					</div>							
					</article>
				
					<article>
						<div class="tbox1">
				
					<div class="box-style-orange">
						<?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>

						<div class="content">
				
							<div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" id="imgcarousel" /></div>
								
								<h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $p-> fetch();?>
				
							</div>
			
						</div>
		
					</div>						
					</article>
				
					<article>
						<div class="tbox1">
				
					<div class="box-style-orange">
						<?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>

						<div class="content">
				
							<div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" id="imgcarousel" /></div>
								
								<h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $p-> fetch();?>
				
							</div>
			
						</div>
		
					</div>					
					</article>
				
					<article>
						<div class="tbox1">
				
					<div class="box-style-orange">
						<?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>

						<div class="content">
				
							<div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" id="imgcarousel" /></div>
								
								<h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $p-> fetch();?>
				
							</div>
			
						</div>
		
					</div>							
					</article>
			</section>
			</br>
		</div>	
		<div id="footer">

			<?php include("footer.php") ?>

		</div>
		
		<div id="blanket" style="display:none;"></div>
	<div id="popUpDiv" style="display:none;">

		<a href="#" onclick="popup('popUpDiv')" ><img src="cross.svg" width="15px" height="15px" id="boutonsuppr"></a>
		<img src="images/popup.png" id="img-popup" >
		<br/><br/><br/>
		<p>Inscrivez vous sur Home Switch Home, communiquez avec les hôtes, définissez les termes de vos échanges et voyagez !</p>
		<p><a href="faq.php">Cliquez ici pour en savoir plus sur le fonctionnement de Home Switch Home</a></p>
	</div>
	<?php if (!isverified() && isConnected()) { echo ('<script language="JavaScript" type="text/javascript">alert("Votre compte n\' est pas activé.\nVeuillez cliquer sur le lien de validation que vous avez reçu par mail.");</script>');}?>
	
	</body>

</html>