<?php
DEFINE("SERVER", "den1.mysql1.gear.host");
DEFINE("LOGIN", "colyseum2");
DEFINE("MDP", "Sw966D?G?NFr");
DEFINE("BASE", "colyseum2");

$connect=mysqli_connect(SERVER,LOGIN,MDP,BASE)or die("pb de connexion au serveur");

?>