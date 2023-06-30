<?php
include_once __DIR__ . '/../layouts/sidebar.php';
include_once __DIR__ . '/../controller/traineeController.php';

$trainee_controller = new traineeController();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $education = $_POST['education'];
    $remark = $_POST['remark'];
    $status = $_POST['status'];

    $add = $trainee_controller->createTrainee($name, $email, $phone, $city, $education, $remark, $status);
    if ($add) {
        echo '<script>location.href="app_trainee.php?status=' . $add . '"</script>';
    }
}

?>
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Add New Trainee</strong></h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <div>
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control border border-dark-subtle shadow-none">

                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control border border-dark-subtle shadow-none">

                            <label for="" class="form-label">Phone</label>
                            <input type="tel" name="phone" class="form-control border border-dark-subtle shadow-none">

                            <label for="" class="form-label">City</label>
                            <input type="text" name="city" class="form-control border border-dark-subtle shadow-none">

                            <label for="" class="form-label">Education</label>
                            <input type="text" name="education"
                                   class="form-control border border-dark-subtle shadow-none">

                            <label for="" class="form-label">Remark</label>
                            <input type="text" name="remark" class="form-control border border-dark-subtle shadow-none">

                            <label for="" class="form-label">Status</label>
                            <select name="status" class="form-select border border-dark-subtle shadow-none">
                                <option value="Online">Online</option>
                                <option value="Offline">Offline</option>
                            </select>

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