<?php
/**
 * hoodieModuleFunctions.php
 * Created by Olivier Brassard on 15-02-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */

require_once dirname(__DIR__)."/model/bdconnect.php";


function CreateAdmin($prenom, $nom, $username,$token, $roleid){
    $db = connect_BD();
    try{
        $request = $db -> prepare("INSERT INTO Administrateurs(Prenom,Nom,Username,Token,RoleID) VALUES (:prenom, :nom, :username, :token, :roleid)");
        $request ->execute(array(
            "nom"=>$nom,
            "prenom"=>$prenom,
            "username"=>$username,
            "token"=>$token,
            "roleid"=>$roleid
        ));
        $request -> closeCursor();
    }catch (Exception $e){
        die($e->getMessage());
    }
    $db = null;
}

function UpdateAdmin($adminid, $prenom, $nom, $username, $roleid){
    $db = connect_BD();
    try{
        $request = $db -> prepare("UPDATE Administrateurs SET Prenom = :prenom, Nom = :nom, Username = :username, RoleID = :roleid where AdminID = :id ");
        $request ->execute(array(
            "nom"=>$nom,
            "prenom"=>$prenom,
            "username"=>$username,
            "roleid"=>$roleid,
            "id" => $adminid
        ));
        $request -> closeCursor();
    }catch (Exception $e){
        die($e->getMessage());
    }
    $db = null;
}

function ResetPasswd($adminId, $token){
    $db = connect_BD();
    try{
        $request = $db -> prepare("UPDATE Administrateurs SET Token = :token where AdminID = :id");
        $request ->execute(array(
            "id"=>$adminId,
            "token"=>$token
        ));
        $request -> closeCursor();
    }catch (Exception $e){
        die($e->getMessage());
    }
    $db = null;
}

function GetAllAdmins(){
    $db = connect_BD();
    try{
        $request = $db -> query("select Prenom, Nom, Username, Role, DateMendat, AdminID, R.RoleID as 'rid' from Administrateurs 
                                          inner join RolesCA R on Administrateurs.RoleID = R.RoleID order by rid");
        if ($request){
            return $request -> fetchAll();
        }
        $request -> closeCursor();
    }catch (Exception $e){
        die($e->getMessage());
    }
    $db = null;
    return false;
}


function GetOneAdmin($AdminID){
    $db = connect_BD();
    try{
        $request = $db -> prepare("SELECT Nom, Prenom, Username, RoleID FROM Administrateurs where AdminID = :adminid");
        $request->execute(array(
            'adminid'=>$AdminID
        ));
        return $request ->fetch();
    }catch (Exception $e){
        die($e->getMessage());
    }
}


function DeleteAdmin($Id){
    $db = connect_BD();
    try {
        $request = $db->prepare("DELETE FROM Administrateurs where AdminID = :id");
        $request->execute(array(
            "id"=> $Id
        ));
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}


?>