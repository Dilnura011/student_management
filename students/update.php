<?php
include "../config/db.php";
$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$age = $_POST['age'];
$class_id = $_POST['class_id'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql = "UPDATE students 
        SET first_name = ?,
            last_name = ?,
            age = ?,
            class_id = ?,
            phone = ?,
            address =  ?
        WHERE id = ?";

$data = $conn->prepare($sql);
$data->execute([
    $first_name,
    $last_name,
    $age,
    $class_id,
    $phone,
    $address,
    $id
]);

header("Location: index.php");
exit();
?>