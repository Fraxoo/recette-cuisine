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

?>
