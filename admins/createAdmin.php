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
                <div class="col-md-12 text-right">
                    <a href="index.php" class="btn btn-dark">Annuler</a>
                </div><br>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Ajouter un administateur
                        </div>
                        <div class="card-body card-block">
                            <div class="form-row">
                                <div class="col-md-6"><div class="form-group">
                                        <label for="Prenom" class=" form-control-label">Prénom</label>
                                        <input type="text" id="prenom" name="prenom" placeholder="Veuillez entrer le prénom" class="form-control" required>
                                    </div></div>
                                <div class="col-md-6"><div class="form-group">
                                        <label for="Nom" class=" form-control-label">Nom</label>
                                        <input type="text" id="nom" name="nom" placeholder="Veuillez entrer le nom" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username" class=" form-control-label">Nom d'utilisateur</label>
                                        <input type="text" id="username" name="username" placeholder="Veuillez choisir un nom d'utilisateur" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="roleid" class=" form-control-label">Rôle</label>
                                        <select name="roleid" id="roleid" class="form-control" required>
                                            <option value="">Veuillez choisire un rôle</option>
                                            <option value="1">Président</option>
                                            <option value="2">Vice-Président</option>
                                            <option value="3">Interne</option>
                                            <option value="4">Externe</option>
                                            <option value="5">Trésorier</option>
                                            <option value="6">Webmaster</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="passwd" class=" form-control-label">Mot de passe</label>
                                        <input type="password" id="passwd" name="passwd" placeholder="Veuillez choisir un mot de passe" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="conf" class=" form-control-label">Confirmation</label>
                                        <input type="password" id="conf" name="conf" placeholder="Veuillez retaper le mot de passe" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-block btn-primary" value="Enregister">
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
