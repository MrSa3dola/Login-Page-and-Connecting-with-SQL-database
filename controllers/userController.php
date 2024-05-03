<?php

require('../models/DB_Ops.php');
require('../models/user.php');
require('Upload.php');

class userController
{
    public function insert($Data)
    {
        $db = new DB_Ops();
        $ret = "";
        if ($db->insertUser($Data) == 'username is already exists')
            $ret = 'Username is already exists';
        else
            $ret = 'Registered sucessfully';
        return $ret;
    }

    public function register()
    {
        // echo "in user controller register" . '<br>';
        print_r($_POST);
        echo '<br>';
        $Data = new User(
            $_POST['full-name'],
            $_POST['username'],
            $_POST['birthdate'],
            $_POST['phone'],
            $_POST['address'],
            $_POST['password'],
            $_POST['email'],
            $_FILES['image']['name']
        );
        $imageFile = new ImageUploader($_FILES['image']['name']);
        $res = $imageFile->uploadImage();
        // $formMsg = $this->insert($Data);
        if ($res == "File uploaded successfully") {
            $formMsg = $this->insert($Data);
            if ($formMsg == 'Username is already exists') {
                echo "<script>alert('Failed to register.');</script>";
                echo "<script>window.location.href = '../Index.php';</script>";
            } else {
                echo "<script>alert('You are registered successfully.');</script>";
                 echo "<script>window.location.href = '../Index.php';</script>";
            }
        } else {

            $formMsg = "Failed to register";
            echo $formMsg;
            echo '<br>';
        }

        // if ($res) {
        //     $upload = new imageUploader($_FILES['image']['name']);
        //     $upload->uploadImage();
        // } else {
        //     echo "<script>
        //     if(confirm('Choose another username, Do you want to redirect back?')) {
        //         window.location.href = 'index.php';
        //     } else {
        //         window.history.back();
        //     }
        //   </script>";
        // }

        $response = array(
            "imgMsg" => $res,
            "formMsg" => $formMsg
        );


        // echo json_encode($response);
    }
}
// echo "in user controller" . '<br>';
$userController = new userController();
$userController->register();
