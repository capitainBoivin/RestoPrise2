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
		  <h2> ** L'ajout a ete fait avec succes!!! **</h2>
		 <?php }
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
						<label for="tel"> Numero de telephone : </label>
					</div>
					<div class="champ">
						<input id="tel" name="tel" size="25"/>
					</div>
					<div class="label">
						<label for="dateNaissance"> Restaurant auquel ce restaurateur est lie : </label>
					</div>
						<select class="combo" name="resto">
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
		} else if ((isset($_GET["supp"]) && isset($_GET["confirmationSupp=true"]))){
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
				<button type="submit" name="entrer">Confirmer la supression</button>
			</form>
		 </div>
		 <div id="gererRestaurateur">
		 	<form action="restaurateur.php" method="post">
				<select class="combo" name="resto">
				<?php 
					for($i=0; $i<count($action->restaurateurs); $i++)
					{	
						echo "<option value=".$action->restaurateurs[$i]["ID_RESTAURATEUR"].">".$action->restaurateurs[$i]["PRENOM"]." ".$action->restaurateurs[$i]["NOM"]."</option>";
					}	
				 ?>
				</select>
				<button type="submit" id="bSupprimerR" name="bAjoutR">Supprimer!</button>
			</form>

		</div>
	<?php 
}
	?>
</div>

<?php 
require_once("partials/footer.php");
 ?>