
<?php
   //temporarily using this while database is getting set up
    $filepath = "C:\\phpe_info\\employees_info.csv";
    //getting the variables passed through ajax call
    $ln = $_POST['ln'] ?? '';
    $fn = $_POST['fn'] ?? '';
    $id = $_POST['id'] ?? '';   
    // $name = $_POST['name'] ?? '';   
    //echo $name;
    //opens file
    $open_file = fopen($filepath,'r');

    //verfying if the file opened correctly
    if($open_file){
        //keeping track of lines in file
        $line = 0;
        //getting line by line
        //($file_line = fgets($open_file)) !== false
        while(($file_line = fgetcsv($open_file,1000,",")) !== FALSE){
            //dependant on $line initialing being zero to skip first line
            if($line >0){
                //if statement searching the current line for having
                //all or at least one of $id,$fn,$ln
                //|| (!empty($fn) && array_search($fn,$file_line) !== false) 
                $arr = $file_line;
                $len = count($file_line);
                for ($i=0; $i < $len; $i = $i+5) { 
                    # code...
                    //print_r($file_line);
                    if((!empty($fn) && (strpos($file_line[$i],$fn)) !== FALSE) 
                    || (!empty($ln) && (strpos($file_line[$i+1],$ln)) !== FALSE)
                    || (!empty($id) && (strpos($file_line[$i],$id+4)) !== FALSE)){
                        echo "<form action='admin_view_user.php' method='post'>
                        <tr onclick='view_empl(this)'>
                        <td><input name='first_name' id='fname' type='text' value='" . $file_line[$i] ."'> 
                        <input type='text' name='lname' id='lname' value='". $file_line[$i+1]."'></td>
                        <td><input type='text' name='position' id='position' value='".$file_line[$i+2]."'></td>
                        <td><input type='text' name='tier' id='tier' value='".$file_line[$i+3]."'></td>
                        <td><input type='text' name='employ_id' id='employ_id' value='".$file_line[$i+4]."'></td>
                        </tr></form>";

                    }
                }
            }
            //increases line number to be more accurate 
            $line++;
        }
        //close file
        fclose($open_file);
    }
?>
