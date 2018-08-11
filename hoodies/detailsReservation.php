<?php
require_once "./moduleFunctions.php";

$reservationId = validateGet('id');
$reservation = GetOneClientReservation($reservationId);

$sizes = array('S'=>'Petit','M'=>'Moyen','L'=>'Grand', 'XL'=>'Très grand', 'N' => 'À déterminer')
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Title Page-->
    <title>ADEPT - Gestion des hoodies</title>
    <?php include "../includes/meta_links.php"?>
    <style>
        .super{
            font-size: 48px;
            color: #883cbf;
        }
    </style>
</head>

<body>
<?php include "../includes/header.php" ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-md-12">
                    <h3>Détails de la réservation</h3>
                </div>
                <br>
                <div class="col-md-12">
                    <a class="btn btn-primary" href="index.php"><i class="fa fa-chevron-left"></i> Retour à la liste</a>
                    <button class="btn btn-danger pull-right delete" id="<?php echo $reservationId; ?>" ><i class="fa fa-trash"></i> Supprimer cette réservation</button>
                </div>
                <br>
                <div class="col-md-12">
                    <?php if (validateGet('update')=='fail') { ?>
                        <div class="alert alert-danger">Une erreur est survenue lors de l'enregistrement des modifications.</div>
                    <?php } else if (validateGet('update')=='fail-invalidrecup') { ?>
                        <div class="alert alert-danger"><strong>Impossible de marquer une commande comme récupérée si le montant total n'a pas été payé.</strong><br>Les modifications n'ont pas été enregistrées.</div>
                    <?php } else if (validateGet('update')=='success') { ?>
                        <div class="alert alert-success">Vos modifications ont été enregistrées</div>
                    <?php } ?>
                    <script>
                        $( document ).ready(function() {
                            $('.alert.alert-danger').delay(6000).slideUp('slow');
                            $('.alert.alert-success').delay(3700).slideUp('slow');
                        });
                    </script>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div><span class="title--sbold">Membre : </span><?php echo $reservation['Prenom'].' '.$reservation['Nom']?></div>
                                    <div><span class="title--sbold">Email : </span><?php echo $reservation['Email']?></div>
                                    <div><span class="title--sbold">Numéro d'étudiant : </span><?php echo $reservation['NumEtudiant']?></div>
                                    <div><span class="title--sbold">Numéro de réservation:  </span><?php echo $reservation['NumeroReservation']?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div><span class="title--sbold">Paiement restant:  </span></div>
                                    <div class="super">
                                        <?php echo (40-$reservation['Depot'])?> $
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="../controller/hoodies/editReservation.php" method="post" role="form">
                                <input type="hidden" name="id" value="<?php echo $reservationId; ?>">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="label strong" for="depot">Montant du dépot courrant</label>
                                        <input type="number" name="depot" class="form-control" value="<?php echo $reservation['Depot'] ?>" placeholder="Montant du dépot" id="depot" required  min="0" max="40"/>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="label strong" for="size">Taille du hoodie</label>
                                        <select class="custom-select" name="size" id="size">

                                            <?php foreach ($sizes as $size => $text){

                                                if ($size == $reservation['Taille']){
                                                    echo '<option selected value="'.$size.'">'.$text.'</option>';
                                                } else {
                                                    echo '<option value="'.$size.'">'.$text.'</option>';
                                                }

                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="custom-control custom-checkbox">
                                                    <?php if($reservation['HoodieRecupere']) {
                                                        echo '<input type="checkbox" name="isrecupered"  class="custom-control-input" id="isrecupered" value="yes" checked>';
                                                    } else {
                                                        echo '<input type="checkbox" name="isrecupered"  class="custom-control-input" id="isrecupered" value="yes">';
                                                    } ?>
                                                    <label class="custom-control-label" for="isrecupered">Le hoodie à été récupéré</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="submit" class="btn btn-success btn-block" value="Enregistrer les modifications">
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <?php include "../includes/scripts.php"?>
    <script src="actions.js"></script>

</body>

</html>
<!-- end document-->
