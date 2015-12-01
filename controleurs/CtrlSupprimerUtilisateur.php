
<?php
// Projet Réservations M2L - version web mobile
// Fonction du contrôleur CtrlAnnulerReservation.php : annulation d'une réservation
// Ecrit le 24/11/2015 par Arthur
// connexion du serveur web à la base Mysql

include_once ('modele/DAO.class.php');
$dao = new DAO();

if ( ! isset ($_POST ["nom"]) == true) {
	// si les données n'ont pas été postées, c'est le premier appel du formulaire : affichage de la vue sans message d'erreur
	$msgFooter = 'Supprimer Utilisateur';
	$themeFooter = $themeNormal;
	include_once ('vues/VueSupprimerUtilisateur.php');
}
else {
	if ( empty ($_POST ["nom"]) == true)  $nom = "";  else   $nom = $_POST ["nom"];
	if ($nom == '') {
		$msgFooter = 'Données incomplètes !';
		$themeFooter = $themeProbleme;
		include_once ('vues/VueSupprimerUtilisateur.php');
	}

	else if ($dao->existeUtilisateur($nom)== false) {
		$msgFooter = 'Nom d\'utilisateur inexistant !';
		$themeFooter = $themeProbleme;
		include_once ('vues/VueSupprimerUtilisateur.php');
	}

	else if ($dao->aPasseDesReservations($nom)) {
    	$msgFooter = 'Cet utilisateur a passé des réservations à venir !';
		$themeFooter = $themeProbleme;
		include_once ('vues/VueSupprimerUtilisateur.php');
	}

	else if (empty($dao->supprimerUtilisateur($nom))) {
		$msgFooter = 'Problème lors de la suppression de l\'utilisateur !';
		$themeFooter = $themeProbleme;
		include_once ('vues/VueSupprimerUtilisateur.php');

	}
	else 
	{   $msgFooter = 'Utilisateur Supprimé';
		$themeFooter = $themeNormal;
		include_once ('vues/VueSupprimerUtilisateur.php');   
	}
}
?>

