<?php
include '../config/db.php';

$id = $_GET["id"];

$sql = "SELECT * FROM library WHERE id = ?";

$data = $conn->prepare($sql);
$data->execute([$id]);
$student = $data->fetch();
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Kitob Ma'lumotlari</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .info {
            display: grid;
            grid-template-columns: 1fr 2fr;
            row-gap: 12px;
            column-gap: 10px;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .value {
            color: #222;
        }

        .actions {
            margin-top: 25px;
            text-align: center;
        }

        .btn {
            padding: 10px 86px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            margin: 5px;
        }

        .btn-back {
            background: #53aaf7;
            color: white;
            text-decoration: none;
        }

    </style>
</head>
<body>

<div class="container">
    <h2>Kitob ma'lumotlari</h2>

    <div class="info">
        <div class="label">Book Name:</div>
        <?=$student['book_name']; ?>

        <div class="label">Author:</div>
        <?=$student['author']; ?>

        <div class="label">Number:</div>
        <?=$student['number']; ?>

        <div class="label">Count:</div>
        <?=$student['count']; ?>

        <div class="label">About:</div>
        <?=$student['about']; ?>

        <div class="label">Publisher:</div>
        <?=$student['publisher']; ?>

        <div class="label">Date:</div>
        <?=$student['date_of_publication']; ?>
    </div>

    <div class="actions">
        <a href="index.php" class="btn btn-back">Orqaga</a>
    </div>
</div>

</body>
</html>
