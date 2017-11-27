<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 27/11/2017
 * Time: 12:57
 */
include ('includes/header.php');
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: log.html.php');
    exit();
}
?>

<div class="container-fluid main-container">
<div class="panel panel-default">
            <div class="panel-heading">
</div>
<div class="panel-body">

</div>
</div>






<?php include ('includes/footer.php');?>