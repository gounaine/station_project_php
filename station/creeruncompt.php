
<?php

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
$email = $_POST['email'];
$password = $_POST['password'];

// Insertion des données utilisateur dans la base de données
if($_POST['submit']=="submit"){
$sql = "INSERT INTO users (username, email, password )VALUES ('$username', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
  echo "Account created successfully";
} else {
  echo "Error creating account: " . $conn->error;
}
}
if(isset($_POST['submit'])){
    header('Location:formcnx.html');
    exit;
}
$conn->close();
?>
