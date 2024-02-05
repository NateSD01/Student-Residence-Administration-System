<?php
// Upload the PDF file (your existing code here)

// After successfully uploading the PDF, construct the URL and redirect to view_pdf.php with the file name as a query parameter.
$uploadedFileName = 'DIAMBAMBA Student Residence Code of Conduct.pdf'; // Replace 'example.pdf' with the actual uploaded file name

// Redirect to the view script with the file name as a query parameter
header("Location: view_pdf.php?file=" . urlencode($uploadedFileName));
exit; // Ensure no further code is executed in this script
?>
