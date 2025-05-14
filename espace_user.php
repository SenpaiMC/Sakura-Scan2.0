<?php require_once('header&footer\header.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\espace_user.css">
    <title>espace user</title>
</head>
<body>
    
    <section id="id">
        <h1>Bienvenue dans votre espace utilisateur</h1>
        </section>
        <section id="espace_user">
        
        <?php if (!empty($_SESSION['photo_profil'])): ?>
            <img src="<?php echo "db-utilisateur/" . htmlspecialchars($_SESSION['photo_profil']); ?>" alt="Photo de profil">
            <?php else: ?>
                <p>Aucune photo de profil enregistrée.</p>
                <?php endif; ?>
                <?php if (!empty($_SESSION['utilisateur_nom'])): ?>
                <p><?php echo isset($_SESSION['utilisateur_nom']) ? htmlspecialchars($_SESSION['utilisateur_nom']) : 'Nom d\'utilisateur non défini.'; ?></p>
            <?php else: ?>
                <p>Nom d'utilisateur non défini.</p>
            <?php endif; ?>
                        
    </section>


        <?php require_once("header&footer/footer.php"); ?>                    
</body>
</html>