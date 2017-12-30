<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 30/12/2017
 * Time: 12:46
 */


function getUser ($id) {
    try  {
        $strConnection = 'mysql:host=localhost;dbname=testdb';
        $pdo = new PDO($strConnection, 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));}
    catch (Exception $e){
        die ('Erreur : ' . $e->getMessage());
    }

    $prep = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    $user = $prep->fetch();

    return $user;
}