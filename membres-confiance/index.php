<?php

require_once "./mdcFunctions.php";
$candidats = ObtenirCandidats();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Page-->
    <title>ADEPT - Membres de confiance</title>
    <?php include "../includes/meta_links.php"?>

</head>

<body class="">
    <?php include "../includes/header.php" ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-md-12">
                    <h4 class="text-center">Membres de confiance officiels de la session courrante </h4>
                    <br>
                    <div class="table-responsive table--no-card">
                        <table class="table table-borderless table-data3 table-earning">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th><i class="fas fa-user-circle"></i>&nbsp; Nom</th>
                                    <th><i class="fas fa-graduation-cap"></i>&nbsp;Numéro Étudiant</th>
                                    <th><i class="fas fa-envelope"></i>&nbsp; Email</th>
                                    <th><i class="fas fa-calendar-check"></i>&nbsp; Session</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($candidats as $candidat){ ?>
                                    <tr class="clickable" id="<?php echo $candidat['ReponseID']?>">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="col-md-12">
                    <h4 class="text-center">Membres de confiance - candidatures recues</h4>
                    <br>
                    <div class="table-responsive table--no-card">
                        <table class="table table-borderless table-data3 table-earning">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th><i class="fas fa-user-circle"></i>&nbsp; Nom</th>
                                    <th><i class="fas fa-calendar"></i>&nbsp; Date Postulation</th>
                                    <th><i class="fas fa-utensils"></i>&nbsp; Pizza préférée</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($candidats as $candidat){ ?>
                                    <tr class="clickable" id="<?php echo $candidat['ReponseID']?>">
                                        <td><?php echo $candidat['Nom'] ?></td>
                                        <td><?php echo $candidat['DateCandidature'] ?></td>
                                        <td><?php echo $candidat['Pizza'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <a class="btn btn-primary" href="">Terminer la période de postulation</a>
                        <a class="btn btn-danger" href="">Réinitialiser les candidatures pour la nouvelle session</a>
                    </div>

                </div><br>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <?php include "../includes/scripts.php"?>
    <script src="./actions.js" type="text/javascript"></script>

</body>
</html>
<!-- end document-->
