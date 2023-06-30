<?php
include_once __DIR__ . '/../model/category.php';

class categoryController extends category {
    public function categoryDetial()
    {
        return $this->categoryDetialInfo();
    }

    public function createCategory($name)
    {
        return $this->createCategoryInfo($name);
    }

    public function getCategory($id)
    {
        return $this->getCategoryInfo($id);
    }

    public function updateCategory($id,$name)
    {
        return $this->updateCategoryInfo($id,$name);
    }

    public function deleteCategory($id)
    {
        return $this->deleteCategoryInfo($id);
    }

    public function getTotalCourse(){
        return $this->getTotalCourseInfo();
    }
}