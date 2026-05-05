<?php
include '../config/db.php';
$sql = 'SELECT * FROM teachers';
$data = $conn->prepare($sql);
$data->execute();
$teachers = $data->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="uz">
<head>
<meta charset="UTF-8">
<title>Yangi sinf qo'shish</title>

<style>
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    margin: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* FORM CARD */
.form-container {
    background: white;
    padding: 30px;
    width: 350px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    text-align: center;
}

.form-container h2 {
    margin-bottom: 20px;
}

/* INPUT */
.input-group {
    text-align: left;
    margin-bottom: 15px;
}

.input-group label {
    font-size: 14px;
    margin-bottom: 5px;
    display: block;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
    outline: none;
    transition: 0.3s;
}

.input-group input:focus {
    border-color: #4facfe;
}

/* BUTTON */
button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background: #4facfe;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #00c6ff;
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
    <h2>Yangi sinf qo‘shish</h2>

    <form action="store.php" method="POST">
        <div class="input-group">
            <label>Class Name</label>
            <input type="text" placeholder="Masalan: Math 101" name='class_name'>
        </div>

        <div class="input-group">
            <label>Teacher ID</label>
            
            
            <select name="teacher_id" id="">
                <?php foreach($teachers as $item): ?>
                <option value="<?= $item['id'] ?>"><?= $item['first_name'] ." ". $item['last_name'] ?></option>
                <?php endforeach ?>
            </select>
            
        </div>

        <button type="submit">Saqlash</button>
    </form>
</div>

</body>
</html>