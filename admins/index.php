<?php require_once "./adminsFunctions.php";
$rolecolor = array('bg-danger','bg-primary','bg-warning','bg-dark','bg-success','bg-secondary');
$admins = GetAllAdmins();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Page-->
    <title>ADEPT - Administrateurs</title>
    <?php include "../includes/meta_links.php"?>

</head>

<body class="">
    <?php include "../includes/header.php" ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-md-12">
                    <!-- USER DATA-->
                    <div class="user-data m-b-30">
                        <h3 class="title-3 m-b-30">
                            <i class="zmdi zmdi-account-calendar"></i>Gestion des administrateurs</h3>
                            <div class="row">
                                <div class="col-md-6" style="padding-left: 50px">
                                    Les administrateurs ont un accès complet au paneau d'administration.
                                </div>
                                <div class="col-md-6">
                                    <a href="createAdmin.php" style="margin-right: 20px" class="btn btn-outline-primary pull-right">Ajouter un nouvel administrateur</a>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>Nom</td>
                                                    <td>Rôle</td>
                                                    <td>Date d'ajout</td>
                                                    <td>Détails</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($admins as $admin){ ?>
                                                    <tr>
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6><?php echo $admin['Prenom'].' '.$admin['Nom']?></h6>
                                                                <span>
                                                        <a href=""><?php echo $admin['Username']?></a>
                                                    </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php $ix = $admin['rid']-1;?>

                                                            <span class="role <?php echo $rolecolor[$ix]?>"><?php echo $admin['Role']?></span>
                                                        </td>
                                                        <td>
                                                            <?php echo substr($admin['DateMendat'],0,10)?>
                                                        </td>
                                                        <td>
                                                <span class="more">
                                                    <a href="adminDetail.php?id=<?php echo $admin['AdminID']?>"><i class="zmdi zmdi-more"></i></a>
                                                </span>
                                                        </td>
                                                    </tr>
                                                <?}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END USER DATA-->
                </div>
                <br>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <?php include "../includes/scripts.php"?>

</body>
</html>
<!-- end document-->
