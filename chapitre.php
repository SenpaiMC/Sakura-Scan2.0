<?php include 'sql\db_sakura-scan.php'; ?>
<?php require_once("header&footer/header.php"); ?>
<?php
$chemin = isset($_GET['chemin']) ? $_GET['chemin'] : null; // Récupérer le chemin d'accès du chapitre
$numero = isset($_GET['numero']) && is_numeric($_GET['numero']) ? (int)$_GET['numero'] : 1; // Récupérer le numéro du chapitre ou définir par défaut à 1
// Configuration
$directory = $chemin . '/'; // Dossier contenant les images des mangas

// Récupérer toutes les images du répertoire et les trier par ordre croissant
$images = [];
if (is_dir($directory)) {
    $images = array_filter(scandir($directory), function($file) use ($directory) {
        return is_file($directory . $file) && preg_match('/\.(jpg|jpeg|png|gif)$/i', $file);
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
    <h1> <?php echo htmlspecialchars($numero); ?> </h1>
<?php $type = ["manhwa","manga"]; ?>
<?php if (isset($_SESSION['type']) && $_SESSION['type'] == $type[1]): ?>
    <p>Nombre d'images : <?php echo count($images); ?></p>
    <button id="nextChapterBtn" class="carousel-next-chapter">Chapitre suivant</button>
<section id="carousel">
    <div class="carousel-slide">
        <img id="mangaPage" src="<?php echo !empty($images) ? htmlspecialchars($images[0]) : ''; ?>" alt="Page de Manga">
    </div>
    <button id="prevBtn" class="carousel-prev">Précédent</button>
    <button id="nextBtn" class="carousel-next">Suivant</button>
    </div>
    
    <style>
        .carousel-next-chapter {
            position: absolute;
            bottom: -50px;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
        </style>
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
            <!-- <input type="submit" value="Chapitre précédent"> -->
        </form>
    <?php foreach ($images as $image): ?>
        <div id="slide">
            <img src="<?= htmlspecialchars($image) ?>" alt="Image de couverture">
        </div>
    <?php endforeach; ?>
    <?php endif; ?>
    <style>
        #slide{
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            justify-items: center;
            background-color: rgba(150, 71, 134, 0);
            border: none;
            cursor: pointer;
        }
        #slide img{
            width: 40%;
            height: auto;
            background-color: rgba(150, 71, 134, 0);
            border: none;
        }
        </style>
    <!-- <p>Nombre d'images : <?php echo count($images); ?></p>
    <section id="défil">
    <div id="page"> -->

    </div>

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
        /* background-color: aquamarine; */
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
<?php require_once("header&footer/footer.php"); ?>
</body>
</html>