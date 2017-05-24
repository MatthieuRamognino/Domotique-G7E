
<body>
	<section>
		<aside class="box">
			<div id="box_connexion">
				<h1>Se connecter</h1>
				<div class="formulaire_connexion">

					<br/>
					<form method="POST" action="index.php?cible=verif">
						<table>
							   <tr>
							       <td><label for="email">E-mail :</label></td>
							       <td><input type="email" name="email" id="email" /></td>
							   </tr>
							   <tr>
							       <td><label for="pass">Mot de passe :</label></td>
							       <td><input type="password" name="pass" id="pass" /></td>
							   </tr>
							    <tr>
							       <td><input type="submit" value="Se connecter" /></td>
							   </tr>
						</table>
					</form>
				</div>
			</div>

			<div id="box_connexion">
				<h1>S'inscrire</h1>
				<div class="formulaire_connexion">
					<br/>
					<form method="POST" action="index.php?cible=inscrire">
						<table>
							    <tr>
							        <td><label for="nom">Nom : </label></td>
							        <td><input type="text" name="nom"></td>
							    </tr>
							    <tr>
							        <td><label for="prenom">Prénom : </label></td>
							        <td><input type="text" name="prenom"></td>
							    </tr>
							    <tr>
							        <td><label for="email">E-mail : </label></td>
							        <td><input type="email" name="email" id="email" /></td>
							    </tr>
							    <tr>
							   	    <td><label for="Adresse">Adresse : </label></td>
							        <td><input type="text" name="adresse" id="rue" placeholder="Rue" /></td>
							    </tr>
							    <tr>
							        <td></td>
							        <td><input type=text required name="codePostal" placeholder="Code postal" /><input type="text" name="ville" placeholder="ville" /></td>
							    </tr>
							    <tr>
							    	<td></td>
							        <td><input type="text" name="pays" placeholder="France" /></td>
							    </tr>
							    <tr>
							        <td><label for="date_de_naissance">Date de naissance : </label></td>
							        <td><input type="date" name="date" placeholder="1995/07/26" /></td>
							    </tr>
							    <tr>
							        <td><label for="Tel">Numéro de Télephone : </label></td>
							        <td><input type="text" name="Tel" id="Tel" placeholder="06000000" /></td>
							    </tr>
							    <tr>
							        <td><label for="pass">Mot de passe : </label></td>
							        <td><input type="password" name="pass" id="pass" /></td>
							    </tr>
							    <tr>
							       <td><input type="submit" value="S'inscrire" /></td>
							   </tr>
							</table>
					</form>
				</div>
			</div>
		</aside>
	</section>
</body>