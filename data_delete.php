<html>
<header>
    <base href="" target="_parent" />
</header>
</html>
<?php
               error_reporting(0);
               $ID = $_GET{"ID"};
               $mydbhost = "localhost";
               $mydbuser = "zhangwei";
               $mydbpass = 'tagal&2016';
               $conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);
               mysqli_select_db($conn, 'customs_declaration');
               if(! $conn){
                   die("connect error: " . mysqli_error($conn));
               }
               $res_text = mysqli_query($conn, "DELETE FROM declaration WHERE declaration.ID = '{$ID}'");
               $res_attach = mysqli_query($conn, "DELETE FROM declaration_attachment WHERE declaration_attachment.ID = '{$ID}'");

               if ($res_text && $res_attach) {
                   echo '<script language="JavaScript">;alert("数据已删除");history.back();</script>';
           }
?>