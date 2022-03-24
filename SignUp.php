<?php
$servername = 'localhost';
$username = 'root';
$password = '1075';
$base ='client';
$con= mysqli_connect($servername, $username, $password, $base);

if(!$con){
    die("Echec de la connexion :" . mysqli_connect_error());
}
echo "Connexion reussie";

$nom = $_POST['nomUtilisateur'];
$prenom = $_POST['prenomUtilisateur'];
$date = $_POST['date_n'];
$pays = $_POST['pays'];
$email = $_POST['mail'];
$password = $_POST['motDePasee'];
$genre = $_POST['sexe'];

$sql = "INSERT INTO client(Nom,Prenom,Date_Naissance,Pays,Email,MotDePasse,Sexe) VALUES($nom,$prenom,$date,$pays,$email,$password,$genre)";
if(mysqli_query($con,$sql)){
    echo "Compte cree!";
    echo "BIENVENUE SUR NOTRE PLATEFORME";
}else{
    echo "Erreur : ". mysqli_error($con);
}
mysqli_close($con);
?>