<?php
include_once __DIR__ . '/../layouts/sidebar.php';
include_once __DIR__ . '/../controller/instructorController.php';
$instructor_controller = new instructorController();
$instructors = $instructor_controller->instructorDetial();
?>

    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Instructor</strong> Dashboard</h1>
            <div class="row">
                <div class="col-md-3">
                    <a href="add_instructor.php" class="btn btn-dark">Add New Instructor</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <table class="table table-sm py-3" id="mytable">
                        <thead>
                        <tr class="bg-secondary">
                            <th class="text-light">NO</th>
                            <th class="text-light">Name</th>
                            <th class="text-light">Email</th>
                            <th class="text-light">Phone</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count = 1;
                        foreach ($instructors as $instructor){
                            echo '<tr>';
                            echo '<td>'.$count++.'</td>';
                            echo '<td>'.$instructor['name'].'</td>';
                            echo '<td>'.$instructor['email'].'</td>';
                            echo '<td>'.$instructor['phone'].'</td>';
                            echo '<td id='.$instructor['id'].'>
                                    <a class="btn btn-warning" href="edit_instructor.php?id='.$instructor['id'].'">Edit</a>
                                    <button class="btn btn-danger btn_delete">Delete</button>
                                    </td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </main>
<?php
include_once __DIR__ . '/../layouts/app_footer.php';

?>