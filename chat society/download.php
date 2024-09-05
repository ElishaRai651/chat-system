<?php 
if(!empty($_GET['name']))
{
	$filename = basename($_GET['name']);
	$target_path = 'upload/' . $filename;
	if(!empty($filename) && file_exists($target_path)){

//Define Headers
		header("Cache-Control: public");
		header("Content-Description: FIle Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/zip");
		header("Content-Transfer-Emcoding: binary");

		readfile($target_path);
		exit;

	}
	else{
        echo'file doesnot exist';
    }
}
    ?>