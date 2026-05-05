<?php
include "../config/db.php";
$id = $_POST['id'];
$book_name = $_POST['book_name'];
$author = $_POST['author'];
$number = $_POST['number'];
$about = $_POST['about'];
$count = $_POST['count'];
$publisher = $_POST['publisher'];
$date_of_publication = $_POST['date_of_publication'];

$sql = "UPDATE library 
        SET book_name = ?,
            author = ?,
            number = ?,
            about = ?,
            count = ?,
            publisher = ?,
            date_of_publication = ?
        WHERE id = ?";

$data = $conn->prepare($sql);

$data->execute([
    $book_name,
    $author,
    $number,
    $about,
    $count,
    $publisher,
    $date_of_publication,
    $id
]);

header("Location: index.php");
exit();
?>