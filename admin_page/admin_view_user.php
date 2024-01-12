<!DOCTYPE html>
<?php 
// $rawPostData = file_get_contents('php://input');
// $data = json_decode($rawPostData,true);

// if(json_last_error() === JSON_ERROR_NONE){
//  echo "first: " . $data['first'] . "<br>";
//  echo "last: " . $data['last'] . "<br>";
//  echo "employ_id: " . $data['employ_id'] . "<br>";
// } else{
//     echo "Error decoding JSON data";
// }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first = urldecode($_POST['first']);
    $last = urldecode($_POST['last']);
    $position = urldecode($_POST['position']);
    $tier = urldecode($_POST['tier']);
    $employ_id = urldecode($_POST['employ_id']);

    // Use the data as needed
    //echo "Data received on Page 2: " . $first;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>
</head>
<body>
    <h1><!--employee name --><?php echo $first ." " .$last; ?></h1>
    <table>
        <tr><caption>Employee Information</caption></tr>
        <tr>
            <td>Position</td><td>Tier</td><td>Employee ID</td>
        </tr>
        <tr>
            <td><div><?php echo $position;?></div></td>
            <td><div><?php echo $tier; ?></div></td>
            <td><div><?php echo $employ_id; ?></div></td>
        </tr>
    </table>
        <!--tier number  -->
        <!-- list of courses taken --> <!--list of courses needed to take -->
    
    <table>
        <caption>Courses Taken</caption>
    </table>
    <table>
        <caption>Courses Pending</caption>
    </table>            
    </body>
</html>

