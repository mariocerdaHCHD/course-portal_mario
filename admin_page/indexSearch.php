<?php
    //temporarily using this while database is getting set up
    $filepath = "C:\phpe_info\Employee_Staff_Tiers.csv";
    //getting the variables passed through ajax call
    $ln = $_POST['ln'] ?? '';
    $fn = $_POST['fn'] ?? '';
    $id = $_POST['id'] ?? '';   

    //opens file
    $open_file = fopen($filepath,'r');

    //verfying if the file opened correctly
    if($open_file){
        //keeping track of lines in file
        $line = 0;
        //getting line by line
        while(($file_line = fgets($open_file)) !== false){
            //dependant on $line initialing being zero to skip first line
            if($line >0){
                //if statement searching the current line for having
                //all or at least one of $id,$fn,$ln
                if((!empty($id) && strpos($file_line,$id) !== false) 
                || (!empty($fn) && strpos($file_line,$fn) !== false) 
                || (!empty($ln) && strpos($file_line,$ln) !== false)){
                    //converts string line into an array by 
                    //dividing ','
                    $arr =  explode(',',$file_line);
                    //print_r($arr );
                    //outputs method to display the search
                    echo "<tr><td>$arr[0] $arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td></tr>";
                }
            }
            //increases line number to be more accurate 
            $line++;
        }
        //comes file
        fclose($open_file);
        // if(! empty($ln) || ! empty($fn) || ! empty($id)){
        //     //search for user with criteria

        //     foreach($fileLines as $lineNumber => $line){
        //         if((!empty($id) && strpos($line,$id) !== false) 
        //         || (!empty($fn) && strpos($line,$fn) !== false) 
        //         || (!empty($ln) && strpos($line,$ln) !== false)){
        //             $arr =  explode(',',$line);
        //             //print_r($arr );
        //             echo "<tr><td>$arr[0] $arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td></tr>";
        //         }
        //     }
        // }
    }
?>
