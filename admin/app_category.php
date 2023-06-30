<?php
include_once __DIR__ . '/../layouts/sidebar.php';
include_once __DIR__ . '/../controller/categoryController.php';

$category_controller = new categoryController();
$categories = $category_controller->categoryDetialInfo();

// $total_getorycourse = $category_controller->getTotalCourse();
?>

    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Category</strong> Dashboard</h1>
            <div class="row">
                <div class="col-md-3">
                    <a href="add_category.php" class="btn btn-dark">Add New Category</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <table class="table table-sm py-3" id="mytable">
                        <thead>
                        <tr class="bg-secondary">
                            <th class="text-light">NO</th>
                            <th class="text-light">Name</th>
                            <th class="text-light">Total Course</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count = 1;
                        foreach ($categories as $category) {
                            echo '<tr>';
                            echo '<td>' . $count++ . '</td>';
                            echo '<td>' . $category['name'] . '</td>';
                            echo '<td>' . $category['id'] . '</td>';
                            echo '<td id='.$category['id'].'>
                                    <a class="btn btn-warning mx-2" href="edit_category.php?id='.$category['id'].'">Edit</a>
                                    <a class="btn btn-danger btn_delete mx-2">Delete</a>
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