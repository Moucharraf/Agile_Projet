<?php
session_start();

try{
    $con= new PDO('mysql:host=localhost;dbname=agile;charset=utf8;port=3307','root','root');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e){
    echo "Echec de la connexion :" . $e->getMessage();
}

$nom = $_POST['nomUtilisateur'];
$prenom = $_POST['prenomUtilisateur'];
$date = $_POST['date_n'];
$pays = $_POST['pays'];
$email = $_POST['mail'];
$password = $_POST['motDePasse'];
$genre = $_POST['sexe'];

$test=0;
$sql1="SELECT * FROM client";
$elementsTable=$con->prepare($sql1);
$elementsTable->execute();
$elements=$elementsTable->fetchAll();
foreach($elements as $element){
    if($element['Email']==$email){
        $test=1;
    }
}

if($test==0){
    $sql = "INSERT INTO client(Nom,Prenom,Date_Naissance,Pays,Email,MotDePasse,Sexe) VALUES(:Nom,:Prenom,:Date_Naissance,:Pays,:Email,:MotDePasse,:Sexe)";
    $requete = $con->prepare($sql);
    $requete->execute([

        'Nom'=>$nom,
        'Prenom'=>$prenom,
        'Date_Naissance'=>$date,
        'Pays'=>$pays,
        'Email'=>$email,
        'MotDePasse'=>$password,
        'Sexe'=>$genre,

    ]);
}
else{
    echo "<p>Il existe déjà un compte avec la meme adresse mail</p>";
}
$con=NULL;
?>