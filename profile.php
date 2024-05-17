<!DOCTYPE html>
<html>
<head>
    <title>Личный кабинет</title>
    
    <style>
    .tab-content {
      display: none;
    }
    </style>

    <script>
    function openTab(evt, tabName) {
      var i, tabContent, tabLinks;
      tabContent = document.getElementsByClassName("tab-content");
      for (i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
      }
      tabLinks = document.getElementsByClassName("tab-link");
      for (i = 0; i < tabLinks.length; i++) {
        tabLinks[i].className = tabLinks[i].className.replace(" active", "");
      }
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>
</head>

<body>
<a href="index.php">Вернуться на главную</a>
    <h1>Личный кабинет</h1>

<div class="tab">
  <button class="tab-link active" onclick="openTab(event, 'tab1')">Личный кабинет</button>
  <button class="tab-link" onclick="openTab(event, 'tab2')">История заказов</button>
</div>

<div id="tab1" class="tab-content" style="display: block;">
  <?php
$userDataFile = 'users.txt';

if (file_exists($userDataFile)) {
    $userData = json_decode(file_get_contents($userDataFile), true);

    if ($userData !== null) {

        echo "<h2>Личные данные</h2>";
        echo "Фамилия: " . $userData['last_name'] . "<br>";
        echo "Имя: " . $userData['first_name'] . "<br>";
        echo "Отчество: " . $userData['middle_name'] . "<br>";
        echo "Почта: " . $userData['email'] . "<br>";
        echo "Дата рождения: " . $userData['birthdate'] . "<br>";
        echo "<img src='" . $userData['avatar_path'] . "' alt='Аватар пользователя'>";
    } else {
        echo "Данные о пользователе в файле не найдены или файл пуст.";
    }
} else {
    echo "Файл с данными о пользователе не найден.";
}
?>
</div>

<div id="tab2" class="tab-content">
  <h2>Нет заказов</h2>
</div>

</body>


</html>
