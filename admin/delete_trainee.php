<?php
include_once __DIR__ . '/../controller/traineeController.php';

$id = $_POST['id'];
$trainee_controller = new traineeController();
$delete = $trainee_controller->deleteTrainee($id);

if ($delete) {
    echo 'Success';
} else {
    echo 'Can\'t delete';
}
