<?php
require_once "./moduleFunctions.php";
$reservations = GetAllClientReservation();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Page-->
    <title>ADEPT - Gestion des hoodies</title>
    <?php include "../includes/meta_links.php"?>
    <link href="../css/clickablerows.css" rel="stylesheet">
</head>

<body>
    <?php include "../includes/header.php" ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-md-12">
                    <h3>Gestion des achats de Hoodies</h3>
                    <br>
                    <a class="btn btn-dark" href="historique.php">Afficher l'historique des modifications</a>
                    <br>
                    <br>
                    <?php $result = validateGet('result');
                    if ($result == 'none'){ ?>
                        <div class="alert alert-info">
                            Il n'y a aucune réservation pour le numéro recherché.
                        </div>
                    <?php } ?>
                    <form method="post" action="../controller/hoodies/search.php">
                        <div class="input-group">
                            <input class="form-control py-2 border-right-0 border" placeholder="Recherche par numéro d'étudiant" id="search" name="numEtudiant">
                            <span class="input-group-append" id="searchBtn">
                            <button type="submit" class="input-group-text" ><i class="fa fa-search"></i></button>
                        </span>
                        </div>
                    </form>

                </div>
                <br>
                <div class="col-md-12">
                    <div class="table-responsive table--no-card">
                        <table class="table table-borderless table-data3">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="text-center d-none d-md-table-cell">Petits</th>
                                    <th scope="col" class="text-center d-none d-md-table-cell">Moyens</th>
                                    <th scope="col" class="text-center d-none d-md-table-cell">Grands</th>
                                    <th scope="col" class="text-center d-none d-md-table-cell">Très Grands</th>
                                    <th scope="col" class="text-center d-none d-md-table-cell">À déterminer</th>
                                    <th scope="col" class="text-center d-none d-md-table-cell">Profit estimé</th>
                                </tr>
                            </thead>
                            <tr class=" text-center ">
                                <td class="info d-none d-md-table-cell"><?php echo GetCountReservationBySize('S')?></td>
                                <td class="info d-none d-md-table-cell"><?php echo GetCountReservationBySize('M')?></td>
                                <td class="info d-none d-md-table-cell"><?php echo GetCountReservationBySize('L')?></td>
                                <td class="info d-none d-md-table-cell"><?php echo GetCountReservationBySize('XL')?></td>
                                <td class="info d-none d-md-table-cell"><?php echo GetCountReservationBySize('N')?></td>
                                <td class="info d-none d-md-table-cell" style="color: limegreen"><?php echo (GetTotalCountReservation()*10.00).'$'?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="table-responsive table--no-card">
                        <table class="table table-borderless table-data3 table-earning">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Num. Étudiant</th>
                                    <th>Taille</th>
                                    <th>Dépot actuel</th>
                                    <th>Paiement restant</th>
                                    <th>Hoodie Recupéré</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($reservations as $reservation){ ?>
                                    <tr class="clickable" id="<?php echo $reservation['ReservationID']?>">
                                        <td><?php echo $reservation['NumeroReservation']?></td>
                                        <td><?php echo $reservation['Prenom'].' '.$reservation['Nom']?></td>
                                        <td><?php echo $reservation['NumEtudiant']?></td>
                                        <td><?php echo $reservation['Taille']?></td>

                                        <?php
                                        if($reservation['Depot']==40){
                                            echo '<td class="process">'.$reservation['Depot'].'$</td>';
                                        }else if ($reservation['Depot']< 20){
                                            echo '<td class="denied">'.$reservation['Depot'].'$</td>';
                                        }else {
                                            echo '<td class="denied">'.$reservation['Depot'].'$</td>';
                                        }; ?>

                                        <td><?php echo (40-$reservation['Depot']).' $'?></td>
                                        <?php if($reservation['HoodieRecupere']){
                                                echo '<td class="process">Oui</td>';
                                            } else {
                                                echo '<td class="denied">Non</td>';
                                            }?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <a class="btn btn-primary" href="">Terminer la période d'achat</a>
                        <a class="btn btn-danger" href="">Réinitialiser les réservations</a>
                    </div>

                </div>
            <br>
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
