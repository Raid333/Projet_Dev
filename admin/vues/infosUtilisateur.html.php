<?php
session_start();
include('../includes/header.php');
include('../traitements/modeleUtilisateurs.php');
$id = $_GET['id'];
$utilisateur = getUtilisateur($id);
//RETRANSMETTRE LES ID SI ERREUR DANS LES CHAMPS
?>
<style>
    .inputObligatoire:after {
        content: "*";
        color: red;
    }
</style>

<div class="container-fluid main-container">
    <div class="col-md-8 col-md-offset-2 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Modification : <?php echo $utilisateur['nom'] ." ". $utilisateur['prenom'];?></h4>
            </div>
            <div class="panel-body">
                <?php if (isset($_GET['error'])){echo '<span style="color:red">Problème dans les champs !</span>';}?>
                <form method="post" action="../traitements/modifCdt.php">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="inputObligatoire" for="inputEmail4">E-mail</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $utilisateur['email'];?>" id="inputEmail4" placeholder="E-mail" required>
                            <input type="hidden" name="id" value="<?php echo $utilisateur['id'];?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="inputObligatoire" for="inputCity">Adresse</label>
                            <input type="text" name="adresse" class="form-control" value="<?php echo $utilisateur['adresse'];?>" id="inputCity" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="inputObligatoire" for="inputState">Ville</label>
                            <input type="text" name="ville" class="form-control" value="<?php echo $utilisateur['ville'];?>" id="inputCity" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="inputObligatoire" for="inputZip">Code Postal</label>
                            <input type="text" name="zipCode" class="form-control" value="<?php echo $utilisateur['codePostal'];?>" id="inputZip" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputCity"><br>Civilité</label>
                                <input class="form-control" id="disabledInput" type="text" value="<?php echo $utilisateur['civilite'];?>" disabled>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCity">Date de naissance</label>
                                <input class="form-control" id="disabledInput" type="text" value="<?php echo $utilisateur['dateNaissance'];?>" disabled>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCity">Date d'inscription</label>
                                <input class="form-control" id="disabledInput" type="text" value="<?php echo $utilisateur['dateInsci'];?>" disabled>
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-success pull-right" style="margin-left: 10px; margin-top: 60px;">
                            Sauvegarder
                        </button>
                        <a class="btn btn-default pull-right" style="margin-top: 60px" href="javascript:history.back()">Retour</a>
                    <?php if ($utilisateur['validation'] == 1) {
                   echo "<a class='pull-right' target='_blank' style='margin-top: 68px; margin-right: 5px' href='../traitements/billet.php?user=". $utilisateur['id'] ."'>Générer le billet</a>";
                } ?>
                </form>
            </div>
        </div>
    </div>

    <?php include('../includes/footer.php');?>