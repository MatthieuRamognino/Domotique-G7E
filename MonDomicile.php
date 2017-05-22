<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/APP/Style/Domotique.css">
		<title>Domisep</title>
		<script src=/APP/Modele/monDomicile.js></script>
    </head>

<body>
<?php
	include'Header2.php';
?>

	<section id="secDom">
	<aside class="monDomicile">
		<?php echo '<h1>'. $_SESSION['prenom'] . ' ' . $_SESSION['nom'].'</h1>'; ?>
		<ul>
			<li><a href="MonDomicile.php?cible=ajouteCapteur">Ajouter capteur</a></li>
			<li><a href="MonDomicile.php?cible=supprimeCapteur">Supprimer capteur</a></li>
			<li><a href="MonDomicile.php?cible=ajoutePiece">Ajouter pièce</a></li>
			<li><a href="MonDomicile.php?cible=supprimePiece">Supprimer piece</a></li>
			<li><a href="#">Ajouter domicile</a></li>
		</ul>
	</aside>

	<article class="artDom">
	<div id=divers>
	<?php if(isset($_GET['cible']) AND $_GET['cible']=='inscriptionvalide'){
		echo 'insciption validée';
	}else if(isset($_GET['cible']) AND $_GET['cible']=='ajoutePiece'){
		include('/Applications/XAMPP/xamppfiles/htdocs/APP/Modele/variable.php');
		
		?>
	<form method="POST" action="/APP/Controleur/Connexion.php?cible=ajoutePiece">
		<input type="text" name="nomPiece" placeholder="salon" />
		<input type="submit" value="Ajouter" />
	</form>
	<?php
	}else if(isset($_GET['cible']) AND $_GET['cible']=='ajouterPiece'){
		echo 'Pièce ajoutée';
	}else if(isset($_GET['cible']) AND $_GET['cible']=='ajouteCapteur'){
		include('/Applications/XAMPP/xamppfiles/htdocs/php/App/Matthieu/Git/Modele/variable.php');
		
		?>
		<form method="POST" action="/APP/Controleur/Connexion.php?cible=ajouteCapteur">
			<select name="Pieces">
				<option value="choix">Choix Pièce</option>
				<?php 
				$nb=count($_SESSION['piece']);
				for ($i=0; $i <$nb ; $i++) { 
					echo "<option value=".$_SESSION['idPiece'][$i].">".$_SESSION['piece'][$i]."</option>";
				}
				?>
			</select>
			<select name="Capteurs">
				<option value="choix">Choix Capteur</option>
				<?php 
				$listCapteur= array("Luminosité","Température","Détecteur de Fumée","Humidité","Capteur de CO2","Capteur de présence");
				for ($i=0; $i <6 ; $i++) { 
					echo "<option value=".$i.">".$listCapteur[$i]."</option>";
				}
				?>
			</select>
			<input type="submit" value="Ajouter" />
		</form>
		<?php
	}else if(isset($_GET['cible']) AND $_GET['cible']=='supprimeCapteur'){
				echo "Cliquer sur le capteur à supprimer";
	}else if(isset($_GET['cible']) AND $_GET['cible']=='supprimePiece'){
		echo "Cliquer sur la piece à supprimer";

	}?>
	</div>
	
		<div id="domi">
				
				

				<!--<h2>Salle à manger</h2>
				<div class="piece">
					<div class="capteur">
							<h3>Température</h3>
							<img src="/php/App/Matthieu/Git/Image/temperature.png" alt="Température" class="temperature">
							<span class="description_capteur">30°C</span>								
					</div>

					<div class="capteur">
							<h3>Luminosité</h3>
							<img src="/php/App/Matthieu/Git/Image/luminosite.png" alt="Luminosité" class="luminosite">
							<form>
								<input type="range" class="range">
							</form>			
					</div>

					<div class="capteur">
							<h3>Humidité</h3>
							<img src="/php/App/Matthieu/Git/Image/humidite.png" alt="Humidité" class="humidite">
							<span class="description_capteur">20%</span>	
					</div>							
				</div>-->
		</div>
	</article>
<?php		
$tr=count($_SESSION['piece']);
$j=0;	
for ($i = 0; $i <$tr ; $i++) {?>
<script type="text/javascript">
		var ser='<?php echo $_SESSION['piece'][$i];?>';
		var IdPiece='<?php echo $_SESSION['idPiece'][$i];?>';
		var nb=<?php echo $i;?>;
		monDomicile(ser,IdPiece);
		<?php

		include('/Applications/XAMPP/xamppfiles/htdocs/APP/Modele/ConnexionBDD.php');
		$reponse = $bdd->query('SELECT * FROM Capteurs WHERE IdPiece="'.$_SESSION["idPiece"][$i].'"');

		
		foreach  ($reponse as $row) {
			$Capteur[$j]=$row['Nom'];
			$id=$row['IdCapteur'];
			$donne="N/A";
			$valeurs = $bdd->query('SELECT * FROM Donnees WHERE IdCapteur="'.$id.'"');
			foreach  ($valeurs as $rows) {
				$donne=$rows['Donnee'];
			}

			?>
			var str='<?php echo $Capteur[$j];?>';
			var nbr=<?php echo $j;?>;
			var don='<?php echo $donne;?>';
			var IdCapteur=<?php echo $id;?>;
			afficheCapteur(nb,nbr,str,don,IdCapteur);
			
			<?php
			$j++;
		}?>

		
		
		


</script>
<script type="text/javascript"></script>
<?php

}

if(isset($_GET['cible']) AND $_GET['cible']=='supprimeCapteur'){?>
	<script type="text/javascript">
	var a = document.getElementsByClassName('capteur').length;
	for (var i = 0; i < a; i++) {
		document.getElementsByClassName('capteur')[i].onclick=supprimeCapteur;
	}
	</script>
<?php }

if(isset($_GET['cible']) AND $_GET['cible']=='supprimePiece'){?>
	<script type="text/javascript">
	var a = document.getElementsByClassName('piece').length;
	for (var i = 0; i < a; i++) {
		document.getElementsByClassName('piece')[i].onclick=supprimePiece;
	}
	</script>
<?php }?>

			<!--<div id="piece">
				<div id="capteur">
					<div class="description_capteur">
						<h3>Luminosité</h3>	
					</div>
				</div>
				<div id="capteur">
					<div class="description_capteur">
						<h3>Température</h3>	
					</div>				
				</div>
				<div id="capteur">
					<div class="description_capteur">
						<h3>Humidité</h3>	
					</div>				
				</div>
			</div>-->
	</section>

	<?php include 'Footer.php' ?>
</body>

</html>