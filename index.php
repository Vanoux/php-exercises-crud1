<?php
DEFINE("SERVER", "localhost");
DEFINE("LOGIN", "root");
DEFINE("MDP", "");
DEFINE("BASE", "colyseum");

$connect=mysqli_connect(SERVER,LOGIN,MDP,BASE)or die("pb de connexion au serveur");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exo exercises-crud1</title>
</head>
<body>
    
<h1>Exercice 1</h1>
<h4>Afficher tous les clients :</h4>
<?php
$result = mysqli_query($connect, 'SELECT * FROM clients');
while ($data=mysqli_fetch_assoc($result)){
     echo "Client n° " .  $data["id"] . "=> " . $data["firstName"] . " " . $data["lastName"] . "<br>";
}
?>

<h1>Exercice 2</h1>
<h4>Afficher tous les types de spectacles possibles :</h4>
<?php
$result = mysqli_query($connect, 'SELECT * FROM showTypes');
while ($data=mysqli_fetch_assoc($result)){
    echo "Type n° " . $data["id"] . "=> " . $data["type"] . "<br>";
}
?>

<h1>Exercice 3</h1>
<h4>Afficher les 20 premiers clients :</h4>
<?php
$query = 'SELECT * FROM clients LIMIT 20';
$result = mysqli_query($connect, $query);
while ($data=mysqli_fetch_assoc($result)){
    echo "Clients n° " . $data["id"] . "=> " . $data["lastName"] . " " . $data["firstName"] . "<br>";
}
?>

<h1>Exercice 4</h1>
<h4>N'afficher que les clients possédant une carte de fidélité :</h4>
<?php
$query = 'SELECT * FROM clients WHERE card!=0';
$result = mysqli_query($connect, $query);
while ($data=mysqli_fetch_assoc($result)){
    echo $data["lastName"] . " " . $data["firstName"] . " possède une carte n° " . $data["cardNumber"] . "<br>";
}
?>

<h1>Exercice 5</h1>
<h4>Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M" :</h4>
<?php
// Les afficher comme ceci :
// Nom : Nom du client Prénom : Prénom du client
// Trier les noms par ordre alphabétique.

$query = "SELECT * FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName ASC";
$result = mysqli_query($connect, $query);

while ($data=mysqli_fetch_assoc($result)){
    echo "Nom : " . $data["lastName"] . " - Prenom : " . $data["firstName"] . "<br>";
}
?>

<h1>Exercice 6</h1>
<h4>Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure :</h4>
<?php 
// Trier les titres par ordre alphabétique.
// Afficher les résultat comme ceci : Spectacle par artiste, le date à heure.

$query = "SELECT * FROM shows ORDER BY title ASC";
$result = mysqli_query($connect, $query);

while ($data=mysqli_fetch_assoc($result)){
    echo "Spectacle par : " . $data["performer"] . ", le : " . $data["date"] . ", durée : " . $data["duration"] . "<br>";    
}
?>

<h1>Exercice 7</h1>
<h4>Afficher tous les clients</h4>
<?php
//Afficher tous les clients comme ceci : 
// Nom : Nom de famille du client 
// Prénom : Prénom du client 
// Date de naissance : Date de naissance du client 
// Carte de fidélité : Oui (Si le client en possède une) ou Non (s'il n'en possède pas) 
// Numéro de carte : Numéro de la carte fidélité du client s'il en possède une.

$query = "SELECT * FROM clients";
$result = mysqli_query($connect, $query);

while ($data=mysqli_fetch_assoc($result)){
    echo "Nom : " . $data["lastName"] . " - Prenom : " . $data["firstName"] . " - Date de naissance : " . $data["birthDate"] . " - Carte de fidélité : " . ($data["card"] == 1 ? "Oui" : "Non") . " - Numéro de carte : " . $data["cardNumber"] . "<br>";
}
?>



</body>
</html>