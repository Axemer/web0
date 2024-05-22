<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
</head>
<body>
<a href="index.php">Вернуться на главную</a>
    <h1>Регистрация</h1>
    <form action="registration_process.php" method="post" enctype="multipart/form-data">
        <label>Фамилия:</label><br>
        <input type="text" name="last_name" required><br><br>

        <label>Имя:</label><br>
        <input type="text" name="first_name" required><br><br>

        <label>Отчество:</label><br>
        <input type="text" name="middle_name" required><br><br>

        <label>Почта:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Пароль:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Повторите пароль:</label><br>
        <input type="password" name="confirm_password" required><br><br>

        <label>Дата рождения:</label><br>
        <input type="date" name="birthdate" required><br><br>
        
        <label>Загрузите аватар:</label><br>
        <input type="file" name="avatar" accept="image/*"><br><br>

        <input type="submit" value="Зарегистрироваться">
    </form>
</body>
</html>
