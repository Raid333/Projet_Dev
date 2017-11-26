<?php
session_start();
include('includes/header.php');
if (!isset($_SESSION['login'])) {
    header('Location: log.html.php');
    exit();
}
?>

<div class="container-fluid main-container">
    <div class="col-md-2 sidebar">
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="?status=all">Toutes les demandes</a></li>
            <li><a href="?status=pending">En attentes de validation</a></li>
            <li><a href="?status=valid">Validé</a></li>
            <li><a href="?status=refuse">Refusés</a></li>
        </ul>
    </div>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $listing = $_GET['status']; ?>
            </div>
            <div class="panel-body">
                <?php
                switch ($listing) {
                    case 'all':
                        $sql = "SELECT * FROM utilisateurs ORDER BY dateInsci";
                        $prep = $pdo->prepare($sql);
                        $prep->execute();
                        echo "<table class='table table-hover'>";
                        echo "<tr><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Date d'inscription</th><th>Actions</th></tr>";
                        while ($donnee = $prep->fetch()) {
                            switch ($donnee['validation']) {
                                case 0:
                                    $status = 'warning';
                                    break;
                                case 1:
                                    $status = 'success';
                                    break;
                                case 2:
                                    $status = 'danger';
                                    break;
                            }
                            echo "<tr class='$status' data-toggle='modal' data-target='.modal".$donnee['id']."'><td>" . $donnee['nom'] . "</td><td>" . $donnee['prenom'] . "</td><td>" . $donnee['adresse'] . "</td><td>" . $donnee['dateInsci'] . "</td><td><a href='traitement/action.php?status=1&id=" . $donnee['id'] . "'>Valider</a> <a href='traitement/action.php?status=2&id=" . $donnee['id'] . "'>Refuser</a></td></tr>";
                            echo "<div class=\"modal fade modal".$donnee['id']."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myLargeModalLabel\">
                                  <div class=\"modal-dialog modal-lg\" role=\"document\">
                                    <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                    <h4 class=\"modal-title\">Modification : ".$donnee['nom']." ". $donnee['prenom']."</h4>   
                                      </div>
                                      <div class=\"modal-body\">
                                        <form method='post' action='traitement/modifCdt.php'>
                                              <div class=\"form-group\">
                                                <label for=\"recipient-name\" class=\"control-label\">Adresse :</label>
                                                <input type=\"text\" name='adresse' class=\"form-control\" id=\"recipient-name\" value='".$donnee['adresse']."'>
                                              </div>
                                              <div class=\"form-group\">
                                                <label for=\"recipient-name\" class=\"control-label\">Ville :</label>
                                                <input type=\"text\" name='ville' class=\"form-control\" id=\"recipient-name\" value='".$donnee['ville']."'>
                                              </div>
                                              <div class=\"form-group\">
                                                <label for=\"recipient-name\" class=\"control-label\">E-mail :</label>
                                                <input type=\"text\" name='email' class=\"form-control\" id=\"recipient-name\" value='".$donnee['email']."'>
                                                <input type='hidden' name='id' value='".$donnee['id']."'>
                                              </div>
                                      </div>
                                      <div class=\"modal-footer\">
                                         <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Fermer</button>
                                         <button type=\"submit\" class=\"btn btn-primary\">Sauvegarder</button>
                                         </form>
                                     </div>
                                    </div>
                                  </div>
                                </div>";
                        }
                        echo '</table>';

                        break;
                    case 'pending':
                        $sql = "SELECT * FROM utilisateurs WHERE validation = 0 ORDER BY dateInsci";
                        $prep = $pdo->prepare($sql);
                        $prep->execute();
                        while ($donnee = $prep->fetch()) {
                            echo $donnee['nom'] . " : " . $donnee['prenom'] . " " . $donnee['adresse'] . "<br>";
                        }
                        break;
                    case 'valid':
                        $sql = "SELECT * FROM utilisateurs WHERE validation = 1 ORDER BY dateInsci";
                        $prep = $pdo->prepare($sql);
                        $prep->execute();
                        while ($donnee = $prep->fetch()) {
                            echo $donnee['nom'] . " : " . $donnee['prenom'] . " " . $donnee['adresse'] . "<br>";
                        }
                        break;
                    case 'refuse':
                        $sql = "SELECT * FROM utilisateurs WHERE validation = 2 ORDER BY dateInsci";
                        $prep = $pdo->prepare($sql);
                        $prep->execute();
                        while ($donnee = $prep->fetch()) {
                            echo $donnee['nom'] . " : " . $donnee['prenom'] . " " . $donnee['adresse'] . "<br>";
                        }
                        break;
                    default:

                        $sql = "SELECT * FROM utilisateurs ORDER BY dateInsci";
                        $prep = $pdo->prepare($sql);
                        $prep->execute();
                        echo "<table class='table table-hover'>";
                        echo "<tr><th>Nom</th><th>Prénom</th><th>Adresse</th></tr>";
                        while ($donnee = $prep->fetch()) {
                            switch ($donnee['validation']) {
                                case 0:
                                    $status = 'warning';
                                    break;
                                case 1:
                                    $status = 'success';
                                    break;
                                case 2:
                                    $status = 'danger';
                                    break;
                            }
                            echo "<tr class='$status'><td>" . $donnee['nom'] . "</td><td>" . $donnee['prenom'] . "</td><td>" . $donnee['adresse'] . "</td><td><a href='action.php?status=1&id=" . $donnee['id'] . "'>Valider</a></td><td><a href='action.php?status=2&id=" . $donnee['id'] . "'>Refuser</a></td></tr>";
                        }
                        echo '</table>';
                        break;
                }


                ?>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</div>

</body>
</html>