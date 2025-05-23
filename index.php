<?php require_once("header&footer/header.php"); ?>
<?php include 'sql\db_sakura-scan.php';

// Récupération des images de couverture
$query = $pdo->query("SELECT * FROM livres WHERE image IS NOT NULL LIMIT 5");
$images = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- <link rel="stylesheet" href="css\index.css"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrousel Slider</title>
</head>
<body>
    <!-- Un carrousel d'images de couverture de livres -->
    <div class="swiper">
        <div class="swiper-wrapper">
            <!-- recupère maximum 5 images et les affiche -->
             
            <?php foreach ($images as $image): ?>
                <div class="swiper-slide">
                    <form action="db-livre/fonction_search.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                            <div class="description">
                                <h2><?= htmlspecialchars($image['titre']) ?></h2>
                        </button>
                    </form>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- Permet de faire défiler les images -->
        <section id="navigation">      
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </section>

        <!-- Extrait de la page calendrier -->
<?php $jour = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche", "Indéterminé"]; ?>
<?php 
$query = $pdo->query("SELECT * FROM livres WHERE image IS NOT NULL LIMIT 10");
$images = $query->fetchAll(PDO::FETCH_ASSOC); ?>
<h1>Lundi</h1>
        <div class="calendrier_contenue">
            <!-- Prend les images de la base de données et les affiche qui correspondent au jour de la semaine -->
                <?php foreach ($images as $image): ?>
                    <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[0]): ?>
                    <form action="db-livre/fonction_search.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit" class="calendrier_slide">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </button>
                                <h2><?= htmlspecialchars($image['titre']) ?></h2>

                    </form>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
        </div>

        <!-- Affichage des images triées par date de sortie (du plus récent au plus ancien) -->
        <?php
        // Afficher les 2 derniers chapitres sortis avec leur image
        $query = $pdo->query("SELECT c.*, l.image, l.titre 
            FROM chapitres c 
            JOIN livres l ON c.livre_id = l.id 
            WHERE l.image IS NOT NULL 
            ORDER BY chap_sortie DESC 
            LIMIT 8");
        // Récupérer les chapitres récents
        $chapitres_recents = $query->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <h1>Derniers chapitres sortis</h1>
        <div id="chapitres_recents">
            <?php foreach ($chapitres_recents as $chapitre): ?>
                <div class="recents">
                    <form action="db-livre/fonction_search.php" method="get">
                        <input type="hidden" name="search" value="<?= htmlspecialchars($chapitre['titre']) ?>">
                        <button type="submit" class="chapitre_slide">
                            <img src="<?= htmlspecialchars($chapitre['image']) ?>" alt="Image de couverture">
                        </button>
                    </form>
                        <h2><?= htmlspecialchars($chapitre['titre']) ?></h2>
                        <form action="chapitre.php" method="get">
                            <input type="hidden" name="chemin" value="<?= htmlspecialchars($chapitre['chemin']) ?>">
                            <input type="hidden" name="numero" value="<?= htmlspecialchars($chapitre['numero']) ?>">
                            <input type="submit" value="Chapitre <?= htmlspecialchars($chapitre['numero']) ?>">
                        </form>
                    </div>
                    <?php if (!empty($chapitre['date_sortie'])): ?>
                        <p>Date de sortie : <?= htmlspecialchars($chapitre['date_sortie']) ?></p>
                        <?php endif; ?>
                    <!-- </form> -->
                    <?php endforeach; ?>
        </div>
        <!-- script javascript pour le carrousel -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
            // Combien de page afficher dans la carrousel
        let swiperOptions = {
            slidesPerView: 3,
            spaceBetween: 20,
            centeredSlides: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            loop: true,
        };
        // Si la taille de l'écran est inférieure à 850px, afficher 2 pages

        if (window.matchMedia("(max-width:850px)").matches) {
            swiperOptions.slidesPerView = 2;
            swiperOptions.spaceBetween = 10;
        }
        // Permet de faire défiler les images tout seul
        const swiper = new Swiper('.swiper', swiperOptions);
        swiper.params.autoplay = {
            delay: 7000,
            disableOnInteraction: false,
        };
        swiper.autoplay.start();
        </script>

<?php require_once("header&footer/footer.php"); ?>
</body>
</html>