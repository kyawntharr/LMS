<?php
include_once __DIR__ . '/../vendor/db/db.php';

class category
{
    public function categoryDetialInfo()
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'SELECT * FROM ctegory';
        $stament = $con->prepare($data);
        if ($stament->execute()) {
            $result = $stament->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function createCategoryInfo($name)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO ctegory (name) VALUES (:name)";
        $stament = $con->prepare($sql);
        $stament->bindParam(':name', $name);

        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCategoryInfo($id)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'SELECT * FROM ctegory WHERE id=:id';
        $stament = $con->prepare($data);
        $stament->bindParam('id', $id);
        if ($stament->execute()) {
            $result = $stament->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function updateCategoryInfo($id, $name)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'UPDATE ctegory SET name=:name WHERE id=:id';
        $stament = $con->prepare($data);
        $stament->bindParam(':id', $id);
        $stament->bindParam(':name', $name);
        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCategoryInfo($id)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'DELETE FROM ctegory WHERE id=:id';
        $stament = $con->prepare($data);
        $stament->bindParam(':id', $id);

        try {
            $stament->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getTotalCourseInfo()
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'SELECT cat.id as id,cat.name AS name,cat.id AS cat_id,
                    COUNT(cour.id) AS total_course
                    FROM ctegory AS cat 
                    JOIN course AS cour
                    ON cat.id = cour.cat_id
                    GROUP BY cour.cat_id
                    ';
        $stament = $con->prepare($data);

        if ($stament->execute()) {
            $result = $stament->fetchAll(PDO::FETCH_ASSOC);
        }

        return $result;
    }

}