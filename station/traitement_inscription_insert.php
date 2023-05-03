<?php 
$servername = "localhost";
$usernam = "root";
$passwor = "";
$dbname = "mydb";
$conn = new mysqli($servername, $usernam, $passwor, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Récupération des données envoyées par le formulaire
$nom = $_POST['nom'];
$prenom = $_POST['Prenom'];
$nid = $_POST['N°ID'];
$ncin = $_POST['N°cin'];
$age = $_POST['Age'];
$genre = $_POST['f'];
$adresse = $_POST['Adresse'];
$email = $_POST['Email'];
$tele = $_POST['tele'];
$situationm = $_POST['s'];
$niveaus = $_POST['Ns'];
$enfanm = $_POST['Nf'];
$annex = $_POST['Ax'];


// Insertion des données utilisateur dans la base de données

$sql = "INSERT INTO personne (nom, prenom, nid , ncin , age , genre ,adresse ,  email , tele , situationm , niveaus , enfantm , annex )VALUES ('$nom', '$prenom', '$nid' , '$ncin' , '$age' , '$genre' ,'$adresse' ,  '$email' , '$tele' , '$situationm' , '$niveaus' , '$enfanm' , '$annex' )";
if ($conn->query($sql) === TRUE) {
  echo "Account created successfully";
} else {
  echo "Error creating account: " . $conn->error;
}
if($_POST['pop']){
  header('Location: afficher_donner_perso.php');
  exit;
}
$conn->close();
 
?>