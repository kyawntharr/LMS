<?php
include_once __DIR__ . '/../layouts/sidebar.php';
include_once __DIR__ . '/../controller/batchController.php';

$batch_controller = new batchController();
$batchDetails = $batch_controller->batchDetial();

?>

    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Batch</strong> Dashboard</h1>
            <div class="row">
                <div class="col-md-3">
                    <a href="add_batch.php" class="btn btn-dark">Add New Batch</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <table class="table table-sm py-3" id="mytable">
                        <thead>
                        <tr class="bg-secondary">
                            <th class="text-light">NO</th>
                            <th class="text-light">Name</th>
                            <th class="text-light">Date</th>
                            <th class="text-light">Duration</th>
                            <th class="text-light">Fee</th>
                            <th class="text-light">Discount</th>
                            <th class="text-light">Course</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count = 1;
                        foreach ($batchDetails as $batchDetail) {
                            echo '<tr>';
                            echo '<td>' . $count++ . '</td>';
                            echo '<td>' . $batchDetail['name'] . '</td>';
                            echo '<td>' . $batchDetail['start_date'] . '</td>';
                            echo '<td>' . $batchDetail['duration'] . '</td>';
                            echo '<td>' . $batchDetail['fee'] . '</td>';
                            echo '<td>' . $batchDetail['discount'] . '</td>';
                            echo '<td>' . $batchDetail['course_id'] . '</td>';
                            echo '<td id='.$batchDetail['id'].'>
                                    <a class="btn btn-warning mx-3" href="edit_batch.php?id='.$batchDetail['id'].'">Edit</a>
                                    <a class="btn btn-danger btn_delete">Delete</a>
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