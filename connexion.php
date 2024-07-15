<?php
$server = 'localhost';
$user = 'root';
$pass = 'root';
$database = 'exam_bm_2022';

try {
    $con = new PDO("mysql:host=$server;dbname=$database", $user, $pass);
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>