<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <title>Add Book Form</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #eef2f7, #dbe9ff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .form-container {
            width: 420px;
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #111827;
        }

        input,textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            outline: none;
            transition: 0.2s;
            font-size: 14px;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        input:focus,
        textarea:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 12px;
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }
    </style>

</head>

<body>

    <div class="form-container">
    <form action="store.php" method="POST">
        <h2>📚 Yangi Kitob Qo‘shish</h2>

        <input type="text" name="book_name" placeholder="Book Name">
        <input type="text" name="author" placeholder="Author">
        <input type="number" name="number" placeholder="Number">
        <textarea id="about" name="about" placeholder="About"></textarea>
        <input type="number" name="count" placeholder="Count">
        <input type="text" name="publisher" placeholder="Publisher">
        <input type="date" name="date_of_publication" placeholder="Date">

        <button>Save Book</button>
    </form>
    </div>

</body>

</html>