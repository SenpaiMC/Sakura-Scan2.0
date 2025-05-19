<?php require_once("header&footer\header.php"); ?>
<?php include("sql\db_sakura-scan.php"); ?>
<!-- variable qui contient les jours de la semaine -->
<?php $jour = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche", "Indéterminé"]; ?> 
<?php 
$query = $pdo->query("SELECT * FROM livres WHERE image IS NOT NULL LIMIT 10");
$images = $query->fetchAll(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page css du calendrier -->
    <link rel="stylesheet" href="css\calendar.css">
    <title>Document</title>
</head>
<body>
    <!-- Programme de la semaine -->
    <h1>Lundi</h1>
        <div class="calendrier_contenue">
                <!-- Prend les images de la base de données et les affiche qui correspondent au jour de la semaine ici "Lundi" -->
                <?php foreach ($images as $image): ?>
                    <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[0]): ?>
                    <form action="db-livre/fonction_search.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit" class="calendrier_slide">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </button>
                    </form>
                    <?php endif; ?>
                <?php endforeach; ?>
        </div>
    <h1>Mardi</h1>
        <div class="calendrier_contenue">
            <?php foreach ($images as $image): ?>
                <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[1]): ?>
                    <form action="db-livre/fonction_search.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit" class="calendrier_slide">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </button>
                    </form>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    <h1>Mercredi</h1>
        <div class="calendrier_contenue">
            <?php foreach ($images as $image): ?>
                <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[2]): ?>
                    <form action="db-livre/fonction_search.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit" class="calendrier_slide">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </button>
                    </form>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    <h1>Jeudi</h1>
        <div class="calendrier_contenue">
            <?php foreach ($images as $image): ?>
                <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[3]): ?>
                    <form action="db-livre/fonction_search.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit" class="calendrier_slide">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </button>
                    </form>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    <h1>Vendredi</h1>
        <div class="calendrier_contenue">
            <?php foreach ($images as $image): ?>
                <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[4]): ?>
                    <form action="db-livre/fonction_search.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit" class="calendrier_slide">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </button>
                    </form>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    <h1>Samedi</h1>
        <div class="calendrier_contenue">
            <?php foreach ($images as $image): ?>
                <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[5]): ?>
                    <form action="db-livre/fonction_search.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit" class="calendrier_slide">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </button>
                    </form>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    <h1>Dimanche</h1>
        <div class="calendrier_contenue">
            <?php foreach ($images as $image): ?>
                <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[6]): ?>
                    <form action="db-livre/fonction_search.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit" class="calendrier_slide">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </button>
                    </form>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <h1>Indéterminé</h1>
        <div class="calendrier_contenue">
            <?php foreach ($images as $image): ?>
                <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[7]): ?>
                    <form action="db-livre/fonction_search.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit" class="calendrier_slide">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </button>
                    </form>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
</body>
</html>