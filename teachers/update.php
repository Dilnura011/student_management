<?php
include "../config/db.php";
$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$age = $_POST['age'];
$subject = $_POST['subject'];
$phone = $_POST['phone'];
$exprience = $_POST['exprience'];

$sql = "UPDATE teachers 
        SET first_name = ?,
            last_name = ?,
            age = ?,
            subject = ?,
            phone = ?,
            exprience =  ?
        WHERE id = ?";

$data = $conn->prepare($sql);
$data->execute([
    $first_name,
    $last_name,
    $age,
    $subject,
    $phone,
    $exprience,
    $id
]);

header("Location: index.php");
exit();
?>