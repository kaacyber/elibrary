<?php

$app="http://localhost:8080/rsj/rsu-elibrary/files_upload/regulasi/";
echo $app."<br>";
{           // The location of the PDF file on the server.
$filename = $app . $nama_file;
    // Let the browser know that a PDF file is coming.
    //$filename = 'C:\xampp7\htdocs\rsu-billing\application\e-library\file\1.pdf';
header("Content-type: application/pdf");
header("Content-Length: " . filesize($filename));
header("Content-Disposition:attachment;filename=data.pdf");
    // Send the file to the browser.
readfile($filename);
    echo $filename;
    exit;   


//file_put_contents("data.pdf", $filename);


		//echo $msg;

		//variabel data adalah base 64 dari file pdf 
		//$pdf = base64_decode($result['data']);

		//hasilnya adalah berupa binary string $pdf, untuk disimpan :
		//file_put_contents("klaim.pdf", $pdf);

		//atau untuk ditampilkan dengan perintah :
		//header("Content-Type:application/pdf");
		//header("Content-Disposition:attachment;filename=data.pdf");
		//echo $filename;
}