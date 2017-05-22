<?php 
	
    
	$salt="domotique";

	

	
	if ($_GET['cible']=='deconnexion'){
		session_destroy();
		header ('location: /APP/Controleur/Domotique.php?cible=deconnecter');


	}else if ($_GET['cible']=='verif'){
		include('/Applications/XAMPP/xamppfiles/htdocs/APP/Modele/Action.php');
		$verif=Connexion();
		if ($verif=='verifier'){
			session_start ();
			SessionInit();
			header ('location: /APP/Vue/MonDomicile.php');
		}else {
			header ('location: Domotique.php?cible=echoue');
		}



	}else if ($_GET['cible']=='inscrire' AND $_POST['pass']!=""){
		include('/Applications/XAMPP/xamppfiles/htdocs/APP/Modele/Action.php');
		Sinscrire();
		session_start ();
		SessionInit();
		header ('location:/APP/Vue/MonDomicile.php?cible=inscriptionvalide');




	}else if($_GET['cible']=='ajouteCapteur'){
		include('/Applications/XAMPP/xamppfiles/htdocs/APP/Modele/Action.php');
		AjouteCapteur();
		header('location: /php/App/Matthieu/Git/Vue/MonDomicile.php');




	}else if($_GET['cible']=='ajoutePiece'){

		session_start ();
		include('//Applications/XAMPP/xamppfiles/htdocs/APP/Modele/Action.php');
		AjoutePiece();

		header ('location: /APP/Vue/MonDomicile.php?cible=ajouterPiece');



	}else if(isset($_GET['q'])){
		include('/APP/Modele/Action.php');
		SupprimeCapteur($_GET["q"]);

		
	}else if(isset($_GET['r'])){
		include('/APP/Modele/Action.php');
		SupprimePiece($_GET['r']);

		
	}else if($_GET['cible']=='inscrire'){
		header ('location: /APP/Controleur/Domotique.php?cible=inscriptionrate');
	}else{
		header ('location: /APP/Controleur/Domotique.php?cible=nonConnecter');
	}




	function SessionInit(){
				include '/Applications/XAMPP/xamppfiles/htdocs/APP/Modele/variable.php';
				$_SESSION['email']=$Identification['AdresseMail'];
				$_SESSION['pass']=$Identification['MotDePasse'];
				$_SESSION['nom']=$Identification['Nom'];
				$_SESSION['prenom']=$Identification['Prenom'];
				$_SESSION['domicile']=$domicile['IdDomicile'];
				$_SESSION['piece']=$piece;
				$_SESSION['idPiece']=$idPiece;
				$_SESSION['rue']=$Adresse['Rue'];
				$_SESSION['codePostal']=$Adresse['CodePostal'];
				$_SESSION['ville']=$Adresse['Ville'];
				$_SESSION['telephone']=$Identification['NumeroDeTelephone'];
				$_SESSION['date']=$Identification['DateDeNaissance'];
	}
	
	//$bdd->exec('DELETE FROM Personnes WHERE IdPersonne>0');
	//$bdd->exec('DELETE FROM Domiciles WHERE IdDomicile>0');
	//$bdd->exec('INSERT INTO Donnees(Date,IdCapteur,Donnee) VALUES("2010-04-02 15:28:22",1,"19°C") ');
?>