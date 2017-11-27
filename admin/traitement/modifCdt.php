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

$sql = "UPDATE utilisateurs SET adresse = :adresse, ville = :ville, email = :email WHERE id = :id";
$prep = $pdo->prepare($sql);
$prep->bindValue(':adresse', $_POST['adresse']);
$prep->bindValue(':ville', $_POST['ville']);
$prep->bindValue(':email', $_POST['email']);
$prep->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$prep->execute();
header('Location: ../index.html.php');
exit();