<?php

namespace Controller;

use Model\Entities\Activity;
use Model\Managers\ActivityManager;

require_once('AController.php');
require_once(__DIR__ . '/../Model/Managers/ActivityManager.php');

class ActivityController extends AController
{
    public function __construct()
    {
        $this->manager = new ActivityManager();
    }

    public function viewActivities() : void
    {
        $title = "Liste d'activités";
        $activities = $this->findAll();

        require(__DIR__ . '/../View/viewActivities.php');
    }

    public function viewActivity($id) : void
    {
        $title = "Détail de l'activité";
        $activity = $this->findById($id);

        if ($activity) {
            require(__DIR__ . '/../View/viewActivity.php');
        }
        else {
            $error = "id de l'activité non valide";
            require(__DIR__ . '/../View/error.php');
        }
    }

    public function addActivity() : void
    {
        // $isadmin = isset($_POST['isadmin']) ? 1 : 0;
        $activity = new Activity(null, $_POST['label']);
        $this->insert($activity);
        header('Location: index.php?action=viewActivities');
    }
}