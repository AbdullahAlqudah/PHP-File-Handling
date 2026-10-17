<?php
$folder = realpath(__DIR__ . '/downloads');
$name = $_GET['file'] ?? '';
if ($folder === false || !is_string($name) || $name === '' || basename($name) !== $name || !preg_match('/^[a-zA-Z0-9_-]+\.pdf$/', $name)) {
    http_response_code(400);
    die('Invalid filename');
}
$path = realpath($folder . DIRECTORY_SEPARATOR . $name);
if ($path === false || dirname($path) !== $folder || !is_file($path)) {
    http_response_code(404);
    die('Report not found');
}
if (unlink($path)) {
    echo 'Report deleted';
} else {
    http_response_code(500);
    echo 'Could not delete report';
}
