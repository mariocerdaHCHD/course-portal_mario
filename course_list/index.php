<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table{
            width:100%;
            border: 1px solid black;
        }
        table td{
            width: auto;
            border: 1px solid black;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div id="course_list_id">
        <form action="" method="post">
            <table >
            <?php
                $row = 0;
                $columns = 1;
                
                if (($handle = fopen("C:\phpe_info\\training.csv", "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 500, ",")) !== FALSE) {
                        $num = count($data);
                        //echo "<p> $num fields in line $row: <br /></p>\n";
                        
                        echo "<tr>";
                        for ($c=0; $c < $num; $c++) {
                            $row++;
                            if( $data[$c] == "" && !($row <=9)){
                               
                            }
                            else{
                                echo "<td>" .$data[$c]. "</td>";
                               
                            }
                            
                        }
                        $row = 0;
                        echo "</tr>";
                    }
                    fclose($handle);
                }
            ?>
            </table>
        </form>
    </div>
</body>
</html>



