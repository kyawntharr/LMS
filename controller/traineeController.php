<?php
include_once __DIR__ . '/../model/trainee.php';

class traineeController extends trainee
{
    public function traineeDetial()
    {
        return $this->traineeDetialInfo();
    }

    public function createTrainee($name,$email,$phone,$city,$education,$remark,$status)
    {
        return $this->createTraineeInfo($name,$email,$phone,$city,$education,$remark,$status);
    }

    public function getTrainee($id)
    {
        return $this->getTraineeInfo($id);
    }

    public function updateTrainee($id,$name,$email,$phone,$city,$education,$remark,$status)
    {
        return $this->updateTraineeInfo($id,$name,$email,$phone,$city,$education,$remark,$status);
    }

    public function deleteTrainee($id)
    {
        return $this->deleteTraineeInfo($id);
    }
}