<!--?php--
/*original code*/
/*echo "<h3> Residence View </h3>";
foreach (glob("*.png") as $filename)
{

    echo "<p>$filename</p><br>";
    echo "<img src='$filename' alt='$filename' />";

}

//echo "<h3> JPG Images </h3>";
foreach (glob("*.jpg") as $filename){

    echo "<p>$filename</p><br>";
    //echo "<img src='$filename' alt='$filename' />";

}

echo "<br>";
//$image = imagecreatefrompng($filename);
//imagejpeg($filename, $filename, 100);
*/
/* added code */

<?php
 $file = 'residence-view.pdf';
 $filename = 'residence-view.pdf';
 header('Content-type:application/pdf');
 header('Content-Disposition: inline; filename"' . $filename .'"');
 header('Content-Transfer-Encoding: binary');
 header('Accept-Ranges: bytes');
 @readfile($file);
?>
