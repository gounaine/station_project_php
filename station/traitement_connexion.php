<?php
session_start();
$_SESSION["username"]=$username;
$_SESSION["password"]=$password;
// Connexion à la base de données
$servername = "localhost";
$usernam = "root";
$passwor = "";
$dbname = "mydb";
$conn = new mysqli($servername, $usernam, $passwor, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Récupération des données envoyées par le formulaire
$username = $_POST['username'];
$password = $_POST['password'];


// Vérification des informations de connexion
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // L'utilisateur a été trouvé dans la base de données, connexion réussie
 
    header('Location:afficher_donner_perso.php');
    
  
} else {
  // L'utilisateur n'a pas été trouvé dans la base de données, connexion échouée
  echo "Login failed";
}


$conn->close();
?>
