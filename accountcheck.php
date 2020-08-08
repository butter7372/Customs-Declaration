<html>
	<header>
		<base href="" target="_parent" />
	</header>
</html>
<?php
/*    error_reporting(0);*/
    $conn = mysqli_connect("localhost","zhangwei","tagal&2016");
    mysqli_query($conn, "set names utf8");
	mysqli_select_db($conn,"customs_declaration");
	if (!$conn){
		die("Could not connect: " . mysqli_connect_error());
	}
	$user = $_POST['user'];
	$pass = $_POST['password'];
	$cpass = md5($pass);
    $res_user = mysqli_query($conn, "select user from login where user = '$user' limit 1");
    $user_arr = mysqli_fetch_assoc($res_user);
    $user_check = $user_arr['user'];
/*    var_dump($user_check);*/

    if(empty($user)){
        echo '<script language="JavaScript">;alert("用户名不能为空，请重新输入");location.href="login.html";</script>';
    }
	if (empty($pass)){
        echo '<script language="JavaScript">;alert("密码不能为空，请重新输入");location.href="login.html";</script>';
    }
	else{
        $res_obj = mysqli_query($conn, "select * from login where user = '$user' and password = '$cpass' limit 1");
	    $res_arr = mysqli_fetch_assoc($res_obj);
        $user_data = $res_arr['user'];
        $password_data = $res_arr['password'];
        $last_login_data = $res_arr['last_login'];
           if($user_check==''){
               echo '<script language="JavaScript">;alert("无此用户，请重新输入用户名！");location.href="login.html";</script>';
           }
           if($password_data ==''){
               echo '<script language="JavaScript">;alert("密码错误，请重新输入");location.href="login.html";</script>';
           }
	       if($last_login_data=='' && $user_data !=''){
               echo '<script language="JavaScript">;alert("第一次登录，请修改密码！");location.href="changepwd.html";</script>';
           }
	       elseif($last_login_data!='' && $user_data !=''){
               session_start();
               $_SESSION["admin"] = true;
               echo '<script language="JavaScript">;alert("登录成功,欢迎您！");location.href="index.php";</script>';
           }
    }