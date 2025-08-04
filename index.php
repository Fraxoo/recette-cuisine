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
</html>