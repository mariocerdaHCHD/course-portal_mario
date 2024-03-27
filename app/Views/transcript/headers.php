<?php
    session_start();
    $path = $_SERVER["DOCUMENT_ROOT"];
    $id = $_SESSION["id"];
    $fileName =  "output_" .$id .".pdf" ;
    $tmpDir = $path . "/course_portal/app/Views/transcript/tmp/"; 
    $filePath = $tmpDir . $fileName;
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');// . mime_content_type($filePath));
    // header('Content-Transfer-Encoding: binary');
    header('Cache-Control: no-store,no-cache');
    header('Content-Disposition: attachment; filename= "'.basename($fileName).'\"');
    //header('Pragma:no-cache');
    header('Content-Length: ' . filesize($filePath));
    ob_flush();
    flush();
    readfile($filePath);
    //exit;

    //delete file from tmp folder
    $rmTempFile = "del tmp\\" . $fileName;
    exec($rmTempFile);
?>