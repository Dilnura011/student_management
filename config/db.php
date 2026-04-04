<?php

$host = "localhost";
$dbname = "students_db";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    //xatolikni chiqarish
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOExpection $e) {
    echo "Xatolik: ".$e->getMassage();
}