<?php include 'sql/db_sakura-scan.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header&footer/header.css">
    

    <title>Mon site</title>
</head>
<body>

    <header>
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
                <a href="page_connexion.php"><img src="header&footer\logo\Serie.png" alt=""></a>
            </div>

            <div class="logo-container" id="logo6"> 
                <a href="espace_user.php">
                    <img src="<?php echo isset($_SESSION['photo_profil']) ? htmlspecialchars($_SESSION['photo_profil']) : 'logo/default_profile.png'; ?>" alt="Photo de profil" >
                </a>
            </div>

            <div class="logo-container" id="logo7"> 
                <a href="deconnexion.php"><img src="header&footer\logo\on_off.png" alt=""></a>
            </div>
        </div>
        <?php else : ?>

<?php endif; ?>
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
                <a href="page_connexion.php"><img src="header&footer\logo\Serie.png" alt=""></a>
            </div>

            <div class="logo-container" id="logo5"> 
                <a href="Page_upload.php"><img src="header&footer\logo\User.png" alt="Photo de profil"></a>
            </div>

            <div class="logo-container" id="logo7"> 
                <a href="deconnexion.php"><img src="header&footer\logo\on_off.png" alt=""></a>
            </div>
        </div>
        <?php else : ?>

<?php endif; ?>
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
                <a href="page_connexion.php"><img src="header&footer\logo\Serie.png" alt="serie"></a>
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