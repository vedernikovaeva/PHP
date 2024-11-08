<?php
require 'functions.php';

$employee = [
    'code' => 1,
    'name' => 'Іван Іваненко',
    'position' => 'Бухгалтер',
    'salary' => 15000,
    'children' => 2,
    'experience' => 5
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedEmployee = [
        'code' => $_POST['code'],
        'name' => $_POST['name'],
        'position' => $_POST['position'],
        'salary' => (int)$_POST['salary'],
        'children' => (int)$_POST['children'],
        'experience' => (int)$_POST['experience']
    ];

    $error = validateEmployeeData($updatedEmployee);
    if ($error) {
        echo $error;
    } else {
        echo "Дані працівника успішно оновлено!";
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Редагувати працівника</title>
</head>
<body>
    <h2>Редагувати працівника</h2>
    <form method="post" action="edit_employee.php">
        <input type="hidden" name="code" value="<?= $employee['code']; ?>">
        <label for="name">ПІБ:</label>
        <input type="text" name="name" value="<?= $employee['name']; ?>" required>
        <br/>
        <label for="position">Посада:</label>
        <input type="text" name="position" value="<?= $employee['position']; ?>" required>
        <br/>
        <label for="salary">Заробітна плата:</label>
        <input type="number" name="salary" value="<?= $employee['salary']; ?>" required>
        <br/>
        <label for="children">Кількість дітей:</label>
        <input type="number" name="children" value="<?= $employee['children']; ?>">
        <br/>
        <label for="experience">Стаж:</label>
        <input type="number" name="experience" value="<?= $employee['experience']; ?>">
        <br/>
        <button type="submit">Оновити</button>
    </form>
</body>
</html>