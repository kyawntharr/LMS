<?php
include_once __DIR__ . '/../layouts/sidebar.php';
include_once __DIR__ . '/../controller/batchController.php';
include_once __DIR__ . '/../controller/courseController.php';
$id = $_GET['id'];
$batch_controller = new batchController();
$get_batch = $batch_controller->getBatch($id);

$course_controller = new courseController();
$courses = $course_controller->courseDetial();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $duration = $_POST['duration'];
    $fee = $_POST['fee'];
    $discount = $_POST['discount'];
    $course = $_POST['course'];
    $update = $batch_controller->updateBacth($id, $name, $date, $duration, $fee, $discount, $course);
    if ($update) {
        echo '<script>location.href="app_batch.php"</script>';

    }
}

?>
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Edit Batch</strong></h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <div>
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control border border-dark-subtle shadow-none"
                                   value="<?php echo $get_batch['name'] ?>">

                            <label for="" class="form-label">Date</label>
                            <input type="date" name="date" class="form-control border border-dark-subtle shadow-none"
                                   value="<?php echo $get_batch['start_date'] ?>">

                            <label for="" class="form-label">Duration</label>
                            <input type="text" name="duration"
                                   class="form-control border border-dark-subtle shadow-none"
                                   value="<?php echo $get_batch['duration'] ?>">

                            <label for="" class="form-label">Fee</label>
                            <input type="text" name="fee" class="form-control border border-dark-subtle shadow-none"
                                   value="<?php echo $get_batch['fee'] ?>">

                            <label for="" class="form-label">Discount</label>
                            <input type="text" name="discount"
                                   class="form-control border border-dark-subtle shadow-none"
                                   value="<?php echo $get_batch['discount'] ?>">

                            <label for="" class="form-label">Course</label>
                            <select name="course" class="form-select border border-dark-subtle shadow-none">
                                <?php
                                foreach ($courses as $course) {
                                    if ($course['id'] == $get_batch['course_id']) {
                                        echo '<option value=' . $course['id'] . ' selected>' . $course['name'] . '</option>';
                                    } else {
                                        echo '<option value=' . $course['id'] . '>' . $course['name'] . '</option>';

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