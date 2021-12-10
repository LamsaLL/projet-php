<?php

namespace Controller;

require_once('AController.php');
require_once(__DIR__ . '/../Model/Managers/OrganizationManager.php');

use Model\Entities\Organization;
use Model\Managers\OrganizationManager;

class OrganizationController extends AController
{
    public function __construct()
    {
        $this->manager = new OrganizationManager();
    }

    public function viewOrganizations() : void
    {
        $title = 'Liste des structures';
        $organizations = $this->findAll();

        require(__DIR__ . '/../View/viewOrganizations.php');
    }

    public function viewOrganization($id) : void
    {
        $title = 'Détail de la structure';
        $organization = $this->findById($id);

        if ($organization) {
            require(__DIR__ . '/../View/viewOrganization.php');
        }
        else {
            $error = 'id de structure non valide';
            require(__DIR__ . '/../View/error.php');
        }
    }

    public function addOrganization() : void
    {
        // $isadmin = isset($_POST['isadmin']) ? 1 : 0;
        if (empty($_POST['donatorsNumber'])){ 
            $donatorsNumber=null;
        }else{
            $donatorsNumber=(int)$_POST['donatorsNumber'];
        }
        if (empty($_POST['investitorsNumber'])){ 
            $investitorsNumber=null;
        }else{
            $investitorsNumber=(int)$_POST['investitorsNumber'];
        }
        
        $organization = new Organization(null, $_POST['name'], $_POST['street'], $_POST['postalCode'], $_POST['city'], 
        (int)$_POST['isAsso'], $donatorsNumber, $investitorsNumber );
        
        var_dump($organization);
        
        $this->insert($organization);
        header('Location: index.php?action=viewOrganizations');
    }
}