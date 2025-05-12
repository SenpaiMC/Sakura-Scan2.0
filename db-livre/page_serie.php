<?php
    include '..\sql\db_sakura-scan.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Connexion à la base de données
        $search = $_GET['search'];
        if (!isset($_GET['search']) || empty($_GET['search'])) {
            echo "Aucun terme de recherche fourni.";
            exit();
        }

        // Requête pour vérifier si la série existe et récupérer ses informations
        $sql = "SELECT * FROM livres WHERE titre = ? ";
        $stmt = $mysqli->prepare($sql);

        // Liaison des paramètres
        $stmt->bind_param('s', $search );
        $stmt->execute();
        $result = $stmt->get_result();
        $utilisateur = $result->fetch_assoc();
        // Vérification si la série existe
        

        // Vérification du mot de passe
        if (!empty($utilisateur['titre'])) {
            // Stocker les informations de l'utilisateur dans la session
            $_SESSION['id'] = $utilisateur['id'];
            $_SESSION['titre'] = $utilisateur['titre'];
            $_SESSION['type'] = $utilisateur['type'];
            $_SESSION['description'] = $utilisateur['description'];
            $_SESSION['genre'] = $utilisateur['genre'];
            $_SESSION['image'] = $utilisateur['image'];

            echo "Connexion réussie!";
            // Redirection vers la page de série
            header("Location: ../espace_livre.php");
            exit();
        } else {
            echo "Série pas trouver.";
        }
    }
?>

<?php
    include 'sql\db_sakura-scan.php';
    session_start();

    $sql = "SELECT * FROM chapitres WHERE livre_id = ?";
    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param("s", $_SESSION["livre_id"]);
    // Vérification si la série existe
    if (!isset($_GET['livre_id']) || empty($_GET['livre_id'])) {
        echo "Aucun terme de recherche fourni.";
        exit();
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $utilisateur = $result->fetch_assoc();

    if (!empty($utilisateur["id"]) == $_SESSION["id"]) {
        $_SESSION["id"] = $utilisateur["id"];
        $_SESSION["numero"] = $utilisateur["numero"];
        $_SESSION["chemin"] = $utilisateur["chemin"];
        echo "Chapitre trouvé!";
    } else {
        echo "Chapitre pas trouver.";
    }
    $stmt->close();
    ?>