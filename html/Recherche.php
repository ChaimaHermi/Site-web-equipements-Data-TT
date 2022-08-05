<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
    <link rel="stylesheet" href="../css/Style.css">





</head>
<body>

<center>


<div class="form">
<a href="index.php" class="back_btn">  <img src="../images/back.png" alt="">               </a>
<br>
<h2>Chercher un Sous répartiteur</h2>




<form action="" method="POST">
<input type="text" name="des_sr" placeholder="Entre nom SR a chercher">
<input type="submit" name="search" value="Chercher equipements Data">
</form>

<?php 
//connexion à la base de donnée
include_once "connexion.php";

if (isset($_POST['search'])) {

     $des_sr = $_POST['des_sr'] ;

    $query = "SELECT * FROM sr where des_sr = '$des_sr' " ;
    $query_run = mysqli_query($con , $query )  ;

    while($row = mysqli_fetch_array($query_run))
    {
        ?>
        <form action="" method="POST">
        <label>Désignation de l'SR</label>
    <input type="text" name="des_sr"  value ="<?php echo $row['des_sr'] ?> "/>
    <label>	Central de ratachemet</label>

    <input type="text" name="central"  value ="<?php echo $row['central'] ?> "  />
    
    <label>POTS</label>

    <input type="text" name="pots" value ="<?php echo $row['pots'] ?> "/>
    
    <label>TID Début</label>

    <input type="text" name="tid_debut" value ="<?php echo $row['tid_debut'] ?> "/>
    <br>
    <label>TID Fin</label>


    <input type="text" name="tid_fin" value ="<?php echo $row['tid_fin'] ?> "/>
    
    <label>ADSL</label>

    <input type="text" name="adsl" value ="<?php echo $row['adsl'] ?> "/>
    
    <label>NVPS</label>

    <input type="text" name="nvps" value ="<?php echo $row['nvps'] ?> "/>
    
    <label>	IP @</label>

    <input type="text" name="ad_ip" value ="<?php echo $row['ad_ip'] ?> "/>
    </form>

    <?php
    
    }

}
 ?>



</center>

</div>

</body>
</html>