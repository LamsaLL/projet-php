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
                            //if isAsso is empty donorsNumber must be empty and investorsNumber must be not empty 
                            //else if isAsso is not empty donorsNumber must be not empty and investorsNumber must be empty
                            if(empty($_POST["isAsso"])){
                                if(empty($_POST["donorsNumber"]) && !empty($_POST["investorsNumber"])){
                                    $controler->addOrganization();
                                }else{
                                    $error = 'Il faut renseinger le nombre d\'investisseurs pour une entreprise.';
                                }
                            }else{  
                                if(!empty($_POST["donorsNumber"]) && empty($_POST["investorsNumber"])){
                                    $controler->addOrganization();
                                }else{
                                    $error = 'Il faut renseigner le nombre de donnateurs pour une association.';
                                }
                            }
                        }else{
                            $error = 'Le code postal doit être composé de 5 chiffres numériques';
                        }
                    } else {
                        $error = 'Erreur de paramètres<br/>';
                    }
                    break;
                case 'deleteOrganization':
                    if (isset($_GET['id'])) {
                        $controler->deleteOrganization($_GET['id']);
                    } else {
                        $error = 'Erreur de paramètres<br/>';
                    }
                    break;
                case 'modifyOrganization':
                    if (isset($_GET['id'])) {
                        $controler->modifyOrganization($_GET['id']);
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
                case 'addActivity':
                    if (isset($_POST['label'])) {
                        //check if label is unique
                        if(!$controler->checkIfLabelExists($_POST['label'])){
                            $controler->addActivity();
                        }else{
                            $error = 'Ce secteur existe déjà';
                        }
                    } else {
                        $error = 'Erreur de paramètres<br/>';
                    }
                    break;
                case 'deleteActivity':
                    if (isset($_GET['id'])) {
                        $controler->deleteActivity($_GET['id']);
                    } else {
                        $error = 'Erreur de paramètres<br/>';
                    }
                    break;
                case 'modifyActivity':
                    if (isset($_GET['id'])) {
                        $controler->modifyActivity($_GET['id']);
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