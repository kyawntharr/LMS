<?php
include_once __DIR__ . '/../controller/batchController.php';

$id = $_POST['id'];
$batch_controller = new batchController();
$delete = $batch_controller->deleteBatch($id);
if ($delete) {
    echo 'Success';
} else {
    echo 'Can\'t Delete';
}
