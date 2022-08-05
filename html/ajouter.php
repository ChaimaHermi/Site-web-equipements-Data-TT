<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="../css/Style.css">
</head>
<body>
   
 <?php
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($des_sr) && isset($central) && isset($pots) && isset($tid_debut) && isset($tid_fin) && isset($adsl) && isset($nvps) && ($ad_ip) ){
                //connexion à la base de donnée
                include_once "connexion.php";
                //requête d'ajout
                $req = mysqli_query($con , "INSERT INTO sr VALUES( NULL,'$des_sr', '$central','$pots','$tid_debut','$tid_fin','$adsl','$nvps','$ad_ip')");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: index.php");
                }else {//si non
                    $message = "SR non ajouté";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }

       }
    
    ?>



<div class="form">
<a href="index.php" class="back_btn">  <img src="../images/back.png" alt="">               </a>
<h2>Ajouter un sous répartiteur</h2>
<p class="erreur_message">

<?php 
            // si la variable message existe , affichons son contenu
            if(isset($message)){
                echo $message;
            }
            ?>


</p>


        <form action="" method="POST">
            <label>Désignation de l'SR</label>
            <input type="text" name="des_sr">
            <label>	Central de ratachemet</label>
            <input type="text" name="central">
            <label>POTS</label>
            <input type="number" name="pots">
            <label>TID Début</label>
            <input type="number" name="tid_debut">
            <label>TID Fin</label>
            <input type="number" name="tid_fin">
            <label>ADSL</label>
            <input type="number" name="adsl">



            <label>NVPS</label>
            <input type="text" name="nvps">
            <label>	IP @</label>
            <input type="text" name="ad_ip">
             
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>