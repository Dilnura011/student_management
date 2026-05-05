<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Yangi Order</title>
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
            border-color: #4CAF50;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Yangi Order</h2>
    <form action="store.php" method="POST">
        <label for="student_id">Student ID</label>
        <input type="number" id="student_id" name="student_id" placeholder="ID kiriting" required>

        <label for="note">Izoh (Note)</label>
        <textarea id="note" name="note" rows="4" placeholder="Izoh yozing..."></textarea>

        <button type="submit">Qo‘shish</button>
    </form>
</div>

</body>
</html>