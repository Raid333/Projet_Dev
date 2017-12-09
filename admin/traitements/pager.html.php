<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 03/12/2017
 * Time: 17:51
 */


function getPager($valid) {
    include('../includes/pdo.php');
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
    echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
    for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
    {
        //On va faire notre condition
        if($i==$pageActuelle) //Si il s'agit de la page actuelle...
        {
            echo ' [ '.$i.' ] ';
        }
        else //Sinon...
        {
            echo ' <a href="index.html.php?status='.$valid.'&page='.$i.'">'.$i.'</a> ';
        }
    }
    echo '</p>';
}

 //Nous allons afficher 5 messages par page.

//Une connexion SQL doit être ouverte avant cette ligne...

 //On récupère le total pour le placer dans la variable $total.

//Nous allons maintenant compter le nombre de pages.



 // On calcul la première entrée à lire

// La requête sql pour récupérer les messages de la page actuelle.
