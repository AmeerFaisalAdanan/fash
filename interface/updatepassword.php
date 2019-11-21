<?php


//example with UPDATE statement



$email = $_GET["email"];
$password = $_GET["password"];


$datas = $database->update("user",
    [
        "email" => $email,
        "password" => $password
    ]
);


$jsonResult = $datas;


//REST url
//http://localhost/MedooAPI/index.php?interface=updatepassword&email=&password=

// REST url with data
//http://localhost/MedooAPI/index.php?interface=updatepassword&email=johndoe@email.com&password=456
