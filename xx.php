$action = isset($_GET['action']) ? $_GET["action"] : "index";
if($action == "register")
{
    $userController->register();
}
session_start();

if(!isset($_SESSION['id'])){
    $userController->login();
}

else {
    //$action = isset($_GET['action']) ? $_GET["action"] : "index";

    switch($action) {
        
        case "index" :
            $userController->index();
            break;
        case "login" :
            $userController->login();
            break;
            
        case "create" :
            $userController->create();
            break;

        case "edit" :
            $userController->edit();
            break;

        case "update" :
            $userController->update();
            break;

        case "delete" :
            $userController->delete();
            break;
        case "logout" :
            $userController->logout();
            break;
        // case "register" :
        //     $userController->register();
        //     break;
            
        case "course_index" :
            $courseController->index();
            break;
           
        case "course_create" :
                $courseController->create();
                break;
    
        case "course_edit" :
            $courseController->edit();
                break;
                            
        case "course_update" :
                $courseController->update();
                break;
    
        case "course_delete" :
                $courseController->delete();
                break;
        default:
            $userController->login();
            break;
    }
}