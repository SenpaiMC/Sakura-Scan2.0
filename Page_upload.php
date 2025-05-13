<?php require 'sql\db_sakura-scan.php'; ?>
<?php require_once("header&footer/header.php"); ?>
<?php
    $genres = ["Action","Aventure","Comédie","Drame","Fantastique","Horreur","Romance","Science-fiction","Autre","Système"]; 
    $types = ["manga", "manhwa", "manhua", "autre"];
    $situation = ["En cours", "Terminé", "Suspendu"];
    $livre_sortie = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche", "Indéterminé"];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\uoloads.css">
    <title>Déposer</title>
</head>
<body> <br>
<section><h1>Partie Manga</h1></section>
    <section id="manga" class="page1">
        <div class="mangas" >
            <form action="db-livre\upload_livre.php" method="post" enctype="multipart/form-data">
                <h2>Déposer un Manga</h2>
                <label for="titre">Titre du Manga:</label>
                <input type="text" id="titre" name="titre" required><br><br>

                <label for="auteurs">Auteurs:</label>
                <input type="text" id="auteurs" name="auteurs" required><br><br>

                <label for="situation">Situation:</label>
                <select inputmode="text" id="situation" name="situation" required>
                    <option value="">Sélectionner une situation</option>
                    <?php foreach ($situation as $situation): ?>
                        <option value="<?php echo htmlspecialchars($situation, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($situation, ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php endforeach; ?>
                    </select> <br><br>

                <label for="livre_sortie">Jour de sortie:</label>
                <select inputmode="text" id="livre_sortie" name="livre_sortie" required>
                    <option value="">Sélectionner un jour</option>
                    <?php foreach ($livre_sortie as $livre_sortie): ?>
                        <option value="<?php echo htmlspecialchars($livre_sortie, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($livre_sortie, ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php endforeach; ?>
                    </select> <br><br>
                
                <select inputmode="text" id="genre" name="genre" required>
                    <option value="">Sélectionner un genre</option>
                    <?php foreach ($genres as $genre): ?>
                        <option value="<?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php endforeach; ?>
                    </select> <br><br>

                <select inputmode="text" id="type" name="type" required>
                    <option value="">Sélectionner un type</option>
                    <?php foreach ($types as $types): ?>
                        <option value="<?php echo htmlspecialchars($types, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($types, ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php endforeach; ?>
                    </select> <br><br>
                    
                    <label for="description">Description:</label><br>
                    <textarea id="description" name="description" rows="8" cols="60" required></textarea><br><br>
                    
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png, .gif" multiple required><br><br>
                    
                    <input type="submit" value="Déposer le Manga">
                </form>
            </div>
            <div class="mangas">
                <form action="db-livre\upload_livre.php" method="post">
                    <h2>Déposer un Chapitre</h2>
                    <label for="livre_id">Id du manga :</label>
                    <input type="text" id="livre_id" name="livre_id" required><br><br>
        
                    <label for="numero">Numéro du chapitre :</label>
                    <input type="text" id="numero" name="numero" required><br><br>
        
                    <label for="chemin">Chemin d'accée :</label>
                    <input type="text" id="chemin" name="chemin" required><br><br>
                    
                    <input type="submit" value="Déposer le chapitre">
                </form>
            </div>
        </section><br> <br>
        <div>
            <h2>Liste des mangas déposés</h2>
            <table border="1" style="width: 80%; margin: auto; text-align: center;">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Image</th>
                </tr>
                <?php
                $stmt = $pdo->query("SELECT * FROM livres");
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($row['titre'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($row['type'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td><img src='". htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8') . "' alt='Image' width='70'></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <?php require_once("header&footer/footer.php"); ?>
</body>
</html>