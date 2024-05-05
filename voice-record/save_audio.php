<?php
if ($_FILES['audio']['error'] === UPLOAD_ERR_OK) {
    $tempFile = $_FILES['audio']['tmp_name'];
    $targetPath = 'audio/';
    $fileName = $_FILES['audio']['name'];
    $targetFile = $targetPath . $fileName;
    
    if (move_uploaded_file($tempFile, $targetFile)) {
    
        echo 'Audio file saved successfully';
    } else {
        echo 'Error moving uploaded file';
    }
} else {
    echo 'Error uploading audio file';
}
?>
