 <?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = $_REQUEST['msg'];
fwrite($myfile, $txt);
fclose($myfile);
?> 