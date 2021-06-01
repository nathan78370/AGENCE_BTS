<?php

function insertLogement($adresse, $ville, $nbPieces, $surface, $prix) {
	global $bdd;
	$insetion = $bdd->prepare("INSERT INTO logement (adresse, ville, nbPieces, surface, prix) VALUES (:adresse, :ville, :nbPieces, :surface, :prix)");
	$insetion->bindValue(':adresse', $adresse, PDO::PARAM_STR);
	$insetion->bindValue(':ville', $ville, PDO::PARAM_STR);
	$insetion->bindValue(':nbPieces', $nbPieces, PDO::PARAM_INT);
	$insetion->bindValue(':surface', $surface, PDO::PARAM_INT);
	$insetion->bindValue(':prix', $prix, PDO::PARAM_INT);
	return $insetion->execute();
}

?>