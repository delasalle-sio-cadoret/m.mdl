<?php

	if ( ! isset ($_POST ["nom"]) == true || ! isset ($_POST ["level"]) == true || ! isset ($_POST ["mail"]) == true) {

		$msgFooter = 'Créer un utilisateur';
		$themeFooter = $themeNormal;
		include_once ('vues/VueCreerUtilisateur.php');
		
	}

	if ( empty ($_POST ["nom"]) == true)  $nom = "";  else   $nom = $_POST ["nom"];
	if ( empty ($_POST ["niveau"]) == true)  $niv = "";  else   $niv = $_POST ["niveau"];
	if ( empty ($_POST ["mail"]) == true)  $mail = "";  else   $mail = $_POST ["mail"];
	
	
	if ($nom == ""||$niv == ""||$mail == "") {
	
		$msgFooter = "Données incomplètes !";
		$themeFooter = $themeProbleme;
		include_once ('vues/VueCreerUtilisateur.php');
	
	}else {
	
		include_once ('modele/DAO.class.php');
		$dao = new DAO();
		if ( ! $dao->existeUtilisateur($nom))  {
	
			$msgFooter = "Utilisateur créé !";
			$dao->enregistrerUtilisateur($nom, $niv, $dao->genererUnDigicode(), $mail);
			$themeFooter = $themeNormal;
			include_once ('vues/VueCreerUtilisateur.php');
	
		}else {
	
			$msgFooter = "Cet utilisateur existe déjà.";
			$themeFooter = $themeProbleme;
			include_once ('vues/VueCreerUtilisateur.php');
	
		}
	
		unset($dao);
	
	}
	
?>