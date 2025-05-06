<?php
// Chemin vers le dossier contenant les images du manga
$directory = "mangas/mission__yozakura_family/Chapter 1_ L’Anneau des cerisiers/";

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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecteur de Manga</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            height: auto;
            background-color: #f4f4f4;
        }
        img {
            max-width: 50%;
            height: auto;
            display: block;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .controls {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    #prevBtn {
        left: 10px;
    }

    #nextBtn {
        right: 10px;
    }
        /* .controls button {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 18px;
        }
        .controls button:hover {
            background-color: rgba(0, 0, 0, 0.8);
        } */
    </style>
</head>
<body>
    <div class="carousel">
        <img id="mangaPage" src="<?php echo htmlspecialchars($images[0]); ?>" alt="Page de Manga">
        <div class="controls">
            <button id="prevBtn">Précédent</button>
            <button id="nextBtn">Suivant</button>
        </div>
    </div>
    <script>
        const images = <?php echo json_encode($images); ?>;
        let currentIndex = 0;

        const mangaPage = document.getElementById('mangaPage');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        prevBtn.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            mangaPage.src = images[currentIndex];
        });

        nextBtn.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % images.length;
            mangaPage.src = images[currentIndex];
        });
    </script>
</body>
</html>