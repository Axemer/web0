<!DOCTYPE html>
<html>
<head>
    <title>Личный кабинет</title>
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    session_destroy();
    setcookie('user_id', '', time() - 3600, '/');
    setcookie('username', '', time() - 3600, '/');
    header('Location: index.php');
    exit();
}
?>
<body>
 <?php
    session_start();

    if (isset($_SESSION['user_id'])) {
        echo "Аккаунт<br>"; 
        echo "Логин: " . $_SESSION['username'] . "<br>";
        echo '<input type="submit" method="post" value="Выход">';
        echo '<a href="index.php">На главную</a>';
    } else {
        header("Location: log.php");
    }
    ?>

</body>
</html>
