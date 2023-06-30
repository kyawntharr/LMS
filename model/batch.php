<?php
include_once __DIR__ . '/../vendor/db/db.php';

class batch
{
    public function batchDetialInfo()
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = "SELECT * FROM batch";
        $stament = $con->prepare($data);

        if ($stament->execute()) {
            $result = $stament->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;

    }

    public function createBatchInfo($name, $start_date, $duration, $fee, $discount, $course_id)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = 'INSERT INTO batch (name,start_date,duration,fee,discount,course_id)
                    VALUES (:name,:start_date,:duration,:fee,:discount,:course_id)';
        $stament = $con->prepare($data);
        $stament->bindParam(':name', $name);
        $stament->bindParam(':start_date', $start_date);
        $stament->bindParam(':duration', $duration);
        $stament->bindParam(':fee', $fee);
        $stament->bindParam(':discount', $discount);
        $stament->bindParam(':course_id', $course_id);

        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getBatchInfo($id)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = 'SELECT * FROM batch WHERE id=:id';
        $stament = $con->prepare($data);
        $stament->bindParam(':id', $id);

        if ($stament->execute()) {
            $result = $stament->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function updateBacthInfo($id, $name, $date, $duration, $fee, $discount, $course)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = 'UPDATE batch SET name=:name,start_date=:date,duration=:duration,fee=:fee,discount=:discount,course_id=:course WHERE id=:id';
        $stament = $con->prepare($data);
        $stament->bindParam(':id', $id);
        $stament->bindParam(':name', $name);
        $stament->bindParam(':date', $date);
        $stament->bindParam(':duration', $duration);
        $stament->bindParam(':fee', $fee);
        $stament->bindParam(':discount', $discount);
        $stament->bindParam(':course', $course);

        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteBatchInfo($id)
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

    public function getBatchPerYearInfo()
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'SELECT COUNT(id) as total,year(start_date) as byear FROM batch GROUP BY year(start_date)';
        $stament = $con->prepare($data);

        if ($stament->execute()) {
            $result = $stament->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
}
