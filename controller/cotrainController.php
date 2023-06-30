<?php
include_once __DIR__ . '/../model/cotrain.php';
class cotrainControler extends cotrain{

    public function getCotrain(){
        return $this->getCotrainInfo();
    }

    public function getTrainee(){
        return $this->getTraineeInfo();
    } 

    public function getBatch(){
        return $this->getBatchInfo();
    }

    public function addCotrain($batch,$trainee,$joinDate,$status){
        return $this->addCotrainInfo($batch,$trainee,$joinDate,$status);
    }

    public function totalTraineeByCourse(){
        return $this->totalTraineeByCourseInfo();
    }
}
