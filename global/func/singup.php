<?php
//SingUp ( register function)
session_start();
include_once '../../php/sql/callClasses.php';
error_reporting();


$text;
$name =  $_POST["username"];
$password = $_POST["password"];
if (!empty($name) && !empty($password)) {
    $sql = new CallMysql_QueryDB();


    if ($sql->SqlQuerybyDb()->UserCheckByName($name)) {
        echo "$name - This name already exist!";
    } else {
    }
    if (isset($_FILES['image'])) {
        $target_dir =  __DIR__ . "/img/profile";
        
        $target_file = $target_dir . "/" . basename($_FILES["image"]["name"]);
        echo $target_file;
        echo "<pre>"; echo "POST:"; print_r($_POST); echo "FILES:"; print_r($_FILES); echo "</pre>";
        if (file_exists($target_file)) {
            echo "file already exists.<br>";



            // Delete the temp file

          

            if (move_uploaded_file(
                $_FILES["image"]["tmp_name"],
                $target_file
            )) {
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);
                $time = time();
                $new_img_name = $time . $img_name;

                $encrypt_pass = md5($password);
                $sql->SqlQuerybyDb()->CreateUserData($name, $encrypt_pass, $new_img_name);
                header("location: ../view/home.php");
            } else {
                echo "Sorry, there was an error uploading your file.<br>";

                unlink($_FILES["upload"]["tmp_name"]);
            }
        }
    }
} else {
    echo "All input fields are required!";
}
