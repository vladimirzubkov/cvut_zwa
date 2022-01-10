<?php
session_start();

include ("config.php");
include ("functions.php");

// echo '<pre>';
// print_r(get_users());
// exit;


// Page addressing 
if(isset($_GET['page']) && in_array($_GET['page'], $pages) && file_exists("templates/". $_GET['page'] .".html.php")){
    $page_file = $_GET['page'];
}else{
    $page_file = empty($_GET['page']) ? 'index' : 'error404';
}


// User account check permissions
if($page_file == "upload" && is_loggedin() === false){
    $page_file = "index";
}


// Forms validation
if(isset($_POST["submit"])){
    if($page_file == 'registration'){
        $errors_messages = registration_form_validation();
    }elseif($page_file == 'login'){
        $errors_messages = login_form_validation();
    }elseif($page_file == 'upload'){
        $errors_messages = upload_form_validation();
    }
}


// Display
include ("templates/_header.html.php");
include ("templates/". $page_file .".html.php");
include ("templates/_footer.html.php");

?>