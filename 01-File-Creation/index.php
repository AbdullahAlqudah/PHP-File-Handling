<?php
$file = fopen(__DIR__ . '/welcome.txt', 'w') or die('Cannot open file');
fwrite($file, 'Welcome to PHP File Handling!');
fclose($file);
echo 'File created successfully';
