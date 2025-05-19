<?php
require_once("header&footer/header.php"); 
include_once 'sql/db_sakura-scan.php';
$genres = ["Action","Aventure","Comédie","Drame","Fantastique","Horreur","Romance","Science-fiction","Autre","Système"]; 
$types = ["manga", "manhwa", "manhua", "autre"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/page_serie.css">
    <title>serie</title>
</head>
<body>
<form method="post">
    <label for="genre">Filtrer par genre :</label>
                        <select name="genre" id="genre">
                            <option value="">Sélectionner un genre</option>
                            <?php foreach ($genres as $genre): ?>
                                <option value="<?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?>"
                                <?php if (isset($_POST['genre']) && $_POST['genre'] === $genre) echo 'selected'; ?>>
                                    <?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
    <label for="type">Filtrer par type :</label>
                        <select name="type" id="type">
                            <option value="">Sélectionner un type</option>
                            <?php foreach ($types as $type): ?>
                                <option value="<?php echo htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?>"
                                <?php if (isset($_POST['type']) && $_POST['type'] === $type) echo 'selected'; ?>>
                                    <?php echo htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" name="filter_genre">Filtrer</button>
</form>
                        
                        <?php
                    // Filtrage par genre et/ou type
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filter_genre']) && (!empty($_POST['genre']) || !empty($_POST['type']))) {
                        $selectedGenre = !empty($_POST['genre']) ? $_POST['genre'] : null;
                        $selectedType = !empty($_POST['type']) ? $_POST['type'] : null;
                        $sql = "SELECT * FROM livres";
                        $params = [];
                        $conditions = [];
                        if ($selectedGenre) {
                            $conditions[] = "genre = :genre";
                            $params['genre'] = $selectedGenre;
                        }
                        if ($selectedType) {
                            $conditions[] = "type = :type";
                            $params['type'] = $selectedType;
                        }
                        if ($conditions) {
                            $sql .= " WHERE " . implode(" AND ", $conditions);
                        }
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute($params);
                        echo '<div id="image">';
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $cheminImage = htmlspecialchars($row['image']);
                            $titre = htmlspecialchars($row['titre']);
                            echo '<div class="serie">';
                            echo '<form action="db-livre/fonction_search.php" method="get">';
                            echo '<input type="hidden" name="search" value="' . $cheminImage . '">';
                            echo '<input type="hidden" name="search" value="' . $titre . '">';
                            echo '<button type="submit">';
                            echo '<img src="' . $cheminImage . '" alt="Image">';
                            echo '</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '<h3>' . $titre . '</h3>';

                        }
                        echo '</div>';
                    }
                    else {
                        // Affichage de toutes les images si aucun filtre n'est appliqué
                        $sql = "SELECT * FROM livres";
                        $stmt = $pdo->query($sql);
                        echo '<div id="image">';
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $cheminImage = htmlspecialchars($row['image']);
                            $titre = htmlspecialchars($row['titre']);
                            echo '<div class="serie">';
                            echo '<form action="db-livre/fonction_search.php" method="get">';
                            echo '<input type="hidden" name="search" value="' . $cheminImage . '">';
                            echo '<input type="hidden" name="search" value="' . $titre . '">';
                            echo '<button type="submit">';
                            echo '<img src="' . $cheminImage . '" alt="Image">';
                            echo '</button>';
                            echo '</form>';
                            echo '<h3>' . $titre . '</h3>';
                            echo '</div>';

                        }
                        echo '</div>';
                    }

                    ?>

</html>
</body>
<?php require_once("header&footer/footer.php"); ?> 