<?php
include '../config/db.php';

$student_id = $_POST['student_id'];
$note = $_POST['note'];


$sql = "INSERT INTO  orders (student_id, note)
    values    (:student_id, :note)";

$data = $conn->prepare($sql);

$data->execute([
    ':student_id' => $student_id,
    ':note' => $note,
]);

header("Location: index.php");