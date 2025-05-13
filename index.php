<?php require_once("header&footer/header.php"); ?>
<?php include 'sql\db_sakura-scan.php';

// Récupération des images de couverture
$query = $pdo->query("SELECT * FROM livres WHERE image IS NOT NULL LIMIT 10");
$images = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/global.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrousel Slider</title>
</head>
<body>
    <!-- Slider main container -->
    <div class="swiper">
        <div class="swiper-wrapper">
            <!-- recupère maximum 10 images et les affiche -->
            <?php foreach ($images as $image): ?>
                <div class="swiper-slide">
                    <form action="db-livre/fonction_search.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </button>
                    </form>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <section id="navigation">      
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </section>

            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>

        const swiper = new Swiper('.swiper', {
            slidesPerView: 3,
            spaceBetween: 50,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            loop: true,
        });
        swiper.params.autoplay = {
            delay: 7000,
            disableOnInteraction: false,
        };
        swiper.autoplay.start();
        </script>

<?php require_once("header&footer/footer.php"); ?>
</body>
</html>