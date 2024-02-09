<?php

if (isset($_POST['ok'])) {
    $cn = mysqli_connect("localhost", "root", "", "fj");
    if ($cn) {
        echo "";
    } else {
        die("Connaction Faild Because" . mysqli_connect_error());
    }
    
    $un = $_POST['un'];
    $ps = $_POST['ps'];

    $rec = mysqli_query($cn, "SELECT * FROM user WHERE un='$un' AND ps='$ps'");
    $res = mysqli_num_rows($rec);
    $fe = mysqli_fetch_array($rec);
    if ($res == 1) {
        session_start();
        $_SESSION['lo'] = 'lo';
        if ($fe['uac'] === 'A') {
            $_SESSION['adm'] = $fe['un'];
            echo "<script>window.location.assign('admin.php');</script>";
        }
        if ($fe['uac'] === 'C') {
            $_SESSION['com'] = $fe['un'];
            echo "<script>window.location.assign('company.php');</script>";
        }
        if ($fe['uac'] === 'U') {
            $_SESSION['usr'] = $fe['un'];
            echo "<script>window.location.assign('user.php');</script>";
        }
    } else {
        echo "<script> alert('Username or Password Not Valid'); 
			window.location.assign('index.php');</script>";
    }
}
?>
