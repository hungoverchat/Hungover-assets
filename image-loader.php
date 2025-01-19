<?php
// Vérifiez si un fichier ID est fourni
if (isset($_GET['file_id'])) {
    $fileId = $_GET['file_id'];

    // URL de téléchargement de Google Drive
    $url = "https://drive.google.com/uc?export=download&id=" . $fileId;

    // Récupérer le contenu du fichier
    $fileContent = file_get_contents($url);

    if ($fileContent) {
        // Déterminer le type MIME (par exemple, image/jpeg)
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_buffer($fileInfo, $fileContent);
        finfo_close($fileInfo);

        // Envoyer les bons en-têtes
        header("Content-Type: $mimeType");
        echo $fileContent;
        exit;
    } else {
        echo "Erreur : Impossible de récupérer le fichier.";
    }
} else {
    echo "Erreur : Aucun fichier ID fourni.";
}
