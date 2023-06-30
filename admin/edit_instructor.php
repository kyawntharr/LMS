<?php
include_once __DIR__ . '/../layouts/sidebar.php';
include_once __DIR__ . '/../controller/instructorController.php';

$id= $_GET['id'];
$instructor_controller = new instructorController();
$get_instructor =$instructor_controller->getInstructor($id);
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $update = $instructor_controller->updateInstructor($id,$name,$email,$phone);
    if ($update){
            echo '<script>location.href="app_instructor.php"</script>';

    }
}

?>
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Edit Instructor</strong></h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <div>
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control border border-dark-subtle shadow-none"
                                   value="<?php echo $get_instructor['name']?>">

                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control border border-dark-subtle shadow-none"\
                                   value="<?php echo $get_instructor['email']?>">

                            <label for="" class="form-label">Phone Number</label>
                            <input type="tel" name="phone" class="form-control border border-dark-subtle shadow-none"
                                   value="<?php echo $get_instructor['phone']?>">

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