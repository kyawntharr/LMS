<?php
include_once __DIR__ . '/../layouts/sidebar.php';
include_once __DIR__ . '/../controller/courseController.php';

$course_controller = new courseController();
$courses = $course_controller->courseDetial();
?>

    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Course</strong> Dashboard</h1>
            <div class="row">
                <div class="col-md-3">
                    <a href="add_course.php" class="btn btn-dark">Add New Course</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <table class="table table-sm py-3" id="mytable">
                        <thead>
                        <tr class="bg-secondary">
                            <th class="text-light">NO</th>
                            <th class="text-light">Name</th>
                            <th class="text-light">Outline</th>
                            <th class="text-light">Category</th>
                            <th class="text-light">Image</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$count = 1;
foreach ($courses as $course) {
    echo '<tr>';
    echo '<td>' . $count++ . '</td>';
    echo '<td>' . $course['name'] . '</td>';
    echo '<td>' . $course['outline'] . '</td>';
    echo '<td>' . $course['category'] . '</td>';
//    echo "<td><img src='../uploads/"     .$course['image'].   "' width = '100px' height='80px'></td>";
    echo '<td><img src="../uploads/'     .$course['image'].  '" width = "80px" height="70px"></td>';
    echo '<td>
            <a class="btn btn-warning" href="edit_course.php?id=' . $course['id'] . '">Edit</a>
            <a class="btn btn-danger" href="#">Delete</a>
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