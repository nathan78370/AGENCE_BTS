<?php

require('models/logementsModels.php');

if (isset($_POST['submit'])) {
	$adresse = $_POST['adresse'];
	$ville = $_POST['ville'];
	$nbPieces = $_POST['nbPieces'];
	$surface = $_POST['surface'];
	$prix = $_POST['prix'];
	if ($adresse != "" && $ville != "" && $nbPieces != "" && $surface != "" && $prix != "") {
		$insertion = insertLogement($adresse, $ville, $nbPieces, $surface, $prix);
		header('Location: logements');
	}
}

require('views/logements.php');

?>