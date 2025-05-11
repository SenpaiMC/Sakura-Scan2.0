<?php require_once("header.php"); ?>
<?php include("db_sakura-scan.php"); ?>
<?php $jour = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche", "Indéterminé"]; ?>
<?php $jour1 = ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche", "Indéterminé"]; ?>
<?php 
$query = $pdo->query("SELECT * FROM livres WHERE image IS NOT NULL LIMIT 10");
$images = $query->fetchAll(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lundi</h1>
        <div class="calendrier_contenue">
                <?php foreach ($images as $image): ?>
                    <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[0]): ?>
                        <div class="calendrier_slide">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
        </div>
    <h1>Mardi</h1>
        <div class="calendrier_contenue">
                <?php foreach ($images as $image): ?>
                    <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[1]): ?>
                        <div class="calendrier_slide">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </div>
                        <?php endif; ?>
                        
                <?php endforeach; ?>
        </div>
    <h1>Mercredi</h1>
        <div class="calendrier_contenue">
                <?php foreach ($images as $image): ?>
                    <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[2]): ?>
                        <div class="calendrier_slide">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
        </div>
    <h1>Jeudi</h1>
        <div class="calendrier_contenue">
                <?php foreach ($images as $image): ?>
                    <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[3]): ?>
                        <div class="calendrier_slide">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
        </div>
        <h1>Vendredi</h1>
        <div class="calendrier_contenue">
            <?php foreach ($images as $image): ?>
                <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[4]): ?>
                    <div class="calendrier_slide">
                        <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <h1>Samedi</h1>
        <div class="calendrier_contenue">
            <?php foreach ($images as $image): ?>
                <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[5]): ?>
                    <div class="calendrier_slide">
                        <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <h1>Dimanche</h1>
        <div class="calendrier_contenue">
            <?php foreach ($images as $image): ?>
                <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[6]): ?>
                    <div class="calendrier_slide">
                        <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <h1>Indéterminé</h1>
        <div class="calendrier_contenue">
            <?php foreach ($images as $image): ?>
                <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[7]): ?>
                    <div class="calendrier_slide">
                        <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <h1>Indéterminé</h1>
        <div class="calendrier_contenue">
            <?php foreach ($images as $image): ?>
                <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[0]): ?>
                    <form action="page_serie.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </button>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    
</body>
</html>

<?php 
    $currentDay = $jour[date('N') - 1]; // Obtenir le jour actuel de la semaine
    foreach ($images as $image): 
        if (isset($image['livre_sortie']) && $image['livre_sortie'] === $currentDay): ?>
            <div class="calendrier_slide">
                <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
            </div>
        <?php endif; 
    endforeach; 
    ?>
        
        <style>

    .calendrier_contenue {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: 25% 25% 25% 25%;
        justify-content: space-around;
        background-color: gray;
    }
    
    .calendrier_slide {
        width: 100%;
        height: auto;
        background-color: blue;
        display: flex;
        justify-content: center;
    }
    .calendrier_slide img {
    width: 80%;
    height: auto;
    object-fit: cover;

}
</style>