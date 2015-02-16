<?php 
require_once("actions/RestaurateurAction.php");
$action = new RestaurateurAction();
$action->execute();
require_once("partials/header.php");

 ?>
	<div id="main">
		 
		 <a href="restaurateur.php?ajout=true">Ajouter un restaurateur</a>
		 <a href="restaurateur.php?gerer=true">Gerer les restaurateurs</a>
		 <a href="restaurateur.php?supp=true">Supprimer un restaurateur</a>			 
		 <?php 
		 	if (isset($_GET["confirmationAjout"])){
		  ?>
		  <h2> ** L'ajout a été fait avec succès!!! **</h2>
		 <?php
		  }
		 if (isset($_GET["ajout"])){
		  ?>
			<div id="ajoutRestaurateur">
				<form action="restaurateur.php" method="post">
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
						<label for="tel"> Numéro de téléphone : </label>
					</div>
					<div class="champ">
						<input id="tel" name="tel" size="25"/>
					</div>
					<div class="label">
						<label for="dateNaissance"> Restaurant auquel ce restaurateur est lie : </label>
					</div>
						<select class="combo" name="resto">
							<option value=""> </option>
						<?php 
							for($i=0; $i<count($action->restaurants); $i++)
							{	
								echo "<option value=".$action->restaurants[$i]["ID_RESTAURANT"].">".$action->restaurants[$i]["NOM"]."</option>";
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
					<button type="submit" id="bAjoutR" name="bAjoutR">Ajoutez!</button>
				</form>
			</div>
		 <?php 
		} 
		if (isset($_GET["supp"])){
		 ?>
		 <div id="gererRestaurateur">
		 	<form action="restaurateur.php" method="post">
				<select class="combo" name="restaurateurid">
				<?php 
					for($i=0; $i<count($action->restaurateurs); $i++)
					{	
						echo "<option value=".$action->restaurateurs[$i]["ID_RESTAURATEUR"].">".$action->restaurateurs[$i]["PRENOM"]." ".$action->restaurateurs[$i]["NOM"]."</option>";
					}	
				 ?>
				</select>
				<button type="submit" id="bSupprimerR" name="bSupprimerR">Supprimer!</button>
			</form>
		</div>
		<?php 
			if (isset($_GET["confirmationSupp"])){
			 ?>
		 <div>
		 	<form action="restaurateur.php" method="post">
				<div class="label">
					<label for="user"> Confirmer votre nom : </label>
				</div>
				<div class="champ">
					<input type="text" id="username" name="name"/>
				</div>
				<div class="label">
					<label for="password"> Mot de passe : </label>
				</div>
				<div class="champ">
					<input type="password" id="pwd" name="pwd" />
				</div>
				<button type="submit" value="<?php echo $_GET["confirmationSupp"] ?>" name="bConfirmerSupp">Confirmer la supression</button>
			</form>
		 </div>
		<?php 
		}
	}
	if (isset($_GET["suppExec"])){
	?>
	<h2> ** La suppresion a été faite avec succès!! </h2>
	<?php
	 }
	if (isset($_GET["gerer"])){
		?>
		 <div id="gererRestaurateur">
		 	<form action="restaurateur.php" method="post">
				<select class="combo" name="restaurateurid">
				<?php 
					for($i=0; $i<count($action->restaurateurs); $i++)
					{	
						echo "<option value=".$action->restaurateurs[$i]["ID_RESTAURATEUR"].">".$action->restaurateurs[$i]["PRENOM"]." ".$action->restaurateurs[$i]["NOM"]."</option>";
					}	
				 ?>
				</select>
				<button type="submit" name="bGererR">Modifier!</button>
			</form>
		</div>
	<?php
}
		if (isset($_GET["confirmerModif"])){
		?>
		<form action="restaurateur.php" method="post">
					<div class="label">
						<label for="name"> Nom: </label>
					</div>
					<div class="label">
						<label for="name"> <?php echo $action->restaurateur['NOM'] ?> </label>
					</div>
					<div class="label">
						<label for="name"> Prénom: </label>
					</div>
					<div class="label">
						<label for="name">  <?php echo $action->restaurateur['PRENOM'] ?> </label>
					</div>
					<div class="label">
						<label for="tel"> Numéro de téléphone : </label>
					</div>
					<div class="label">
						<label for="tel"> <?php echo $action->restaurateur['TELEPHONE'] ?> </label>
					</div>
					<div class="label">
						<label for="dateNaissance"> Restaurant auquel ce restaurateur est lié : </label>
					</div>
						<select class="combo" name="resto">
						<?php 
							for($i=0; $i<count($action->restaurants); $i++)
							{	
								if ($action->restaurants[$i]["ID_RESTAURANT"] == $action->restaurateur['ID_RESTAURANT'] ){
									echo "<option value=".$action->restaurants[$i]["ID_RESTAURANT"]." selected='selected'>".$action->restaurants[$i]["NOM"]."</option>";
								}
								else {
									echo "<option value=".$action->restaurants[$i]["ID_RESTAURANT"].">".$action->restaurants[$i]["NOM"]."</option>";
								}
							}	
						 ?>
						</select>
					<div class="label">
						<label for="courriel"> Courriel : </label>
					</div>
					<div class="label">
						<label for="courriel"><?php echo $action->restaurateur['COURRIEL'] ?> </label>
					</div>
					<div class="label">
						<label for="user"> Confirmer votre nom : </label>
					</div>
					<div class="champ">
						<input type="text" id="username" name="name"/>
					</div>
					<div class="label">
						<label for="password"> Mot de passe : </label>
					</div>
					<div class="champ">
						<input type="password" id="pwd" name="pwd" />
					</div>
					<button type="submit" value="<?php echo $_GET["confirmerModif"] ?>" name="bConfirmerModif">Confirmer la modification</button>
					</form>
			<?php
			}
	else if (isset($_GET["modif"])){
		?>
		<form action="restaurateur.php" method="post">
					<div class="label">
						<label for="name"> Nom: </label>
					</div>
					<div class="label">
						<label for="name"> <?php echo $action->restaurateur['NOM'] ?> </label>
					</div>
					<div class="label">
						<label for="name"> Prénom: </label>
					</div>
					<div class="label">
						<label for="name">  <?php echo $action->restaurateur['PRENOM'] ?> </label>
					</div>
					<div class="label">
						<label for="tel"> Numéro de téléphone : </label>
					</div>
					<div class="champ">
						<input id="tel" name="tel" size="25" value="<?php echo $action->restaurateur['TELEPHONE'] ?>"/>
					</div>
					<div class="label">
						<label for="dateNaissance"> Restaurant auquel ce restaurateur est lié : </label>
					</div>
						<select class="combo" name="resto">
						<option value="" selected='selected'></option>
						<?php 
							for($i=0; $i<count($action->restaurants); $i++)
							{	

								if ($action->restaurants[$i]["ID_RESTAURANT"] == $action->restaurateur['ID_RESTAURANT'] ){
									echo "<option value=".$action->restaurants[$i]["ID_RESTAURANT"]." selected='selected'>".$action->restaurants[$i]["NOM"]."</option>";
								}
								else {
									echo "<option value=".$action->restaurants[$i]["ID_RESTAURANT"].">".$action->restaurants[$i]["NOM"]."</option>";
								}
							}	
						 ?>
						</select>
					<div class="label">
						<label for="courriel"> Courriel : </label>
					</div>
					<div class="champ">
						<input id="courriel" name="courriel" size="35" value="<?php echo $action->restaurateur['COURRIEL'] ?>" />
					</div>
					<button type="submit" id="bAjoutR" name="bModifierR" value="<?php echo $action->restaurateur['ID_RESTAURATEUR'] ?>" >Modifier!</button>
				</form>
			<?php
			}
			else if (isset($_GET["modifDone"])){
				?>
				<h2> *** La modification a été complétée avec succès ***</h2>
				<?php 
			}
			?>

</div>

	<?php 
require_once("partials/footer.php");
 ?>