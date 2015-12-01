<?php
	// Projet Réservations M2L - version web mobile
	// Fonction de la vue VueDemanderMdp.php : visualiser la vue de demande d'envoi d'un nouveau mot de passe
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
				<a href="index.php?action=Menu" data-transition="<?php echo $transition2; ?>">Retour Menu</a>
			</div>
			<div data-role="content">
				<h4 style="text-align: center; margin-top: 10px; margin-bottom: 10px;">Créer un Compte utillisateur</h4>
				<form name="form1" id="form1" action="index.php?action=CreerUtilisateur" method="post">
					<div data-role="fieldcontain" class="ui-hide-label">
						<input type="text" name="nom" id="nom" placeholder="Entrez le nom de l'utilisateur"  >
					</div>
					<div data-role="fieldcontain" class="ui-hide-label">
						<input type="email" name="mail" id="mail" placeholder="Entrez l'adresse mail"  >
					</div>
					<h4>Niveau :</h4>
					
					<div data-role="fieldcontain" class="ui-hide-label">
					        <label><input name="niveau" type="radio" value="0">Invité</label>
                            <label><input name="niveau" type="radio" value="1">Utilisateur</label>
                            <label><input name="niveau" type="radio" value="2">Administrateur</label>
					</div>
					<div data-role="fieldcontain" class="ui-hide-label">
						<input type="submit" name="creerUtilisateur" id="creerUtilisateur" value="Créer l'utilisateur">
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