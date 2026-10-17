<?php
$old = __DIR__ . '/config.txt';
$new = __DIR__ . '/config.bak';
if (!file_exists($old)) {
    die('Error: config.txt does not exist');
}
if (rename($old, $new)) {
    echo 'File renamed successfully';
} else {
    echo 'Could not rename file';
}
