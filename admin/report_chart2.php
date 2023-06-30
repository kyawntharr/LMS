<?php
include_once __DIR__.'/../controller/cotrainController.php';
$cotrin_controller = new cotrainControler();
$trainee_by_course = $cotrin_controller->totalTraineeByCourse();
echo json_encode($trainee_by_course);
