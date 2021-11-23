<?php
require_once('./Controller/OrganizationController.php');
// require_once('./Controller/AuthorizationController.php');
use Controller\OrganizationController;
// use Controller\AuthorizationController;

try {
    if (isset($_GET['action'])) {
        if (stripos($_GET['action'], 'account')) {
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
                // case 'addAccount':
                //     if (isset($_POST['login'], $_POST['name'], $_POST['surname'], $_POST['email'], $_POST['pass'])) {
                //         $controler->addOrganization();
                //     } else {
                //         $error = 'Erreur de paramètres<br/>';
                //     }
                //     break;
                default :
                    $error = 'Erreur : action non reconnue<br/>';
                    break;
            }
        // } elseif (stripos($_GET['action'], 'auth')) {
        //     $controler = new AuthorizationController();
        //     switch ($_GET['action']) {
        //         case 'viewAuth':
        //             if (isset($_GET['id']) && $_GET['id'] > 0) {
        //                 $organization = $controler->viewAuth($_GET['id']);
        //             } else {
        //                 $error = 'Erreur : mauvais identifiant<br/>';
        //             }
        //             break;
        //         case 'viewAuths':
        //             $organizations = $controler->viewAuths();
        //             break;
        //         case 'addAuth':
        //             if (isset($_POST['name'])) {
        //                 $controler->addAuth();
        //             } else {
        //                 $error = 'Erreur de paramètres<br/>';
        //             }
        //             break;
        //         default :
        //             $error = 'Erreur : action non reconnue<br/>';
        //             break;
        //     }
        } else {
            $error = 'Erreur : action non reconnue<br/>';
        }
    } else {
        ?>
<a href="index.php?action=viewOrganizations">Liste des structures</a>
<!-- <a href="index.php?action=viewAuths">Liste des autorisations</a> -->
<?php
    }
}
catch (Exception $ex) {
    $error='Error '.$ex->getCode().' : '.$ex->getMessage().'<br/>'.str_replace("\n","<br/>",
            $ex->getTraceAsString());
}
if (isset($error)) {
    require(__DIR__.'/view/error.php');
}
?>