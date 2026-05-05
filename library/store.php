<?php
include '../config/db.php';

$book_name = $_POST['book_name'];
$author = $_POST['author'];
$number = $_POST['number'];
$count = $_POST['count'];
$about = $_POST['about'];
$publisher = $_POST['publisher'];
$date_of_publication = $_POST['date_of_publication'];


$sql = "INSERT INTO  library (book_name, author, number, count, about, publisher, date_of_publication)
    values    (:book_name, :author, :number, :count, :about, :publisher, :date_of_publication)";

$data = $conn->prepare($sql);

$data->execute([
    ':book_name' => $book_name,
    ':author' => $author,
    ':number' => $number,
    ':count' => $count,
    ':about' => $about,
    ':publisher' => $publisher,
    ':date_of_publication' => $date_of_publication,
]);

header("Location: index.php");