<?php
$folder = __DIR__ . '/archives';
if (!is_dir($folder)) {
    mkdir($folder, 0755, true);
}
$files = glob(__DIR__ . '/*.log');
foreach ($files as $file) {
    if (is_file($file) && copy($file, $folder . '/' . basename($file))) {
        echo htmlspecialchars(basename($file)) . ' copied<br>';
    }
}
