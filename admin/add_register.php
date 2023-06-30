<?php
include_once __DIR__ . '/../layouts/sidebar.php';
include_once __DIR__ . '/../controller/cotrainController.php';
$cotrain_controller = new cotrainControler();
$trainees = $cotrain_controller->getTrainee();
$batchs = $cotrain_controller->getBatch();

if (isset($_POST['submit'])) {
    $batch = $_POST['batch'];
    $trainee = $_POST['trainee'];
    $joinDate = $_POST['date'];
    $status = $_POST['status'];
    $add = $cotrain_controller->addCotrain($batch, $trainee, $joinDate, $status);
    if ($add) {
        echo '<script>location.href="app_cotrain.php"</script>';
    }

}

?>
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3 font-monospace">Admin<code>/course_trainee/Registration</code></h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="" class="form-label">Batch</label>
                            <select name="batch" class="form-select border border-dark-subtle shadow-none">
                                <option value='' disabled selected>choose batch</option>
                                <?php
foreach ($batchs as $batch) {
    echo '<option value=' . $batch['id'] . '>' . $batch['name'] . '</option>';
}
?>
                            </select>
                        </div>
                        <div>
                            <label for="" class="form-label">Trainee</label>
                            <select name="trainee" class="form-select border border-dark-subtle shadow-none">
                                <option value='' disabled selected>choose trainee</option>
                            <?php
foreach ($trainees as $trainee) {
    echo '<option value=' . $trainee['id'] . '>' . $trainee['name'] . '</option>';

}

?>
                            </select>
                        </div>
                        <div>
                            <label for="" class="form-label">Status</label>
                            <select name="status" class="form-select border border-dark-subtle shadow-none">
                                <option value='' disabled selected>online or offline</option>;
                                <option value='Online'>Online</option>
                                <option value='Offline'>Offline</option>
                            </select>
                        </div>
                        <div>
                            <label for="" class="form-label">Start Date</label>
                            <input type="date" name="date" class="form-control border border-dark-subtle shadow-none">
                        </div>
                        <div class="">
                            <button type="submit" name="submit" class="btn btn-dark mt-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php

include_once __DIR__ . '/../layouts/app_footer.php';

?>