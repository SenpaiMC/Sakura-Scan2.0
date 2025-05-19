<?php include 'sql/db_sakura-scan.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tout les fichiers css-->
    <link rel="stylesheet" href="header&footer/header.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/Calendar.css">
    <link rel="stylesheet" href="css/chapitre.css">
    <link rel="stylesheet" href="css/page_serie.css">
    <link rel="stylesheet" href="css/espace_user.css">
    <link rel="stylesheet" href="css/Form_connexion.css">
    <link rel="stylesheet" href="css/Page_upload.css">
    <link rel="stylesheet" href="css/Profil_livre.css">

    
<!-- Titre du site et logo  -->
    <title>Sakura scan</title>
    <link rel="icon" href="header&footer\logo\logo sakura_scan.png" type="image/png" >
</head>
<body>

    <header>
        <!-- Si un utilisateur est connecté, il peut voir son speudo et sa photo de profil (à accées a son espace_user) -->
    <?php if (isset($_SESSION['utilisateur_nom'])): ?>

        <div class="logo">
            <div class="logo-container" id="logo1"> 
                <a href="index.php"><img src="header&footer\logo\logo sakura_scan.png" alt=""></a>
            </div>

            <div class="logo-container" id="logo2"> 
                    <?php include 'search-bar.php'; ?>
            </div>

            <div class="logo-container" id="logo3"> 
                <a href="Calendar.php"><img src="header&footer\logo\calendar.png" alt=""></a>
            </div>

            <div class="logo-container" id="logo4"> 
                <a href="page_serie.php"><img src="header&footer\logo\Serie.png" alt=""></a>
            </div>

            <div class="logo-container" id="logo6"> 
                <a href="espace_user.php">
                    <img src="<?php echo isset($_SESSION['photo_profil']) ? "db-utilisateur/" . htmlspecialchars($_SESSION['photo_profil']) : 'logo/default_profile.png'; ?>" alt="Photo de profil" >
                </a>
            </div>

            <div class="logo-container" id="logo7"> 
                <a href="db-utilisateur\deconnexion.php"><img src="header&footer\logo\on_off.png" alt=""></a>
            </div>
        </div>
        <?php else : ?>

<?php endif; ?>
        <!-- Si un administrateur est connecté, il accéde à la page pour déposer des livres -->
    <?php if (isset($_SESSION['admin_nom'])): ?>

            <div class="logo">
            <div class="logo-container" id="logo1"> 
                <a href="index.php"><img src="header&footer\logo\logo sakura_scan.png" alt=""></a>
            </div>

            <div class="logo-container" id="logo2"> 
                    <?php include 'search-bar.php'; ?>
            </div>

            <div class="logo-container" id="logo3"> 
                <a href="Calendar.php"><img src="header&footer\logo\calendar.png" alt=""></a>
            </div>

            <div class="logo-container" id="logo4"> 
                <a href="page_serie.php"><img src="header&footer\logo\Serie.png" alt=""></a>
            </div>

            <div class="logo-container" id="logo5"> 
                <a href="Page_upload.php"><img src="header&footer\logo\User.png" alt="Photo de profil"></a>
            </div>

            <div class="logo-container" id="logo7"> 
                <a href="db-utilisateur\deconnexion.php"><img src="header&footer\logo\on_off.png" alt=""></a>
            </div>
        </div>
        <?php else : ?>

<?php endif; ?>
        <!-- Si ni utilisateur ni administrateur n'est connecté, il peut voir le logo et la barre de recherche de base-->
    <!-- Il peut aussi se connecter à son compte -->
    <?php if (!isset($_SESSION['utilisateur_nom']) && !isset($_SESSION['admin_nom'])): ?>

        <div class="logo">
            <div class="logo-container" id="logo1"> 
                <a href="index.php"><img src="header&footer\logo\logo sakura_scan.png" alt="logo"></a>
            </div>

            <div class="logo-container" id="logo2"> 
                    <?php include 'search-bar.php'; ?>
            </div>

            <div class="logo-container" id="logo3"> 
                <a href="Calendar.php"><img src="header&footer\logo\Calendar.png" alt="calendrier"></a>
            </div>

            <div class="logo-container" id="logo4"> 
                <a href="page_serie.php"><img src="header&footer\logo\Serie.png" alt="serie"></a>
            </div>

            <div class="logo-container" id="logo5"> 
                <a href="Form_connexion.php"><img src="header&footer\logo\User.png" alt="Photo de profil"></a>
            </div>

        </div>
        <?php else : ?>

<?php endif; ?>
            
        </header>
        
    </body>
    </html>