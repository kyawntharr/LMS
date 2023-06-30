<?php
include_once __DIR__ . '/../layouts/sidebar.php';
include_once __DIR__ . '/../controller/categoryController.php';
$id = $_GET['id'];
$category_controller = new categoryController();
$get_category = $category_controller->getCategory($id);
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $update = $category_controller->updateCategory($id, $name);
    if ($update) {
        echo '<script>location.href="app_category.php"</script>';
    }

}


?>
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Edit Category</strong></h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <div>
                            <label for="" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control border border-dark-subtle shadow-none"
                                   value="<?php echo $get_category['name'] ?>">
                            <div class="">
                                <button type="submit" name="submit" class="btn btn-dark mt-3">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php

include_once __DIR__ . '/../layouts/app_footer.php';

?>