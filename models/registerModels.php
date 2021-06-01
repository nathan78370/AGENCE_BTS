<?php

function checkTel($email) {
	global $bdd;
	$requete_check_email = $bdd->prepare("SELECT email FROM users WHERE email = :email");
	$requete_check_email->bindValue(':email', $email, PDO::PARAM_STR);
	$requete_check_email->execute();
	return $requete_check_email->fetch();
}

function insertUser($nom, $prenom, $email, $mdp) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO users (nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)");
	$insertion->bindValue(':nom', $nom, PDO::PARAM_STR);
	$insertion->bindValue(':prenom', $prenom, PDO::PARAM_STR);
	$insertion->bindValue(':email', $email, PDO::PARAM_STR);
	$insertion->bindValue(':mdp', $mdp, PDO::PARAM_STR);
	return $insertion->execute();
}

?>