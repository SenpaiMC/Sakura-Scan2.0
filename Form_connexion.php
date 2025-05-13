<?php require_once('header&footer\header.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\global.css">

    <title>profil</title>
</head>
<body>
<section id="carousel">
    <div class="carousel-container">
        <div class="carousel-slide">
            <h2>Connexion</h2>
            <form action="db-utilisateur\user_connexion.php" method="POST">
                    <div class="input-groupe">
                    <!-- Pseudo -->
                    <label for="login-username"></label>
                    <input type="text" id="login-username" name="nom" placeholder="Pseudo" required>
            </div>
            <div class="input-groupe">
                    <!-- Mot de passe -->
                    <label for="login-password"></label>
                    <input type="password" id="login-password" name="mot_de_passe" placeholder="Mot de passe" required>
            </div>
            <button type="submit">Se connecter</button>
            </form>
            <button onclick="moveCarousel(1)" style="background: none; border: none; color: white; font-size: 16px; cursor: pointer;">Pas de compte ? S'inscrire</button>
        </div>
        <div class="carousel-slide">
            <h2>Création de compte</h2>
            <form action="db-utilisateur\user_inscription.php" method="POST" enctype="multipart/form-data">
                <div class="input-groupe">
                    <!-- Pseudo -->
                    <label for="register-username"></label>
                    <input type="text" id="register-username" name="nom" placeholder="Pseudo" required>
                </div>
                <div class="input-groupe">
                    <!-- Mot de passe -->
                    <label for="register-password"></label>
                    <input type="mot_de_passe" id="register-password" name="mot_de_passe" placeholder="Mot de passe" required>
                </div>

                <div class="input-groupe">
                    <!-- Photo de profil -->
                    <label for="photo_profil"></label>
                    <input type="file" id="fileInput" name="photo_profil" onchange="previewImage()" required>
                    <div id="previewImageContainer"></div>
                </div>
                <button type="submit">S'inscrire</button>
            </form>
            <button onclick="moveCarousel(-1)" style="background: none; border: none; color: white; font-size: 16px; cursor: pointer;">Déjà inscrit ? Se conecter </button>
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
        slide.style.display = index === 0 ? 'block' : 'none';
    });
</script>
<?php require_once("header&footer/footer.php"); ?>
</body>
</html>