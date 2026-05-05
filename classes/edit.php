<?php
include "../config/db.php";

$id = $_GET['id'];

$sql = "SELECT c.id, c.class_name, c.teacher_id, t.first_name, t.last_name FROM classes c JOIN teachers t ON c.teacher_id = t.id WHERE c.id = :id";
$data = $conn->prepare($sql);
$data->execute([':id' => $id]);
$student = $data->fetch(PDO::FETCH_ASSOC);
$teachers = $conn->query("SELECT id, first_name, last_name FROM teachers")
                 ->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <title>Class Form</title>
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
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
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

        input,
        textarea {
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

        .select-box {
        position: relative;
        width: 250px;
    }
    
    select {
        width: 100%;
        padding: 12px 40px 12px 15px;
        border-radius: 12px;
        border: none;
        outline: none;
        background: white;
        font-size: 16px;
        appearance: none;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(0,0,0,0.4);
        transition: 0.3s;
    }
    
    select:hover {
        background: #c2d8f6;
    }
    
    select:focus {
        box-shadow: 0 0 0 2px #38bdf8;
    }
    
    /* Custom arrow */
    .select-box::after {
        content: "▼";
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #38bdf8;
        pointer-events: none;
    }
    
    /* option style (cheklangan bo‘ladi browserga bog‘liq) */
    option {
        background: white;
    }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Classni tahrirlash</h2>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?= $student['id'] ?>">
            <div class="form-group">
                <label for="class_name">Class name</label>
                <input type="text" id="class_name" name="class_name" required value="<?= $student['class_name'] ?>">
            </div>

            <div class="form-group">
                <label for="teacher_id">Teacher name</label>
                <select name="teacher_id">
                    <?php foreach ($teachers as $teacher): ?>
                        <option value="<?= $teacher['id'] ?>"
                            <?= $teacher['id'] == $student['teacher_id'] ? 'selected' : '' ?>>

                            <?= $teacher['first_name'] . " " . $teacher['last_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>

            </div>


            <button type="submit">Saqlash</button>
        </form>
    </div>

</body>

</html>