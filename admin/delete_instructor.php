<?php
include_once __DIR__ . '/../controller/instructorController.php';

$id = $_POST['id'];
$instructor_controller = new instructorController();
$delete = $instructor_controller->deleteInstructor($id);
if ($delete) {
    echo 'Success';
} else {
    echo 'Can\'t delete';
}
