<?php
require_once ("config/connect.php");
require_once ("lib/supportFunction.php");
require_once ("lib/medoo.min.php");
require_once ("cache/cache.php");

// register interface here
// you can close any api for maintainance by ( $interface["api-name"] = false )
$interface = array();

// Login

//Insert Statement
$interface["updateprofile"]=true;
$interface["adduser"]=true;

//Select Statement
$interface["inventory"]=true;
$interface["viewuserdetails"]=true;


//Update Statement
$interface["updatepassword"]=true;



// Count



////////////////////////////////////
// Do not edit after this line
////////////////////////////////////

$cacheFor = array();

$cacheFor['update_hs'] = 60; // minute
/*
$cacheFor['utm_news_latest'] = 30; // minute
$cacheFor['utm_event'] = 60; // minute
$cacheFor['news'] = 60; // minute
$cacheFor['utmpoi'] = 60; // minute
$cacheFor['faculty_event'] = 300; // minute
*/


// preparing $key for cache

function parse_url_for_key()
	{
	$url = $_SERVER['QUERY_STRING'];
	$exploded_url = explode("&",$url);
	$exclude_signiture = array();
	for ($i = 0;$i < count($exploded_url);$i++)
		{
		if (startsWith($exploded_url[$i],"signature") === true)
			{
			}
		else if (startsWith($exploded_url[$i],"flush") === true)
			{
			}
		else
			{
			array_push($exclude_signiture,$exploded_url[$i]);
			}
		}
	$url = implode("&",$exclude_signiture);
	return $url;
	}


// preparing $key for cache
$key =  parse_url_for_key();
//$cache = new FileCache();

$interface_type = isset($_GET['interface']) ? sanitize($_GET['interface']) : "" ;

if ($interface_type == "")
	{
	echo "Fatal error! Contact system admin for assistances.";
	//echo "unknown";
	exit();
	}

$jsonResult = array();
$sentItRaw = false;

// echo $interface_type;
if(@$interface[$interface_type] === true) // interface is available
	{
		include dirname(__FILE__)."/interface/".$interface_type.".php";
	}
else if(@$interface[$interface_type] === false)
	{
	array_push($jsonResult,array('error'=>'API closed for maintenance'));
	}
else
	{
	array_push($jsonResult,array('error'=>'API not exists!'));
	}

if ($interface_type == "podcast")
	{
	header("HTTP/1.1 401 KO");
	}
else
	{
	header("HTTP/1.1 200 OK");
	}
header('Content-Type: application/json');

$json = jsonp_encode($jsonResult);
echo $json;
