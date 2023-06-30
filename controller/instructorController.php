<?php
include_once __DIR__ . '/../model/instructor.php';

class instructorController extends instructor {
    public function instructorDetial()
    {
        return $this->instructorDetialInfo();
    }

    public function createInstructor($name,$email,$phone)
    {
        return $this->createInstructorInfo($name,$email,$phone);
    }

    public function getInstructor($id)
    {
        return $this->getInstructorInfo($id);
    }

    public function updateInstructor($id,$name,$email,$phone)
    {
        return $this->updateInstructorInfo($id,$name,$email,$phone);
    }

    public function deleteInstructor($id)
    {
        return $this->deleteInstructorInfo($id);
    }
}