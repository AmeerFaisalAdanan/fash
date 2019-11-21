<?php


//example with INSERT statement



$username = $_GET["username"];
$email = $_GET["email"];
$password = $_GET["password"];


$datas = $database->insert("user",
    [
        "userid" => "",
        "username" => $username,
        "email" => $email,
        "password" => $password
    ]
);



$jsonResult = $datas;


//REST url
//http://localhost/MedooAPI/index.php?interface=adduser&username=&email=&password=

// REST url with data
//http://localhost/MedooAPI/index.php?interface=adduser&username=john%20doe&email=johndoe@email.com&password=123
