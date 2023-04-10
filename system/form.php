<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="style.css">
    <title> Connexion</title>
</head>
<body>
<section>
     
 <?php echo "<br>"; ?>
<button><a href="inscription.php"> Ajouter</a></button> 
<button><a href="Refresh.php"> Mettre a jour</a></button> 
<button><a href="supprimer.php"> Supprimer</a></button> 
<button><a href="deconnexion.php"> Déconnexion</a></button> 

<style>
    table, th, td { 
        border: 2px solid black;
        border-collapse: collapse;
        background-color: white;
    }
    th, td {
        padding: 12px;
    }

</style>

<?php

require 'Dbase.php';
// session_start();
// if (!isset($_SESSION["username"])) {
//    header("Location: connexion.php");

//Tentative d excecution de la requete de selection
$sql = "SELECT * FROM tb_user" ;
if($result = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($result) > 0){
        echo "<table>";
        echo "<tr>";
            echo "<th> id </th>";
            echo "<th> username </th>";
            echo "<th> Telephone </th>";
            echo "<th> Adresse </th>";
            echo "<th> password </th>";
            
         
         echo "</tr>";
    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>" . $row['id']. "</td>";
        echo "<td>" . $row['username']. "</td>";
        echo "<td>" . $row['Telephone']. "</td>";
        echo "<td>" . $row['adresse']. "</td>";
        echo "<td>" . $row['password']. "</td>";
      
    
     echo "</tr>";
    }
    echo "</table>";
    
// liberer le jeu de resultats
mysqli_free_result($result);
 } else { 
    echo " Aucun enregistrement correspondant a votre requete n a ete trouve ";
}   
} 
 else {
    echo " ERREUR : Impossible d'executer $sql.". mysqli_error($conn);
}
// Fermer la connexion
mysqli_close($conn);
?>
</section>

</body>
</html>
