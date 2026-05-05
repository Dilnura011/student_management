<?php
include '../config/db.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$age = $_POST['age'];
$class_id = $_POST['class_id'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql = "INSERT INTO  students (first_name, last_name, age, class_id, phone, address)
    values    (:first_name, :last_name, :age, :class_id, :phone, :address)";

$data = $conn->prepare($sql);

$data->execute([
    ':first_name' => $first_name,
    ':last_name' => $last_name,
    ':age' => $age,
    ':class_id' => $class_id,
    ':phone' => $phone,
    ':address' => $address,
]);

header("Location: index.php");