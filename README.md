# Plateforme admin - Site événementiel

## Fonctionnement

* Accès au back office (../admin), connexion à cette plateforme (login, mdp admin)
* Possibilité de voir en fonction de l'onglet sélectionné (Toutes les demandes, en attente de validation, validés, réfusés) le statut des candidatures pour l'événement
* Le statut de chaque candidature est visible par le bias d'un code couleur (jaune : pending / vert : valid / rouge : refuse)
* L'administrateur  peut accéder à une page descriptive de la personne, il peut y modifier certaines informations (pour le moment : e-mail, adresse, ville, code postal). Au sein de cette page, il est possible pour les utilisateurs validés, de leur générer un billet afin qu'il puisse accèder à l'événement.
* Il peut aussi gérer leur validation ou leur refus (une fois l'opération réalisée, il est impossible de revenir en arrière)
* Un pager est aussi présent pour naviguer entre les différentes pages, les nombres d'entrés affichées par page est définissable au sein du code

### notes :
* Back office admin développé dans le respect de la méthode MVC.
* Utilisation de la lib FPDF pour la génération de billet sous format pdf.
