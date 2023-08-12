<?php
// Fonction pour récupérer les produits par catégorie
function getProduitsByCategorie($categorie) {
    // Informations de connexion à la base de données
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'gestion';

    try {
        // Connexion à la base de données avec PDO
        $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

        // Configuration des attributs de PDO pour afficher les erreurs en cas de besoin
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour récupérer les produits ayant la catégorie spécifiée
        $query = "SELECT * FROM produit WHERE categorie = :categorie";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':categorie', $categorie);
        $stmt->execute();

        // Traitement du résultat
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <ul class="dropdown-panel-list">
  
  <li class="menu-title">
    <a href="#">OUTILS</a>
  </li>

  <li class="panel-list-item">
    <a href="#">soudure et brasage</a>
  </li>

  <li class="panel-list-item">
    <a href="#">Matériel de support</a>
  </li>

  <li class="panel-list-item">
    <a href="#">Outils de communication </a>
  </li>

  <li class="panel-list-item">
    <a href="#">manipulation et de montage</a>
  </li>

  <li class="panel-list-item">
    <a href="#">Logiciel</a>
  </li>

  <li class="panel-list-item">
    <a href="#">
      <img src="./assets/images/electronique/outils.jpg" alt="mouse collection" width="250" height="119">
    </a>
  </li>

</ul>
<?php
            }
        }

        // Fermeture de la connexion
        $conn = null;

        return $produits;
    } catch (PDOException $e) {
        // En cas d'erreur, affichage du message d'erreur
        die("Erreur de connexion : " . $e->getMessage());
    }
}

// // Utilisation de la fonction pour récupérer les produits de la catégorie "Electronique"
// $categorie = "Electronique";
// $produitsElectronique = getProduitsByCategorie($categorie);

// // Utilisation de la fonction pour récupérer les produits de la catégorie "Mode"
// $categorie = "Mode";
// $produitsMode = getProduitsByCategorie($categorie);

// // ... Ajoutez d'autres utilisations de la fonction pour d'autres catégories si nécessaire ...

// // Affichage des produits récupérés (exemple : pour "Electronique")
// if (!empty($produitsElectronique)) {
//     echo "<h2>Produits de la catégorie \"$categorie\" :</h2>";
//     foreach ($produitsElectronique as $produit) {
//         echo "<div class='product'>";
//         echo "<h3>" . $produit["nom_produit"] . "</h3>";
//         echo "<p>Référence : " . $produit["reference"] . "</p>";
//         // Autres informations du produit à afficher...
//         echo "</div>";
//     }
// } else {
//     echo "Aucun produit trouvé dans la catégorie \"$categorie\".";
// }

// ... Affichage des produits d'autres catégories si nécessaire ...
?>
