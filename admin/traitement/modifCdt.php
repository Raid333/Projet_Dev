<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 25/11/2017
 * Time: 22:49
 */

//UPDATE INFO CANDIDAT à FAIRE..
session_start();
include ('../includes/pdo.php');
if (!empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['email']) && !empty($_POST['zipCode']) && !empty($_POST['id'])) {
    try {
        $sql = "UPDATE utilisateurs SET adresse = :adresse, codePostal= :zip,ville = :ville, email = :email WHERE id = :id";
        $prep = $pdo->prepare($sql);
        $prep->bindValue(':adresse', $_POST['adresse']);
        $prep->bindValue(':ville', $_POST['ville']);
        $prep->bindValue(':email', $_POST['email']);
        $prep->bindValue(':zip', $_POST['zipCode']);
        $prep->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $prep->execute();
        header('Location: ../index.html.php');
        exit();
    }

catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}} else {
    header('Location: ../infosUtilisateur.html.php?error=1');
    exit();
}