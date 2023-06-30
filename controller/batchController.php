<?php
include_once __DIR__ . '/../model/batch.php';

class batchController extends batch
{
    public function batchDetial()
    {
        return $this->batchDetialInfo();
    }

    public function createBatch($name, $start_date, $duration, $fee, $discount, $course_id)
    {
        return $this->createBatchInfo($name, $start_date, $duration, $fee, $discount, $course_id);
    }

    public function getBatch($id)
    {
        return $this->getBatchInfo($id);
    }

    public function updateBacth($id,$name,$date,$duration,$fee,$discount,$course)
    {
        return $this->updateBacthInfo($id,$name,$date,$duration,$fee,$discount,$course);
    }

    public function deleteBatch($id)
    {
        return $this->deleteBatchInfo($id);
    }

    public function getBatchPerYear(){
        return $this->getBatchPerYearInfo();
    }
}