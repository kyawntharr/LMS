<?php
include_once __DIR__ . '/../vendor/db/db.php';

class instructor
{
    public function instructorDetialInfo()
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'SELECT * FROM instructor';
        $stament = $con->prepare($data);
        if ($stament->execute()) {
            $result = $stament->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function createInstructorInfo($name, $email, $phone)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = "INSERT INTO instructor (name,email,phone) VALUES (:name,:email,:phone)";
        $stament = $con->prepare($data);
        $stament->bindParam(':name', $name);
        $stament->bindParam(':email', $email);
        $stament->bindParam(':phone', $phone);

        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getInstructorInfo($id)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "select * from instructor where id=:id";
        $stament = $con->prepare($sql);
        $stament->bindParam(':id', $id);

        if ($stament->execute()) {
            $result = $stament->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function updateInstructorInfo($id, $name, $email, $phone)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'UPDATE instructor SET name=:name,email=:email,phone=:phone WHERE id=:id';
        $stament = $con->prepare($data);
        $stament->bindParam(':id', $id);
        $stament->bindParam(':name', $name);
        $stament->bindParam(':email', $email);
        $stament->bindParam(':phone', $phone);
        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function deleteInstructorInfo($id)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'DELETE FROM instructor WHERE id=:id';
        $stament = $con->prepare($data);
        $stament->bindParam(':id', $id);

        try {
            $stament->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
