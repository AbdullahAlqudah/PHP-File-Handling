<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
        $message = 'Upload failed';
    } elseif ($_FILES['photo']['size'] > 2 * 1024 * 1024) {
        $message = 'Maximum file size is 2MB';
    } else {
        $file = $_FILES['photo']['tmp_name'];
        $mime = (new finfo(FILEINFO_MIME_TYPE))->file($file);
        $types = ['image/jpeg' => 'jpg', 'image/png' => 'png'];
        $image = getimagesize($file);
        if ($image === false || !isset($types[$mime]) || $image['mime'] !== $mime) {
            $message = 'Only JPG and PNG images are allowed';
        } else {
            $folder = __DIR__ . '/uploads';
            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }
            $name = bin2hex(random_bytes(12)) . '.' . $types[$mime];
            $message = move_uploaded_file($file, $folder . '/' . $name) ? 'Image uploaded successfully' : 'Upload failed';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><title>Profile Picture Upload</title></head><body>
<h1>Upload Profile Picture</h1>
<p><?= htmlspecialchars($message) ?></p>
<form method="post" enctype="multipart/form-data"><input type="file" name="photo" accept=".jpg,.jpeg,.png" required><button type="submit">Upload</button></form>
</body></html>
