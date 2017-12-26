<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 25/11/2017
 * Time: 17:59
 */
session_start();
include('../includes/pdo.php');

$query = "UPDATE utilisateurs SET validation = :status WHERE id = :id";
$prep = $pdo->prepare($query);
$prep->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$prep->bindValue(':status', $_GET['status'], PDO::PARAM_INT);
$prep->execute();


header('Location: ../vues/index.html.php');
exit();