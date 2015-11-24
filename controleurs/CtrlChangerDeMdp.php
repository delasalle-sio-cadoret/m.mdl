<?php
// Projet Réservations M2L - version web mobile
// Fonction du contrôleur CtrlAnnulerReservation.php : Consulter les reservations d'un utilisateir
// Ecrit le 03/11/2015 par Jim

// Ce contrôleur vérifie l'authentification de l'utilisateur
// si l'authentification est bonne, il affiche le menu utilisateur ou administrateur (vue VueMenu.php)
// si l'authentification est incorrecte, il réaffiche la page de connexion (vue VueConnecter.php)

// on teste si le terminal client est sous Android, pour lui proposer de télécharger l'application Android
// tests des variables de session
if ( $_SESSION['niveauUtilisateur'] != 'utilisateur' & $_SESSION['niveauUtilisateur'] != 'administrateur') {
	header ('Location: index.php?action=Connecter');
}
else {
	
	if ( empty ($_POST ["nouveauMdp"]) == true)  $nouveauMdp = ""; else $nouveauMdp = $_POST["nouveauMdp"];
	if ( empty ($_POST ["confirmationMdp"]) == true)  $confirmationMdp = ""; else $confirmationMdp = $_POST["confirmationMdp"];
		
	if ($nouveauMdp == "" || $confirmationMdp == "") {
		// si les données sont incomplètes, réaffichage de la vue avec un message explicatif
		$msgFooter = 'Données incomplètes';
		$themeFooter = $themeProbleme;
		include_once ('vues/VueChangerDeMdp.php');
	}
	else {
		if ( $nouveauMdp != $confirmationMdp)
		{	
			$msgFooter = "Le nouveau mot de passe et sa confirmation sont différents !";
			$themeFooter = $themeProbleme;
			include_once ('vues/VueChangerDeMdp.php');
		}
		else {
			// supprime la réservation dans la base de données
			// connexion du serveur web à la base MySQL
			include_once ('modele/DAO.class.php');
			$dao = new DAO();
			
			$dao->modifierMdpUser($nom, $nouveauMdp);

			// envoie un mail de confirmation de l'enregistrement
			$ok = $dao->envoyerMdp ($nom, $nouveauMdp);
			unset($dao);
			if ( $ok )
			{
				$msgFooter = "Enregistrement effectué ; vous allez recevoir un mail de confirmation";
				$themeFooter = $themeNormal;
				include_once ('vues/VueChangerDeMdp.php');
			}
			else
			{
				$msgFooter = "Enregistrement effectué ; l'envoi du mail de confirmation a rencontré un problème";
				$themeFooter = $themeNormal;
				include_once ('vues/VueChangerDeMdp.php');
			}
		}
	}
}
?>
