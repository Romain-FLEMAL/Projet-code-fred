<?php
require('config.php');

$result = mysqli_query($conn,"SELECT * FROM `site` WHERE id_site = '" . $_GET['id_client'] . "'");
$row= mysqli_fetch_array($result);

if (mysqli_num_rows($result) > 0) {
    ?>
    <table>
          <tr>
            <td>id</td>
            <td>username</td>
            <td>type</td>
            <td>password</td>
            
          </tr>
                <?php
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                ?>
          <tr>
            <td><?php echo $row["id_site"]; ?></td>
            <td><?php echo $row["Ville"]; ?></td>
            <td><?php echo $row["adr"]; ?></td>
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
?>