<?php 
  


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


  <div class="overlay" data-overlay></div>

  <!--
    - MODAL
  -->

  <div class="modal" data-modal>

    <div class="modal-close-overlay" data-modal-overlay></div>

    <div class="modal-content">

      <button class="modal-close-btn" data-modal-close>
        <ion-icon name="close-outline"></ion-icon>
      </button>


    </div>

  </div>





  <!--
    - NOTIFICATION TOAST
  -->

  <div class="notification-toast" data-toast>

    <button class="toast-close-btn" data-toast-close>
      
    </button>

  </div>





  <!--
    - HEADER
  -->

  <header>

    

    <div class="header-main">

        <div class="container">
  
          <a href="#" class="header-logo">
            <img src="./assets/images/logo/logo.svg" alt="YELLO's logo" width="120" height="36">
          </a>
  
          <div class="header-search-container">
  
            <input type="search" name="search" class="search-field" placeholder="Enter your product name...">
  
            <button class="search-btn">
              <ion-icon name="search-outline"></ion-icon>
            </button>
  
          </div>
  
          <div class="header-user-actions">
   
            <button class="action-btn">
              <ion-icon name="bag-handle-outline"></ion-icon>
              <span class="count">0</span>
            </button>
  
          </div>
  
        </div>
  
      </div>
  
      <nav class="desktop-navigation-menu">
  
        <div class="container">
  
          <ul class="desktop-menu-category-list">
  
            <li class="menu-category">
              <a href="#" class="menu-title">Home</a>
            </li>
  

            
            <li class="menu-category">
              <a href="#" class="menu-title">Categories</a>
  
              <div class="dropdown-panel">
  



                <ul class="dropdown-panel-list">
  
                  <li class="menu-title">
                    <a href="#"></a>
                  </li>
        <?php  
        
        try {
          // Connexion à la base de données avec PDO
          $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
      
          // Configuration des attributs de PDO pour afficher les erreurs en cas de besoin
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
          // Requête pour récupérer les produits depuis la table "produit"
          $query = "SELECT * FROM categorie";
          $result = $conn->query($query);
      
          // Traitement du résultat
          if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

              ?>
              <li class="panel-list-item">
                    <a href="category.php?nom=<?php echo $row["nom"] ?>"><?php echo $row["nom"] ?></a>
                  </li>
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
  
                </ul>

              </div>


              
            </li>
  



            <li class="menu-category">
              <a href="type.php?type=Intrant" class="menu-title">Intrants</a>
            </li>
  
            <li class="menu-category">
              <a href="type.php?type=Sortie" class="menu-title">Sorties </a>
            </li>
  
            <li class="menu-category">
              <a href="type.php?type=Entree" class="menu-title">Entrees</a>
            </li>

            <li class="menu-category">
              <a href="type.php?type=outil" class="menu-title">Outils</a>
            </li>
  
          </ul>
  
        </div>
  
      </nav>

    <div class="mobile-bottom-navigation">

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <button class="action-btn">
        <ion-icon name="home-outline"></ion-icon>
      </button>


      <button class="action-btn">
        <ion-icon name="bag-handle-outline"></ion-icon>

        <span class="count">0</span>
      </button>




    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

      <div class="menu-top">
        <h2 class="menu-title">Menu</h2>

        <button class="menu-close-btn" data-mobile-menu-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>

      <ul class="mobile-menu-category-list">

        <li class="menu-category">
          <a href="#" class="menu-title">Home</a>
        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Men's</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Shirt</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Shorts & Jeans</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Safety Shoes</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Wallet</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Women's</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Dress & Frock</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Earrings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Necklace</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Makeup Kit</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Jewelry</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Earrings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Couple Rings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Necklace</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Bracelets</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Perfume</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Clothes Perfume</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Deodorant</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Flower Fragrance</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Air Freshener</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">
          <a href="#" class="menu-title">Blog</a>
        </li>

        <li class="menu-category">
          <a href="#" class="menu-title">Hot Offers</a>
        </li>

      </ul>

      <div class="menu-bottom">

        <ul class="menu-category-list">

          <li class="menu-category">

            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Language</p>

              <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
            </button>

            <ul class="submenu-category-list" data-accordion>

              <li class="submenu-category">
                <a href="#" class="submenu-title">English</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Espa&ntilde;ol</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Fren&ccedil;h</a>
              </li>

            </ul>

          </li>

          <li class="menu-category">
            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Currency</p>
              <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
            </button>

            <ul class="submenu-category-list" data-accordion>
              <li class="submenu-category">
                <a href="#" class="submenu-title">USD &dollar;</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">EUR &euro;</a>
              </li>
            </ul>
          </li>

        </ul>

        <ul class="menu-social-container">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

        </ul>

      </div>

    </nav>

  </header>





  <!--
    - MAIN
  -->

  <main>

    <!--
      - BANNER
    -->

    <div class="banner">

        <div class="container">
  
          <div class="slider-container has-scrollbar">
  
            <div class="slider-item">
  
              <img src="./assets/images/electronique/drone1.jpeg" alt="women's latest fashion sale" class="banner-img">
  
              <div class="banner-content">
  
                <p class="banner-subtitle1">Aéronautique</p>
  
                <h2 class="banner-title">Prenez les commandes du futur</h2>
  
  
                <a href="#" class="banner-btn">Voir maintenant</a>
  
              </div>
  
            </div>
  
            <div class="slider-item">
  
              <img src="./assets/images/electronique/robot11.png" alt="modern sunglasses" class="banner-img">
  
              <div class="banner-content">
  
                <p class="banner-subtitle">ROBOTIQUE</p>
  
                <h2 class="banner-title">Prêt à révolutionner la recherche pour un avenir brillant </h2>
  
  
  
                <a href="#" class="banner-btn">Voir Maintenant </a>
  
              </div>
  
            </div>

            <div class="slider-item">
  
              <img src="./assets/images/electronique/domotique.jpg" alt="modern sunglasses" class="banner-img">
  
              <div class="banner-content">
  
                <p class="banner-subtitle" style="color: blueviolet;">DOMOTIQUE</p>
  
                <h2 class="banner-title" style="color: black;">Prendre soin de votre jardin à distance </h2>
  
  
  
                <a href="#" class="banner-btn">Voir Maintenant </a>
  
              </div>
  
            </div>
  
  
            </div>
  
          </div>
  
        </div>





    <!--
      - CATEGORY
    -->






    <!--
      - PRODUCT
    -->

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

    // gerer la pagination
    $nb_per_page = 4;

    // Numéro de la page actuelle
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

    // Calcul de l'offset
    $offset = ($page - 1) * $nb_per_page;

    // Requête SQL pour récupérer les articles pour la page en cours
    $sql = "SELECT * FROM produit ORDER BY id_produit DESC LIMIT $offset, $nb_per_page";
    $result = $conn->query($sql);

// Récupération des données
// $articles = array();
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $articles[] = $row;
//     }
// }



    // Requête pour récupérer les produits depuis la table "produit"
    // $query = "SELECT * FROM produit";
    // $result = $conn->query($query);

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

  <div class="showcase-content" id=<?php echo $row["id_produit"]; ?>>

    <a class="showcase-category"><?php echo $row["typee"]; ?></a>

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
      <button class="bouton-ajouter bouton-ajouterR" style="background-color: aquamarine;">Restaurer</button>
      <button class="bouton-ajouter bouton-ajouterA "> Ajouter</button>
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


    <div>

      <div class="container">

        <div class="testimonials-box">


        </div>

      </div>

    </div>
    <div class="pagination">
    <?php 

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    // Configuration des attributs de PDO pour afficher les erreurs en cas de besoin
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour compter le nombre total d'articles
    $sql_total_produits = "SELECT COUNT(*) AS total FROM produit";
    $result_total_produits = $conn->query($sql_total_produits);
    $row_total_produits = $result_total_produits->fetch();
    $total_produits = $row_total_produits['total'];

    // Calcul du nombre total de pages
    $total_pages = ceil($total_produits / $nb_per_page);

} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

    ?>
        <ul>
          <?php 
          for ($i = 1; $i <= $total_pages; $i++) {
            if (isset($_GET["page"]) && $i === (int)($_GET["page"])){
              echo "<li> <a class= 'active' href='?page=" . $i . "'>" . $i . "</a> </li>";
            }else{
              echo "<li> <a  href='?page=" . $i . "'>" . $i . "</a> </li>";
            }
            
        }


        // for($i=)
        // $current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        // for($i=$current_page; $i< $current_page+1; $i++){
        //     if($current_page === 1){
        //       echo "<li> <a class= 'active' href='?page=" . $i . "'>" . $i . "</a> </li>";
        //     }
        // }
          ?>
        </ul>

  <style>

.pagination {
    text-align: center;
    margin-top: 20px;
}

.pagination ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.pagination li {
    display: inline-block;
    margin: 5px;
}

.pagination li a {
    text-decoration: none;
    padding: 5px 10px;
    border: 1px solid #ccc;
    color: #333;
}

.pagination li a:hover {
    background-color: #f2f2f2;
}

.active {
  background-color: #ff8f9c;
}
  </style>

    </div>

  </main>





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
  <script src="assets/js/commande.js"></script>


  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>