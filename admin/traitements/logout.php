<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 18/11/2017
 * Time: 12:27
 */
session_start();
session_destroy();
header('Location: ../vues/index.html.php');
exit();
