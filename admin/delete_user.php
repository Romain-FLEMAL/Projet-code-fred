    <?php
    require("../classe/user.php");
    ?>

    <!DOCTYPE html>
    <html>

    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>

    <div class="container">
    <!-- liste deroulante pour les users-->

    <?php

    try {
        $base = new PDO('mysql:host=localhost; dbname=registration', 'root', '');
        $DonneeBruteUser = $base->query("SELECT * from users");
        $TabPersoIndex = 0;
        while ($tab = $DonneeBruteUser->fetch()) {
            //ici on creer nos objets User pour chaque tuple de notre requête
            //et on les places dans un tableau de Personnage
            $TabPerso[$TabPersoIndex++] = new user($tab['id'], $tab['username'],$tab['type'],$tab['password']);
        }
    } catch (exception $e) {
        $e->getMessage();
    }
    ?>
    <?php
    if (isset($_POST["username"])) {
        //recherche de l'id dans le tableau de personnage
        foreach ($_POST['username'] as $iduser) {
            $DonneeBruteUser = $base->query("DELETE FROM users WHERE id = $iduser");
            $i = 0;
            foreach ($TabPerso as $objetPerso) {
                if ($objetPerso->getIdUser() == $iduser) {
                    $objetPerso->supprimerUser();
                }
            }
        }
        if($DonneeBruteUser){
            echo "<div class='sucess'>
                <h3>L'utilisateur a été supprimer avec succés.</h3>
                <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
                </div>";
        }
    }
    else {
    ?>

    <form class="box" action="" method="post">
            <h1 class="box-logo box-title"><a href="https://waytolearnx.com/">WayToLearnX.com</a></h1>
            <h1 class="box-title">Delete User</h1>

            <?php
        foreach ($TabPerso as $objetPerso) {

            echo '<p><input type="checkbox" value = "' . $objetPerso->getIdUser() . '" name = "username[]" />';
            echo '<label for = "username">' . $objetPerso->getUsername() . '</label></p>';

        }
        ?>
            
            <input type="submit" name="submit" value="Delete" class="box-button" />
        </form>
        <?php } ?>

    <!-- fin de la liste deroulante pour les programmes-->

    </body>
    </html>