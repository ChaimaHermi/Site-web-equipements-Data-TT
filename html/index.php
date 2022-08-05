<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSAN ALCATEL</title>
    <link rel="stylesheet" href="../css/Style.css">

</head>
<body>
    
<img src="../images/LOGO_TT_ (2).jpg" alt="" id="logo">


<div class="container">
    <br><br> <br><br><br> <br><br><br><br> <br>
    <h1>Equipements Data</h1>
    <br> <br> <br>

    <a href="../html/ajouter.php"  class="Btn_add"> <img src="../images/plus.png" alt="">   Ajouter </a> 
    <a href="../html/Recherche.php"  class="Btn_find"> <img src="../images/loupe.png" alt="">   Recherche </a> 

    





    <table>
        <tr id="items">
            <th>Désignation de l'SR</th>
            <th>Central de ratachemet </th>
            <th>POTS</th>
            <th>TID début</th>
            <th>TID Fin </th>
            <th>ADSL</th>
            <th>NVPS</th>
            <th>IP @</th>
            
            <th >  <i style="color: rgb(19, 15, 221);">Modifier  </i> </th>
            <th>  <i style="color: rgb(255, 9, 9);">Supprimer  </i> </th>
        </tr>



        <?php 
                //inclure la page de connexion
                include_once "connexion.php";
                //requête pour afficher la liste des SR
                $req = mysqli_query($con , "SELECT * FROM sr");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore sr ajouter !" ;
                    
                }else {
                    //si non , affichons la liste de tous les SR
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['des_sr']?></td>
                            <td><?=$row['central']?></td>
                            <td><?=$row['pots']?></td>
                            <td><?=$row['tid_debut']?></td>
                            <td><?=$row['tid_fin']?></td>
                            <td><?=$row['adsl']?></td>
                            <td><?=$row['nvps']?></td>
                            <td><?=$row['ad_ip']?></td>
                            <!--Nous alons mettre l'id de chaque sr dans ce lien -->
                            <td><a href="../html/modifier.php?id=<?=$row['id']?>"><img src="../images/pen.png"></a></td>
                            <td><a href="../html/supprimer.php?id=<?=$row['id']?>"><img src="../images/trash.png"></a></td>
                        </tr>
                        <?php
                    }
                    
                }
            ?>


    
</table>
</div>














</body>

</html>