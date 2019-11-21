<?php


//example with SELECT statement with left JOIN statement



$username = $_GET["username"];

$datas = $database->select("user",                          // select from table user
    [
        "[>]userprofile" => ["username" => "fullname"]      //left join with userprofile where username = fullname
    ],
    [
        "user.userid",
        "userprofile.fullname",
        "user.email",
        "userprofile.address",
        "userprofile.nationality",
        "userprofile.phone_no"
    ],
    [
        "user.username" => $username                        //where username = input from user
    ]
);


$jsonResult = $datas;


//REST url
//http://localhost/MedooAPI/index.php?interface=viewuserdetails&username=

// REST url with data
//http://localhost/MedooAPI/index.php?interface=viewuserdetails&username=john%20doe
