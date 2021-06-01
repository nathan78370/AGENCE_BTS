<?php

require('models/registerModels.php');

if (isset($_POST['inscription'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$mdp = sha1($_POST['mdp']);
	if ($nom != "" && $prenom != "" && $email != "" && $mdp != "") {
		$requete_check_email = checkTel($email);
		if (!$requete_check_email) {
			$insertion = insertUser($nom, $prenom, $email, $mdp);
			header('Location: register');
		} else {
			Alerts::setFlash("Cette adresse email est déjà utilisée !", "danger");
		}
	} else {
		Alerts::setFlash("Veuillez compléter tous les champs !", "warning");
	}
}

require('views/register.php');

?>