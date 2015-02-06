<?php 
require_once("actions/ClientAction.php");
$action = new ClientAction();
$action->execute();
require_once("partials/header.php");

 ?>
	<div id="main">
		<div id="ajoutClient">
				<?php 
				if (isset($_GET["modif"])) {
					//var_dump($action->client);
				 ?>
					<form action="client.php" method="post">
						<div class="label">
							<label for="name"> Nom: <div class="fourn"> <?php echo $action->client[0]['NOM'] ?></div> </label>
						</div>
						<div class="label">
							<label for="name"> Prenom: <div class="fourn"> <?php echo $action->client[0]['PRENOM'] ?></div> </label>
						</div>
						<div class="label">
							<label for="adress"> Adresse : </label>
						</div>
						<div class="champ">
							<input id="adresse" name="adresse" size="45" value="<?php echo $action->client[0]['ADRESSE'] ?>"/>
						</div>
						<div class="label">
							<label for="tel"> Numero de telephone : </label>
						</div>
						<div class="champ">
							<input id="tel" name="tel" size="25"/ value="<?php echo $action->client[0]['TELEPHONE'] ?>">
						</div>
						<div class="label">
							<label for="name"> Date de naissance: <div class="fourn"> <?php echo $action->client[0]['DATENAISSANCE'] ?></div> </label>
						</div>
						<div class="label">
							<label for="name"> Date de naissance: <div class="fourn"> <?php echo $action->client[0]['COURRIEL'] ?></div> </label>
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
						<button type="submit" id="bModifC" name="bModifC">Modifier le profil</button>
					</form>
				<?php }
				else
				if (isset($_GET["confirmation"])) {
				 ?>
				<div > * Voici vos informations de compte *
				</div>
				<div class="label">
					<label for="name"> Nom: <div class="fourn"> <?php echo $action->client[0]['NOM'] ?></div> </label>
				</div>
				<div class="label">
					<label for="name"> Prenom: <div class="fourn"> <?php echo $action->client[0]['PRENOM'] ?></div> </label>
				</div>
				<div class="label">
					<label for="name"> Adresse: <div class="fourn"> <?php echo $action->client[0]['ADRESSE'] ?></div> </label>
				</div>
				<div class="label">
					<label for="name"> Numero de telephone: <div class="fourn"> <?php echo $action->client[0]['TELEPHONE'] ?></div> </label>
				</div>
				<div class="label">
					<label for="name"> Date de naissance: <div class="fourn"> <?php echo $action->client[0]['DATENAISSANCE'] ?></div> </label>
				</div>
				<div class="label">
					<label for="name"> Date de naissance: <div class="fourn"> <?php echo $action->client[0]['COURRIEL'] ?></div> </label>
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
					<select class="combo" name="annee">
					<?php 
						for($i=1940; $i<2000; $i++)
						{	
							echo "<option value=".$i.">".$i."</option>";
						}	
					 ?>
					</select>
					<select class="combo" name="mois">
					<?php 
						for($i=1; $i<13; $i++)
						{	
							echo "<option value=".$i.">".$i."</option>";
						}	
					 ?>
					</select>
					<select class="combo" name="jour">
					<?php 
						for($i=1; $i<32; $i++)
						{	
							echo "<option value=".$i.">".$i."</option>";
						}	
					 ?>
					</select>
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