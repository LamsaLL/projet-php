<?php

namespace Controller;

require_once('AController.php');
require_once(__DIR__ . '/../model/managers/AccountManager.php');

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
        $organization = $this->findAll();

        require(__DIR__ . '/../view/viewOrganizations.php');
    }

    public function viewOrganization($id) : void
    {
        $title = 'Détail de la structure';
        $organization = $this->findById($id);

        if ($organization) {
            require(__DIR__ . '/../view/viewOrganization.php');
        }
        else {
            $error = 'id de structure non valide';
            require(__DIR__ . '/../view/error.php');
        }
    }

    public function addOrganization() : void
    {
        // $isadmin = isset($_POST['isadmin']) ? 1 : 0;
        $organization = new Organization(null, $_POST['name'], $_POST['street'], $_POST['postalCode'], $_POST['city'], 
        $_POST['isAsso'], $_POST['donatorsNumber'], $_POST['investitorsNumber']);
        $this->insert($organization);
        header('Location: index.php?action=viewOrganizations');
    }
}