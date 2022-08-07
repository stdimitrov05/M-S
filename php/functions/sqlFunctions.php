<?php
error_reporting();
session_start();
include '../sql/callClasses.php';
class SqlFunctions
{



    // SingUp function (Register)
    public function SingUp($name, $pass, $img)
    {
        //other
        $sql = new CallMysql_QueryDB();


        // Post -> get data
        $name = $_POST['username'];
        $pass =  $_POST['password'];

        //check data != null
        if (!empty($name) && !empty($pass)) {
            //User  exist
            if ($this->sql = $sql->SqlQuerybyDb()->UserCheckByName($name)) {
                echo "Username exist !";
            }else{

                
                $this->sql=$sql->SqlQuerybyDb()->CreateUserData($name,$pass,$img);
            }
        }
        // data === 0
        else {
            echo "Register not success!";
        }
    }
}
