<?php
declare (strict_types=1);
namespace App\Models;

require_once "Model.php";

class Course extends Model {

    private string $name;
    private int $price;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public static function getAllCourses($conn) {

       $sql = "SELECT * FROM courses";
       $result = mysqli_query($conn, $sql);
       $courses = array();

       while($row= mysqli_fetch_assoc($result)) {
        $course = new Course();
        $course->setId((int) $row['id']);
        $course->setName($row['cname']);
        $course->setPrice((int) $row['price']);
        $courses[] = $course;
       }
       return $courses;
    }

    public static function getCourseById($conn, $id) {

        $sql = "SELECT * FROM courses WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $course = new Course();
        $course->setId((int) $row['id']);
        $course->setName($row['cname']);
        $course->setPrice((int) $row['price']);
        
        return $course;
     }

     public function save($conn){

        if(!isset($this->id)){
            $sql = "UPDATE courses SET cname = '$this->name', price = '$this->price' WHERE id = '$this->id'";
            $result = mysqli_query($conn, $sql);
        
        }
        else{
            $sql = "INSERT INTO courses (cname,price) VALUES ('$this->name','$this->price')";
            $result = mysqli_query($conn, $sql);

            $this->id = mysqli_insert_id($conn);
        }

     }

     public function delete($conn, $id){
        $sql = "DELETE FROM courses WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        
     }

}