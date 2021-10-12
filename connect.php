<?php
/**
 * Multiple Upload Images PHP By AppzStory
 *
 * @link https://appzstory.dev
 * @author Yothin Sapsamran (Jame AppzStory Studio)
 * สอนการเชื่อมต่อ PHP PDO คลิก https://www.youtube.com/watch?v=SyoQVokfrnU
 */  
$host = "localhost";
$dbname = "multiple_upload";
$username = "root";
$password = "";
try{
    $conn = new PDO("mysql:host={$host}; 
                    dbname={$dbname}; 
                    charset=utf8", 
                    $username, 
                    $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $exception){
    echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้: " . $exception->getMessage();
    exit();
}
