<?php
include "../config/db.php";

$id = $_GET['id'];

$sql = "SELECT * FROM order_item WHERE id = :id";
$data = $conn->prepare($sql);
$data->execute([':id'=>$id]);
$order_item = $data->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Order item Tahrirlash</title>
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
    <h2>Order item Tahrirlash</h2>
    <form action="update.php" method="POST">
        <!-- ID yashirin (backend uchun kerak bo‘ladi) -->
        <input type="hidden" name="id" value="1">

        <label for="book_id">Book ID</label>
        <input type="number" id="book_id" name="book_id" required value="<?= $order_item['book_id'] ?>">

        <label for="order_id">Order id</label>
        <input type="number" id="order_id" name="order_id" required value="<?= $order_item['order_id'] ?>">

        <label for="from_date">From date</label>
        <input type="date" id="from_date" name="from_date"  required value="<?= $order_item['from_date'] ?>">

        <label for="to_date">To date</label>
        <input type="date" id="to_date" name="to_date" required value="<?= $order_item['to_date'] ?>">

        <button type="submit">Saqlash</button>
    </form>
</div>

</body>
</html>