<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>O‘qituvchi qo‘shish</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            padding: 20px;
        }

        .form-container {
            width: 400px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            margin-top: 15px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>O‘qituvchi qo‘shish</h2>

    <form action="store.php" method="POST">
        <label>First Name</label>
        <input type="text" name="first_name" placeholder="Ism">

        <label>Last Name</label>
        <input type="text" name="last_name" placeholder="Familiya">

        <label>Age</label>
        <input type="number" name="age" placeholder="Yosh">

        <label>Phone</label>
        <input type="text" name="phone" placeholder="+998...">

        <label>Subject</label>
        <input type="text" name="subject" placeholder="Fan">

        <label>Exprience</label>
        <input type="text" name="exprience" placeholder="Masalan: 5 yil">

        <button type="submit">Saqlash</button>
    </form>
</div>

</body>
</html>