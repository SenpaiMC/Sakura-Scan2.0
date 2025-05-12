<?php require_once('header&footer\header.php'); ?>
<?php $jour = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche", "Indéterminé"]; ?>
<?php 
$query = $pdo->query("SELECT * FROM livres WHERE image IS NOT NULL LIMIT 10");
$images = $query->fetchAll(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil</title>
</head>
<body>
<section id="carousel">
    <div class="carousel-container">
        <div class="carousel-slide">
            <h1>Lundi</h1>
            <?php foreach ($images as $image): ?>
                <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[0]): ?>
                    <div class="slide">
                    <form action="db-livre\page_serie.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit">
                            <img src="<?= "db-livre/" . htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </button>
                    </form>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <button onclick="moveCarousel(1)" style="background: none; border: none; color: white; font-size: 24px; cursor: pointer;">Pas de compte ? S'inscrire</button>
        </div>
        <div class="carousel-slide">
            <h1>Mardi</h1>
                        <?php foreach ($images as $image): ?>
                    <?php if (isset($image['livre_sortie']) && $image['livre_sortie'] === $jour[7]): ?>
                <div class="slide">
                    <form action="db-livre\page_serie.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit">
                            <img src="<?= "db-livre/" . htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </button>
                    </form>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                    <button onclick="moveCarousel(1)" style="background: none; border: none; color: white; font-size: 24px; cursor: pointer;">Pas de compte ? S'inscrire</button>
        </div>

</section>


<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');

    function moveCarousel(direction) {
        slides[currentSlide].style.display = 'none';
        currentSlide = (currentSlide + direction + slides.length) % slides.length;
        slides[currentSlide].style.display = 'block';
    }

    // Initialize carousel
    slides.forEach((slide, index) => {
        slide.style.display = index ===0 ? 'block' : 'none';
    });
</script>

<style>
    #carousel {
        position: relative;
        width: 90%;
        height: 600px;
        margin: 0 auto;
        margin-top: 1%;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: aquamarine;
    }
    
    .carousel-container {
        /* display: flex; */
        flex-direction: column;
        /* width: 100%; */
        justify-content: space-around;
    }
    
    .carousel-slide {
        width: 100%;
        height: auto;
        flex: 0 0 100%;
        display: grid;
        grid-template-columns: 20% 20% 20% ;
        /* grid-template-rows: 25% 25% 25% 25%; */
        /* display: none; */
        background-color:purple;
        color: white;
        text-align: center;
        /* padding: 20px;
        box-sizing: border-box; */
    }

    .slide{
        width: 100%;
        height: auto;
        display: flex;
        justify-content: start;
        background-color: powderblue;
    }

    .slide button {
        background-color:rgb(150, 71, 134);
        width: 70%;
        padding: 10px;
        border: none;
        cursor: pointer;
    }
    .slide button img {
        width: 80%;
        height: auto;
        object-fit: cover;
        border-radius: 10px;
        background-color: white;
    }

    .carousel-slide button:hover {
        background-color:rgb(151, 80, 151);
    }

    .carousel-prev, .carousel-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    .carousel-prev {
        left: 10px;
    }

    .carousel-next {
        right: 10px;
    }
</style>
</body>
</html>