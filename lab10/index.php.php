<?php require 'header.php'; ?>

<h2>Добро пожаловать на главную страницу!</h2>

<p>Это пример многостраничного сайта на PHP с передачей данных через формы.</p>

<h3>Поиск по сайту</h3>

<form method="GET" action="index.php" class="search-form">
    <div class="form-group">
        <label for="search">Введите поисковый запрос:</label>
        <input type="text" 
               id="search" 
               name="q" 
               placeholder="Например: PHP, HTML, CSS..."
               value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>">
    </div>
    <button type="submit">Найти</button>
</form>

<?php
// Обработка поискового запроса
if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $search_query = htmlspecialchars(trim($_GET['q']));
    echo '<div class="search-results">';
    echo '<h3>Результаты поиска для: "' . $search_query . '"</h3>';
    
    // Пример данных для поиска
    $pages = [
        ['title' => 'Главная страница', 'url' => 'index.php', 'description' => 'Главная страница сайта'],
        ['title' => 'Обратная связь', 'url' => 'contact.php', 'description' => 'Страница с формой обратной связи'],
        ['title' => 'Результат', 'url' => 'result.php', 'description' => 'Страница отображения результатов']
    ];
    
    $found = false;
    foreach ($pages as $page) {
        if (stripos($page['title'], $search_query) !== false || 
            stripos($page['description'], $search_query) !== false) {
            echo '<div class="search-item">';
            echo '<h4><a href="' . $page['url'] . '">' . $page['title'] . '</a></h4>';
            echo '<p>' . $page['description'] . '</p>';
            echo '</div>';
            $found = true;
        }
    }
    
    if (!$found) {
        echo '<p>По вашему запросу ничего не найдено.</p>';
    }
    echo '</div>';
}
?>

<h3>О проекте</h3>
<p>Этот сайт демонстрирует:</p>
<ul>
    <li>Подключение общих частей страниц (header и footer)</li>
    <li>Работу с формами и методами GET и POST</li>
    <li>Передачу данных между страницами</li>
    <li>Обработку данных на сервере</li>
</ul>

<?php require 'footer.php'; ?>