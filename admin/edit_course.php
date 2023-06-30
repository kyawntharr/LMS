<?php
include_once __DIR__ . '/../layouts/sidebar.php';
include_once __DIR__ . '/../controller/courseController.php';
include_once __DIR__ . '/../controller/categoryController.php';

$id = $_GET['id'];
$course_controller = new courseController();
$get_course = $course_controller->getCourse($id);
$courses = $course_controller->courseDetial();


$category_controller = new categoryController();
$categories = $category_controller->categoryDetial();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $outline = $_POST['outline'];
    $category = $_POST['category'];
    $update = $course_controller->updateCourse($id, $name, $outline, $category);
    if ($update) {
        echo '<script>location.href="app_course.php"</script>';
    }
}

?>
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Edit course</strong></h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">


                        <div class="img-fluid text-center">
                            <?php
                            echo '<img src="../uploads/' . $get_course['image'] . '" width = "300px" height=150px" class = "img-fluid p-1 rounded mx-auto d-block border border-dark-subtle border-1">';
                            ?>
                            <label class="btn btn-dark my-2">
                                Browse Your Pics <input type="file" hidden>
                            </label>
                        </div>
                        <div>
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control border border-dark-subtle shadow-none"
                                   value="<?php echo $get_course['name'] ?>">

                            <label for="" class="form-label">Course Outline</label>
                            <textarea type="text" name="outline"
                                      class="form-control border border-dark-subtle shadow-none">
                                <?php echo $get_course['course_outline'] ?>
                            </textarea>

                            <label for="" class="form-label">Category</label>
                            <select name="category" class="form-select border border-dark-subtle shadow-none">
                                <?php
                                foreach ($categories as $category) {
                                    if ($category['id'] == $get_course['cat_id']) {
                                        echo '<option value=' . $category['id'] . ' selected>' . $category['name'] . '</option>';
                                    } else {
                                        echo '<option value=' . $category['id'] . '>' . $category['name'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
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