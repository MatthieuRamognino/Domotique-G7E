<?php
	
	function Connexion(){
			include('variable.php');
			if (crypt($_POST["pass"],$salt)==$Identification['MotDePasse'] AND $_POST['email']==$Identification['AdresseMail']){
				return "verifier";
			}else{
				return "echoue";
			}
	}

	function Sinscrire(){
		require("ConnexionBDD.php");
		$salt="domotique";
		$bdd->exec('INSERT INTO Personnes(Nom,Prenom,DateDeNaissance,Login,MotDePasse,AdresseMail,NumeroDeTelephone) VALUES("'.$_POST['nom'].'","'.$_POST['prenom'].'","'.$_POST['date'].'","'.$_POST['pseudo'].'","'.crypt($_POST['pass'],$salt).'","'.$_POST['email'].'","'.$_POST['Tel'].'") ');

		$bdd->exec('INSERT INTO Domiciles(Rue,CodePostal,Ville,Pays) VALUES("'.$_POST['adresse'].'","'.$_POST['codePostal'].'","'.$_POST['ville'].'","'.$_POST['pays'].'") ');

		include 'variable.php';

		$bdd->exec('INSERT INTO Proprietes VALUES("'.$IdPersonne['IdPersonne'].'","'.$IdDomicile['IdDomicile'].'","1") ');
	}

	function AjouteCapteur(){
		require("ConnexionBDD.php");
		$listCapteur= array("Luminosité","Température","Détecteur de Fumée","Humidité","Capteur de CO2","Capteur de présence");
		$bdd->exec('INSERT INTO Capteurs(IdPiece,Nom,Type) VALUES("'.$_POST['Pieces'].'","'.$listCapteur[$_POST['Capteurs']].'","'.$listCapteur[$_POST['Capteurs']].'") ');
	}

	function AjoutePiece(){
		include 'variable.php';
		
		$bdd->exec('INSERT INTO  Pieces(Nom,IdDomicile) VALUES("'.$_POST['nomPiece'].'","'.$IdDomicile[0].'") ');
		$tr=count($_SESSION['piece']);
		$_SESSION['piece'][$tr]=$_POST['nomPiece'];
		$reponse = $bdd->query('SELECT * FROM Pieces WHERE (Nom="'.$_POST['nomPiece'].'") AND (IdDomicile="'.$_SESSION['domicile'].'")');
		$IdPiece = $reponse->fetch(PDO::FETCH_ASSOC);
		$_SESSION['idPiece'][$tr]=$IdPiece['IdPiece'];
	}

	function SupprimeCapteur($q){
		require("ConnexionBDD.php");
		$req = "DELETE FROM Capteurs WHERE IdCapteur  = '" . $q . "'";
		$bdd->exec($req);
	}

	function SupprimePiece($p){
		session_start();
		require("ConnexionBDD.php");
		$req = "DELETE FROM Pieces WHERE IdPiece  = '" . $p . "'";
		$bdd->exec($req);
		$reponse = $bdd->query('SELECT IdPersonne FROM Personnes WHERE Nom="'.$_SESSION['nom'].'"');
		$Identification = $reponse->fetch(PDO::FETCH_ASSOC);
		$reponse = $bdd->query('SELECT IdDomicile FROM Proprietes WHERE IdPersonne="'.$Identification["IdPersonne"].'"');
		$domicile =$reponse->fetch(PDO::FETCH_ASSOC);
		$reponse = $bdd->query('SELECT * FROM Pieces WHERE IdDomicile="'.$domicile["IdDomicile"].'"');
		$i=0;
		unset($_SESSION['piece']);
		unset($_SESSION['idPiece']);
		foreach  ($reponse as $row) {
			$_SESSION['piece'][$i]=$row['Nom'];
			$_SESSION['idPiece'][$i]=$row['IdPiece'];
			$i++;
		}

	}


?>