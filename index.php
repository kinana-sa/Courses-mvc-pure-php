<?php

require_once "config/database.php";
require_once "app/controllers/UserController.php";
require_once "app/controllers/CourseController.php";

use App\Controllers\UserController;
use App\Controllers\CourseController;
use App\Models\User;

$userController = new UserController($conn);
$courseController = new CourseController($conn);

define('BASE_PATH',"/task2/");
$URL = $_GET['url'] ??"index";

session_start();

$x = new User();
$x->getAll("users");
print_r($x);
switch($URL)
{
    case "index":
        $userController->index();
        break;
    case "create":
        $userController->create();
        break;
    case "edit":
        $userController->edit();
        break;
    case "update":
        $userController->update();
        break;
    case "delete":
        $userController->delete();
        break;
    case "login":
        $userController->login();
        break;
    case "logout":
        $userController->logout();
        break;
    case "register":
        $userController->register();
        break;
    case "course_index":
            $courseController->index();
            break;
    case "course_create":
            $courseController->create();
            break;
    case "course_edit":
            $courseController->edit();
            break;
    case "course_update":
            $courseController->update();
            break;
    case "course_delete":
            $courseController->delete();
            break;

    default :
        $userController->index();
        break;
}  
