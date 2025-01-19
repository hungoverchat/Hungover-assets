<?php
$file_url = "https://drive.google.com/uc?export=download&id=1AEJkfA4uWFR-1B0H3qYsgi7IvD-yNA0r";
$log_file = "access_log.txt";

// Enregistrer l'accès
$log_entry = date("Y-m-d H:i:s") . " - Fichier accédé par : " . $_SERVER['REMOTE_ADDR'] . "\n";
file_put_contents($log_file, $log_entry, FILE_APPEND);

// Redirection vers le fichier
header("Location: $file_url");
exit;
?>
