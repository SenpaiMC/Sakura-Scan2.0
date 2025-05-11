<?php 
include 'db_sakura-scan.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['titre'])) {
        // Gestion de l'upload de manga
        $titre = $_POST['titre'];
        $type = $_POST['type'];
        $auteurs = $_POST['auteurs'];
        $genre = $_POST['genre'];
        $description = $_POST['description'];
        $image = $_FILES['image'];
        $situation = $_POST['situation'];
        $livre_sortie = $_POST['livre_sortie'];

        // Création d'un dossier basé sur le titre
        $titre_dossier = preg_replace('/[^a-zA-Z0-9_-]/', '_', $titre); // Nettoyage du titre pour éviter les caractères spéciaux

        $dossierPath = 'livres/'. htmlspecialchars($_POST['type']) . '/' . $titre_dossier . '/';
        // Vérification de l'existence du dossier

        if (!is_dir($dossierPath)) {
            mkdir($dossierPath, 0777, true); // Création du dossier avec permissions
        }
        // Vérification de l'upload de l'image
        if ($image['error'] == 0) {
            $imagePath = $dossierPath. basename($image['name']);
            move_uploaded_file($image['tmp_name'], $imagePath);
        } else {
            die('Erreur lors de l\'upload de l\'image.');
        }


        // Insertion dans la base de données
        $stmt = $mysqli->prepare("INSERT INTO livres (titre, auteurs , genre, type, description, image, situation, livre_sortie) VALUES (?, ?, ?, ?, ? , ?, ?, ?)");
        $stmt->execute([$titre, $auteurs, $genre, $type, $description, $imagePath, $situation, $livre_sortie]);

        header("Location: Page_upload.php"); // Redirection après l'upload
        exit;
        echo "Manga déposé avec succès !";
    } elseif (isset($_POST['livre_id'])) {
        // Gestion de l'upload de chapitre
        $livre_id = $_POST['livre_id'];
        $numero = $_POST['numero'];
        $chemin = $_POST['chemin'];

        // Insertion dans la base de données
        $stmt = $pdo->prepare("INSERT INTO chapitres (livre_id, numero, chemin) VALUES (?, ?, ?)");
        $stmt->execute([$livre_id, $numero, $chemin]);

        header("Location: Page_upload.php"); // Redirection après l'upload
        exit;
    } else {
        echo "Données non valides.";
    }
} else {
    echo "Méthode de requête non valide.";
}

?>

