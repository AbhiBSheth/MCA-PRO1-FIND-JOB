<?php
session_start();
unset($_SESSION['adm']);
unset($_SESSION['usr']);
unset($_SESSION['com']);
session_destroy();
session_start();
$_SESSION['lo'] = 'lo';
header("location:index.php");
?>