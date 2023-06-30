<?php
include_once __DIR__.'/../controller/batchController.php';

$batch_controller = new batchController();
$batch_per_year = $batch_controller->getBatchPerYear();
echo json_encode($batch_per_year);


