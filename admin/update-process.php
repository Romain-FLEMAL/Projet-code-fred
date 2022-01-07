<?php
require('../config.php');
if(count($_POST)>0) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username);
        $_SESSION['username'] = $username;
        $type = stripslashes($_REQUEST['type']);
        $type = mysqli_real_escape_string($conn, $type);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
mysqli_query($conn,"UPDATE `users` SET `username` = '$username', `type` = '$type' , password='".hash('sha256', $password)."' WHERE `users`.`id` = '" . $_POST['id'] . "'");
//echo "UPDATE `users` SET `username` = '$username', `type` = '$type' , password='".hash('sha256', $password)."' WHERE `users`.`id` = '" . $_POST['id'] . "'";
$message = "<div class='sucess'>
<h3>L'utilisateur a été update avec succés.</h3>
<p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
</div>";
}
$result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Employee Data</title>
<link rel="stylesheet" href="../style.css" />
</head>
<body>
<form class="box"  name="frmUser" method="post" action="">
<h1 class="box-logo box-title"><a href="https://waytolearnx.com/">WayToLearnX.com</a></h1>
<h1 class="box-title">Update user</h1>
<div><?php if(isset($message)) { echo $message; } ?>
</div>
id: <br>
<input type="text" name="id" class="box-input" value="<?php echo $row['id']; ?>">
<br>
username: <br>
<input type="text" name="username" class="box-input" value="<?php echo $row['username']; ?>">
<br>
type:<br>
<div class="input-group">
				<select class="box-input" name="type" id="type" >
					<option value="" disabled selected><?php echo $row['type']; ?></option>
					<option value="admin">Admin</option>
					<option value="isr">ISR</option>
					<option value="user">User</option>
					<option value="client">Client</option>
				</select>
		</div>
<br>

<input type="text" name="password" class="box-input"placeholder="Mot de passe">
<br>
<input type="submit" name="submit" value="Update" class="box-button" />

</form>
</body>
</html>