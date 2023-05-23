<?php

namespace App\Controllers;

require_once "BaseController.php";
require_once __DIR__ . "/../models/User.php";

use App\Models\User;

class UserController extends BaseController {

    public function index() {

        $users = User::getAllUsers($this->conn);
        $this->render("user/index",compact("users"));

    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $name = $_POST['name'];
            $password = $_POST['password'];
            
            $sql ="SELECT * FROM users WHERE password= '$password' and name = '$name'";
            $stmt = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($stmt) >0){
            $result = mysqli_fetch_assoc($stmt);
            
            session_start();
            $_SESSION['id'] = $result['id'];
            $_SESSION['name'] = $result['name'];
            $_SESSION['email'] = $result['email'];

            header('Location: /task2/index');
            exit;
            }
            else{
                echo "<br>Error In Name or Email.<br>";
            }
        }
        else{
            require 'views/user/login.php';
        }
    }

    public function create() {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name))
            $user = new User();
            $user->setName(validate($_POST["name"]));
            $user->setEmail(validate($_POST["email"]));
            $user->setPassword(validate($_POST["password"]));
            $user->save($this->conn);
            header("Location: /task2/index");
        }else {
            $this->render("user/create");
        }
        
    }
    public function register()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $user  = new User();
            $user->setName(validate($_POST["name"])); 
            $user->setEmail(validate($_POST["email"])); 
            $user->setPassword(validate($_POST["password"])); 
            $user->save($this->conn);
            header("Location: /task2/login");
            exit;
        }
        else
       { $this->render("user/register");}
    }

    public function edit() {
        $id = $_GET["id"];
        $user = User::getUserById($this->conn, $id);
        $this->render("user/edit",compact("user"));
    }

    public function update() {
        
        $user = new User();
        $user->setId((int) $_POST["id"]);
        $user->setName(validate($_POST["name"]));
        $user->setEmail(validate($_POST["email"]));
        $user ->setPassword(validate($_POST["password"]));
        $user->save($this->conn);
        header("Location: /task2/index");
        
    }

    public function logout() {
        session_destroy();
        $this->render("user/login");
        
    }

    public function delete() {

        $id = $_POST["id"];
        
        User::delete($this->conn, $id);

        header("Location: /task2/index") ;
    }
}