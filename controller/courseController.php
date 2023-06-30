<?php
include_once __DIR__ . '/../model/course.php';

class courseController extends course
{
    public function courseDetial()
    {
        return $this->courseDetialInfo();
    }

    public function createCourse($name, $outline, $category, $image)
    {
        if ($image['error'] == 0) {
            $filename = $image['name'];
            $extension = explode('.', $filename);
            $filetype = end($extension);
            $filesize = $image['size'];
            $allowed_types = ['jpg', 'jpeg', 'svg', 'png'];
            $temp_name = $image['tmp_name'];
            if (in_array($filetype, $allowed_types)) {
                if ($filesize <= 2000000) {
                    $timestamp = time();
                    $filename = $timestamp . $filename;
                    if (move_uploaded_file($temp_name, '../uploads/' . $filename)) {
                        return $this->createCourseInfo($name, $outline, $category, $filename);
                    }
                }
            }

        }

    }

    public function totalCourse()
    {
        return $this->totalCourseList();
    }

    public function getCourse($id)
    {
        return $this->getCourseInfo($id);
    }

    public function updateCourse($id, $name, $outline, $category,$image)
    {
        if ($image['error'] == 0) {
            $filename = $image['name'];
            $extension = explode('.', $filename);
            $filetype = end($extension);
            $filesize = $image['size'];
            $allowed_types = ['jpg', 'jpeg', 'svg', 'png'];
            $temp_name = $image['tmp_name'];
            if (in_array($filetype, $allowed_types)) {
                if ($filesize <= 2000000) {
                    $timestamp = time();
                    $filename = $timestamp . $filename;
                    if (move_uploaded_file($temp_name, '../uploads/' . $filename)) {
                        return $this->createCourseInfo($name, $outline, $category, $filename);
                    }
                }
            }

        }
                return $this->updateCourseInfo($id, $name, $outline, $category);
    }

    public function deleteCourse()
    {
        return $this->deleteCourseInfo();
    }
}