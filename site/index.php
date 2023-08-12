<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Y'ELLO LAB - eCommerce Website</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="image/logo/favicon.ico" type="image/x-icon">

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

try {
    // Connexion à la base de données avec PDO
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

    // Configuration des attributs de PDO pour afficher les erreurs en cas de besoin
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer les produits depuis la table "produit"
    $query = "SELECT * FROM produit";
    $result = $conn->query($query);

    // Traitement du résultat
    if ($result->rowCount() > 0) {
        echo "<h2>Liste des produits :</h2>";
        echo "<ul>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>Nom du produit : " . $row["nom_produit"] . " - Référence : " . $row["reference"] . "</li>";
        }
        echo "</ul>";
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
            <img src="Image/logo/lab.svg" alt="YELLOW's logo" width="120" height="36">
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
                    <a href="#">ENTREES</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">Capteur</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">Audio-Video</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">Biométrique</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">Sans Fils</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">Mecanique</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">
                      <img src="Image/electronique/biometrique.jpg" alt="headphone collection" width="250"
                        height="119">
                    </a>
                  </li>
  
                </ul>
  
                <ul class="dropdown-panel-list">
  
                  <li class="menu-title">
                    <a href="#">SORTIES</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">Afficheurs</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">Sonores</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">Eclairage</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">Moteurs</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">Communication</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">
                      <img src="assets/images/electronique/6.jpg" alt="men's fashion" width="250" height="119">
                    </a>
                  </li>
  
                </ul>
  
                <ul class="dropdown-panel-list">
  
                  <li class="menu-title">
                    <a href="#">INTRANT</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">Formal</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">Casual</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">Perfume</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">Cosmetics</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">Bags</a>
                  </li>
  
                  <li class="panel-list-item">
                    <a href="#">
                      <img src="assets/images/electronique/cuivre.jpg" alt="women's fashion" width="250" height="119">
                    </a>
                  </li>
  
                </ul>
  
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
                      <img src="assets/images/electronique/outils.jpg" alt="mouse collection" width="250" height="119">
                    </a>
                  </li>
  
                </ul>
  
              </div>
            </li>
  
            <li class="menu-category">
              <a href="#" class="menu-title">ROBOTIQUE</a>
            </li>
  
            <li class="menu-category">
              <a href="#" class="menu-title">Aéronautique </a>
            </li>
  
            <li class="menu-category">
              <a href="#" class="menu-title">Domotique</a>
            </li>
  
            <li class="menu-category">
              <a href="#" class="menu-title">Historique</a>
            </li>
  
            <li class="menu-category">
              <a href="#" class="menu-title">Projet</a>
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
  
              <img src="assets/images/electronique/drone1.jpeg" alt="women's latest fashion sale" class="banner-img">
  
              <div class="banner-content">
  
                <p class="banner-subtitle1">Aéronautique</p>
  
                <h2 class="banner-title">Prenez les commandes du futur</h2>
  
  
                <a href="#" class="banner-btn">Voir maintenant</a>
  
              </div>
  
            </div>
  
            <div class="slider-item">
  
              <img src="assets/Image/electronique/robot11.png" alt="modern sunglasses" class="banner-img">
  
              <div class="banner-content">
  
                <p class="banner-subtitle">ROBOTIQUE</p>
  
                <h2 class="banner-title">Prêt à révolutionner la recherche pour un avenir brillant </h2>
  
  
  
                <a href="#" class="banner-btn">Voir Maintenant </a>
  
              </div>
  
            </div>

            <div class="slider-item">
  
              <img src="assets/Image/electronique/domotique.jpg" alt="modern sunglasses" class="banner-img">
  
              <div class="banner-content">
  
                <p class="banner-subtitle" style="color: blueviolet;">DOMOTIQUE</p>
  
                <h2 class="banner-title" style="color: black;">Prendre soin de votre jardin à distance </h2>
  
  
  
                <a href="#" class="banner-btn">Voir Maintenant </a>
  
              </div>
  
            </div>
  
  
            </div>
  
          </div>
  
        </div>

    <div class="product-container">

        <div class="container">
  
  
  
          <div class="product-box">
  
  
  
            <div class="product-main">
  
              <h2 class="title">Produit</h2>
  
              <div class="product-grid">
  
                <div class="showcase">
  
                  <div class="showcase-banner">
  
                    <img src="assets/images/electronique/10.jpeg" alt="Mens Winter Leathers Jackets" width="300" class="product-img default">
                    <img src="assets/images/electronique/10.jpeg" alt="Mens Winter Leathers Jackets" width="300" class="product-img hover">
  
                    
  
                    <div class="showcase-actions">
  
                      <button class="btn-action">
                        <ion-icon name="heart-outline"></ion-icon>
                      </button>
  
                      <button class="btn-action">
                        <ion-icon name="eye-outline"></ion-icon>
                      </button>
  
                      <button class="btn-action">
                        <ion-icon name="repeat-outline"></ion-icon>
                      </button>
  
                      <button class="btn-action">
                        <ion-icon name="bag-add-outline"></ion-icon>
                      </button>
  
                    </div>
  
                  </div>
  
                  <div class="showcase-content">
  
                    <a  class="showcase-category">Carte electronique </a>
  
                    <a >
                      <h3 class="showcase-title">Rasberry pi4</h3>
                    </a>
  
                    <div class="price-box">
                      <p class="price">Quantité</p>
                      <p>32</p>
                    </div>
  
                    
                      <div class="counter-box">
                        <button class="decrement">-</button>
                        <p class = counter-value> 0</p>
                        <button class="increment">+</button>
                      </div>
                      
                    <div class="boutons-box">   
                      <button class="bouton-ajouter" style="background-color: aquamarine;">Restaurer</button>
                      <button class="bouton-ajouter"> Ajouter</button>
                    </div>
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

        <img src="assets/Image/payment.png" alt="payment method" class="payment-img">

        <p class="copyright">
          Copyright &copy; <a href="#">Y'ELLOW LAB</a> all rights reserved.
        </p>

      </div>

    </div>

  </footer>






  <!--
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>