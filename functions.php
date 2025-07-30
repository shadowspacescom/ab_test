<?php
function ab_test_content() {
  $versions = array('A', 'B'); // Варианты контента (A и B)
  $cookie_name = 'ab_test_version';

  // Если cookie установлена, используем ее
  if (isset($_COOKIE[$cookie_name])) {
    $version = $_COOKIE[$cookie_name];
  } else {
    // Иначе, выбираем случайную версию
    $version = $versions[array_rand($versions)];
    // Устанавливаем cookie на 1 час
    setcookie($cookie_name, $version, time() + 3600, "/");
  }

  // Отображаем соответствующий контент
  if ($version === 'A') {
    echo '<div class="ab-test-content-a"><h2>Title A</h2><a>button A</a></div>';
  } else {
    echo '<div class="ab-test-content-b"><h2>Title B</h2><a>button B</a></div>';
  }
}

add_shortcode('ab_test', 'ab_test_content');
?>
