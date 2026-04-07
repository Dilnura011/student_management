<?php 
include '../config/db.php';
//query - so'rov
$sql = "SELECT * FROM students";

//tayyorlash
$data = $conn->prepare($sql);

//ishga tushirish
$data->execute();

//ma'lumotni olish
$students = $data->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="uz">
<head>
  <meta charset="UTF-8">
  <title>Studentlar ro‘yxati</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      margin: 30px;
    }

    .container {
      max-width: 1100px;
      margin: auto;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .header h2 {
      margin: 0;
    }

    .add-btn {
      background: #28a745;
      color: #fff;
      border: none;
      padding: 10px 15px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 14px;
    }

    .add-btn:hover {
      background: #218838;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead {
      background: #f1f1f1;
    }

    th, td {
      padding: 10px;
      text-align: center;
      border-bottom: 1px solid #ddd;
      font-size: 14px;
    }

    tr:hover {
      background: #f9f9f9;
    }

    .actions button {
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
    }

    .edit {
      background: #ffc107;
      color: #000;
    }

    .delete {
      background: #dc3545;
    }

    .actions button:hover {
      opacity: 0.85;
    }

    /* Responsive */
    @media (max-width: 768px) {
      table {
        font-size: 12px;
      }

      th, td {
        padding: 6px;
      }

      .add-btn {
        padding: 8px 10px;
        font-size: 12px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="header">
    <h2>Studentlar ro‘yxati</h2>
    <a class="add-btn" href="create.php">+ Student qo‘shish</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Class Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Amallar</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($students as $item):?>
        <tr>
        <td><?= $item['id']; ?></td>
        <td><?= $item['first_name']; ?></td>
        <td><?= $item['last_name']; ?></td>
        <td><?= $item['age']; ?></td>
        <td><?= $item['class_name']; ?></td>
        <td><?= $item['phone']; ?></td>
        <td><?= $item['address']; ?></td>
        <td class="actions">
          <a href="#" class="view">Ko‘rish</a>
          <a href="#" class="edit">Tahrirlash</a>
          <a href="delete.php?id=<?=$item['id']; ?>" class="delete" onclick="return confirm('O\'chirasizmi?')">O‘chirish</a>
        </td>
      </tr>
        
      <?php endforeach ?>
    </tbody>
  </table>
</div>

</body>
</html>