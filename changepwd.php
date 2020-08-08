<html>
	<header>
		<base href="" target="_parent" />
	</header>
</html>
<?php
    error_reporting(0);
    ini_set('date.timezone','Asia/Shanghai');
    $conn = mysqli_connect("localhost","zhangwei","tagal&2016");
    mysqli_query($conn, "set names utf8");
    mysqli_select_db($conn,"customs_declaration");
    if (!$conn){
        die("Could not connect: " . mysqli_connect_error());
    }

    $user = $_POST['user'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    $pass3 = $_POST['password3'];
    $pass2len = strlen($pass2);
    $pass3len = strlen($pass3);
    $cpass1 = md5($pass1);
    $cpass2 = md5($pass2);
    $cpass3 = md5($pass2);

    if($user =='' || $pass1 == '') {
        echo '<script language="JavaScript">;alert("用户名及原密码不能为空，请重新输入");location.href="changepwd.html";</script>';
    }
    else {
        $resuser = mysqli_query($conn, "select user from login where user = '$user' limit 1 ");
        $numuser = mysqli_num_rows($resuser);
        $respass = mysqli_query($conn, "select password from login where user = '$user' and password ='$cpass1' limit 1 ");
        $numpass = mysqli_num_rows($respass);
        if ($user == '') {
            echo '<script language="JavaScript">;alert("无此用户，请重新输入用户名！");location.href="changepwd.html";</script>';
        }
        if($numpass == '') {
                echo '<script language="JavaScript">;alert("原密码不正确，请重新输入！");location.href="changepwd.html";</script>';
        }
        if ($pass2 == '') {
            echo '<script language="JavaScript">;alert("密码不能为空，请重新输入");location.href="changepwd.html";</script>';
        }
        if (empty($pass3)) {
            echo '<script language="JavaScript">;alert("确认密码不能为空，请重新输入");location.href="changepwd.html";</script>';
        }
        if ($pass2 != $pass3) {
            echo '<script language="JavaScript">;alert("您输入的密码与确认密码不一致，请重新输入");location.href="changepwd.html";</script>';
        }
        if ($pass2len < 7 || $pass3len <7){
            echo "<script>alert('密码长度至少为7位，请重新输入！');location.href=\"changepwd.html\";</script>";
        }
        if ($pass2len >= 7 && $pass3len >=7 && $cpass2 == $cpass3 ){
            if ($numpass != '') {
                $res2 = mysqli_query($conn, "UPDATE login SET PASSWORD = '$cpass2', last_login = DATE_FORMAT(NOW(), '%Y-%m-%d %h:%i:%s') WHERE	USER = '$user'");
                $res3 = mysqli_affected_rows();
                if (res3) {
                    echo '<script language="JavaScript">;alert("密码修改成功，请返回重新登录！");location.href="login.html";</script>';
                }
            }
        }
    }