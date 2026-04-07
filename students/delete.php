<?php 
include "../config/db.php";

// id ni olish
$id = $_GET['id'];

// delete query
$sql = "DELETE FROM students WHERE id = :id";


// tayyorlash
$data = $conn->prepare($sql);

// bajarish
$data->execute([':id'=>$id]);

// qaytish
header("Location: index.php");
exit;
?>