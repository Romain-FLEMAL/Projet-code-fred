<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
		exit(); 
	}
?>

<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="../style.css" />
	</head>
	<body>
		<div class="sucess">
		<h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
		<p>C'est votre espace admin.</p>
		<a href="add_user.php">Add user</a> | 
		<a href="update_user.php">Update user</a> | 
		<a href="delete_user.php">Delete user</a> | 
		<a href="../logout.php">Déconnexion</a>
		</ul>
		</div>

		
<div class="box">
		
<h3><a href="../client.php">Voici les clients</a></h3>

		</div>
	</body>
</html>