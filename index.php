<?php include 'config/db.php' ?>
<!DOCTYPE html>
<html lang="uz">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #1d2671, #c33764);
      color: #fff;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 40px;
      background: rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(10px);
    }

    .logo {
      font-size: 22px;
      font-weight: 600;
    }

    .menu a {
      margin-left: 20px;
      text-decoration: none;
      color: white;
      font-weight: 400;
      transition: 0.3s;
    }

    .menu a:hover {
      color: #ffd369;
    }

    .hero {
      text-align: center;
      padding: 60px 20px 30px;
    }

    .hero h1 {
      font-size: 40px;
      margin-bottom: 10px;
    }

    .hero p {
      opacity: 0.8;
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
      padding: 40px;
    }

    .card {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      padding: 30px;
      text-align: center;
      backdrop-filter: blur(15px);
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
      transition: 0.4s;
      cursor: pointer;
    }

    .card:hover {
      transform: translateY(-10px) scale(1.03);
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.5);
    }

    .card h2 {
      margin-bottom: 10px;
    }

    .card p {
      font-size: 14px;
      opacity: 0.8;
    }

    .footer {
      text-align: center;
      padding: 20px;
      opacity: 0.7;
    }

    a {
      text-decoration: none;
      color: white;
    }
  </style>
</head>

<body>

  <div class="navbar">
    <div class="logo">EduPanel</div>
    <div class="menu">
      <a href="teachers/">Teachers</a>
      <a href="students/">Students</a>
      <a href="#">Courses</a>
      <a href="#">Contact</a>
    </div>
  </div>

  <div class="hero">
    <h1>Welcome to Education Dashboard</h1>
    <p>Tizim bo‘limini tanlang</p>
  </div>

  <div class="cards">
    <a href="teachers/index.php">
      <div class="card">
        <h2>👨‍🏫 Teachers</h2>
        <p>O‘qituvchilar ro‘yxati va boshqaruvi</p>
      </div>
    </a>
    <a href="students/index.php">
      <div class="card">
        <h2>🎓 Students</h2>
        <p>Talabalar ma'lumotlari va boshqaruvi</p>
      </div>
    </a>
    <a href="classes/index.php">
      <div class="card">
        <h2>📚 Classes</h2>
        <p>Sinflar ma'lumotlari</p>
      </div>
    </a>

    <a href="library/index.php">
      <div class="card">
        <h2>📊 Library</h2>
        <p>Kitoblar</p>
      </div>
    </a>
  </div>

  <div class="footer">
    © 2026 EduPanel System
  </div>

</body>

</html>