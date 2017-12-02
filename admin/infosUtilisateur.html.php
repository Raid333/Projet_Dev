<?php
session_start();
include('includes/header.php');
include ('modeleUtilisateurs.php');
$id = $_GET['id'];
$utilisateur = getUtilisateur($id);

?>
<div class="container-fluid main-container">
<div class="panel panel-default">
        <div class="panel-heading">

        </div>
        <div class="panel-body">

</div>
</div>


<?php include('includes/footer.php'); ?>
