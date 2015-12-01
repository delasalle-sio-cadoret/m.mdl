<?php
// Projet Réservations M2L - version web mobile
// Fonction de la vue VueDemanderMdp.php : visualiser la vue de demande d'envoi d'un nouveau mot de passe
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
				<h4 style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Consulter mes réservations</h4>
					<?php foreach($lesReservations as $res){ ?>
					<ul data-role="listview" data-inset="true">
						<li>
						<h5>Réservation n°<?php echo $res->getId()?></h5>
						<p>Passée le <?php echo $res->getTimestamp()?></p>
						<p>Début : <?php echo utf8_encode(date('Y-m-d H:i:s', $res->getStart_time()))?></p>
						<p>Fin : <?php echo utf8_encode(date('Y-m-d H:i:s', $res->getEnd_time()))?></p>
						<p>Salle : <?php echo $res->getRoom_name()?></p>
						<p>Etat <?php if($res->getStatus()==4)echo "En attente"; else echo "Confirmée"?></p>
						<h5 class="ui-li-aside">Digicode <?php echo $res->getDigicode() ?></h5>
						</li>
					</ul>
					<?php } ?>
				
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