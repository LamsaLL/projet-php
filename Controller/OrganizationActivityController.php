<?php

namespace Controller;

require_once('AController.php');
require_once(__DIR__ . '/../Model/Managers/OrganizationActivityManager.php');

use Model\Entities\OrganizationActivity;
use Model\Managers\OrganizationActivityManager;

class OrganizationActivityController extends AController
{
    public function __construct()
    {
        $this->manager = new OrganizationActivityManager();
    }

    //Vue permettant de voir l'activité des différentes structures
    public function viewOrganizationsActivity() : void
    {
        $title = "Liste de structures et leur activité";
        $organizationsActivity = $this->findAll();

        require(__DIR__ . '/../View/viewOrganizationsActivity.php');
    }

    //Vue permettant de voir l'activité d'une structure donnée
    public function viewOrganizationActivity($id) : void
    {
        $title = "Détail de l'activité d'une structure";
        $organizationActivity = $this->findById($id);

        if ($organizationActivity) {
            require(__DIR__ . '/../View/viewOrganizationActivity.php');
        }
        else {
            $error = 'id de structure non valide';
            require(__DIR__ . '/../View/error.php');
        }
    }

    public function addOrganizationActivity() : void
    {
        // $isadmin = isset($_POST['isadmin']) ? 1 : 0;
        $organizationActivity = new OrganizationActivity(null, $_POST['organizationId'], $_POST['activityId']);
        $this->insert($organizationActivity);
        header('Location: index.php?action=viewOrganizationsActivity');
    }
}