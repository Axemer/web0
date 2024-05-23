<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин</title>
</head>
<body>

    <?php
    header("Content-Type: text/html; charset=UTF-8");
    mb_internal_encoding("UTF-8");
    session_start();

    if (isset($_SESSION['user_id'])) 
    {
        header("Location: profile.php");
    } 
    
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        login: <input type="text" name="login" required><br>
        password: <input type="password" name="password" required><br>
        <input type="submit" value="Enter">
    </form>
    <br><a href="registration.php">registration</a><br>
    <a href="index.php">To index</a>

</body>
</html>

<?php
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

    $query = "SELECT id, Nickname, Password FROM Account WHERE Nickname = '$login'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['Password'])) {

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['Nickname'];

            $conn->close();

            header('Location: profile.php');
            exit();
        } else {
            echo 'login error. bad credentials<br>';
            echo '<a href="registration.php">back</a>';
        }
    } else {
        echo 'login error. Check login.<br>';
        echo '<a href="registration.php">Назад</a>';
    }

    $conn->close();
}
?>