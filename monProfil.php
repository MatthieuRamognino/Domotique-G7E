<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="/APP/Style/monProfil.css"/>
		<link rel="stylesheet" href="/APP/Style/Domotique.css"/>
		<title>Domisep</title>
	</head>

	<body>
	<?php include('header2.php'); ?>

		<section>
			<aside>
				<div id="profil">
					<div class="description_profil">
						<img src="/APP/Image/Matthieu.jpg" alt="Photo de profil" >
						<h1><?php echo ($_SESSION['prenom'] . ' ' . $_SESSION['nom']); ?><h1>
						<p>Adresse domicile 1: <?php echo($_SESSION['rue'] . ' ' . $_SESSION['codePostal'] . ' ' . $_SESSION['ville']); ?> <br/>
						Téléphone portable: 0<?php echo ($_SESSION['telephone']); ?> <br/>
						Date de Naissance: <?php echo ($_SESSION['date']); ?> 
						</p>
						<a href="#C2" class="equiper">Ajouter un domicile</a>
						<a href="#C1" class="equiper">Ajouter un utilisateur à votre domicile</a>
						<a href="/APP/Vue/MonDomicile.php" class="equiper">Ajouter un capteur</a>
					</div>	
				</div>
			</aside>

			<div id="informations">
				<div class="description_informations">
					<h2 id="C2">Domiciles enregistrés</h2>
					<p><?php echo ('Domicile 1 : ' . ' ' . $_SESSION['rue'] . ' ' . $_SESSION['codePostal'] . ' ' . $_SESSION['ville']);?></p>

					<form method="POST" action="">
						<p class="form">
							<label for="Adresse">Adresse : </label><input type="text" name="rue" id="rue" placeholder="Rue" />							
							<input type="text" name="codePostal" placeholder="Code postal" />
							<input type="text" name="ville" id="ville" placeholder="Ville" />
							<input type="text" name="pays" placeholder="Pays" />
							<br/>
							<br/>
							<input type="submit" name="Ajouter" />
						</p>
					</form>	
				</div>
				
				<div class="description_informations">
					<h2 id="C1">Utilisateurs</h2>
					<p>Utilisateurs enregistrés sur votre domicile et ayant le contrôle des capteurs</p>
					<ul>
						<li>Utilisateur1</li>
						<li>Utilisateur2</li>
						<li>Utilisateur3</li>
						<li>Utilisateur4</li>
					</ul>

					<form method="POST" action="">
						<p class="form">
							<label for="Adresse">Adresse : </label>
							<input type="text" name="rue" id="rue" placeholder="Rue" />
							<input type="text" name="codePostal" id="codePostal" placeholder="Code Postal" />
							<input type="text" name="ville" id="ville" placeholder="Ville" />
							<input type="text" name="pays" placeholder="Pays" />
						</p>
					</form>
					<form method="POST" action="">
						<p>
							<label for="prenom">Prénom : </label>
							<input type="text" name="prenom" placeholder="Prenom" />
							<br/>
							<br/>
							<label for="prenom">Nom : </label>
							<input type="text" name="nom" placeholder="Nom" />
							<br/>
							<br/>
							<label for="email">Email : </label>
							<input type="email" name="email" placeholder="Email" />
							<br/>
							<br/>
							<input type="submit" name="Ajouter" />
						</p>
					</form>
				</div>
			</div>
		</section>

		<?php include('footer.php'); ?>
	</body>
</html>