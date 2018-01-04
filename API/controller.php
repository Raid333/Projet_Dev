<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 30/12/2017
 * Time: 12:46
 */


function getUser ($id) {
    require 'pdo.php';
    $prep = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = :id");
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    $user = $prep->fetch(PDO::FETCH_ASSOC);

    return $user;
}

function getUsers() {
    require 'pdo.php';
    $prep = $pdo->prepare('SELECT * FROM utilisateurs');
    $prep->execute();
    $users = $prep->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

function updateUser($id, $statut) {
    require 'pdo.php';
    $prep = $pdo->prepare('SELECT validation FROM utilisateurs where id = :id');
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    $user = $prep->fetch();
    $prep->closeCursor();

    if ($user['validation'] != 0 || !isset($user['validation'])) {
        return false;
    } else {
        $prep = $pdo->prepare('UPDATE utilisateurs SET validation = :statut WHERE id = :id');
        $prep->bindValue(':statut', $statut, PDO::PARAM_INT);
        $prep->bindValue(':id', $id, PDO::PARAM_INT);
        $prep->execute();
        return true;
    }




}