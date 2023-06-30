<?php
include_once __DIR__ . '/../layouts/sidebar.php';
include_once __DIR__ . '/../controller/traineeController.php';

$trainee_controller=new traineeController();
$trainees = $trainee_controller->traineeDetial();
?>

    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Trainee</strong> Dashboard</h1>
            <div class="row">
                <div class="col-md-3">
                    <a href="add_trainee.php" class="btn btn-dark">Add New Trainee</a>
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
                            <th class="text-light">City</th>
                            <th class="text-light">Education</th>
                            <th class="text-light">Remark</th>
                            <th class="text-light">Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count = 1;
                        foreach ($trainees as $trainee){
                            echo '<tr>';
                            echo '<td>'.$count++.'</td>';
                            echo '<td>'.$trainee['name'].'</td>';
                            echo '<td>'.$trainee['email'].'</td>';
                            echo '<td>'.$trainee['phone'].'</td>';
                            echo '<td>'.$trainee['city'].'</td>';
                            echo '<td>'.$trainee['education'].'</td>';
                            echo '<td>'.$trainee['remark'].'</td>';
                            echo '<td>'.$trainee['status'].'</td>';
                            echo '<td id='.$trainee['id'].'>
                                    <a class="btn btn-warning" href="edit_trainee.php?id='.$trainee['id'].'">Edit</a>
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