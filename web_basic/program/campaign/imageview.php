<?php

// imageview.php

// 1. Get the parameters
$pagen = isset($_GET['pagen']) ? $_GET['pagen'] : null;
$ftype = isset($_GET['ftype']) ? $_GET['ftype'] : null;
$fchecksum = isset($_GET['fchecksum']) ? $_GET['fchecksum'] : null;

// 2. Basic Validation (Important!)
if ($pagen === null || $ftype === null || $fchecksum === null) {
    // Handle missing parameters (e.g., display a default image or an error)
    // For security, *never* directly use user input in file paths without validation.
    header("HTTP/1.1 400 Bad Request"); // Indicate a client error
    echo "Error: Missing parameters.";
    exit; // Stop further execution
}

// 3. Security: Sanitize and Validate Inputs (Critical!)
// This is the most important step.  You *must* sanitize user input before using it
// in file paths or database queries to prevent security vulnerabilities.

// Example using a whitelist for $ftype (recommended):
$allowedFtypes = [8]; // Add other allowed ftype values if needed
if (!in_array($ftype, $allowedFtypes)) {
    header("HTTP/1.1 400 Bad Request");
    echo "Error: Invalid file type.";
    exit;
}

// For $pagen, ensure it's a number:
if (!is_numeric($pagen)) {
    header("HTTP/1.1 400 Bad Request");
    echo "Error: Invalid page number.";
    exit;
}
$pagen = intval($pagen); // Convert to an integer

// For $fchecksum, you might want to validate its format (e.g., length, allowed characters)
// This depends on how you generate the checksum.  At a minimum, prevent directory traversal:
if (strpos($fchecksum, '..') !== false || strpos($fchecksum, '/') !== false || strpos($fchecksum, '\\') !== false) {
    header("HTTP/1.1 400 Bad Request");
    echo "Error: Invalid checksum.";
    exit;
}


// 4. Image Handling (Example - Adapt to your needs)

// Construct the image path (using safe, validated input)
$imagePath = "images/campaign/image_" . $pagen . "_" . $ftype . "_" . $fchecksum . ".jpg"; // Example

// Check if the image exists
if (file_exists($imagePath)) {
    // Get the image content type (important for proper display)
    $imageInfo = getimagesize($imagePath);
    $contentType = $imageInfo['mime'];

    // Set the Content-Type header
    header("Content-Type: " . $contentType);

    // Output the image
    readfile($imagePath);

} else {
    // Handle the case where the image doesn't exist
    header("HTTP/1.1 404 Not Found");
    echo "Error: Image not found.";
}

?>