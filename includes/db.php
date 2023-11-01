<?php

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pw'] = '';
$db['db_name'] = 'new';

foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PW,DB_NAME);
if(!$connection){
    die("Database connection failed");
}

?>