<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entry = trim($_POST['entry'] ?? '');
    if ($entry !== '') {
        $entry = str_replace(["\r", "\n"], ' ', $entry);
        $line = date('Y-m-d H:i:s') . ' - ' . $entry . PHP_EOL;
        $saved = file_put_contents(__DIR__ . '/guestbook.txt', $line, FILE_APPEND | LOCK_EX);
        $message = $saved === false ? 'Could not save entry' : 'Entry saved';
    } else {
        $message = 'Please enter a message';
    }
}
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><title>Guestbook</title></head><body>
<h1>Guestbook</h1>
<p><?= htmlspecialchars($message) ?></p>
<form method="post"><textarea name="entry" required></textarea><button type="submit">Submit</button></form>
</body></html>
