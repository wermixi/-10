<?php require 'header.php'; ?>

<h2>Результат отправки формы</h2>

<?php
// Проверяем, были ли отправлены данные методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    // Получаем и экранируем данные для безопасного вывода
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    // Валидация данных
    $errors = [];
    
    if (empty($name)) {
        $errors[] = 'Имя не может быть пустым';
    }
    
    if (empty($email) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Введите корректный email адрес';
    }
    
    if (empty($message)) {
        $errors[] = 'Сообщение не может быть пустым';
    }
    
    if (empty($errors)) {
        echo '<div class="success-message">';
        echo '<h3>✅ Форма успешно отправлена!</h3>';
        echo '<p>Спасибо за обращение. Ваши данные:</p>';
        echo '</div>';
        
        echo '<div class="result-card">';
        echo '<div class="result-item">';
        echo '<span class="result-label">Имя:</span>';
        echo '<span class="result-value">' . $name . '</span>';
        echo '</div>';
        
        echo '<div class="result-item">';
        echo '<span class="result-label">Email:</span>';
        echo '<span class="result-value">' . $email . '</span>';
        echo '</div>';
        
        echo '<div class="result-item">';
        echo '<span class="result-label">Сообщение:</span>';
        echo '<div class="result-value" style="white-space: pre-wrap;">' . $message . '</div>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="error-message">';
        echo '<h3>❌ Ошибка отправки формы</h3>';
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
        echo '<p><a href="contact.php" class="btn">Вернуться к форме</a></p>';
        echo '</div>';
    }
} else {
    echo '<div class="error-message">';
    echo '<h3>❌ Нет данных для отображения</h3>';
    echo '<p>Вы попали на эту страницу без отправки формы.</p>';
    echo '<p><a href="contact.php" class="btn">Перейти к форме обратной связи</a></p>';
    echo '</div>';
}
?>

<h3>Дополнительная информация:</h3>
<ul>
    <li><strong>Метод отправки:</strong> <?php echo $_SERVER['REQUEST_METHOD']; ?></li>
    <li><strong>Время запроса:</strong> <?php echo date('Y-m-d H:i:s'); ?></li>
    <li><strong>IP адрес:</strong> <?php echo $_SERVER['REMOTE_ADDR']; ?></li>
</ul>

<?php require 'footer.php'; ?>