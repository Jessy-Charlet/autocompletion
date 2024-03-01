<?php require_once('./head.php'); ?>

<nav>
<form action="./element.php" method="get">
<div class="ui-widget">
  <label for="tags">Recherche: </label>
  <input id="tags" type="texte" name="id" autocomplete="off" placeholder="Effectuez une recherche sur Goolge.Dex">
</div>
</form>
</nav>


<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'autocompletion';

// Connexion à la base de données
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupération des utilisateurs
$query = "SELECT * FROM pokemon";
$result = $conn->query($query);

// Construction du tableau associatif des utilisateurs
$users = array();
foreach($result as $pkm){
    if($pkm["Nom"] == $_GET["id"]){
        echo "<h1>".$pkm["Nom"]."</h1>";
        echo "<h2>".$pkm["Type 1"]."</h2>";
        echo "<h2>".$pkm["Type 2"]."</h2>";
    }
}

// Fermeture de la connexion à la base de données
$conn->close();

?>