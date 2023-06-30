<?php
include_once __DIR__ . '/../layouts/sidebar.php';
include_once __DIR__ . '/../controller/instructorController.php';

$instructor_controller = new instructorController();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $add = $instructor_controller->createInstructor($name, $email, $phone);
    if ($add) {
        echo '<script>location.href="app_instructor.php?status=' . $add . '"</script>';
    }
}

?>
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Add New Instructor</strong></h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <div>
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control border border-dark-subtle shadow-none">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control border border-dark-subtle shadow-none">
                            <label for="" class="form-label">Phone Number</label>
                            <input type="tel" name="phone" class="form-control border border-dark-subtle shadow-none">
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