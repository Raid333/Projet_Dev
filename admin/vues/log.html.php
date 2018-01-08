<?php
include('../includes/header.php');
session_start();
if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-lg-offset-6 col-md-4">
            <div class="form-login">
                <h4>Connexion ADMIN</h4>
                <form action="../traitements/check.php" method="post">
                    <?php if (isset($_GET['error']) == 1 ) { echo '<p class="text-danger text-center">Identifiant / Mot de passe incorrect !</p>';}
                    else if (isset($_GET['error']) == 2) { echo '<p class="text-danger text-center">Veuillez bien rentrer votre Identifiant / Mot de passe !</p>';}
                    ?>
                    <input type="text" id="userName" class="form-control input-sm chat-input" name="login"
                           placeholder="Identifiant" required/>
                    </br>
                    <input type="password" id="userPassword" class="form-control input-sm chat-input" name="password"
                           placeholder="Mot de passe" required/>
                    </br>
                    <div class="wrapper">
            <span class="group-btn">
                <button type="submit" class="btn btn-primary btn-md">Login <i class="fa fa-sign-in"></i></button>
            </span>
                </form>
            </div>
        </div>

    </div>
</div>
<?php include('../includes/footer.php'); ?>
