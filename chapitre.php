<?php include 'sql\db_sakura-scan.php'; ?>
<?php require_once("header&footer/header.php"); ?>
<link rel="stylesheet" href="css/chapitre.css">
<?php
$titre = isset($_GET['titre']) ? $_GET['titre'] : null; // Récupérer le titre du manga
$chemin = isset($_GET['chemin']) ? $_GET['chemin'] : null; // Récupérer le chemin d'accès du chapitre
$numero = isset($_GET['numero']) && is_numeric($_GET['numero']) ? (int)$_GET['numero'] : 0; // Récupérer le numéro du chapitre ou définir par défaut à 1
// Configuration
$directory = $chemin . '/'; // Dossier contenant les images des mangas



// Récupérer toutes les images du répertoire et les trier par ordre croissant
$images = [];
if (is_dir($directory)) {
    $images = array_filter(scandir($directory), function($file) use ($directory) {
        return is_file($directory . $file) && preg_match('/\.(jpg|jpeg|png|gif|webp|zip)$/i', $file);
    });
}
$images = array_values($images); // Réindexer le tableau

// Ajouter le chemin complet aux noms de fichiers
$images = array_map(function($file) use ($directory) {
    return $directory . $file;
}, $images);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section id="barre">
        <div class="active">
            <input type="button" value="Retour à la page" onclick="window.location.href='profil_livre.php'">
        </div>
        <div class="active">
        <h1>Chapitre <?php echo htmlspecialchars($numero); ?></h1>
    </section>
    <h1> <?php echo htmlspecialchars($numero); ?> </h1>
<?php $type = ["manhwa","manga"]; ?>
<?php if (isset($_SESSION['type']) && $_SESSION['type'] == $type[1]): ?>
    <p>Nombre d'images : <?php echo count($images); ?></p>
    <?= '<input type="button" value="Retour à la page" onclick="window.location.href=\'profil_livre.php\'">'; ?>
    <form action="chapitre.php"  method="get">
            <input type="hidden" name="chemin" value="<?php echo preg_replace_callback('/(\d+)$/', function($matches) { return $matches[1] + 1; }, htmlspecialchars($chemin)); ?>">
            <input type="hidden" name="numero" value="<?php echo htmlspecialchars($numero + 1); ?>">
            <!-- Permet de partir à la page de présentation du livre si il n'y a pas de chapitre suivant -->
            <?php
            $nextChapterPath = preg_replace_callback('/(\d+)$/', function($matches) { return $matches[1] + 1; }, htmlspecialchars($chemin));
            if (!is_dir($nextChapterPath)) {
                echo '';
            } else {
                echo '<input type="submit" value="Chapitre suivant">';
            }
            ?>

        </form>
        <!-- Permet de revenir au chapitre précédent -->
        <form action="chapitre.php" method="get">
            <input type="hidden" name="chemin" value="<?php echo preg_replace_callback('/(\d+)$/', function($matches) { return $matches[1] - 1; }, htmlspecialchars($chemin)); ?>">
            <input type="hidden" name="numero" value="<?php echo htmlspecialchars($numero - 1); ?>">
            <!-- Permet d'enlever le bouton chapitre précédent si il n'existe pas -->
            <?php
            $préChapterPath = preg_replace_callback('/(\d+)$/', function($matches) { return $matches[1] - 1; }, htmlspecialchars($chemin));
            if (!is_dir($préChapterPath)) {
                echo '';
            } else {
                echo '<input type="submit" value="Chapitre précédent">';
            }
            ?>
            <!-- <input type="submit" value="Chapitre précédent"> -->
        </form>
<section id="carousel_chapitre">
        <div class="contenue-carrousel_livre">
            <div class="carousel-slide_livre">
        <img id="mangaPage" src="<?php echo !empty($images) ? htmlspecialchars($images[0]) : ''; ?>" alt="Page de Manga">
    </div>
</div>
<button id="prevBtn" class="carousel-prev">Précédent</button>
<button id="nextBtn" class="carousel-next">Suivant</button>
    
</section>

<?php elseif (isset($_SESSION['type']) && $_SESSION['type'] == $type[0]): ?>
    
    <p>Nombre d'images : <?php echo count($images); ?></p>
    <?= '<input type="button" value="Retour à la page" onclick="window.location.href=\'profil_livre.php\'">'; ?>
    

    <!-- Permet de partir au chapitre suivant -->
        <form action="chapitre.php" method="get">
            <input type="hidden" name="chemin" value="<?php echo preg_replace_callback('/(\d+)$/', function($matches) { return $matches[1] + 1; }, htmlspecialchars($chemin)); ?>">
            <input type="hidden" name="numero" value="<?php echo htmlspecialchars($numero + 1); ?>">
            <!-- Permet de partir à la page de présentation du livre si il n'y a pas de chapitre suivant -->
            <?php
            $nextChapterPath = preg_replace_callback('/(\d+)$/', function($matches) { return $matches[1] + 1; }, htmlspecialchars($chemin));
            if (!is_dir($nextChapterPath)) {
                echo '';
            } else {
                echo '<input type="submit" value="Chapitre suivant">';
            }
            ?>

        </form>
        <!-- Permet de revenir au chapitre précédent -->
        <form action="chapitre.php" method="get">
            <input type="hidden" name="chemin" value="<?php echo preg_replace_callback('/(\d+)$/', function($matches) { return $matches[1] - 1; }, htmlspecialchars($chemin)); ?>">
            <input type="hidden" name="numero" value="<?php echo htmlspecialchars($numero - 1); ?>">
            <!-- Permet d'enlever le bouton chapitre précédent si il n'existe pas -->
            <?php
            $préChapterPath = preg_replace_callback('/(\d+)$/', function($matches) { return $matches[1] - 1; }, htmlspecialchars($chemin));
            if (!is_dir($préChapterPath)) {
                echo '';
            } else {
                echo '<input type="submit" value="Chapitre précédent">';
            }
            ?>
        </form>
    <?php foreach ($images as $image): ?>
        <div id="slide">
            <img src="<?= htmlspecialchars($image) ?>" alt="Image de couverture">
        </div>
    <?php endforeach; ?>
    <?php endif; ?>


    </div>

<script>
        const images = <?php echo json_encode($images); ?>;
        let currentIndex = 0;
    
        const mangaPage = document.getElementById('mangaPage');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        // Fonction pour faire défiler le carrousel
        
        let currentSlide = 0;
        
        const slides = document.querySelectorAll('.carousel-slide_livre');
        function moveCarousel(direction) {
            slides[currentSlide].style.display = 'none';
            currentSlide = (currentSlide + direction + slides.length) % slides.length;
            slides[currentSlide].style.display = 'block';
}

// Initialize carousel
slides.forEach((slide, index) => {
    slide.style.display = index === 0 ? 'block' : 'none';
});
    
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
<?php require_once("header&footer/footer.php"); ?>
<?php exit; ?>
</body>
</html>