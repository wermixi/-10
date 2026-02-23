<?php require 'header.php'; ?>

<h2>Форма обратной связи</h2>

<p>Заполните форму ниже, чтобы связаться с нами:</p>

<form method="POST" action="result.php">
    <div class="form-group">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required 
               placeholder="Введите ваше имя">
    </div>
    
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required 
               placeholder="example@domain.com">
    </div>
    
    <div class="form-group">
        <label for="message">Сообщение:</label>
        <textarea id="message" name="message" required 
                  placeholder="Введите ваше сообщение"></textarea>
    </div>
    
    <button type="submit">Отправить</button>
</form>

<?php require 'footer.php'; ?>