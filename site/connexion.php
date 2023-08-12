<?php
// Informations de connexion à la base de données
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'gestion';

// Variable pour stocker les messages d'erreur ou de succès
$message = '';

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs du formulaire
    $nom = $_POST['nom_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];

    try {
        // Connexion à la base de données avec PDO
        $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

        // Configuration des attributs de PDO pour afficher les erreurs en cas de besoin
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour vérifier les identifiants dans la table "utilisateur"
        $query = "SELECT * FROM utilisateur WHERE nom = :nom AND mot_de_passe = :mot_de_passe";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe);
        $stmt->execute();

        // Requête pour vérifier les identifiants dans la table "administrateur"
        $query_admin = "SELECT * FROM administrateur WHERE nom = :nom AND mot_de_passe = :mot_de_passe";
        $stmt_admin = $conn->prepare($query_admin);
        $stmt_admin->bindParam(':nom', $nom);
        $stmt_admin->bindParam(':mot_de_passe', $mot_de_passe);
        $stmt_admin->execute();

        // Vérification du résultat des deux requêtes
        if ($stmt->rowCount() > 0 || $stmt_admin->rowCount() > 0) {
            // L'utilisateur est authentifié avec succès
            // Redirection vers exemple.php après une connexion réussie
            header('Location: index.html');
            exit();
        } else {
            // Identifiants incorrects
            $message = "Nom ou mot de passe incorrect.";
        }

        // Fermeture de la connexion
        $conn = null;
    } catch (PDOException $e) {
        // En cas d'erreur, affichage du message d'erreur
        $message = "Erreur de connexion : " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="connexion(1).css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Page de connexion</h1>
            <div class="input-box">
                <input type="text" name="nom_utilisateur" placeholder="Nom d'utilisateur" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Me reconnecter</label>
                <a href="#">Mot de passe oublié</a>
            </div>
            <button type="submit" class="btn">Connexion</button>
            <div class="register-link">
                <p>Vous n'avez pas de compte ?
                    <a href="#">Enregistrez-vous</a>
                </p>
            </div>
        </form>

        <?php
        // Affichage du message de connexion
        if (!empty($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>
    </div>
</body>
</html>
