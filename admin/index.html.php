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
            <li><a href="?status=valid">Validés</a></li>
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
                        $sql = "SELECT * FROM utilisateurs";
                        $prep = $pdo->prepare($sql);
                        $prep->execute();
                        echo "<table class='table table-hover'>";
                        echo "<tr><th>Nom</th><th>Prénom</th><th>Adresse</th></tr>";
                        while ($donnee = $prep->fetch()) {
                            switch ($donnee['validation']){
                                case 0:
                                    $status='warning';
                                    break;
                                case 1:
                                    $status='success';
                                    break;
                                case 2:
                                    $status='danger';
                                    break;
                            }
                            echo "<tr class='$status'><td>". $donnee['nom'] . "</td><td>". $donnee['prenom'] . "</td><td>" . $donnee['adresse'] . "</td><td><a href='action.php?status=1&id=".$donnee['id']."'>Valider</a></td><td><a href='action.php?status=2&id=".$donnee['id']."'>Refuser</a></td></tr>";
                        }
                        echo '</table>';
                        break;
                    case 'pending':
                        $sql = "SELECT * FROM utilisateurs WHERE validation = 0";
                        $prep = $pdo->prepare($sql);
                        $prep->execute();
                        while ($donnee = $prep->fetch()) {
                            echo $donnee['nom'] . " : " . $donnee['prenom'] . " " . $donnee['adresse'] . "<br>";
                        }
                        break;
                    case 'valid':
                        $sql = "SELECT * FROM utilisateurs WHERE validation = 1";
                        $prep = $pdo->prepare($sql);
                        $prep->execute();
                        while ($donnee = $prep->fetch()) {
                            echo $donnee['nom'] . " : " . $donnee['prenom'] . " " . $donnee['adresse'] . "<br>";
                        }
                        break;
                    case 'refuse':
                        $sql = "SELECT * FROM utilisateurs WHERE validation = 2";
                        $prep = $pdo->prepare($sql);
                        $prep->execute();
                        while ($donnee = $prep->fetch()) {
                            echo $donnee['nom'] . " : " . $donnee['prenom'] . " " . $donnee['adresse'] . "<br>";
                        }
                        break;
                    default:
                        $sql = "SELECT * FROM utilisateurs";
                        $prep = $pdo->prepare($sql);
                        $prep->execute();
                        echo "<table class='table table-hover'>";
                        echo "<tr><th>Nom</th><th>Prénom</th><th>Adresse</th></tr>";
                        while ($donnee = $prep->fetch()) {
                            switch ($donnee['validation']){
                                case 0:
                                    $status='warning';
                                    break;
                                case 1:
                                    $status='success';
                                    break;
                                case 2:
                                    $status='danger';
                                    break;
                            }
                            echo "<tr class='$status'><td>". $donnee['nom'] . "</td><td>". $donnee['prenom'] . "</td><td>" . $donnee['adresse'] . "</td><td><a href='action.php?status=1&id=".$donnee['id']."'>Valider</a></td><td><a href='action.php?status=2&id=".$donnee['id']."'>Refuser</a></td></tr>";
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