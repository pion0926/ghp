<?php

if (isset($_GET['pagen'])) {
    $pagen = $_GET['pagen'];

    if ($pagen >= 1 && $pagen <= 900) {
        $filename = $pagen . '.html'; // Construct the filename dynamically

        if (file_exists($filename)) {
            $htmlContent = file_get_contents($filename);
            echo $htmlContent;
        } else {
            echo "Error: File not found for page " . $pagen . ".";
        }
    } else {
        echo "Error: Page number must be between 200 and 300.";
    }
} else {
    echo "Error: Page number not specified.";
}

?>