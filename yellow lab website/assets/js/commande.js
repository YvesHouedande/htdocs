// Vérifier si un cookie existe déjà avec le nom spécifié
function checkCookieExists(cookieName) {
    const cookies = document.cookie.split("; ");
    for (const cookie of cookies) {
      const [name, value] = cookie.split("=");
      if (name === cookieName) {
        return true; // Le cookie existe déjà
      }
    }
    return false; // Le cookie n'existe pas
  }
  
  // Créer le cookie s'il n'existe pas déjà
  function createCookie(cookieName, cookieValue, expirationDays) {
    if (!checkCookieExists(cookieName)) {
      const date = new Date();
      date.setTime(date.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
      const expires = "expires=" + date.toUTCString();
      document.cookie = cookieName + "=" + encodeURIComponent(cookieValue) + "; " + expires + "; path=/";
      return true; // Le cookie a été créé avec succès
    }
    return false; // Le cookie existe déjà, il n'a pas été créé
  }
  
//   // Exemple d'utilisation pour créer un cookie nommé "mon_cookie" avec la valeur "ma_valeur" et une expiration de 30 jours
//   const cookieName = "mon_cookie";
//   const cookieValue = "ma_valeur";
//   const expirationDays = 30;
//   const cookieCreated = createCookie(cookieName, cookieValue, expirationDays);
  
//   if (cookieCreated) {
//     console.log("Le cookie a été créé avec succès.");
//   } else {
//     console.log("Le cookie existe déjà, il n'a pas été créé à nouveau.");
//   }
  

// creer le cookie panier
const cookieCreated = createCookie(panier, '', 2);
var products = document.querySelectorAll(".showcase-content");


function getProductInfos(showcaseContent){

// Accéder à l'élément prix (la première balise <p> avec la classe "price")
const priceElement = showcaseContent.querySelector('.price');
const priceValue = priceElement.textContent; // Obtenez la valeur du prix


// Accéder à l'élément quantité (la première balise <p> avec la classe "qte")
const quantityElement = showcaseContent.querySelector('.qte');
const quantityValue = quantityElement.textContent; // Obtenez la valeur de la quantité


// Accéder à l'élément type (la première balise <a> avec la classe "showcase-category")
const typeElement = showcaseContent.querySelector('.showcase-category');
const typeValue = typeElement.textContent; // Obtenez la valeur du type


// Accéder au bouton "ajouter" (le premier bouton avec la classe "bouton-ajouter")
const addButton = showcaseContent.querySelector('.bouton-ajouterA');
const RestButton = showcaseContent.querySelector('.bouton-ajouterR');

    return {
        'id_produit':showcaseContent.id,
        'quantityValue':quantityValue,
        'typeValue':typeValue,
        'priceValue':priceValue,
        'counterValue':showcaseContent.querySelector('.counter-value').textContent
    }

}



function getCart() {
    const cookies = document.cookie.split("; ");
    for (const cookie of cookies) {
      const [name, value] = cookie.split("=");
      if (name === "panier") {
        // Décoder la valeur JSON du cookie
        const panierJSON = decodeURIComponent(value);
        // Convertir la chaîne JSON en objet JavaScript (le panier)
        return JSON.parse(panierJSON);
      }
    }
    return []; // Retourner un tableau vide si le panier est vide ou non défini
  }

products.forEach(product=>{
    product.querySelector(".bouton-ajouterA").addEventListener('click', () => {
        // Utilisation de la syntaxe de template littéral pour afficher la valeur du texte
        let productInfos = getProductInfos(product);

      });
}

)
// console.log(products)