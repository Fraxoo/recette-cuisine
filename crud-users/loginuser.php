<?php

require_once('connect.php');

function loginuser($email,$password){
    $bdd = connect();
    if(isset($email,$password));
        $request = $bdd->prepare('SELECT * FROM user WHERE email = :email');
        $request->execute([
            'email' => $email
        ]);
    $usercompte = $request->fetch(pdo::FETCH_ASSOC);
    if($usercompte && password_verify($password,$usercompte['password'])){
        $_SESSION['id'] = $usercompte['id'];
        $_SESSION['nom'] = $usercompte['nom'];
    }else{
        return "Email ou Mot de passe incorrect";
    }
}



?>