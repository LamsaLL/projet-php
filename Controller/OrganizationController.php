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
        $isAsso = isset($_POST["isAsso"] ) ? 1 : 0;

        if (empty($_POST['donorsNumber'])){ 
            $donorsNumber=null;
        }else{
            $donorsNumber=(int)$_POST['donorsNumber'];
        }
        if (empty($_POST['investorsNumber'])){ 
            $investorsNumber=null;
        }else{
            $investorsNumber=(int)$_POST['investorsNumber'];
        }
        
        $organization = new Organization(null, $_POST['name'], $_POST['street'], $_POST['postalCode'], $_POST['city'], 
        $isAsso, $donorsNumber, $investorsNumber);
        
        
        $this->insert($organization);
        header('Location: index.php?action=viewOrganizations');
    }

    public function deleteOrganization($id){
        $resDelete = $this->delete($id);

        if ($resDelete->rowCount() > 0) {
            header('Location: index.php?action=viewOrganizations');
        } else {
            $error = "Error de suppression : Structure non trouvée";
            require(__DIR__ . '/../View/error.php');
        }
    }
}