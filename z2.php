<?php include 'db_sakura-scan.php'; ?>
<?php include 'header.php'; ?>
<?php
$query = $pdo->query("SELECT * FROM livres WHERE image IS NOT NULL LIMIT 5");
$images = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section id="carousel">
    <div class="carousel-container">
        <?php foreach ($images as $image): ?>
            <div class="carousel-slide">
                    <form action="page_serie.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </button>
                    </form>
                </div>
            <?php endforeach; ?>

    </div>
    <button class="carousel-prev" onclick="moveCarousel(-1)">&#10094;</button>
    <button class="carousel-next" onclick="moveCarousel(1)">&#10095;</button>
</section>



<section id="carousel">
    <div class="carousel-container">
        <?php foreach ($images as $image): ?>
            <div class="carousel-slide">
                    <form action="page_serie.php" method="get">
                        <input type="hidden" name="search" value="<?= isset($image['titre']) ? htmlspecialchars($image['titre']) : '' ?>">
                        <button type="submit">
                            <img src="<?= htmlspecialchars($image['image']) ?>" alt="Image de couverture">
                        </button>
                    </form>
                </div>
            <?php endforeach; ?>

    </div>
    <button class="carousel-prev" onclick="moveCarousel(-1)">&#10094;</button>
    <button class="carousel-next" onclick="moveCarousel(1)">&#10095;</button>
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
        slide.style.display = index === 0 ? 'block' : 'none';
    });
</script>

<style>
    #carousel {
        position: relative;
        width: 100%;
        max-width: 550px;
        height: 600px;
        margin: 0 auto;
        margin-top: 1%;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: aquamarine;
    }

    .carousel-container {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: auto;
    }
    
    .carousel-slide {
        width: 100%;
        height: 600px;
        flex: 0 0 100%;
        display: none;
        background-color:purple;
        color: white;
        align-content: center;
        text-align: center;
        padding: 20px;
        box-sizing: border-box;
    }

    /* .carousel-slide input {
        width: 100%;
        height: 30px;
        padding: 10px;
        margin: 20px 0;
        align-items: center;
    } */
    .carousel-slide button{
        background-color:rgba(150, 71, 134, 0);
        width: 90%;
        height: auto;
        align-items: center;
        border: none;
        cursor: pointer;
    }
    .carousel-slide button img{
        background-color:rgba(150, 71, 134, 0);
        width: 80%;
        height: auto;
        align-items: center;
        border: none;
        cursor: pointer;
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