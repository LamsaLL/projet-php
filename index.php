<?php

require_once('./Controller/OrganizationController.php');
require_once('./Controller/ActivityController.php');

use Controller\OrganizationController;
use Controller\ActivityController;

try {
    if (isset($_GET['action'])) {
        if (stripos($_GET['action'], 'organization')) {
            $controler = new OrganizationController();
            switch ($_GET['action']) {
                case 'viewOrganization':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $organization = $controler->viewOrganization($_GET['id']);
                    } else {
                        $error = 'Erreur : mauvais identifiant<br/>';
                    }
                    break;
                case 'viewOrganizations':
                    $organizations = $controler->viewOrganizations();
                    break;
                case 'addOrganization':
                    if (isset($_POST['name'], $_POST['street'], $_POST['postalCode'], $_POST['city'], $_POST['donorsNumber'], $_POST['investorsNumber'])) {
                        //check if postal code is valid 
                        if (preg_match ("/^[0-9]{5}$/", (int)$_POST['postalCode'])) {  
                            if((empty($_POST["donorsNumber"]) && !empty($_POST["investorsNumber"])) || (!empty($_POST["donorsNumber"]) && empty($_POST["investorsNumber"]))){
                                $controler->addOrganization();
                            }else{
                                $error = 'Il faut renseiger soit le nombre de donateurs, soit le nombre d\'actionnaires.';
                            }
                        }else{
                            $error = 'Le code postal doit être composé de 5 chiffres numériques';
                        }
                    } else {
                        $error = 'Erreur de paramètres<br/>';
                    }
                    break;
                default :
                    $error = 'Erreur : action non reconnue<br/>';
                    break;
            }
        } elseif (stripos($_GET['action'], 'activit')) {
            $controler = new ActivityController();
            switch ($_GET['action']) {
                case 'viewActivity':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $organization = $controler->viewActivity($_GET['id']);
                    } else {
                        $error = 'Erreur : mauvais identifiant<br/>';
                    }
                    break;
                case 'viewActivities':
                    $organizations = $controler->viewActivities();
                    break;
                case 'deleteActivity':
                    if (isset($_GET['id'])) {
                        $controler->deleteActivity($_GET['id']);
                    } else {
                        $error = 'Erreur de paramètres<br/>';
                    }
                    break;
                default :
                    $error = 'Erreur : action non reconnue<br/>';
                    break;
            }
        } else {
            $error = 'Erreur : action non reconnue<br/>';
        }
    } else {
        ?>
<a href="index.php?action=viewOrganizations">Liste de structures</a>
<a href="index.php?action=viewActivities">Liste d'activités</a>
<?php
    }
}
catch (Exception $ex) {
    $error='Error '.$ex->getCode().' : '.$ex->getMessage().'<br/>'.str_replace("\n","<br/>",
            $ex->getTraceAsString());
}
if (isset($error)) {
    require(__DIR__.'/View/error.php');
}
?>