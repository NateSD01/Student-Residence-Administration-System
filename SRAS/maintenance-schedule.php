<?php
 $file = 'maintenance schedule.pdf';
 $filename = 'maintenance schedule.pdf';
 header('Content-type:application/pdf');
 header('Content-Disposition: inline; filename"' . $filename .'"');
 header('Content-Transfer-Encoding: binary');
 header('Accept-Ranges: bytes');
 @readfile($file);
?>