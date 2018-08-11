<?php
/**
 * mdcFunctions.php
 * Created by Olivier Brassard on 10-08-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */

require_once dirname(__DIR__)."/model/bdconnect.php";

function ObtenirReponsesCandidature($reponseID){
    $db = connect_BD();
    try{
        $request = $db -> prepare("SELECT * FROM CandidatureMembreConfiance where ReponseID = :id");
        $request->execute(array(
            'id'=>$reponseID
        ));
        return $request ->fetch();
    }catch (Exception $e){
        die($e->getMessage());
    }
}

function ObtenirCandidats(){
    $db = connect_BD();
    try{
        $request = $db -> prepare("SELECT Nom, DateCandidature, Pizza, ReponseID FROM CandidatureMembreConfiance");
        $request->execute();
        return $request ->fetchAll();
    }catch (Exception $e){
        die($e->getMessage());
    }
}
