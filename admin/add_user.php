<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css" />
</head>
<body>
<?php
require('../config.php');

if (isset($_REQUEST['username'], $_REQUEST['type'], $_REQUEST['password'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username); 
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
	// récupérer le type (user | admin)
		$type = stripslashes($_REQUEST['type']);
		$type = mysqli_real_escape_string($conn, $type);
		$query = "INSERT into `users` (username, type, password)
					VALUES ('$username', '$type', '".hash('sha256', $password)."')";
		$res = mysqli_query($conn, $query);

		if($res){
		echo "<div class='sucess'>
				<h3>L'utilisateur a été créée avec succés.</h3>
				<p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
				</div>";
		}
	}else{
	?>
	<form class="box" action="" method="post">
		<h1 class="box-logo box-title"><a href="https://waytolearnx.com/">WayToLearnX.com</a></h1>
		<h1 class="box-title">Add user</h1>
		<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
		<div class="input-group">
				<select class="box-input" name="type" id="type" >
					<option value="" disabled selected>Type</option>
					<option value="admin">Admin</option>
					<option value="isr">ISR</option>
					<option value="user">User</option>
					<option value="client">Client</option>
				</select>
		</div>
		<input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
		<input type="submit" name="submit" value="+ Add" class="box-button" />
	</form>
	<?php } ?>
	</body>
	</html>