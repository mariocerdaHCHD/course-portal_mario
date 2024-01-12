<?php 
    namespace App\Models; 
    use App\Models\Database;
    include "c:/phpe_info/tbDB.php";

    $db = new Database($serverName,$connectionDBinfo["UID"],$connectionDBinfo["PWD"],$connectionDBinfo["Database"]);

?>