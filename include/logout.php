<?php
    session_start();
    $_SESSION = array();
    session_unset();
    session_destroy();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: -1");
    header('Location: /course_portal');//redirects to home page
    exit();
?>
