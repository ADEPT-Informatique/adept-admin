<?php
require_once "./mdcFunctions.php";
require_once dirname(__DIR__)."/controller/requestsHandlers.php";

if (!isset($_GET['id'])){
    die();
}

$id = validateGet('id');
$candidat = ObtenirReponsesCandidature($id);

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
                <div class="col-md-12 text-right">
                    <a href="index.php" class="btn btn-dark">Retourner à la liste</a>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Informations sur le candidat</div>
                        <div class="card-body">
                            <b>Nom</b>: <?php echo $candidat['Nom'];?><br>
                            <b>Email</b>: <?php echo $candidat['Email'];?><br>
                            <b>Nombre de sessions éffectuées</b>: <?php echo $candidat['NbSessions'];?><br>
                            <b>Date de postulation</b>: <?php echo $candidat['DateCandidature'];?><br>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Réponses aux questions</div>
                        <div class="card-body">
                            <p><b>Pour quelle(s) raison(s) veux-tu devenir membre de confiance ?</b></p>
                            <p><?php echo $candidat['Motivations'];?></p><br>
                            <p><b>Un étudiant utilise la télévision comme escabot pour grimper sur le réfrigérateur. En lui demandant ce qu'il fait, il vous répond qu'il achète un thé glacé à l'ATIM par le plafond. Que faites-vous ?</b></p>
                            <p><?php echo $candidat['Situation'];?></p><br>
                            <p><b>01010001 01110101 01100101... (Quelle est ta sorte de pizza favorite ?)</b></p>
                            <p><?php echo $candidat['Pizza'];?></p><br>
                            <p><b>Factorise l'expression suivante : <i>x<sup>2</sup>&nbsp;+&nbsp;3x&nbsp;-&nbsp;xy&nbsp;-&nbsp;3y</i>. (Réponse attendue : '(x+3)(x-y)' )</b></p>
                            <p><?php echo $candidat['Facto'];?></p><br>
                            <p><b>Java ou Javascript ?</b></p>
                            <p><?php echo $candidat['JavaJs'];?></p><br>
                            <p><b>Comment prononce-t-on gif ?</b></p>
                            <p><?php echo $candidat['Gif'];?></p><br>
                            <p><b>Quel meme te représente le mieux ?</b></p>
                            <p><?php echo $candidat['Meme'];?></p><br>
                            <p><b>Quels sont le ou les sujet(s) bannis de l’ADEPT ?</b></p>
                            <p><?php echo $candidat['SujetBanis'];?></p><br>
                            <p><b>Quel est LE breuvage officiel de l’ADEPT ?</b></p>
                            <p><?php echo $candidat['Breuvage'];?></p><br>
                            <p><b>Quel est l’aliment le plus vendu dans l'histoire de l'asso ?</b></p>
                            <p><?php echo $candidat['AlimentPlusVendu'];?></p><br>
                            <p><b>Sans tricher, quel est le numéro de local de l’ADEPT ??</b></p>
                            <p><?php echo $candidat['NumeroLocal'];?></p>
                        </div>
                    </div><br>
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
