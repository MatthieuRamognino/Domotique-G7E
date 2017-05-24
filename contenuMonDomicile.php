
<section id="secDom">
	<aside class="monDomicile">
		<?php echo '<h1>'. $_SESSION['prenom'] . ' ' . $_SESSION['nom'].'</h1>'; ?>
		<ul>
			<li><a href="">Information Générale</a></li>
			<li><a href="">Par type de capteur</a></li>
			<li><a href="">Par pièce</a></li>
			<li><a href="">Consigne</a></li>
			<li><a href="index.php?cible=monDomicile&dom=ajouteCapteur">Ajouter capteur</a></li>
			<li><a href="index.php?cible=monDomicile&dom=supprimeCapteur">Supprimer capteur</a></li>
			<li><a href="index.php?cible=monDomicile&dom=ajoutePiece">Ajouter pièce</a></li>
			<li><a href="index.php?cible=monDomicile&dom=supprimePiece">Supprimer piece</a></li>
			<li><a href="#">Ajouter domicile</a></li>
		</ul>
	</aside>

	<article class="artDom">
	<div id=divers>
	<?php if(isset($_GET['dom']) AND $_GET['dom']=='ajoutePiece'){
		?>
	<form method="POST" action="index.php?cible=monDomicile&dom=ajouterPiece">
		<input type="text" name="nomPiece" placeholder="salon" />
		<input type="submit" value="Ajouter" />
	</form>
	<?php
	}else if(isset($_GET['dom']) AND $_GET['dom']=='ajouterPiece'){
		echo 'Pièce ajoutée';
	}else if(isset($_GET['dom']) AND $_GET['dom']=='ajouteCapteur'){
		
		?>
		<form method="POST" action="index.php?cible=monDomicile&dom=ajouterCapteur">
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
	}else if(isset($_GET['dom']) AND $_GET['dom']=='supprimeCapteur'){
				echo "Cliquer sur le capteur à supprimer";
	}else if(isset($_GET['dom']) AND $_GET['dom']=='supprimePiece'){
		echo "Cliquer sur la piece à supprimer";

	}?>
	</div>
	
		<div id="domi">
				
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

		include('/Applications/XAMPP/xamppfiles/htdocs/APP/Modele/BDD.php');

		$reponse=capteur($bdd,$_SESSION["idPiece"][$i]);
		
		foreach  ($reponse as $row) {
			$Capteur[$j]=$row['Nom'];
			$id=$row['IdCapteur'];
			$donne="N/A";
			
			$valeurs = donnee($bdd,$id);
			
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
<?php
}




if(isset($_GET['dom']) AND $_GET['dom']=='supprimeCapteur'){?>
	<script type="text/javascript">
	var a = document.getElementsByClassName('capteur').length;
	for (var i = 0; i < a; i++) {
		document.getElementsByClassName('capteur')[i].onclick=supprimeCapteur;
	}
	</script>
<?php }

if(isset($_GET['dom']) AND $_GET['dom']=='supprimePiece'){?>
	<script type="text/javascript">
	var a = document.getElementsByClassName('piece').length;
	for (var i = 0; i < a; i++) {
		document.getElementsByClassName('piece')[i].onclick=supprimePiece;
	}
	</script>
<?php }?>

			
</section>