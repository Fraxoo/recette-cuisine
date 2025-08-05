
<?php 

$recette = getAllrecette();


function getAllrecette() {
    $database = connect();
    $sql = "SELECT * FROM recette LIMIT 10 OFFSET 6;";
    $stmt = $database->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function add_recette($name, $description, $image) {
    $database = connect();
    $sql = "INSERT INTO recette (name, description,image) VALUES (?, ?, ?)";
    $stmt = $database->prepare($sql);
    $stmt->execute([$name, $description, $image]);
    return $database->lastInsertId();

}

function get_recette($id) {
    $database = connect();
    $sql = "SELECT * FROM recette WHERE id = ?";
    $stmt = $database->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Recettes</title>
</head>
<body>
    <h1>Liste des recettes</h1>
    <ul>
       
        <?php foreach ($recette as $recette): ?>
            <li>
                <a href="recette.php?id=<?= $recette['id'] ?>"><?= $recette['name'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <h2>Description</h2>
    <p>
        <?php if (isset($recette['description'])): ?>
            <?= $recette['description'] ?>
        <?php endif; ?>
    </p>
</body>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <header>
        <a href="profil.php">Mon profil</a>
        <a href="login.php">Se connecter</a>
        <a href="inscription.php">Créer un compte</a>
        <a href="logout.php">Se déconnecter</a>
    </header>
    <main>
        <h1>Recettes</h1>
        <div class="espace">
            <div class="sectionUn">
                <h2>Ajouter une recette :</h2>
                <form method="post" action="">
                    <div class="jisipa">
                        <div class="presentation">
                            <label for="name">Titre :</label>
                            <input name="name" type="text" placeholder="Titre de la recette" />
                        </div>
                        <div class="presentation">
                            <label for="description">Détails :</label>
                            <input class="zone" name="description" type="text" placeholder="Description, ingrédients, etc" />
                        </div>
                        <div class="presentation">
                            <label for="image">Ajouter une photo:</label>
                            <input type="file" name="image" accept="image/png, image/jpeg" />
                        </div>
                    </div>
                    <input class="send" type="submit" value="Ajouter la recette">
                </form>
            </div>
            <div class="sectionDeux">
                <h2>Dernières recettes mises en ligne : </h2>
                <div class="imagination">
                    <h3>Titre</h3>
                    <p>Photo</p>
                </div>
            </div>
        </div>
    </main>

</body>


</html>