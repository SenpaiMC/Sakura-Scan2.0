<?php require_once 'header&footer\header.php'; ?>
<?php include 'sql\db_sakura-scan.php';

// Récupération des images de couverture
$query = $pdo->query("SELECT * FROM livres WHERE image IS NOT NULL LIMIT 10");
$images = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrousel Slider</title>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        .swiper {
            margin-top: 3%;
            width: 90%;
            height: 550px;
        }
        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
        }
        
        .swiper-slide button{
            width: 80%;
            height: auto;
            border: none;
            background-color: #fff;
            cursor: pointer;

        }

        .swiper-slide img {
            width: 85%;
            height: auto;
        }
    </style>
</head>
<body>
    <!-- Slider main container -->
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php foreach ($images as $image): ?>
                <div class="swiper-slide">
                    <form action="page_serie.php" method="get">
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
    <!-- Add navigation buttons -->

    <style>
        #navigation {
            width: 100%;
            margin-top: 50px;
            /* transform: translateY(-50%); */
            background-color: #fff;
        }
        .swiper-button-next, .swiper-button-prev {
            color: #fff;
            padding: 10px;
        }
        .swiper-button-next:hover, .swiper-button-prev:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>

    <!-- Swiper JS -->
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
    </script>
    <script>
        swiper.params.autoplay = {
            delay: 7000,
            disableOnInteraction: false,
        };
        swiper.autoplay.start();
    </script>
</body>
</html>