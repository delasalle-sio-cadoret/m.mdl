<?php
	// Projet Réservations M2L - version web mobile
	// Fonction de la vue VueChangerDeMdp.php : visualiser la vue de demande d'envoi d'un nouveau mot de passe
// Ecrit le 24/11/2015 par Arthur
?>
<!doctype html>
<html>
	<head>
		<?php include_once ('vues/head.php'); ?>
	</head> 
	<body>
		<div data-role="page">
			<div data-role="header" data-theme="<?php echo $themeNormal; ?>">
				<h4>M2L-GRR</h4>
				<a href="index.php?action=Menu">Retour menu</a>
			</div>
			<div data-role="content">
				<h4 style="text-align: center; margin-top: 10px; margin-bottom: 10px;">Changer mon mot de passe</h4>
				<form name="form1" id="form1" action="index.php?action=ChangerDeMdp" method="post">
					<div data-role="fieldcontain" class="ui-hide-label">
						<label for="nouveauMdp">nouveauMdp :</label>
						<input type="text" name="nouveauMdp" id="nouveauMdp" placeholder="Entrez votre nouveau mot de passe" value="" >
					</div>
					<div data-role="fieldcontain" class="ui-hide-label">
						<label for="motDePasseConfirmer">confirmationMdp :</label>
						<input type="text" name="confirmationMdp" id="confirmationMdp" placeholder="Confirmez votre nouveau mot de passe" value="" >
					</div>

					<div data-role="fieldcontain">
						<input type="submit" name="btnChangeMdp" id="btnChangeMdp" value="Changer mon mot de passe">
					</div>
				</form>
				
				<?php if($debug == true) {
					// en mise au point, on peut afficher certaines variables dans la page
					echo "<p>SESSION['nom'] = " . $_SESSION['nom'] . "</p>";
					echo "<p>SESSION['mdp'] = " . $_SESSION['mdp'] . "</p>";
					echo "<p>SESSION['niveauUtilisateur'] = " . $_SESSION['niveauUtilisateur'] . "</p>";
				} ?>
			</div>
			<div data-role="footer" data-position="fixed" data-theme="<?php echo $themeFooter; ?>">
				<h4><?php echo $msgFooter; ?></h4>
			</div>
		</div>
	</body>
</html>