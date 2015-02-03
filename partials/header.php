<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Accueil</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/index.css" />
</head>
<body>
	<header>
		<div id="titre">
			<h1> Pret-a-livrer </h1>
		</div>
		<?php 
			if ($action->isLoggedIn()){
			?>
			<h2>Bonjour <?php echo $action->getPrenomUser() ?></h2>
				<form action="index.php" method="post">
					<button type="submit" name="deconnexion">Deconnexion</button>
				</form>
				<a href="client.php?modif=true">Modifier</a>
			<?php
			}
			else {
			 ?>
		<div id="login">
			<form action="index.php" method="post">
				<div class="label">
					<label for="user"> Nom de client : </label>
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
				<button type="submit" name="entrer">Entrer</button>
			</form>
			<a href="client.php">Nouveau Client</a>
		</div>
		<?php 
			}
			 ?>
		<div class="clearboth"></div>
	</header>
	<div id="menu">
		<ul>
			<li><a href="index.php">Accueil</a></li>
			<li><a href="client.php">Nouveau Client</a></li>
		</ul>
	</div>