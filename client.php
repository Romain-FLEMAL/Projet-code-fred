<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
		exit(); 
	}
	if(isset($_SESSION["username"])){
		require('config.php');
	
		$result = mysqli_query($conn,"SELECT * FROM client");
	}
?>

<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="style.css" />
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
		<?php
if (mysqli_num_rows($result) > 0) {
?>
<h3>Voici les clients</h3>
<table>
	  <tr>
	    <td>Id</td>
		<td>Nom</td>
		<td>Contact</td>
		
	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
	    <td><?php echo $row["id_client"]; ?></td>
		<td><?php echo $row["Nom"]; ?></td>
		<td><?php echo $row["contact"]; ?></td>
		<td><a href="site.php?id=<?php echo $row["id_client"]; ?>">Show Site</a></td>
      </tr>
			<?php
			$i++;
			}
			?>
</table>
 <?php
}
else
{
    echo "No result found";
}
?>
		</div>
	</body>
</html>