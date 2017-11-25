<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 20/11/2017
 * Time: 11:00
 */
try  {
$strConnection = 'mysql:host=localhost;dbname=siteevent';
$pdo = new PDO($strConnection, 'root', '');}
catch (Exception $e){
    die ('Erreur : ' . $e->getMessage());
}