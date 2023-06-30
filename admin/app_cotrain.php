<?php
include_once __DIR__ . '/../layouts/sidebar.php';
include_once __DIR__ . '/../controller/cotrainController.php';

$contrain_controller = new cotrainControler();
$result = $contrain_controller->getCotrain();

?>

    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3 font-monospace">Admin<code>/course_trainee</code></h1>
            <div class="row">
                <div class="col-md-3">
                    <a href="add_register.php" class="btn btn-dark">New Registration</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <table class="table table-sm py-3" id="">
                        <thead>
                        <tr class="bg-secondary">
                            <th class="text-light">NO</th>
                            <th class="text-light">Batch</th>
                            <th class="text-light">Trainee</th>
                            <th class="text-light">Joinded Date</th>
                            <th class="text-light">Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
foreach ($result as $item) {
    echo '<tr>';
    echo '<td>'.$count++.'</td>';
    echo '<td>'.$item['tname'].'</td>';
    echo '<td>'.$item['name'].'</td>';
    echo '<td>'.$item['joinded_date'].'</td>';
    echo '<td>'.$item['status'].'</td>';
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