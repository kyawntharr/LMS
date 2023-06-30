<?php
include_once __DIR__ . '/../vendor/db/db.php';

class course
{
    public function courseDetialInfo()
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//        $data = 'SELECT * FROM course';
        $data = 'SELECT course.id AS id,course.name AS name,course.course_outline AS outline,
       ctegory.name AS category,course.image as image
FROM course JOIN ctegory ON course.cat_id=ctegory.id';
        $stament = $con->prepare($data);
        if ($stament->execute()) {
            $result = $stament->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function createCourseInfo($name, $outline, $category, $image)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = "INSERT INTO course (name,course_outline,cat_id,image) VALUES (:name,:outline,:category,:image)";
        $stament = $con->prepare($data);
        $stament->bindParam(':name', $name);
        $stament->bindParam(':outline', $outline);
        $stament->bindParam(':category', $category);
        $stament->bindParam(':image', $image);
        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function totalCourseList()
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = "select ctegory.name as name,count(course.id) as total from course join ctegory on course.cat_id=ctegory.id group by course.cat_id";
//        $data = 'SELECT cat.name AS name,cat.id AS cat_id,
//                    COUNT(cour.id) AS total_course
//                    FROM ctegory AS cat
//                    JOIN course AS cour
//                    ON cat.id = cour.cat_id
//                    GROUP BY cour.cat_id
//                    ';
        $stament = $con->prepare($data);

        if ($stament->execute()) {
            $result = $stament->fetchAll(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    public function getCourseInfo($id)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'SELECT * FROM course WHERE id=:id';
        $stament = $con->prepare($data);
        $stament->bindParam('id', $id);

        if ($stament->execute()) {
            $result = $stament->fetch(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    public function updateCourseInfo($id, $name, $outline, $category)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'UPDATE course SET name=:name,course_outline=:outline,cat_id=:category WHERE id=:id';
        $stament = $con->prepare($data);
        $stament->bindParam(':id', $id);
        $stament->bindParam(':name', $name);
        $stament->bindParam(':outline', $outline);
        $stament->bindParam(':category', $category);

        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCourseInfo()
    {

    }
}