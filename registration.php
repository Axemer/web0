<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<head>
    <title>Регистрация</title>
</head>
<body>
<a href="index.php">Вернуться на главную</a>
    <h1>Регистрация</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Логин:</label><br>
        <input type="text" name="login" required><br><br>

        <label>Пароль:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Зарегистрироваться">
    </form>
</body>

<?php
header("Content-Type: text/html; charset=UTF-8");
mb_internal_encoding("UTF-8");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $login = $_POST['login'];
    $password = $_POST['password'];

    $db_host = '127.0.0.1:3306';
    $db_user = 'root';
    $db_password = '';
    $db_name = 'Shop_DB';

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $login = $conn->real_escape_string($login);
    $loginCheck = "SELECT id FROM Account WHERE Nickname = '$login'";
    $check_result = $conn->query($loginCheck);

    if ($check_result->num_rows > 0) {
        echo 'Пользователь с таким логином уже зарегистрирован.';
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $insert_query = 
        "INSERT INTO Account (Nickname, Password) VALUES ('$login', '$password')";
        $insert_result = $conn->query($insert_query);

        if ($insert_result)
        {
            echo 'Регистрация успешна. 
                  Теперь можно войти
                  <br>
                  <a href="log.php">войти</a>.';
        } 
        else 
        {
            echo 'Ошибка регистрации. Попробуйте еще раз.';
        }
    }
    $conn->close();
}
?>
</html>
