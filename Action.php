<?php
	function AjouteCapteur($bdd){
		$listCapteur= array("Luminosité","Température","Détecteur de Fumée","Humidité","Capteur de CO2","Capteur de présence");
		$bdd->exec('INSERT INTO Capteurs(IdPiece,Nom,Type) VALUES("'.$_POST['Pieces'].'","'.$listCapteur[$_POST['Capteurs']].'","'.$listCapteur[$_POST['Capteurs']].'") ');
	}
?>