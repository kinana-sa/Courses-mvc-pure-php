<?php

namespace App\Controllers;

require_once "BaseController.php";
require_once __DIR__."/../models/Course.php";

use App\Models\Course;

class CourseController extends BaseController {

    public function index() {

        $courses = Course::getAllCourses($this->conn);

        $this->render("course/index", compact("courses"));
    }

    public function create() {
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $course = new Course();
            $course->setName($_POST["name"]);
            $course->setPrice((int) $_POST["price"]);
            $course->save($this->conn);
            header("Location: /task2/course_index");
        }
        else{
            $this->render("course/create");
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $course = Course::getCourseById($this->conn, $id);
        $this->render("course/edit", compact('course'));
        
    }

    public function update() {
        $id = $_GET["id"];
        $course = Course::getCourseById($this->conn, $id);
        $course->setName($_POST["name"]);
        $course->setPrice((int) $_POST["price"]);
        $course->save($this->conn);
        header("Location: /task2/course_index");
        
        
    }
    public function delete() {
        
        if(isset($_POST['yes'])){
            $id = $_POST['id'];
            $course = Course::getCourseById($this->conn, $id);
            $course->delete($this->conn,$id);
            header('Location: /task2/course_index');
            exit;
        }
        elseif(isset($_POST["no"])){
            header('Location: /task2/course_index');
            exit; 
        }
        else{
            $id= $_GET['id'];
            $course = Course::getCourseById($this->conn, $id);
            $this->render("course/delete", compact("course"));
        }
    }
}
