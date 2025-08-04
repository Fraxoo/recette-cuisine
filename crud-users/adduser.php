<?php 

require_once('connect.php');

function adduser($nom,$email,$password){
    $bdd = connect();
    $passwordhash = password_hash($password,PASSWORD_BCRYPT);
    $request = $bdd->prepare('INSERT INTO user (nom,email,password) VALUES (:nom,:email,:password)');
    $request->execute([
        'nom' => $nom,
        'email' => $email,
        'password' => $passwordhash
    ]);
}




?>
