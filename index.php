<?php

?>

<!DOCTYPE html>
<html lang="en">

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