<?php
include_once __DIR__ . '/../layouts/sidebar.php';
include_once __DIR__ . '/../controller/courseController.php';
include_once __DIR__ . '/../controller/categoryController.php';
$course_controller = new courseController();
$category_controller = new categoryController();
$categories = $category_controller->categoryDetial();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $outline = $_POST['outline'];
    $category = $_POST['category'];
    $image = $_FILES['image'];
    $add = $course_controller->createCourse($name, $outline, $category, $image);
    if ($add) {
        echo '<script>location.href="app_course.php?status=' . $add . '"</script>';
    }
}

?>
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Add New course</strong></h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control border border-dark-subtle shadow-none">

                            <label for="" class="form-label">Course Outline</label>
                            <textarea type="text" name="outline"
                            class="form-control border border-dark-subtle shadow-none"><textarea>

                            <label for="" class="form-label">Category</label>
                            <select name="category" class="form-select border border-dark-subtle shadow-none">
                                <?php
foreach ($categories as $category) {
    echo '<option value=' . $category['id'] . '>' . $category['name'] . '</option>';
}
?>
                            </select>

                            <label for="" class="form-label">Feature Image</label>
                            <input type="file" name="image" class="form-control border border-dark-subtle shadow-none">


                            <div class="">
                                <button type="submit" name="submit" class="btn btn-dark mt-3">Add</button>
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