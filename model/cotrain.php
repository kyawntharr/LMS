<?php
include_once __DIR__ . '/../vendor/db/db.php';

class cotrain
{
    public function getCotrainInfo(){
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'SELECT batch_id,cotrain.name,trainee.name as tname,joinded_date,trinee_course.status
        from trinee_course 
        JOIN(SELECT id,name FROM batch) as cotrain 
        on cotrain.id = batch_id
        JOIN trainee on trinee_course.trainee_id = trainee.id ';
        $stament = $con->prepare($data);
        if ($stament->execute()) {
            $result = $stament->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function getTraineeInfo()
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'select * from trainee';
        $stament = $con->prepare($data);
        if ($stament->execute()) {
            $result = $stament->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function getBatchInfo()
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'select * from batch';
        $stament = $con->prepare($data);
        if ($stament->execute()) {
            $result = $stament->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function addCotrainInfo($batch,$trainee,$joinDate,$status)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = 'INSERT INTO trinee_course(batch_id,trainee_id,joinded_date,status) 
        VALUES (:batch,:trainee,:joinDate,:status)';
        $stament = $con->prepare($data);
        $stament->bindParam(':batch', $batch);
        $stament->bindParam(':trainee', $trainee);
        $stament->bindParam(':joinDate', $joinDate);
        $stament->bindParam(':status', $status);
        if($stament->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function totalTraineeByCourseInfo(){
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = 'SELECT course.name as course,table2.name as batch,table2.trainne1 as total
FROM course
JOIN
	(SELECT course_id,name,COUNT(table1.trainee) as trainne1
	FROM batch
	JOIN
            (SELECT batch_id as batch ,COUNT(trainee_id) as trainee
        	 FROM trinee_course 
             GROUP by id
            ) as table1
     
	ON batch.id = table1.batch GROUP BY batch.course_id ) as table2
on course_id = course.id';
        $stament = $con->prepare($data);
        if ($stament->execute()) {
            $result = $stament->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

}
