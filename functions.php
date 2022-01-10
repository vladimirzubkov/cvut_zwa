<?php

// Form
function form_value($value){
    if(isset($_POST[$value])){
        echo htmlspecialchars($_POST[$value], ENT_QUOTES);
    }
}

/*

@return [] $errors_messages

*/
function registration_form_validation(){

    $errors = false;
    $errors_messages = "";

    // User
    if(check_user_exists() === true){
        $errors = true;
        $errors_messages .= '<div class="error">Uživatel s takovým jménem již existuje!</div>';
    }

    // Email
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
        if (strpos($email,"@") === false) {
            $errors = true;
            $errors_messages .= '<div class="error">Email musí obsahovat zavináč!</div>';
        }
    }

    // phone
     if (isset($_POST["phone"])) {
        $phone = $_POST["phone"];
           if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
            // $phone is valid
        }else{
            $errors = true;
            $errors_messages .= '<div class="error">Uveďte telefonní číslo ve správném formátu (0-9)!</div>';
        }
    }


    if($errors === false){
        user_registration();
    }else{
        return $errors_messages;
    }

}

function login_form_validation(){

    $errors = false;
    $errors_messages = "";

    // Validate: Username is not empty
    if (empty($_POST["username"])) {
            $errors = true;
            $errors_messages .= '<div class="error">Uveďte uživatelské jméno!</div>';
        }
 
    // Validate: Password is not empty
    if (empty($_POST["password"])) {
            $errors = true;
            $errors_messages .= '<div class="error">Uveďte heslo!</div>';
        }

    // check_user_exists
    if (!empty($_POST["username"])) {
        if(check_user_exists() === false){
            $errors = true;
            $errors_messages .= '<div class="error">Uživatel s takovým jménem neexistuje!</div>';
        }
    }

    if($errors === false){
        // Ok, user exists
        $user = get_user($_POST['username']);
        // Check pass
        if(password_verify($_POST['password'] . SALT, $user["password"])) {
            // Login 
            $_SESSION["logged-in"] = $user["username"];
            header("Location: ?page=success_login");
        }
    }else{
        return $errors_messages;
    }
}


function upload_form_validation(){

    $errors = false;
    $errors_messages = "";


    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        $errors = true;
        $errors_messages .= '<div class="error">Promiňte, velikost soboru je ohraničena 500Kb.</div>';
    }

    // Get file extension from file name (jpg, png, php)
    $image_file_type = strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));

    // Allow certain file formats
    if(!in_array($image_file_type, ["jpg","jpeg","png","gif"])) {
        $errors = true;
        $errors_messages .= '<div class="error">Promiňte, jsou povolený soubory typu JPG, JPEG, PNG a GIF.</div>';
    }

    // Check if $uploadOk is set to 0 by an error
    if ($errors === false) {
        $target_file = IMAGES_DIR . md5(microtime()) . '.' . $image_file_type;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // echo "Soubor ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " byl nahrán na server.";
        } else {
            $errors = true;
            $errors_messages .= '<div class="error">Promiňte, během nahrávání souboru se stala chyba.</div>';
        }
    }

    if($errors === false){
        header("Location: ?page=gallery");
    }else{
        return $errors_messages;
    }
}


function user_registration(){
    // Save user data
    add_user();

    // Redirect to Thank you page
    header("Location: ?page=thank_you");
    die("saved");
}



// Prace s daty

function get_users() {
    if(!file_exists(DATA_USERS)){
        return array(); 
    }

    $users_json = file_get_contents(DATA_USERS);
    if ($users_json === false) {
        return array(); 
    }
    // Convert JSON to PHP Array
    return json_decode($users_json, true);
}

function get_user($username) {
    $users = get_users();
    foreach($users as $user){
        if($user["username"] == $username){
            return $user;
        }
    }
    return NULL;
}


// Save PHP Array $users to JSON file
function save_users($users){
    file_put_contents(DATA_USERS, json_encode($users));
}
// Kontrola if existuje
// Return true | false
function check_user_exists(){
    $user_exists = false;

    // Get all users
    $users = get_users();

    // Check if user exists
    if (!empty($_POST["username"])) {
        if(count($users) > 0){
            $new_username = $_POST["username"];
            foreach($users as $user){
                if($user["username"] == $new_username){
                    $user_exists = true;
                }
            }
        }
    }
    return $user_exists;
}

function add_user() {
    $users = get_users();

    // Add new user 
    // Salt password
    $_POST["password"] = password_hash($_POST["password"] . SALT , PASSWORD_DEFAULT);

    // Remove password2
    unset($_POST["password2"]);
    $users[] = $_POST;


    // Update JSON file
    save_users($users);
}

function is_loggedin(){
    if(isset($_SESSION["logged-in"]) && !empty($_SESSION["logged-in"])){
        return true;
    }else{
        return false;
    }
}