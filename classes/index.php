<?php
include '../config/db.php';
//query - so'rov
$sql = "SELECT c.id, c.class_name, t.last_name, t.first_name FROM classes c JOIN teachers t ON c.teacher_id=t.id ORDER BY id ASC";

//tayyorlash
$data = $conn->prepare($sql);

//ishga tushirish
$data->execute();

//ma'lumotni olish
$students = $data->fetchAll(PDO::FETCH_ASSOC);

$cnt = 1;
?>

<!DOCTYPE html>
<html lang="uz">
<head>
<meta charset="UTF-8">
<title>Classes</title>

<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    margin: 0;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 40px;
    background: white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.header h2 {
    margin: 0;
}

.add-btn {
    background: #4CAF50;
    color: white;
    padding: 10px 18px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    transition: 0.3s;
}

.add-btn:hover {
    background: #45a049;
}

.container {
    padding: 30px;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

th, td {
    padding: 14px;
    text-align: center;
}

th {
    background: #2c3e50;
    color: white;
}

tr:nth-child(even) {
    background: #f2f2f2;
}

tr:hover {
    background: #e6f7ff;
}

.form-box {
    margin-top: 30px;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    display: none;
}

.form-box input {
    width: 30%;
    padding: 10px;
    margin: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

.form-box button {
    padding: 10px 20px;
    background: #3498db;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

#toggle:checked ~ .container .form-box {
    display: block;
}

a{
      margin: 2px;
      padding: 5px 8px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      color: #fff;
      font-size: 12px;
    }

    .view {
      background: #007bff;
      text-decoration: none;
    }

    .edit {
      background: #ffc107;
      color: #000;
      text-decoration: none;
    }

    .delete {
      background: #dc3545;
      text-decoration: none;
    }

    .actions button:hover {
      opacity: 0.85;
    }
</style>
</head>

<body>

<div class="header">
    <h2>Classes</h2>

    <!-- hidden checkbox -->
    <input type="checkbox" id="toggle" hidden>

    <!-- button -->
    <a href="create.php" for="toggle" class="add-btn">+ Yangi sinf qo'shish</a>
</div>

<div class="container">

    <!-- TABLE -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Class Name</th>
                <th>Teacher ID</th>
                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($students as $item):?>
            <tr>
                <td><?=  $item['id'] ?></td>
                <td><?=  $item['class_name'] ?></td>
                <td><?=  $item['first_name'] .' '. $item['last_name'] ?></td>
                <td class="actions">
          <a href="show.php?id=<?=$item['id'];?>" class="view">Ko‘rish</a>
          <a href="edit.php?id=<?=$item['id'];?>" class="edit">Tahrirlash</a>
          <a href="delete.php?id=<?=$item['id']; ?>" class="delete" onclick="return confirm('O\'chirasizmi?')">O‘chirish</a>
        </td>

            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    <!-- FORM -->
    <div class="form-box">
        <button>+ Yangi sinf qo‘shish</button>
    </div>
        
</div>

</body>
</html>