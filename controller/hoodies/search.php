<?php
/**
 * search.php
 * Created by Olivier Brassard on 01-03-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
// */
//session_start();
//
//if (!isset($_SESSION['AdminID'])){
//    header('Location: connexion.php');
//    die();
//}

require_once  dirname(dirname(__DIR__)) . "/hoodies/moduleFunctions.php";
require_once  dirname(dirname(__DIR__)) . "/includes/URLUtilities.php";

$numEtu = validatePost("numEtudiant");

if(!$numEtu){
    header('Location: '.url_for(dirname(dirname(__DIR__)).'/hoodies/index.php').'?result=none');
    die();
}

$reservationID = GetReservationByStudentId($numEtu);

if (!$reservationID){
    header('Location: '.url_for(dirname(dirname(__DIR__)).'/hoodies/index.php').'?result=none');
    die();
} else {
    header('Location: '.url_for(dirname(dirname(__DIR__)).'/hoodies/detailsReservation.php').'?id='.$reservationID);
}
