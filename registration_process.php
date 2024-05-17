<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'middle_name' => $_POST['middle_name'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        'birthdate' => $_POST['birthdate']
    ];

    $uploadDirectory = 'users_avatars/';
    $avatar_path = '';

    if ($_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $newFilePath = $uploadDirectory . $_FILES['avatar']['name'];

        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $newFilePath)) {
            $avatar_path = $newFilePath;
        } else {
            die("Ошибка при загрузке файла");
        }
    } else {
        die("Ошибка при загрузке файла");
    }

    $data['avatar_path'] = $avatar_path;

    $userDataJson = json_encode($data);
    file_put_contents('users.txt', $userDataJson);

    echo "Регистрация успешна. <a href='profile.php'>Перейти в личный кабинет</a>";
} else {
    echo "Ошибка";
}
?>