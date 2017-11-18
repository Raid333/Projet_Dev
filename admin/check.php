<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 18/11/2017
 * Time: 11:35
 */
session_start();
const ADMIN_LOGIN = "admin";
const ADMIN_PASSWORD = "password";

if ($_POST['login'] == ADMIN_LOGIN AND $_POST['password'] == ADMIN_PASSWORD) {
    // $_SESSION['login'] = true;
    $_SESSION['login'] = $_POST['login'];
    header('Location: index.html.php');
    exit();
} else {
    header(('Location: log.html.php?error=1'));
    exit();
}



