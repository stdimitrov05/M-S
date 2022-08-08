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
        if (isset($_FILES['image'])) {
            $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];

            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg", "gif"];
            if (in_array($img_ext, $extensions) === true) {
                $types = ["image/jpeg", "image/jpg", "image/png", "image/gif"];
                if (in_array($img_type, $types) === true) {
                    $time = time();
                    $new_img_name = $time . $img_name;
                    if (move_uploaded_file($tmp_name, "img/profile" . $new_img_name)) {

                        $encrypt_pass = md5($password);
                        $sql->SqlQuerybyDb()->CreateUserData($name, $encrypt_pass, $new_img_name);
                        header("location: ../view/home.php");
                    } else {
                        echo "Something went wrong. Please try again!";
                    }
                }
            } else {
                echo "Please upload an image file - jpeg, png, jpg";
            }
        } else {
            echo "Please upload an image file - jpeg, png, jpg";
        }
    }
} else {
    echo "All input fields are required!";
}
