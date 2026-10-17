<?php
$file = fopen(__DIR__ . '/counter.txt', 'c+') or die('Cannot open counter');
if (!flock($file, LOCK_EX)) {
    fclose($file);
    die('Cannot lock counter');
}
rewind($file);
$count = (int) trim(stream_get_contents($file));
$count++;
rewind($file);
ftruncate($file, 0);
fwrite($file, (string) $count);
fflush($file);
flock($file, LOCK_UN);
fclose($file);
echo 'Page visits: ' . $count;
