<style>
    
</style>

  <?php

require 'Dbase.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: inscription.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Bienvenue <?php echo $row["username"]; ?></h1>
    <p> Ici vous trouverez des amateurs de foot de votre localite pour jouer ou 
      suivre ensemble un match de foot de vos equipes, un afterwork ou week-end. </p>
    <button><a href="inscription.php"> Ajouter</a></button> 
    <button><a href="index.php"> Mettre a jour </a></button>
    <button><a href="deconnexion.php">Deconnexion</a></button> 
        
        <table>
            <tr id="items">
                
                <th>username</th>
                <th>Telephone</th>
                <th>Adresse</th>
                <th>Password</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "Dbase.php";
                //requête pour afficher la liste des employés
                $req = mysqli_query($conn , "SELECT * FROM tb_user");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore d'employé ajouter !" ;
                    
                }else {
                    //si non , affichons la liste de tous les employés
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['username']?></td>
                            <td><?=$row['Telephone']?></td>
                            <td><?=$row['adresse']?></td>
                            <td><?=$row['password']?></td>
                            <!--Nous alons mettre l'id de chaque employé dans ce lien -->
                            <td><a href="modifier.php?id=<?=$row['id']?>"><img src="images/pen.png"></a></td>
                            <td><a href="supprimer.php?id=<?=$row['id']?>"><img src="images/trash.png"></a></td>
                        </tr>
                        <?php
                    }
                    
                }
            ?>
      
         
        </table>
   
   
   
   
    </div>
</body>
</html>