<?php
include "../config/db.php";

$id = $_GET['id'];

$sql = "SELECT * FROM library WHERE id = :id";
$data = $conn->prepare($sql);
$data->execute([':id'=>$id]);
$student = $data->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Teacher Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 350px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        textarea {
            resize: none;
            height: 60px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Kitobni tahrirlash</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $student['id'] ?>">
        <div class="form-group">
            <label for="book_name">Book name</label>
            <input type="text" id="book_name" name="book_name" required value="<?= $student['book_name'] ?>">
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" id="author" name="author" required value="<?= $student['author'] ?>">
        </div>

        <div class="form-group">
            <label for="number">Number</label>
            <input type="number" id="number" name="number" required value="<?= $student['number'] ?>">
        </div>

        <div class="form-group">
            <label for="count">Count</label>
            <input type="number" id="count" name="count" required value="<?= $student['count'] ?>">
        </div>

        <div class="form-group">
            <label for="about">About</label>
            <textarea id="about" name="about"><?= $student['about'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" id="publisher" name="publisher" required value="<?= $student['publisher'] ?>">
        </div>

        <div class="form-group">
            <label for="date_of_publication">Date</label>
            <input type="date" id="date_of_publication" name="date_of_publication" required value="<?= $student['date_of_publication'] ?>" >
        </div>

        <button type="submit">Saqlash</button>
    </form>
</div>

</body>
</html>