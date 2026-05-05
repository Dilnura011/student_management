<?php
include '../config/db.php';

$book_id = $_POST['book_id'];
$order_id = $_POST['order_id'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];


$sql = "INSERT INTO  order_item (book_id, order_id, from_date, to_date)
    values    (:book_id, :order_id, :from_date, :to_date)";

$data = $conn->prepare($sql);

$data->execute([
    ':book_id' => $book_id,
    ':order_id' => $order_id,
    ':from_date' => $from_date,
    ':to_date' => $to_date,
]);

header("Location: index.php");