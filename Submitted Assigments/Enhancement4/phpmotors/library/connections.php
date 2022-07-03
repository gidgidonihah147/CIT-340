<?php
/*
* Proxy connection to the php motors database
*/
function phpmotorsConnect() {
$server = 'localhost';
$dbname= 'phpmotors';
$username = 'iClient';
$password = '5)8yuU9z7e!]nvR9'; 
$dsn = "mysql:host=$server;dbname=$dbname";

$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $link = new PDO($dsn, $username, $password, $options);
    //if(is_object($link)){
        //echo 'It worked!';
    //}
    return $link;
} catch(PDOException $e) {
    //echo "It didn't work, error:" . $e->getMessage();
    header('Location: /phpmotors/view/500.php');
    exit;
}
}
phpmotorsConnect();
