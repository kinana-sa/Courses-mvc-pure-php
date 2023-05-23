<?php
define('BASE_PATH',"/task2/");
$url = $_GET['url'] ??"index";

echo $url;


if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
       
    $userController->login();
}
if ($_SERVER['REQUEST_URI'] === BASE_PATH.'register') {
    
    $userController->register();
}
else{

if ($_SERVER['REQUEST_URI'] === BASE_PATH.'index') {
    
    $userController->index();
    echo "<br>";
    
} elseif ($_SERVER['REQUEST_URI'] === BASE_PATH . 'create') {
    
    $userController->create();

} elseif ($_SERVER['REQUEST_URI'] === BASE_PATH . 'logout') {
    
    $userController->logout();
}elseif (strpos($_SERVER['REQUEST_URI'], BASE_PATH . 'edit') === 0) {
    //$id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'edit/'));
    
    $userController->edit();
} elseif (strpos($_SERVER['REQUEST_URI'], BASE_PATH . 'delete') === 0) {
    //$id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'delete/'));
    
    $userController->delete();
}
elseif (strpos($_SERVER['REQUEST_URI'], BASE_PATH . 'update') === 0) {
    //$id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'delete/'));
    
    $userController->update();
}

//Courses URL:
elseif ($_SERVER['REQUEST_URI'] === BASE_PATH.'course_index') {

    $courseController->index();
 
} elseif ($_SERVER['REQUEST_URI'] === BASE_PATH . 'course_create') {
    
    $courseController->create();

} elseif (strpos($_SERVER['REQUEST_URI'], BASE_PATH . 'course_edit') === 0) {
    //$id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'edit_product/'));
    $courseController->edit();
    
}
 elseif (strpos($_SERVER['REQUEST_URI'], BASE_PATH . 'course_update') === 0) {
//$id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'edit_product/'));
$courseController->update();

}elseif (strpos($_SERVER['REQUEST_URI'], BASE_PATH . 'course_delete') === 0) {
    //$id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'delete_product/'));
   
    $courseController->delete();
}
else{
    $userController->index();
}
}
?>