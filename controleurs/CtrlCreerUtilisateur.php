<?php

if ($_SESSION['niveauUtilisateur'] != 'administrateur'){
	
header ('Location: index.php?action=Connecter');
}

else {


	if ( isset ($_POST ["nom"]) == false && isset ($_POST ["niveau"]) == false && isset ($_POST ["mail"]) == false) {
		$nom = '';
		$mail = '';
		$niv = '';
		$msgFooter = 'Créer un utilisateur';
		$themeFooter = $themeNormal;
		include_once ('vues/VueCreerUtilisateur.php');
	}
	else {
	
		if ( empty ($_POST ["nom"]) == true)  $nom = "";  else   $nom = $_POST ["nom"];
		if ( empty ($_POST ["niveau"]) == true)  $niv = "";  else   $niv = $_POST ["niveau"];
		if ( empty ($_POST ["mail"]) == true)  $mail = "";  else   $mail = $_POST ["mail"];
		
		if ($nom == ""|| $niv == ""|| $mail == "") {
			$msgFooter = "Données incomplètes !";
			$themeFooter = $themeProbleme;
			include_once ('vues/VueCreerUtilisateur.php');
		}
		else
		{
			include_once ('modele/DAO.class.php');
			$dao = new DAO();
			include_once ('modele/Outils.class.php');
			
			if ( ! $dao->existeUtilisateur($nom))  {
	
				$mdp = Outils::creerMdp();
				$dao->enregistrerUtilisateur($nom, $niv, $mdp, $mail);
				
				$ADR_MAIL_EMETTEUR = "delasalle.sio.crib@gamil.com";
				$sujet = "Création de votre compte dans le système de réservation de M2L";
				$message = "L'administrateur du système de réservations de la M2L vient de vous créer un compte utilisateur.\n\n";
				$message .= "Les données enregistrées sont :\n\n";
				$message .= "Votre nom : " . $nom . "\n";
				$message .= "Votre mot de passe : " . $password . " (nous vous conseillons de le changer lors de la première connexion)\n";
				$message .= "Votre niveau d'accès (0 : invité    1 : utilisateur    2 : administrateur) : " . $niv . "\n";
				
				$ok = Outils::envoyerMail ($mail, $sujet, $message, $ADR_MAIL_EMETTEUR);
				if ( $ok )
					$msgFooter = "Enregistrement effectué.";
				else
					$msgFooter = "Enregistrement effectué ; l'envoi du mail à l'utilisateur a rencontré un problème.";
				
				$themeFooter = $themeNormal;
				include_once ('vues/VueCreerUtilisateur.php');
				
				
			}else {
				
				$msgFooter = "Cet utilisateur existe déjà.";
				$themeFooter = $themeProbleme;
				include_once ('vues/VueCreerUtilisateur.php');
			}
			unset($dao); 
		}
	}
}
?>