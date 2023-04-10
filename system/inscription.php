<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>inscription</title>
</head>
<body>
<div class="container">


    <h2>Inscription</h2>
    
    <form class="" action="" method="post" autocomplete="off">
      <label for="username">Username : </label>
      <input type="text" name="username" id = "username" required value=""> <br>
      <label for="Telephone">Telephone : </label>
      <input type="Number" name="Telephone" id = "number" required value="">
       <br>
       <br>
      <label for="Adresse">Adresse : </label>
      <input type="Adresse" name="Adresse" id = "Adresse" required value=""> <br>
      <label for="password">Mot de passe : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <label for="confirmpassword"> Reconduisez le mot de passe: </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
      <button type="submit" name="submit">S incrire</button>
    </form>
    <br>
    <a href="connexion.php"> Se Connecter</a>
</div>

 


<?php
require 'Dbase.php';
// if(!empty($_SESSION["id"])){
//   header("Location: index.php");
// }
if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $Telephone = $_POST["Telephone"];
  $Adresse = $_POST["Adresse"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR password = '$password'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      // $password=md5($confirmpassword);
      $query = "INSERT INTO tb_user VALUES('','$username','$Telephone','$Adresse','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
</body>
</html>




