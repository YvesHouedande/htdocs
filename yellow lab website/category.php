<?php 
 $categorie = $_GET["nom"];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Y'ELLO LAB</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style-prefix.css">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

</head>

<?php
// Informations de connexion à la base de données
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'gestion';

// Variable pour stocker les produits sous forme de chaîne de caractères
$listeProduits = '';

?>

<body>


  <main>

    <div class="product-container">

        <div class="container">
  
  
  
          <div class="product-box">
  
            <!--
              - PRODUCT MINIMAL
            -->
  
  
  
  
  
            <!--
              - PRODUCT GRID
            -->
  
  
            <div class="product-main">
  
              <h2 class="title">Produit</h2>
  
        <div class="product-grid">
  <?php
  try {
    // Connexion à la base de données avec PDO
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

    // Configuration des attributs de PDO pour afficher les erreurs en cas de besoin
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT p.* 
              FROM produit p
              JOIN categorie c ON p.categorie_id = c.id_categorie
              WHERE c.nom = '$categorie'";
    
    $result = $conn->query($query);

    // Traitement du résultat
    if ($result->rowCount() > 0) {
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Affichage des produits avec les informations correspondantes
        // Utilisez votre propre structure HTML pour chaque produit ici
        ?>
        <div class="showcase">
  
  <div class="showcase-banner">

    <img src=<?php echo $row["image"]; ?> alt="Mens Winter Leathers Jackets" width="300" class="product-img default">
    <img src=<?php echo $row["image"]; ?> alt="Mens Winter Leathers Jackets" width="300" class="product-img hover">

    

    <div class="showcase-actions">

      <button class="btn-action">
        <ion-icon name="heart-outline" role="img" class="md hydrated" aria-label="heart outline"></ion-icon>
      </button>

      <button class="btn-action">
        <ion-icon name="eye-outline" role="img" class="md hydrated" aria-label="eye outline"></ion-icon>
      </button>

      <button class="btn-action">
        <ion-icon name="repeat-outline" role="img" class="md hydrated" aria-label="repeat outline"></ion-icon>
      </button>

      <button class="btn-action">
        <ion-icon name="bag-add-outline" role="img" class="md hydrated" aria-label="bag add outline"></ion-icon>
      </button>

    </div>

  </div>

  <div class="showcase-content">

    <a class="showcase-category"><?php echo $row["type"]; ?></a>

    <a>
      <h3 class="showcase-title"><?php echo $row["description"]; ?></h3>
    </a>

    <div class="price-box">
      <p class="price"><?php echo $row["prix"]; ?>$</p>
      <p class="qte"><?php echo $row["quantite"]; ?></p>
    </div>

    
      <div class="counter-box">
        <button class="decrement">-</button>
        <p class="counter-value"> 0</p>
        <button class="increment">+</button>
      </div>
      
    <div class="boutons-box">   
      <button class="bouton-ajouter" style="background-color: aquamarine;">Restaurer</button>
      <button class="bouton-ajouter"> Ajouter</button>
    </div>
  </div>

</div>
        <?php
      }
    } else {
      echo "Aucun produit trouvé.";
    }

    // Fermeture de la connexion
    $conn = null;
  } catch (PDOException $e) {
    // En cas d'erreur, affichage du message d'erreur
    die("Erreur de connexion : " . $e->getMessage());
  }
  ?>
</div>


                </div>
  
              </div>
  
            </div>
  
          </div>
  
        </div>
  
      </div> 





    <!--
      - TESTIMONIALS, CTA & SERVICE
    -->

    <div>

      <div class="container">

        <div class="testimonials-box">

          <!--
            - TESTIMONIALS
          -->





          <!--
            - CTA
          -->



          <!--
            - SERVICE
          -->


        </div>

      </div>

    </div>





    <!--
      - BLOG
    -->


  </main>





  <!--
    - FOOTER
  -->
  <footer>

    <div class="footer-category"></div>

    <div class="footer-nav">

      <div class="container">

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Popular Categories</h2>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Sortie</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Entrée</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Intrant</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Outils</a>
          </li>


        </ul>

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Products</h2>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Prices drop</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">New products</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Best sales</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Contact us</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Sitemap</a>
          </li>
        
        </ul>

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Our Company</h2>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Delivery</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Legal Notice</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Terms and conditions</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">About us</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Secure payment</a>
          </li>
        
        </ul>

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Services</h2>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Prices drop</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Nouveaux produuits</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Best sales</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Contact us</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Sitemap</a>
          </li>
        
        </ul>

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Contact</h2>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <address class="content">
              Y'ELLOW LAB, YAMOUSSOUKRO, Côte d'Ivoire
              
            </address>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="call-outline"></ion-icon>
            </div>

            <a href="tel:+225 0709749287" class="footer-nav-link">+225 0000000000</a>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <a href="mailto:yello.lab@inphb.ci" class="footer-nav-link">yello.lab@inphb.ci</a>
          </li>

        </ul>

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Follow Us</h2>
          </li>

          <li>
            <ul class="social-link">

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
              </li>

            </ul>
          </li>

        </ul>

      </div>

    </div>

    <div class="footer-bottom">

      <div class="container">

        <img src="./assets/images/payment.png" alt="payment method" class="payment-img">

        <p class="copyright">
          Copyright &copy; <a href="#">Y'ELLO LAB</a> all rights reserved.
        </p>

      </div>

    </div>

  </footer>






  <!--
    - custom js link
  -->
  <script src="assets/js/script.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>