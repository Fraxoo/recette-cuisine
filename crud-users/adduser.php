<?php 

require_once('connect.php');



function doublecompte($email){
    $bdd = connect();
    $request = $bdd->prepare('SELECT email FROM user WHERE email = :email');
    $request->execute([
        'email' => $email
    ]);

    $double = $request->fetchColumn();
    return $double !== false;
}

function adduser($nom,$email,$password){
    $bdd = connect();
    if(doublecompte($email)){
    $passwordhash = password_hash($password,PASSWORD_BCRYPT);
    $request = $bdd->prepare('INSERT INTO user (nom,email,password) VALUES (:nom,:email,:password)');
    $request->execute([
        'nom' => $nom,
        'email' => $email,
        'password' => $passwordhash
    ]);
    }else{
        return 'Adresse email déja utilisé';
    }
}




?>
