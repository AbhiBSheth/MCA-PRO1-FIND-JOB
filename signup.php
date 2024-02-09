<?php
$cn = mysqli_connect("localhost", "root", "", "fj");
if (isset($_POST['ok']) || isset($_POST['adok'])) {
    if ($_POST['ps'] == $_POST['rps']) {

        $fnm = strtoupper($_POST['fnm']);
        $em = strtolower($_POST['em']);
        $un = $_POST['un'];
        $ps = $_POST['ps'];
        $rps = $_POST['rps'];
        $uac = $_POST['uac'];

        $query = "INSERT INTO user (id, fnm, em, un, ps, uac) VALUES ('', '$fnm', '$em', '$un', '$ps', '$uac')";
        $result = mysqli_query($cn, $query);
        $row = mysqli_affected_rows($cn);
        $fe = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM user WHERE un='$un' AND ps='$ps'"));
        if ($row > 0) {
            session_start();
            if (isset($_POST['adok'])) {
                echo "<script>alert('Record Update Sucessfully...'); window.location.assign('admin.php');</script>";
            }else{
                $_SESSION['lo'] = 'lo';
                $_SESSION['usr'] = $fe['un'];
                echo "<script>alert('Record Update Sucessfully...');window.location.assign('user.php');</script>";
            }
        } else {
            $msg = "Something Wrong.";
        }
    } else {
        if (isset($_POST['adok'])) {
            echo "<script>alert('Password Must Be Same.'); window.location.assign('admin.php');</script>";
        } else {
            echo "<script>alert('Password Must Be Same.'); window.location.assign('index.php');</script>";
        }
    }
}
if (isset($_POST['adup'])) {
    if ($_POST['ps'] == $_POST['rps']) {
        $id = $_POST['id'];
        $fnm = strtoupper($_POST['fnm']);
        $em = strtolower($_POST['em']);
        $un = $_POST['un'];
        $ps = $_POST['ps'];
        $rps = $_POST['rps'];
        $uac = $_POST['uac'];

        $emq = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `user` WHERE `id` ='$id'"));
        $uem = mysqli_query($cn, "SELECT * FROM `us`");
        while ($uem1 = mysqli_fetch_array($uem)) {
        if ($uem1['em'] === $emq['em']) {
            $uquery = "UPDATE us SET em ='$em' WHERE id = '$uem1[id]'";
            $result = mysqli_query($cn, $uquery);
        }}
        $cem = mysqli_query($cn, "SELECT * FROM `co`");
        while ($cem1 = mysqli_fetch_array($cem)) {
        if ($cem1['em'] === $emq['em']) {
            $cquery = "UPDATE co SET em ='$em' WHERE id = '$cem1[id]'";
            $result = mysqli_query($cn, $cquery);
        }}
        $update = "UPDATE `user` SET `fnm`='$fnm',`em`='$em',`un`='$un',`ps`='$ps',`uac`='$uac' WHERE id ='$id'";
        $result = mysqli_query($cn, $update);
        $row = mysqli_affected_rows($cn);
        if ($row > 0) {
            session_start();
            echo "<script>alert('Record Update Sucessfully...'); window.location.assign('admin.php');</script>";
        } else {
            $msg = "Something Wrong.";
        }
    } else {
       echo "<script>alert('Password Must Be Same.'); window.location.assign('admin.php');</script>";
    }
}
if (isset($_POST['upc'])) {

    $folder = "logo/" . $_FILES["logo"]["name"];
    $id = $_POST['id'];
    $fnm = strtoupper($_POST['fnm']);
    $conm = strtoupper($_POST['conm']);
    $em = strtolower($_POST['em']);
    $mob = $_POST['mob'];
    $ad = $_POST['ad'];
    $logo = $_FILES['logo']['name'];
    move_uploaded_file($_FILES['logo']['tmp_name'], $folder);
    $emq = mysqli_fetch_array(mysqli_query($cn, "SELECT `em` FROM `user` WHERE id ='$id'"));
    $uquery = "UPDATE user SET fnm ='$fnm',em ='$em' WHERE id = '$id'";
    $result = mysqli_query($cn, $uquery);
    $emqc = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `co` WHERE em ='$emq[em]'"));
    $job = mysqli_query($cn, "SELECT * FROM `job`");
        while ($job1 = mysqli_fetch_array($job)) {
        if ($job1['conm'] === $emqc['conm']) {
            $uquery = "UPDATE job SET conm ='$conm' WHERE id = '$job1[id]'";
            $result = mysqli_query($cn, $uquery);
        }}
    if ($emq['em'] == $emqc['em']) {
        $i = "UPDATE co SET conm='$conm',em ='$em',mob='$mob',ad='$ad',logo='$logo' WHERE id='$emqc[id]'";
        $ir = mysqli_query($cn, $i);
    } else {
        $q = "INSERT INTO `co`(`id`, `conm`, `em`, `mob`, `ad`, `logo`) VALUES ('','$conm','$em','$mob','$ad','$log')";
        $r = mysqli_query($cn, $q);
    }
    $row = mysqli_affected_rows($cn);
    if ($row > 0) {
        mysqli_close($cn);
        echo "<script>alert('Record Added Successfully.');window.location.assign('admin.php');</script>";
    } else {
        mysqli_close($cn);
        echo "<script>alert('Something Wrong.');window.location.assign('admin.php');</script>";
    }
}
if (isset($_POST['upu'])) {

    $folder = "photo/" . $_FILES["photo"]["name"];
    $id = $_POST['id'];
    $fnm = strtoupper($_POST['fnm']);
    $em = strtolower($_POST['em']);
    $mob = $_POST['mob'];
    $ad = $_POST['ad'];
    $greduation = strtoupper($_POST['greduation']);
    $hsc = $_POST['hsc'];
    $deg = $_POST['deg'];
    $mas = $_POST['mas'];
    $photo = $_FILES['photo']['name'];
    $dob = $_POST['dob'];
    move_uploaded_file($_FILES['photo']['tmp_name'], $folder);
    $emq = mysqli_fetch_array(mysqli_query($cn, "SELECT `em` FROM `user` WHERE id ='$id'"));
    $uquery = "UPDATE user SET fnm ='$fnm',em ='$em' WHERE id = '$id'";
    $result = mysqli_query($cn, $uquery);
    $emqc = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `us` WHERE em ='$emq[em]'"));
    if ($emq['em'] == $emqc['em']) {
        $i = "UPDATE us SET em ='$em',mob='$mob',ad='$ad',greduation='$greduation',hsc='$hsc',deg='$deg',mas='$mas',photo='$photo',dob='$dob' WHERE id='$emqc[id]'";
        $ir = mysqli_query($cn, $i);
    } else {
        $q = "INSERT INTO `us`( `em`, `mob`, `ad`, `greduation`, `hsc`, `deg`, `mas`, `photo`, `dob`) VALUES ('$em','$mob','$ad','$greduation','$hsc','$deg','$mas','$photo','$dob')";
        $r = mysqli_query($cn, $q);
    }
    $row = mysqli_affected_rows($cn);
    if ($row > 0) {
        mysqli_close($cn);
        echo "<script>alert('Record Added Successfully.');window.location.assign('admin.php');</script>";
    } else {
        mysqli_close($cn);
        echo "<script>alert('Something Wrong.');window.location.assign('admin.php');</script>";
    }
}
if (isset($_POST['aju'])) {
    $id = $_POST['id'];
    $ans = $_POST['ans'];
    $i = "UPDATE appjob SET ans='$ans' WHERE id='$id'";
    $ir = mysqli_query($cn, $i);
        mysqli_close($cn);
        echo "<script>alert('Record Added Successfully.');window.location.assign('admin.php');</script>";
}