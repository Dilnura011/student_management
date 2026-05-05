<?php
include '../config/db.php';
//query - so'rov
$sql = "SELECT s.id, s.first_name, s.last_name, s.age, s.phone, s.address, c.class_name FROM students s JOIN classes c ON s.class_id=c.id";

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
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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
      text-decoration: none;
    }

    .add-btn:hover {
      background: #218838;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead {
      background-color: #72c6f7;
    }

    th,
    td {
      padding: 10px;
      text-align: center;
      border-bottom: 1px solid #ddd;
      font-size: 14px;
    }

    a {
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

    @media (max-width: 768px) {
      table {
        font-size: 12px;
      }

      th,
      td {
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
          <th>Class name</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Amallar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($students as $item): ?>
          <tr>
            <td><?= $cnt++; ?></td>
            <td><?= $item['first_name']; ?></td>
            <td><?= $item['last_name']; ?></td>
            <td><?= $item['age']; ?></td>
            <td><?= $item['class_name']; ?></td>
            <td><?= $item['phone']; ?></td>
            <td><?= $item['address']; ?></td>
            <td class="actions">
              <a href="show.php?id=<?= $item['id']; ?>" class="view">Ko‘rish</a>
              <a href="edit.php?id=<?= $item['id']; ?>" class="edit">Tahrirlash</a>
              <a href="delete.php?id=<?= $item['id']; ?>" class="delete" onclick="return confirm('O\'chirasizmi?')">O‘chirish</a>
            </td>
          </tr>

        <?php endforeach ?>
      </tbody>
    </table>
  </div>

</body>

</html>