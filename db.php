<?php 

$host = "mysqlstudenti.litv.sssvt.cz";
$db = "3a1_junekvojtech1a_db1";
$user = "hasekjakub";
$pass = "123456";

$dsn = "mysql:host=$host;dbname=$db";

try {
    
    $pdo = new PDO($dsn, $user, $pass);
    $pdo -> exec("set names utf8mb4");

} catch (\PDOException $e) {
    
    throw new \PDOException($e -> getMessage());

}

?>