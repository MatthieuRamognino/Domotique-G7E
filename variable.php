<?php

require("ConnexionBDD.php");


if(isset($_POST['pass']) AND isset($_POST['email']) AND isset($_POST['adresse'])){ // Inscription
$reponse = $bdd->query('SELECT IdDomicile FROM Domiciles WHERE (Rue="'.$_POST["adresse"].'") AND (Ville="'.$_POST["ville"].'")');
$IdDomicile = $reponse->fetch(PDO::FETCH_ASSOC);

$reponse = $bdd->query('SELECT IdPersonne FROM Personnes WHERE (Nom="'.$_POST["nom"].'") AND (Prenom="'.$_POST["prenom"].'")');
$IdPersonne = $reponse->fetch(PDO::FETCH_ASSOC);
}


if(isset($_POST['pass']) AND isset($_POST['email'])){ // Identification
	$salt="domotique";
	$reponse = $bdd->query('SELECT * FROM Personnes WHERE MotDePasse="'.crypt($_POST["pass"],$salt).'"');
	$Identification = $reponse->fetch(PDO::FETCH_ASSOC);
	$reponse = $bdd->query('SELECT IdDomicile FROM Proprietes WHERE IdPersonne="'.$Identification["IdPersonne"].'"');
	$domicile =$reponse->fetch(PDO::FETCH_ASSOC);
	$reponse = $bdd->query('SELECT * FROM Domiciles WHERE IdDomicile="'.$domicile["IdDomicile"].'"');
	$Adresse =$reponse->fetch(PDO::FETCH_ASSOC);
	$reponse = $bdd->query('SELECT * FROM Pieces WHERE IdDomicile="'.$domicile["IdDomicile"].'"');
	$i=0;
	foreach  ($reponse as $row) {
		$piece[$i]=$row['Nom'];
		$idPiece[$i]=$row['IdPiece'];
		$i++;
	}

}


else if(isset($_POST['nomPiece'])){ // Ajoute pièce
	$reponse = $bdd->query('SELECT IdPersonne FROM Personnes WHERE (Nom="'.$_SESSION['nom'].'") AND (Prenom="'.$_SESSION['prenom'].'")');
	$IdPersonne = $reponse->fetch(PDO::FETCH_ASSOC);
	$reponse = $bdd->query('SELECT IdDomicile FROM Proprietes WHERE IdPersonne="'.$IdPersonne["IdPersonne"].'"');
	$i=0;
	foreach  ($reponse as $row) {
		$IdDomicile[$i]=$row['IdDomicile'];
		$i++;
	}
}else{
	
}


?>