<?php
if(isset($_POST['all_pdf'])){
    //using ghostscript
    //using shell_exec(command line code) OR exec(command line code) --need to use gswin32c
    //C:\Program Files (x86)\gs\gs10.03.0\bin\gswin32c.exe --file path 

    //sql stmt to gather all pdf under user
    $sql = "SELECT cert_name FROM certificates_info 
    WHERE employee_id = ?";
    $param = array($id);
    $stmt = $db->query_param($sql,$param);
    if(! $stmt){
        die();
        print_r(sqlsrv_errors(),true);
    }else{
        //put all file names in an array
        $certs_list = array();
        while($row = $db->fetch_arr($stmt)){
            if(!empty($row['cert_name'])){
                array_push($certs_list,$row['cert_name']);
            }
        }
        
        $fileName = "output_" .$id .".pdf" ;
        $dir = $path . "/course_portal/app/Views/transcript/";
        $tmpDir = $path . "/course_portal/app/Views/transcript/tmp/"; 
        $dirPath = $path . "/course_portal/app/assets/certificates/";   
        $filePath = $tmpDir . $fileName;

        //used a absolute path to gswin32c.exe to avoid errors when using 'include' file
        $cmd = "C:\gs\gs10.03.0\bin\gswin32c.exe -dNOPAUSE -sDEVICE=pdfwrite -dDEBUG -sOUTPUTFILE=$filePath -dBATCH ";
        //add to file's names to the stmt
        foreach($certs_list as $cl){
            $cmd .= $dirPath . $cl . " ";
        }
        //using shell_exec to execute $cmd
        $res = exec($cmd);//need to find how to execute the command line
        if(file_exists($filePath)){
            //using this so separate headers() to avoid 'headers already sent' error
            echo "<script>window.open('headers.php','_blank','fullscreen=yes');</script>";
        }
    }
}
?>