<?php
session_start();
include('../function.inc.php');
unset($_SESSION['ADMIN_ID']);
unset($_SESSION['ADMIN_USER']);
redirect('login.php');
?>