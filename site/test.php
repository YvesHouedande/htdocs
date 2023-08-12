<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page 1</title>
    <link rel="stylesheet" href="connexion(1).css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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

    // Maintenant, la connexion est établie et prête à être utilisée
    // Vous pouvez effectuer des opérations sur la base de données ici

    // Par exemple, exécution d'une requête SQL
    $query = "SELECT * FROM utilisateur";
    $result = $conn->query($query);

    // Traitement du résultat
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "ID: " . $row["id_utilisateur"] . " - Nom: " . $row["nom"] . " - Prénom: " . $row["prenom"] . "<br>";
        }
    } else {
        echo "Aucun résultat trouvé.";
    }

    // Fermeture de la connexion
    $conn = null;
} catch (PDOException $e) {
    // En cas d'erreur, affichage du message d'erreur
    die("Erreur de connexion : " . $e->getMessage());
}
?>




<body>
    <div class="wrapper">
        <form action="" >
            <h1> Page de connexion </h1>
            <div class="input-box">
                <input type="text" placeholder="Nom" required> 
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Mot de passe" required>  
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Me reconnecter </label>
                <a href="#">Mot de passe oublier</a>

            </div>
            <button type="submit" class="btn"> Connexion </button>
            <div class="register-link">
                <p>Vous n'avez pas de compte ?
                    <a href="#">Enregistez vous </a>
                </p>

            </div>

        </form>
    </div>
</body>
</html>