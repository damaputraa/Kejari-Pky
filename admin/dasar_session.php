
<?php

session_start();
//$_SESSION['akun'] = "admin";
$_SESSION['akun'] = ['admin', 'operator'];
//unset($_SESSION['akun']);
var_dump($_SESSION['akun']);

?>