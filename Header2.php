<header id="header2">
	<div id="conteneur">
		<a href="MonDomicile.php"><img class="logo" src="/APP/Image/logo.png" alt="logo"/></a>
		<div class="nom">
			G7 Entreprise
		</div>
	</div>

	<form>
		<input type="text" name="search" placeholder="Rechercher..." class="rechercher">
	</form>

	<nav class="head2">
		<ul>
			<li>
				<div class="dropdown" id="pres">
					<a href="CeMAC.php?cible=CeMAC">Accueil</a>
					<div class="dropdown-content">
						<a href="CeMAC.php?cible=CeMAC">CeMAC</a>
						<a href="QuiSommesNous.php?cible=QuiSommesNous">Qui sommes-nous ?</a>
					</div>
				</div>
			</li>

			<li><a href="contact.php?cible=contact">Contact</a></li>

			<li>
				<div class="dropdown">
					<a href="monDomicile.php?cible=monDomicile">Mon domicile</a>
					<div class="dropdown-content">
						<a href="#">Domicile</a>
						<a href="#">Pièces</a>
						<a href="#">Capteurs</a>
					</div>
				</div>
			</li>
			<li>
				<div class="dropdown">
					<a href="monProfil.php?cible=profil">Mon Profil</a>
					<div class="dropdown-content">
						<a href="#">Paramètres</a>
						<a href="/APP/Controleur/Connexion.php?cible=deconnexion">Déconnexion</a>
					</div>
				</div>
			</li>
		</ul>
	</nav>
</header>