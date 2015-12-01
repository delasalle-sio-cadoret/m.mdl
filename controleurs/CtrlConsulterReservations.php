<?php
// Projet Réservations M2L - version web mobile
// Fonction du contrôleur CtrlConsulterReservationsConnecter.php : Consulter les reservations d'un utilisateir
// Ecrit le 24/11/2015 par Arthur
// Ce contrôleur vérifie l'authentification de l'utilisateur
// si l'authentification est bonne, il affiche le menu utilisateur ou administrateur (vue VueMenu.php)
// si l'authentification est incorrecte, il réaffiche la page de connexion (vue VueConnecter.php)
// on teste si le terminal client est sous Android, pour lui proposer de télécharger l'application Android
// tests des variables de session
if ( ! isset ($_SESSION['nom']) == true)  $nom = '';  else  $nom = $_SESSION['nom'];
if ( ! isset ($_SESSION['mdp']) == true)  $mdp = '';  else  $mdp = $_SESSION['mdp'];
if ( ! isset ($_SESSION['niveauUtilisateur']) == true)  $niveauUtilisateur = '';  else  $niveauUtilisateur = $_SESSION['niveauUtilisateur'];
// si l'utilisateur n'est pas encore identifié, il sera automatiquement redirigé vers le contrôleur d'authentification
// (sauf s'il ne peut pas se connecter et demande de se faire envoyer son mot de passe qu'il a oublié)
if ($nom == '' && $action != 'DemanderMdp') header ('Location: index.php?action=Connecter');
// connexion du serveur web à la base MySQL
include_once ('modele/DAO.class.php');
$dao = new DAO();
// mise à jour de la table mrbs_entry_digicode (si besoin) pour créer les digicodes manquants
$dao->creerLesDigicodesManquants();
// récupération des réservations à venir créées par l'utilisateur
$lesReservations = $dao->listeReservations($nom);
$nbReponses = sizeof($lesReservations);
if ($nbReponses == 0) {
	// si le nom n'existe pas, retour à la vue
	$msgFooter = "Erreur : Vous n'avez aucune réservation.";
	$themeFooter = $themeProbleme;
	include_once ('vues/VueConsulterReservations.php');
}
else {
	$msgFooter = "Vous avez " . $nbReponses . " réservation(s).";
	$themeFooter = $themeNormal;
	include_once ('vues/VueConsulterReservations.php');
}
// ferme la connexion à MySQL
unset($dao);
?>