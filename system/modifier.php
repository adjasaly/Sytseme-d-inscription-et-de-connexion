<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

         //connexion à la base de donnée
          include_once "Dbase.php";
         //on récupère le id dans le lien
          $id = $_GET['id'];
          //requête pour afficher les infos d'un employé
          $req = mysqli_query($conn , "SELECT * FROM tb_user WHERE id = $id");
          $row = mysqli_fetch_assoc($req);


       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($username) && isset($password) && $Adresse){
               //requête de modification
    $req = mysqli_query($conn, "UPDATE tb_user SET username = '$username' , Telephone = '$Telephone' , Adresse = '$Adresse' , password='$password' WHERE id = $id");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: index.php");
                }else {//si non
                    $message = "joueur non modifié";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>

    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Modifier le joueur : <?=$row['username']?> </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <form action="" method="POST">
        <label for="username">Username : </label>
      <input type="text" name="username" id = "username" required value=""> <br>
      <label for="Telephone">Telephone : </label>
      <input type="Number" name="Telephone" id = "number" required value="">
      <label for="Adresse">Adresse : </label>
      <input type="Adress" name="Adresse" id = "Adresse" required value=""> <br>
      <label for="password">Mot de passe : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <label for="confirmpassword"> Reconduisez le mot de passe: </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>