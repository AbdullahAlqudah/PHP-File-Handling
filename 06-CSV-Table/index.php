<?php
$file = fopen(__DIR__ . '/employees.csv', 'r') or die('CSV file not found');
echo '<table border="1" cellpadding="6" cellspacing="0">';
$first = true;
while (($row = fgetcsv($file)) !== false) {
    echo '<tr>';
    foreach ($row as $cell) {
        $tag = $first ? 'th' : 'td';
        echo '<' . $tag . '>' . htmlspecialchars($cell) . '</' . $tag . '>';
    }
    echo '</tr>';
    $first = false;
}
echo '</table>';
fclose($file);
