<?php
session_start();

if(!isset($_SESSION['username'])){
   header("Location: formms.html"); // اذهب إلى صفحة تسجيل الدخول إذا لم يتم تسجيل الدخول
   exit();
}
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
$username='lahcen';
$email = $_POST['email'];
$password = $_POST['password'];

// Mise à jour des informations utilisateur dans la base de données
$sql = "UPDATE users SET email='$email', password='$password' WHERE username='$username'";
if ($conn->query($sql) === TRUE) {
  echo "Account updated successfully";
} else {
  echo "Error updating account: " . $conn->error;
}

$conn->close();
?>
