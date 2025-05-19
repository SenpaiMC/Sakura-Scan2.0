<?php require_once("header&footer/header.php"); ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/profil_livre.css">
        <title>profil</title>
    </head>
    <body>
        <!-- Prsentation du manga,manhwa,etc. -->
    <section id="presentations" >
        <div class="presentation" id="cover">
            <img src="<?php echo isset($_SESSION['image']) ? htmlspecialchars($_SESSION['image']) : 'default-image.jpg'; ?>" alt="Couverture de la série">
        </div>
        <div class="presentation" id="description">
            <h1><?= isset($_SESSION['titre']) ? htmlspecialchars($_SESSION['titre']) : 'Titre non disponible'; ?></h1>
            <h2>Genre : <?php echo htmlspecialchars($_SESSION['genre']); ?></h2>
            <h2>Type : <?php echo htmlspecialchars($_SESSION['type']); ?></h2>
            <h2>Description :</h2>
            <h2><?php echo isset($_SESSION['description']) ? htmlspecialchars($_SESSION['description']) : 'Description non disponible'; ?></h2>
            </div>
            </section>
        <h2>Chapitre</h2>
        <?php
        include 'sql\db_sakura-scan.php';
        $query = "SELECT * FROM chapitres WHERE livre_id = ?";
        $stmt = $mysqli->prepare($query);
        // Vérifie si l'ID est défini dans la session, sinon attribue une valeur par défaut de 0
        $id = isset($_SESSION['id']) ? (int)$_SESSION['id'] : 0;
        $stmt->bind_param("i", $id,);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $chapitres = [];
            while ($row = $result->fetch_assoc()) {
                $chapitres[] = $row;
            }
            $_SESSION['numero'] = $chapitres ;  // Récupérer le numéro du chapitre   
            $_SESSION['chemin'] = $chapitres ;// Récupérer le chemin d'accès
        } else {
            echo "Aucun chapitre trouvé pour cet ID.";
            require_once("header&footer/footer.php"); 
            exit;
        }
        ?>
        <section id="chapitre">
            <?php 
            foreach ($_SESSION['chemin'] as $chemin) {
                if (is_array($chemin) && isset($chemin['chemin']) && isset($chemin['numero'])) {
                    echo '<div class="chapitre">
                    <form action="chapitre.php" method="get">
                    <input type="hidden" name="chemin" value="' . htmlspecialchars($chemin['chemin']) . '">
                    <input type="hidden" name="numero" value="' . htmlspecialchars($chemin['numero']) . '">
                    <input type="submit" value="Chapitre ' . htmlspecialchars($chemin['numero']) . '">
                    </form>
                    </div>';
                }
            }
            ?>
    </section>
    <?php require_once("header&footer/footer.php"); ?>
</body>
</html>