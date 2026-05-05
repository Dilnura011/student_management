<?php
include "../config/db.php";
$id = $_POST['id'];
$student_id = $_POST['student_id'];
$note = $_POST['note'];

$sql = "UPDATE orders 
        SET student_id = ?,
            note = ?
        WHERE id = ?";

$data = $conn->prepare($sql);

$data->execute([
    $student_id,
    $note,
    $id
]);

header("Location: index.php");
exit();
?>