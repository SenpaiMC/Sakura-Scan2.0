<?php
require_once("header&footer/header.php"); 
include_once 'sql/db_sakura-scan.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>serie</title>
</head>
<body>
<?php
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Requête pour récupérer les images
$sql = "SELECT * FROM livres"; // Remplacez 'chemin_image' et 'images' par vos noms de colonne et table
$stmt = $pdo->query($sql);

// Affichage des images
echo '<div>';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $cheminImage = htmlspecialchars($row['image']);
    $titre = htmlspecialchars($row['titre']);
    echo '<div style="margin: 10px; display: inline-block; text-align: center;">';
    echo '<form action="db-livre/fonction_search.php" method="get">';
    echo '<input type="hidden" name="search" value="' . $cheminImage . '">';
    echo '<input type="hidden" name="search" value="' . $titre . '">';
    echo '<button type="submit" style="border: none; background: none; padding: 0; cursor: pointer;">';
    // Affichage de l'image
    echo '<img src="' . $cheminImage . '" alt="Image" style="max-width: 200px; max-height: 200px;">';
    echo '</button>';
    echo '</form>';
    echo '</div>';
}
echo '</div>';
?>
</body>
</html>
<?php require_once("header&footer/footer.php"); ?> 