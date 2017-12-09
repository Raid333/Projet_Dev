<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 02/12/2017
 * Time: 10:41
 */

function getUtilisateurs($valid)
{
    include("includes/pdo.php");

    $messagesParPage = 3;
    if ($valid == "") {
        $rq = "SELECT COUNT(*) AS total FROM utilisateurs";
    } else {
        $rq = "SELECT COUNT(*) AS total FROM utilisateurs WHERE validation = :valid";
    }
    $prep = $pdo->prepare($rq);
    $prep->bindValue(':valid', $valid, PDO::PARAM_INT);
    $prep->execute();
    $retour_total = $prep->fetch();
    $prep->closeCursor();
    $total = $retour_total['total'];

    $nombreDePages = ceil($total / $messagesParPage);

    if (isset($_GET['page'])) // Si la variable $_GET['page'] existe...
    {
        $pageActuelle = intval($_GET['page']);

        if ($pageActuelle > $nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
        {
            $pageActuelle = $nombreDePages;
        }
    } else // Sinon
    {
        $pageActuelle = 1; // La page actuelle est la n°1
    }

    $premiereEntree = ($pageActuelle - 1) * $messagesParPage;

    if ($valid == "") {
        $sql = "SELECT * FROM utilisateurs ORDER BY dateInsci DESC LIMIT $premiereEntree, $messagesParPage";
    } else {
        $sql = "SELECT * FROM utilisateurs WHERE validation = :valid  ORDER BY dateInsci DESC LIMIT $premiereEntree, $messagesParPage";
    }
    $prep = $pdo->prepare($sql);
    $prep->bindValue(':valid', $valid, PDO::PARAM_INT);
    $prep->execute();
    $utilisateurs = $prep->fetchAll();
    return $utilisateurs;
}

function getUtilisateur($id)
{
    // A FAIRE !!!
    require('includes/pdo.php');
    $sql = "SELECT * FROM utilisateurs WHERE id = :id";
    $prep = $pdo->prepare($sql);
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    $utilisateur = $prep->fetch();
    return $utilisateur;
}

function getCouleur($valid)
{
    switch ($valid) {
        case 0:
            $couleur = 'warning';
            break;
        case 1:
            $couleur = 'success';
            break;
        case 2:
            $couleur = 'danger';
            break;
    }
    return $couleur;
}
//try {
//    $sql = "SELECT * FROM utilisateurs WHERE validation = :valid  ORDER BY dateInsci";
//    $prep = $pdo->prepare($sql);
//    $prep->bindValue(':valid', $_GET['test'], PDO::PARAM_INT );
//    $prep->execute();
//} catch (Exception $e) {
//    die ($e->getMessage());
//}

//$prep->debugDumpParams();
//$valide = $_GET['test'];
//$utilisateurs = getUtilisateur($valide);
//foreach ($utilisateurs as $utilisateur) {
//    echo $utilisateur['prenom'];
//}

