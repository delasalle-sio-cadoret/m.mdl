<?php
	// Projet Réservations M2L - version web mobile
	// Fonction de la vue VueConfirmerReservation.php : visualiser la vue de demande d'envoi d'un nouveau mot de passe
	// Ecrit le 12/10/2015 par Jim
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
				<a href="index.php?action=Menu" data-transition="<?php echo $transition2; ?>">Retour menu</a>
			</div>
			<div data-role="content">
				<h4 style="text-align: center; margin-top: 10px; margin-bottom: 10px;">Confirmer une réservation</h4>
				<form name="form1" id="form1" action="index.php?action=ConfirmerReservation" method="post">
					<div data-role="fieldcontain" class="ui-hide-label">
						<label for="numReservation">Numéro de réservation :</label>
						<input type="number" name="numReservation" id="numReservation" placeholder="Entrez le numéro de réservation" value="" >
					</div>

					<div data-role="fieldcontain">
						<input type="submit" name="btnConfirmerReservation" id="btnConfirmerReservation" value="Confirmer la réservation">
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