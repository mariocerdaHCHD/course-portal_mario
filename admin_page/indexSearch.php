<?php
    //temporarily using this while database is getting set up
    $file = "C:\phpe_info\Employee_Staff_Tiers.csv";
    $ln = $_POST['ln'] ?? '';
    $fn = $_POST['fn'] ?? '';
    $id = $_POST['id'] ?? '';
    
    $content = file_get_contents($file);
    $fileLines = file($file);
    // echo $ln,$fn,$id;
    // echo $content;
    if(! empty($ln) || ! empty($fn) || ! empty($id)){
        //search for user with criteria

        foreach($fileLines as $lineNumber => $line){
            if(strpos($line,$ln) !== false){
                $arr =  explode(',',$line);
                //print_r($arr );
                echo "<tr><td>$arr[0] $arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td></tr>";
            }
        }
    }

?>