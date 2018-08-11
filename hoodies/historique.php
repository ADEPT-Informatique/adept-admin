<?php
require_once "./moduleFunctions.php";

$Actions = GetHistory();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Page-->
    <title>ADEPT - Gestion des hoodies</title>
    <?php include "../includes/meta_links.php"?>
    <style>
        .icon-delete{
            color: #ca0000;
        }

        .icon-update{
            color: #1782e0;
        }

        .icon-recupered{
            color:limegreen;
        }
    </style>
</head>
<body>
    <?php include "../includes/header.php" ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-md-12">
                    <h3>Historique des modifications</h3>
                    <br>
                    <a class="btn btn-primary" href="index.php"><i class="fa fa-chevron-left"></i> Retour à la liste</a>
                    <br><br>
                    <div class="card">
                    <div class="card-body">
                        <?php foreach ($Actions as $action ){

                            if ($action['Type'] == 'delete'){ ?>
                                <div class="row">
                                    <div class="col-sm-1 icon-delete text-center"><i class="far fa-trash-alt"></i></div>
                                    <div class="col-sm-11 align-self-center"><strong><?php echo $action['Admin']?></strong> a supprimé la réservation de <strong><?php echo $action['Nom']?></strong> le <?php echo $action['Date']?></div>
                                </div>
                            <?php } else if ($action['Type'] == 'update'){ ?>
                                <div class="row">
                                    <div class="col-sm-1 icon-update text-center"><i class="far fa-money-bill-alt"></i></div>
                                    <div class="col-sm-11 align-self-center"><strong><?php echo $action['Admin']?></strong> a mis à jour le montant du dépot de <strong><?php echo $action['Nom']?></strong> à <strong><?php echo $action['Depot']?>$</strong> le <?php echo $action['Date']?></div>
                                </div>

                            <?php } else if ($action['Type'] == 'recup'){ ?>
                                <div class="row">
                                    <div class="col-sm-1 icon-recupered text-center"><i class="far fa-check-circle"></i></div>
                                    <div class="col-sm-11 align-self-center"><strong><?php echo $action['Admin']?></strong> a indiqué la commande de <strong><?php echo $action['Nom']?></strong> comme récupérée le <?php echo $action['Date']?></div>
                                </div>
                            <?php }
                            echo '<hr>';
                        } ?>
                    </div></div>
                    <br>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <?php include "../includes/scripts.php"?>
    <script src="actions.js"></script>

</body>

</html>
<!-- end document-->
