# Plateforme admin - Site événementiel

## Fonctionnement

* Accès au back office (../admin), connexion à cette plateforme (login, mdp admin)
* Possibilité de voir en fonction de l'onglet sélectionné (Toutes les demandes, en attente de validation, validés, réfusés) le statut des candidatures pour l'événement
* Le statut de chaque candidature est visible par le bias d'un code couleur (jaune : pending / vert : valid / rouge : refuse)
* Au sein de ces différents onglets, l'admin peut modifier les infos modifiables des différents candidats (à définir mais pour le moment : e-mail, adresse, ville, code postal)
* Il peut aussi gérer leur validation ou leur refus (une fois l'opération réalisée, il est impossible de revenir en arrière)
* Un pager est aussi présent pour naviguer entre les différentes pages, les nombres d'entrés affichées par page est définissable au sein du code

### notes :
Back office admin développé dans le respect de la méthode MVC
