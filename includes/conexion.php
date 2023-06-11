<?php
$host='localhost';
$user='root';
$db='sistema_uabc';
$pass='';

try {
    $pdo=new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8',$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


} catch (Exception $error) {
    die( 'Error'.$error->getMessage());
}
?>