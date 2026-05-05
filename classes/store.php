<?php
include '../config/db.php';

$class_name = $_POST['class_name'];
$teacher_id = $_POST['teacher_id'];

$sql = "INSERT INTO  classes (class_name, teacher_id)
    values    (?,?)";

$data = $conn->prepare($sql);

$data->execute([
    $class_name, 
    $teacher_id,
]);

header("Location: index.php");