<?php


//example with SELECT statement



$item_id = $_GET["item_id"];

$datas = $database->select("inventory",
    //select column
    [
        "item_id",
        "item_name",
        "item_model",
        "item_line", 
        "price", 
        "image", 
        "outlet_id", 
        "size", 
        "material", 
        "designer" 
    ],
    //where statement
    [
        "item_id" => $item_id
    ]
);


$jsonResult = $datas;


//REST url
//http://localhost/MedooAPI/index.php?interface=viewuser&username=

// REST url with data
//http://localhost/MedooAPI/index.php?interface=viewuser&username=john%20doe
