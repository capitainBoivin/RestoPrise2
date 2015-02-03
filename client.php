<?php 
require_once("actions/ClientAction.php");
$action = new ClientAction();
$action->execute();
require_once("partials/header.php");

 ?>
	<div id="main">
		<div id="ajoutClient">
			<?php 
				if (isset($_GET["confirmation"])) {
				 ?>
				<div > * BRAVOOOOOOOOOOOOOOOO *
				</div>
				<?php }
				else {
				 ?>
			<form action="client.php" method="post">
				<div class="label">
					<label for="name"> Nom: </label>
				</div>
				<div class="champ">
					<input id="nom" name="nom" size="45"/>
				</div>
				<div class="label">
					<label for="name"> Prénom: </label>
				</div>
				<div class="champ">
					<input id="prenom" name="prenom" size="45"/>
				</div>
				<div class="label">
					<label for="adress"> Adresse : </label>
				</div>
				<div class="champ">
					<input id="adresse" name="adresse" size="45"/>
				</div>
				<div class="label">
					<label for="tel"> Numero de telephone : </label>
				</div>
				<div class="champ">
					<input id="tel" name="tel" size="25"/>
				</div>
				<div class="label">
					<label for="dateNaissance"> Date de naissance (AAAA-MM-JJ) : </label>
				</div>
				<div class="champ">
					<input id="dateNaissance" name="dateNaissance" size="35"/>
				</div>
				<div class="label">
					<label for="courriel"> Courriel : </label>
				</div>
				<div class="champ">
					<input id="courriel" name="courriel" size="35"/>
				</div>
				<div class="label">
					<label for="mdp"> Mot de passe : </label>
				</div>
				<div class="champ">
					<input id="mdp" name="mdp" size="35"/>
				</div>
				<div class="label">
					<label for="adress"> Répétez votre mot de passe : </label>
				</div>
				<div class="champ">
					<input id="mdp2" name="mdp2" size="35"/>
				</div>
				<button type="submit" id="bAjoutC" name="bAjoutC">Inscrivez-vous!</button>
			</form>
			<?php 
				}
			 ?>
		</div>
	</div>

<?php 
require_once("partials/header.php");
 ?>