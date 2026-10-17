<?php
$file = fopen(__DIR__ . '/fruits.txt', 'r') or die('File not found');
echo '<ul>';
while (($line = fgets($file)) !== false) {
    echo '<li>' . htmlspecialchars(trim($line)) . '</li>';
}
echo '</ul>';
fclose($file);
