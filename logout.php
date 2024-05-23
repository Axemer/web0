<?php
session_start();
session_destroy();

setcookie('user_id', '', time() - 3600, '/');
setcookie('username', '', time() - 3600, '/');

header('Location: reg_and_log_page.php');
exit();
?>