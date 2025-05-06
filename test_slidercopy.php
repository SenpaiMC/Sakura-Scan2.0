<?php include 'db_sakura-scan.php'; ?>
<?php include 'header.php'; ?>
<!-- // Chemin vers le dossier contenant les images du manga
// $directory = "mangas/mission__yozakura_family/Chapter 1_ L’Anneau des cerisiers/"; -->

<?php
$chemin = isset($_POST['chemin']) ? $_POST['chemin'] : null; // Récupérer le chemin d'accès du chapitre
$numero = isset($_GET['numero']) ? $_GET['numero'] : null; // Récupérer le numéro du chapitre
// Configuration
$directory = htmlspecialchars($chemin) . '/'; // Dossier contenant les images des mangas

// Récupérer toutes les images du répertoire et les trier par ordre croissant
$images = array_filter(scandir($directory), function($file) use ($directory) {
    return is_file($directory . $file) && preg_match('/\.(jpg|jpeg|png|gif)$/i', $file);
});
$images = array_values($images); // Réindexer le tableau

// Ajouter le chemin complet aux noms de fichiers
$images = array_map(function($file) use ($directory) {
    return $directory . $file;
}, $images);
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
    <div class="carousel-slide">
        <img id="mangaPage" src="<?php echo !empty($images) ? htmlspecialchars($images[0]) : ''; ?>" alt="Page de Manga">
    </div>
    <button id="prevBtn" class="carousel-prev">Précédent</button>
    <button id="nextBtn" class="carousel-next">Suivant</button>
</section>

<script>
        const images = <?php echo json_encode($images); ?>;
        let currentIndex = 0;
    
        const mangaPage = document.getElementById('mangaPage');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
    
        prevBtn.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            prevBtn.style.display = currentIndex === 0 ? 'none' : 'block';
            mangaPage.src = images[currentIndex];
            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = false;

            nextBtn.style.display = 'block';
        });

        nextBtn.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % images.length;
            mangaPage.src = images[currentIndex];
            nextBtn.disabled = currentIndex === images.length - 1;
            prevBtn.disabled = false;

            nextBtn.style.display = currentIndex === images.length - 1 ? 'none' : 'block';
            prevBtn.style.display = 'block';
        });

</script>

<style>
    #carousel {
        position: relative;
        width: 100%;
        max-width: 600px;
        height: auto;
        margin-top: 1%;
        margin: 20px auto;
        background-color: aquamarine;
    }
    .carousel-slide{
        background-color:rgba(150, 71, 134, 0);
        width: 90%;
        height: auto;
        align-items: center;
        align-content: center;
        margin: 20px auto;
        border: none;
        cursor: pointer;
    }
    .carousel-slide img{
        background-color:rgba(150, 71, 134, 0);
        width: 100%;
        height: auto;
        object-fit: cover;
        align-items: center;
        align-content: center;
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
        left: -50px;
    }

    .carousel-next {
        right: -50px;
    }
</style>
</body>
</html>