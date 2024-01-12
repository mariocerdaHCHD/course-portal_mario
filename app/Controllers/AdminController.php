<?php
namespace App\Controllers;

class AdminController{
    public function showAdminPage(){
        //controller logic to display the admin page
        require_once('../Views/admin.page');
    }
}

?>