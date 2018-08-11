<?php require_once "adminsFunctions.php";
require_once dirname(__DIR__)."/controller/requestsHandlers.php";

if (!isset($_GET['id'])){
    die();
}
$id = validateGet('id');
$admin = GetOneAdmin($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Page-->
    <title>Administrateurs</title>
    <?php include "../includes/meta_links.php"?>

</head>

<body class="">
    <?php include "../includes/header.php" ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-md-12 ">
                    <div class="row">
                        <div class="col-md-6 text"><h3>&nbsp;<i class="fa fa-id-badge"></i>&nbsp; <?php echo $admin['Prenom'].' '.$admin['Nom'];?></h3></div>
                        <div class="col-md-6 text-right"><a href="index.php" class="btn btn-dark">Revenir à la liste</a></div>
                    </div>

                </div><br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Modifier les détails de l'administrateur
                                </div>
                                <div class="card-body card-block">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-md-6"><div class="form-group">
                                                    <label for="Prenom" class=" form-control-label">Prénom</label>
                                                    <input type="text" id="prenom" name="prenom" placeholder="Veuillez entrer le prénom" value="<?php echo $admin['Prenom']?>" class="form-control" required>
                                                </div></div>
                                            <div class="col-md-6"><div class="form-group">
                                                    <label for="Nom" class=" form-control-label">Nom</label>
                                                    <input type="text" id="nom" name="nom" placeholder="Veuillez entrer le nom" class="form-control" value="<?php echo $admin['Nom']?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username" class=" form-control-label">Nom d'utilisateur</label>
                                                    <input type="text" id="username" name="username" placeholder="Veuillez choisir un nom d'utilisateur" class="form-control" value="<?php echo $admin['Username']?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="roleid" class=" form-control-label">Rôle</label>
                                                    <select name="roleid" id="roleid" class="form-control" required>
                                                        <option value="">Veuillez choisire un rôle</option>
                                                        <option value="1" <?php if($admin['RoleID'] == 1){echo "selected";}?>>Président</option>
                                                        <option value="2" <?php if($admin['RoleID'] == 2){echo "selected";}?>>Vice-Président</option>
                                                        <option value="3" <?php if($admin['RoleID'] == 3){echo "selected";}?>>Interne</option>
                                                        <option value="4" <?php if($admin['RoleID'] == 4){echo "selected";}?>>Externe</option>
                                                        <option value="5" <?php if($admin['RoleID'] == 5){echo "selected";}?>>Trésorier</option>
                                                        <option value="6" <?php if($admin['RoleID'] == 6){echo "selected";}?>>Webmaster</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-block btn-success" value="Modifier les informations">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Réinitialiser le mot de passe</div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="passwd" class=" form-control-label">Nouveau de passe</label>
                                            <input type="password" id="passwd" name="passwd" placeholder="Veuillez choisir un nouveau mot de passe" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="conf" class=" form-control-label">Confirmation</label>
                                            <input type="password" id="conf" name="conf" placeholder="Veuillez retaper le mot de passe" class="form-control" required>
                                        </div>
                                        <input type="submit" class="btn btn-block btn-danger" value="Réinitialiser">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Supprimer l'administrateur</div>
                                <div class="card-body">
                                    <p class="text-center">Toutes les données de l'utilisateur seront
                                        supprimées et il n'aura plus accès au panneau d'administration.</p>
                                    <br>
                                    <button class="btn btn-danger btn-block">Supprimer l'administrateur</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <?php include "../includes/scripts.php"?>

</body>
</html>
<!-- end document-->
