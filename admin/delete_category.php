<?php
include_once __DIR__.'/../controller/categoryController.php';

$id=$_POST['id'];
$category_controller = new categoryController();
$delete = $category_controller->deleteCategory($id);
if ($delete) {
    echo 'success';
    // echo '<script>location.href="app_category.php"</script>';
} else {
    echo 'You Can\'t Delete';
}
