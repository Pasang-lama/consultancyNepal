<?php ob_start();
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../../database.php";
    $db = Database::Instance();
    $username = preg_replace('/[^A-Za-z0-9]/', '', $_POST["username"]);
    $password = $_POST["password"];
    if ($username == "" || $password == "") {
        $_SESSION["messages"] = "login fail";
        header("location:https://www.consultancynepal.com/cnbackend/");
    }
    $admindata = $db->CustomQuery(
        "SELECT username,password,user_type,consultancy_id FROM admins WHERE username='$username'"
    );
    if (empty($admindata)) {
        $_SESSION["messages"] = "login fail";
        header("location:https://www.consultancynepal.com/cnbackend/");
    } else {
        foreach ($admindata as $data) {
            $uname = $data->username;
            $dbpassword = $data->password;
            $usertype = $data->user_type;
            $consultancy_id = $data->consultancy_id;
            $result = password_verify($password, $dbpassword);
            if ($result == "1") {
                if ($usertype == "admin") {
                    $_SESSION["username"] = $username;
                    $_SESSION["usertype"] = $usertype;
                    $_SESSION["is_login"] = true;
                    $_SESSION[
                        "message"
                    ] = "login successfull!! welcome {$username}";
                    header(
                        "location:https://www.consultancynepal.com/cnbackend/dashboard"
                    );
                }
                else{
                 $_SESSION["messages"] = "login fail";
                header("location:https://www.consultancynepal.com/cnbackend/");
                    
                }
            } else {
                $_SESSION["messages"] = "login fail";
                header("location:https://www.consultancynepal.com/cnbackend/");
            }
        }
    }
}
