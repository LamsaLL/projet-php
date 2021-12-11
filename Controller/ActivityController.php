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

    public function deleteActivity($id) : void
    {
        $title = "Liste d'activités";
        $resDelete = $this->delete($id);

        if ($resDelete->rowCount() > 0) {
            header('Location: index.php?action=viewActivities');
        }
        else {
            $error = "Error de suppression : Activité non trouvée";
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
    // checkIfLabelExists($label)
    public function checkIfLabelExists($label) : bool
    {
        $activities = $this->findAll();
        foreach ($activities as $activity) {
            if ($activity->getLabel() == $label) {
                return true;
            }
        }
        return false;
    }
}