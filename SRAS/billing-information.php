
<!--<!DOCTYPE html>
<html>
<head>
    <title>Terms & Conditions</title>
</head>
    <title>Code of Conduct</title>
</head>
<body>
    <h1><em></em> Code of Conduct: Downloading... <em></em></h1>
    <embed src="Engineering Student Residence Code of Conduct.pdf" height="500" width="1000" 
</body>

</html> -->

<?php
 $file = 'Billing-Information.pdf';
 $filename = 'Billing-Information.pdf';
 header('Content-type:application/pdf');
 header('Content-Disposition: inline; filename"' . $filename .'"');
 header('Content-Transfer-Encoding: binary');
 header('Accept-Ranges: bytes');
 @readfile($file);
?>


