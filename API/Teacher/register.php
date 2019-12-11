<?php
chdir('../');
require_once '../DAO/DB_Functions.php';
$db = new DB_Functions();
 
$response = array("error" => FALSE);
 
if (isset($_POST['nama']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {
 
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
 
    if ($db->isUserExisted($username)) {
        $response["error"] = TRUE;
        $response["error_msg"] = "User telah ada dengan username " . $username;
        echo json_encode($response);
    } else {
        $user = $db->simpanUser($username, $password, $nama, $role);
        if ($user) {
            $response["error"] = FALSE;
            $response["user"]["nama"] = $user["nama"];
            $response["user"]["username"] = $user["username"];
            $response["user"]["role"] = $user["role"];
            echo json_encode($response);
        } else {
            // gagal menyimpan user
            $response["error"] = TRUE;
            $response["error_msg"] = "Terjadi kesalahan saat melakukan registrasi";
            echo json_encode($response);
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Parameter (nama, username, password, role) ada yang kurang";
    echo json_encode($response);
}
?>