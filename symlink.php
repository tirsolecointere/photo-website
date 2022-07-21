<?php

// THIS WORKED IN HOSTINGER!!!!!! 19/07/22

// ----- USAGE
// Move this file to project/public directory and open it from the url
// example.com/symlink.php

$targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/../core/storage/app/public';
$linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
// echo "CREATING SYMLINK FROM: " . $targetFolder . ' TO: '. $linkFolder;
symlink($targetFolder, $linkFolder) or die("ERROR CREATING SYMLINK FROM: " . $targetFolder . ' TO: '. $linkFolder);
echo 'Symlink process successfully completed';
