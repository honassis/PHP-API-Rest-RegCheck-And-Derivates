<?php
/* Documetation used in: http://placaapi.com/data/doc.aspx */
header("Content-type: application/json; charset=utf-8");
include_once "classes/environment.class.php";
include_once "classes/database.class.php";
include_once "classes/vehicle.class.php";
$_GET['Reg'] = "";
echo Main::init($_GET['Reg']);
?> 