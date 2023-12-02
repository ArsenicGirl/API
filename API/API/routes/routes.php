<?php
//Detecta nuestra URL
$rutasArray = explode("/", $_SERVER['REQUEST_URI']);
$inputs = array();
//Raw input for request
$inputs['raw_input'] = @file_get_contents('php://input');
$_POST = json_decode($inputs['raw_input'], true);


if (count(array_filter($rutasArray))<2){
    $json = array("ruta" => "not found");
    echo json_encode($json, true);
    return;
}else{
    /**
     * EndPoint Correctos
     */
    
    $endPoint = (array_filter($rutasArray)[2]);
    $complement =  (array_key_exists(3,$rutasArray))?($rutasArray)[3]:0;
    $add  = (array_key_exists(4,$rutasArray))?($rutasArray)[4]:"";
    if($add !="") $complement .= "/".$add;
    $method = $_SERVER['REQUEST_METHOD'];

    switch($endPoint){

        //endPoint 'users' para realizar las acciones de registro, visualización y edición/actualización de usuarios
        case 'users':
            if(isset($_POST))
                $user = new  UserController($method, $complement, $_POST);
            else
                $user =  new UserController($method, $complement, 0);
            $user -> index();
            
            break;

          
         //endPoint 'remove' para dar de baja a un usuario
         case 'remove':
            if(isset($_POST) && $method =='PATCH') {
                $user = new  UserController($method, $complement, $_POST);
            }else{
                $user =  new UserController($method, $complement, 0);
            $user -> index();
            }
            break;

            //endPoint 'login' para verificar el login de los usuarios con la ruta
        case 'login':
            if(isset($_POST) && $method =='POST'){
                $user = new LoginController($method, $_POST);
                $user -> index();
            }else{
                $json = array(
                    "ruta"=>"not found"
                );
                echo json_encode($json, true);
                return;
            }
        default:
        $json = array(
            "ruta" => "not found"
        );
        echo json_encode($json, true);
        return;
    }
}
?>