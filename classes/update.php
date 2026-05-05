<?php
include "../config/db.php";
$id = $_POST['id'];
$class_name = $_POST['class_name'];
$teacher_id = $_POST['teacher_id'];

$sql = "UPDATE classes 
        SET class_name = ?,
            teacher_id = ?
        WHERE id = ?";

$data = $conn->prepare($sql);

$data->execute([
    $class_name,
    $teacher_id,
    $id
]);

header("Location: index.php");
exit();
?>