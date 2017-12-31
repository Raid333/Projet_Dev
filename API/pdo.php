<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 30/12/2017
 * Time: 12:47
 */

try  {
    $strConnection = 'mysql:host=localhost;dbname=siteevent';
    $pdo = new PDO($strConnection, 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));}
catch (Exception $e){
    die ('Erreur : ' . $e->getMessage());
}