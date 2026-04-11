<?php
include "../config/db.php";

$id = $_GET['id'];

$sql = "SELECT * FROM students WHERE id = :id";
$data = $conn->prepare($sql);
$data->execute([':id'=>$id]);
$student = $data->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Student Form</title>
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
    <h2>Studentni tahrirlash</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $student['id'] ?>">
        <div class="form-group">
            <label for="first_name">Ism</label>
            <input type="text" id="first_name" name="first_name" required value="<?= $student['first_name'] ?>">
        </div>

        <div class="form-group">
            <label for="last_name">Familiya</label>
            <input type="text" id="last_name" name="last_name" required value="<?= $student['last_name'] ?>">
        </div>

        <div class="form-group">
            <label for="age">Yosh</label>
            <input type="number" id="age" name="age" required value="<?= $student['age'] ?>">
        </div>

        <div class="form-group">
            <label for="class_name">Sinf</label>
            <input type="text" id="class_name" name="class_name" required value="<?= $student['class_name'] ?>">
        </div>

        <div class="form-group">
            <label for="phone">Telefon</label>
            <input type="text" id="phone" name="phone" placeholder="+998..." required value="<?= $student['phone'] ?>">
        </div>

        <div class="form-group">
            <label for="address">Manzil</label>
            <textarea id="address" name="address"><?= $student['address'] ?></textarea>
        </div>

        <button type="submit">Saqlash</button>
    </form>
</div>

</body>
</html>