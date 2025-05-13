<?php include './sql/db_sakura-scan.php'; ?>
<?php
// Inclure le fichier de connexion à la base de données
// Vérification de la table 'livres'
try {
    $pdo->query("SELECT 1 FROM livres LIMIT 1");
} catch (PDOException $e) {
    die("La table 'livres' est introuvable ou inaccessible : " . $e->getMessage());
}

// Si une requête est envoyée via AJAX
if (isset($_GET['query'])) {
    $query = strtolower($_GET['query']);
    $stmt = $pdo->prepare("SELECT titre, image FROM livres WHERE LOWER(titre) LIKE :query LIMIT 5");
    $stmt->execute(['query' => "%$query%"]);
    $suggestions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($suggestions);
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Auto-Suggestion</title>
    <script>
        function submitFormWithSuggestion(itemtitre) {
    const form = document.createElement('form');
    form.method = 'GET'; // Ou 'POST' selon vos besoins
    form.action = 'db-livre/fonction_search.php'; // Remplacez par l'URL où vous voulez envoyer les données
    
    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'search';
    input.value = document.getElementById('search').value;
    input.value = itemtitre; // Utiliser le titre de la suggestion
    
    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
    }
        function searchSuggestions() {
            const query = document.getElementById('search').value;
            if (query.length === 0) {
                document.getElementById('suggestions').innerHTML = '';
                return;
            }
            
            fetch(`search-bar.php?query=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                const suggestionsBox = document.getElementById('suggestions');
                suggestionsBox.innerHTML = '';
                data.forEach(item => {
                    const div = document.createElement('div');
                    div.style.display = 'flex';
                    div.style.alignItems = 'center';
                    // div.textContent = item;
                    const img = document.createElement('img');
                                img.src = item.image; // Supposons que la requête retourne un champ `cover` depuis la base de données
                                img.alt = item.titre; // Utiliser le titre comme texte alternatif   
                                img.style.width = '50px';
                                img.style.border = '2px solid black';
                                img.style.marginRight = '10px';
                                img.style.borderRadius = '4px';
                                img.style.height = 'auto';
                                img.style.objectFit = 'cover';

                    const span = document.createElement('span');
                    span.textContent = item.titre;

                    // Ajout de l'image et du texte dans le conteneur
                    div.appendChild(img);
                    div.appendChild(span);
                    div.style.cursor = 'pointer';

                    div.onclick = () => {
                        submitFormWithSuggestion(item.titre);

                        document.getElementById('search').value = item.titre;
                        suggestionsBox.innerHTML = '';
                    };
                    suggestionsBox.appendChild(div);
                    
                });
            });
        }

        </script>
</head>
<body>
    <form action="db-livre/fonction_search.php" method="get">
    <!-- <h1>Recherche de Mangas et Webtoons</h1> -->
    <input type="text" id="search" name="search" onkeyup="searchSuggestions()" placeholder="Rechercher..." autocomplete="off" />
    <div id="suggestions"></div>
</form>
</body>
</html>
        <style>
            form {
                position: relative;
                width: 100%;
                max-width: 600px;
            }
            #search {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            #search:focus {
                border-color: #007BFF;
                outline: none;
            }

            #suggestions {
                top: 101%;
                border: none;
                overflow-y: auto;
                position: absolute;
                background: white;
                font-size: large;
                width: 99%;
                z-index: 1000;
            }
            #suggestions div {
                border: 2px solid  #4f6172;
                border-radius: 4px;
                padding: 10px;
                cursor: pointer;
            }
            #suggestions div:hover {
                background-color: #f0f0f0;
            }
        </style>