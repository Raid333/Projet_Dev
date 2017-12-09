<?php
session_start();
include('includes/header.php');
if (!isset($_SESSION['login'])) {
    header('Location: log.html.php');
    exit();
}

//test
include('modeleUtilisateurs.php');
include ('pager.html.php');
?>

<div class="container-fluid main-container">
<div class="col-md-2 sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="<?php if ($_GET['status'] == ""){echo "active";}?>"><a href="?status=">Toutes les demandes</a></li>
        <li class='<?php if ($_GET['status'] == "0"){echo "active";}?>'><a href="?status=0">En attentes de validation</a></li>
        <li class='<?php if ($_GET['status'] == "1"){echo "active";}?>'><a href="?status=1">Validé</a></li>
        <li class='<?php if ($_GET['status'] == "2"){echo "active";}?>'><a href="?status=2">Refusés</a></li>
    </ul>
</div>
    <div class="col-md-10 content">
    <div class="panel panel-default">
        <div class="panel-heading">

        </div>
        <div class="panel-body">
            <?php

            if (isset($_GET['status'])){$valide = $_GET['status'];} else {$valide="";}
            $utilisateurs = getUtilisateurs($valide);
            echo "<table class='table table-hover'>
                    <tr><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Date d'inscription</th><th>Actions</th></tr>";
            foreach ($utilisateurs as $utilisateur) {
                $couleur = getCouleur($utilisateur['validation']);
                if ($utilisateur['validation'] == 0) {
                    echo "<tr class='$couleur'><td>" . $utilisateur['nom'] . "</td><td>" . $utilisateur['prenom'] . "</td><td>" . $utilisateur['adresse'] . "</td><td>" . $utilisateur['dateInsci'] . "</td><td> <a href='traitement/action.php?status=1&id=" . $utilisateur['id'] . "'><i class=\"fa fa-lg fa-check\" aria-hidden=\"true\"></i></a> <a href='traitement/action.php?status=2&id=" . $utilisateur['id'] . "'><i class=\"fa fa-lg fa-times\" aria-hidden=\"true\"></i></a> <a href='infosUtilisateur.html.php?id=" . $utilisateur['id'] . "'> <i class=\"fa fa-lg fa-pencil-square-o\" aria-hidden=\"true\"></i></a></td></tr>";
                } else {
                    echo "<tr class='$couleur'><td>" . $utilisateur['nom'] . "</td><td>" . $utilisateur['prenom'] . "</td><td>" . $utilisateur['adresse'] . "</td><td>" . $utilisateur['dateInsci'] . "</td><td> <a href='infosUtilisateur.html.php?id=" . $utilisateur['id'] . "'> <i class=\"fa fa-lg fa-pencil-square-o\" aria-hidden=\"true\"></i></a></td></tr>";
                }
            }
            echo '</table>';
            getPager(2,1);
            ?>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
