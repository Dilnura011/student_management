<?php
include '../config/db.php';
$sql = 'SELECT * FROM library';
$data = $conn->prepare($sql);
$data->execute();
$library = $data->fetchAll(PDO::FETCH_ASSOC);
$cnt = 1;
?>

<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <title>Library Dashboard</title>

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
            padding: 30px;
        }

        .container {
            max-width: 1300px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            color: #1f2937;
        }

        .add-btn {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: 600;
            text-decoration: none;
        }

        .add-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 10px;
        }

        th {
            background: #4f46e5;
            color: white;
            padding: 12px;
            font-size: 14px;
        }

        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #eee;
            font-size: 14px;
            color: #374151;
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        tr:hover {
            background: #f3f4f6;
            transition: 0.2s;
        }

        .view,
        .delete,
        .edit {
            padding: 6px 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 12px;
            margin: 2px;
            transition: 0.3s;
            text-decoration: none;
        }

        .view {
            background: #06b6d4;
            color: white;
        }

        .edit {
            background: #facc15;
            color: black;
        }

        .delete {
            background: #ef4444;
            color: white;
        }

        a:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .id {
            background: #e0e7ff;
            padding: 5px 10px;
            border-radius: 999px;
            font-weight: 600;
            color: #4338ca;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="header">
            <h1>📚 Kutubxona Dashboard</h1>
            <a href="create.php" class="add-btn">+ Add Book</a>
        </div>

        <div class="card">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Number</th>
                    <th>About</th>
                    <th>Publisher</th>
                    <th>Date</th>
                    <th>Count</th>
                    <th>Actions</th>
                </tr>

                <?php foreach ($library as $item): ?>
                    <tr>
                        <td><?= $cnt++; ?></td>
                        <td><?= $item['book_name']; ?></td>
                        <td><?= $item['author']; ?></td>
                        <td><?= $item['number']; ?></td>
                        <td><?= $item['about']; ?></td>
                        <td><?= $item['publisher']; ?></td>
                        <td><?= $item['date_of_publication']; ?></td>
                        <td><?= $item['count']; ?></td>

                        <td class="actions">
                            <a href="show.php?id=<?= $item['id']; ?>" class="view">Ko‘rish</a>
                            <a href="edit.php?id=<?= $item['id']; ?>" class="edit">Tahrirlash</a>
                            <a href="delete.php?id=<?= $item['id']; ?>" class="delete" onclick="return confirm('O\'chirasizmi?')">O‘chirish</a>
                        </td>
                    </tr>

                <?php endforeach ?>

            </table>
        </div>

    </div>

</body>

</html>