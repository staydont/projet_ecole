<?php
// Connexion à la base de données
$servername = "localhost";
$username = "votre_nom_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "votre_base_de_donnees";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération de la référence du produit depuis le formulaire
$productRef = $_POST['productRef'];

// Requête pour récupérer les informations du produit
$sql = "SELECT * FROM produits WHERE reference = '$productRef'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Affichage des informations du produit
    while($row = $result->fetch_assoc()) {
        echo "<h2>Informations du produit :</h2>";
        echo "<p>Référence : " . $row['reference'] . "</p>";
        echo "<p>Nom : " . $row['nom'] . "</p>";
        echo "<p>Description : " . $row['description'] . "</p>";
        echo "<p>Prix : " . $row['prix'] . "</p>";
    }
} else {
    echo "<p>Aucun produit trouvé avec cette référence.</p>";
}
$conn->close();
?>
