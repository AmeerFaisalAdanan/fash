<?php


//example with INSERT statement



$fullname = $_GET["fullname"];
$phone_no = $_GET["phone_no"];
$address = $_GET["address"];
$nationality = $_GET["nationality"];


$datas = $database->insert("userprofile",
    [
        
        "fullname" => $fullname,
        "phone_no" => $phone_no,
        "address" => $address,
        "nationality" => $nationality
    ]
);



$jsonResult = $datas;


//REST url
//http://localhost/MedooAPI/index.php?interface=updateprofile&fullname=&phone_no=&address=&nationality=

// REST url with data
//http://localhost/MedooAPI/index.php?interface=updateprofile&fullname=john%20doe&phone_no=0109315102&address=no%2045%20jalan%206%20pandamaran%20jaya%2042000%20pelabuhan%20klang%20selangor&nationality=malaysian
