<?php
include_once __DIR__ . '/../vendor/db/db.php';

class trainee
{
    public function traineeDetialInfo()
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'SELECT * FROM trainee';
        $stament = $con->prepare($data);
        if ($stament->execute()) {
            $result = $stament->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;

    }

    public function createTraineeInfo($name, $email, $phone, $city, $education, $remark, $status)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = "INSERT INTO trainee (name,email,phone,city,education,remark,status) VALUES (:name,:email,:phone,:city,:education,:remark,:status)";
        $stament = $con->prepare($data);
        $stament->bindParam(':name', $name);
        $stament->bindParam(':email', $email);
        $stament->bindParam(':phone', $phone);
        $stament->bindParam(':city', $city);
        $stament->bindParam(':education', $education);
        $stament->bindParam(':remark', $remark);
        $stament->bindParam(':status', $status);

        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getTraineeInfo($id)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'SELECT * FROM trainee WHERE id=:id';
        $stament = $con->prepare($data);
        $stament->bindParam('id', $id);
        if ($stament->execute()) {
            $result = $stament->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function updateTraineeInfo($id, $name, $email, $phone, $city, $education, $remark, $status)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'UPDATE trainee SET name=:name,email=:email,phone=:phone,city=:city,education=:education,remark=:remark,status=:status WHERE id=:id';
        $stament = $con->prepare($data);
        $stament->bindParam(':id', $id);
        $stament->bindParam(':name', $name);
        $stament->bindParam(':email', $email);
        $stament->bindParam(':phone', $phone);
        $stament->bindParam(':city', $city);
        $stament->bindParam(':education', $education);
        $stament->bindParam(':remark', $remark);
        $stament->bindParam(':status', $status);
        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteTraineeInfo($id)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'DELETE FROM instructor WHERE id=:id';
        $stament = $con->prepare($data);
        $stament->bindParam(':id', $id);

        try {
            $stament->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}