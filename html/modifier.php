<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="../css/Style.css">
</head>
<body>



<?php

         //connexion à la base de donnée
         include_once "../html/connexion.php";
         //on récupère le id dans le lien
          $id = $_GET['id'];
          //requête pour afficher les infos d'un employé
          $req = mysqli_query($con , " SELECT * FROM sr WHERE id = $id");
          $row = mysqli_fetch_assoc($req);


       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button']))
       
       {
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($des_sr) && isset($central) && isset($pots) && isset($tid_debut) && isset($tid_fin) && isset($adsl) && isset($nvps) && $ad_ip){
               //requête de modification
               $req = mysqli_query($con , "UPDATE sr SET des_sr = '$des_sr' , central = '$central' , pots = '$pots' , tid_debut = '$tid_debut' , tid_fin = '$tid_fin',  adsl = '$adsl', nvps = '$nvps' , ad_ip = '$ad_ip' WHERE id = $id");


                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: ../html/index.php");
                }else {//si non
                    $message = "Sr non modifié";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>





   

<div class="form">
        <a href="../html/index.php" class="back_btn"><img src="../images/back.png"> </a>
        <h2>Modifier un sous répartiteur  </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>





        <form action="" method="POST">
        <label>	designation_sr</label>
            <input type="text" name="des_sr" value="<?=$row['des_sr']?>">
            <label>	Central de ratachemet</label>
            <input type="text" name="central" value="<?=$row['central']?>">
            <label>POTS</label>
            <input type="number" name="pots" value="<?=$row['pots']?>">
            <label>TID Début</label>
            <input type="number" name="tid_debut"  value="<?=$row['tid_debut']?>">
            <label>TID Fin</label>
            <input type="number" name="tid_fin"  value="<?=$row['tid_fin']?>">
            <label>ADSL</label>
            <input type="number" name="adsl"  value="<?=$row['adsl']?>">



            <label>NVPS</label>
            <input type="text" name="nvps"   value="<?=$row['nvps']?>">
            <label>	IP @</label>
            <input type="text" name="ad_ip"   value="<?=$row['ad_ip']?>">
             
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>