<?php
chdir('../');
require_once '../DAO/DB_Functions.php';
$db = new DB_Functions();
 
$response = array("error" => FALSE);
 
if (isset($_POST['username']) && isset($_POST['password'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $user = $db->getUserByUsernameAndPassword($username, $password);
 
    if ($user != false) {
        $response["user"]["id"] = $user["id"];
        $response["user"]["nama"] = $user["nama"];
        $response["user"]["username"] = $user["username"];
        echo json_encode($response);
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "Login gagal. Password/username salah";
        echo json_encode($response);
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Parameter (username atau password) ada yang kurang";
    echo json_encode($response);
}
?>