<?php
include "../config/db.php";

$id = $_GET['id'];

$sql = "SELECT * FROM orders WHERE id = :id";
$data = $conn->prepare($sql);
$data->execute([':id'=>$id]);
$student = $data->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Order Tahrirlash</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            width: 320px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
        }

        input:focus, textarea:focus {
            border-color: #2196F3;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #1976D2;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Order Tahrirlash</h2>
    <form action="update.php" method="POST">
        <!-- ID yashirin (backend uchun kerak bo‘ladi) -->
        <input type="hidden" name="id" value="1">

        <label for="student_id">Student ID</label>
        <input type="number" id="student_id" name="student_id" required value="<?= $student['student_id'] ?>">

        <label for="note">Izoh (Note)</label>
        <textarea id="note" name="note" rows="4"><?= $student['note'] ?></textarea>

        <button type="submit">Saqlash</button>
    </form>
</div>

</body>
</html>