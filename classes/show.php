<?php
include '../config/db.php';

$id = $_GET["id"];

$sql = "SELECT c.id, c.class_name, t.first_name, t.last_name FROM classes c JOIN teachers t ON c.teacher_id = t.id WHERE c.id = ?";

$data = $conn->prepare($sql);
$data->execute([$id]);
$student = $data->fetch();

$query = "SELECT * FROM students WHERE class_id = ?";
$smtm = $conn->prepare($query);
$smtm->execute([$id]);

$class = $smtm->fetchAll();
?>

<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <title>Class Ma'lumotlari</title>
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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }

        th {
            background: #4a90e2;
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            text-align: center;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:hover {
            background: #f1f7ff;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Class ma'lumotlari</h2>

        <div class="info">
            <div class="label">Class name</div>
            <?= $student['class_name']; ?>

            <div class="label">Teacher name</div>
            <?= $student['first_name'] . ' ' . $student['last_name']; ?>
        </div>

        <div>
            <h3>Sinf o'quvchilari</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($class) > 0): ?>
                        <?php foreach ($class as $item): ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['first_name'] ?></td>
                                <td><?= $item['last_name'] ?></td>
                                <td><?= $item['age'] ?></td>
                                <td><?= $item['phone'] ?></td>
                                <td><?= $item['address'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">O‘quvchilar topilmadi</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>

         <div class="actions">
            <a href="index.php" class="btn btn-back">Orqaga</a>
        </div>
    </div>
</body>

</html>