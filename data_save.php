<!--<script src="/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $("#cleaninput").click(function(){
        $(".screen-window form input").each(function(){
            $(this).val('');
        });
        $(".screen-window form select").each(function(){
            $(this).val('');
        });
    })
</script>-->
<html>
	<header>
		<base href="" target="_parent" />
	</header>
</html>

<?php

/*    error_reporting(0);*/
    $mydbhost = "localhost";
    $mydbuser = "zhangwei";
    $mydbpass = 'tagal&2016';
    $conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);
    mysqli_select_db($conn, 'customs_declaration');
    if(! $conn){
        die("connect error: " . mysqli_error($conn));
    }

    $SAP_order = $_POST['SAP_order'];
    $declaration_number = $_POST['declaration_number'];
    $invoice_number = $_POST['invoice_number'];
    $package_number = $_POST['package_number'];
    $shipment_number = $_POST['shipment_number'];
    $shipment_order = $_POST['shipment_order'];
    $IncoTerm = $_POST['IncoTerm'];
    $declarant = $_POST['declarant'];
    $shipment_fee = $_POST['shipment_fee'];
    $insurance_fee = $_POST['insurance_fee'];
    $other_fee = $_POST['other_fee'];
    $arr_name = ($_FILES['upload']['name']);
    $arr_type = ($_FILES['upload']['type']);
    $arr_size = ($_FILES['upload']['size']);
    $arr_tmp = ($_FILES['upload']['tmp_name']);
    $arr_len = count($arr_name);
    if ($SAP_order == "" || $declaration_number == ''){
        echo '<script language="JavaScript">;alert("订单号或报关单数据项不能为空，请重新输入");history.back();</script>';
        return;
    }


/*    var_dump($arr_len);*/

    $fieldarr = array(
                    array('name'=>'SAP_order_attachment_name', 'type'=>'SAP_order_attachment_type', 'size'=>'SAP_order_attachment_size', 'content'=>'SAP_order_attachment_content'),
                    array('name'=>'declaration_attachment_name', 'type'=>'declaration_attachment_type', 'size'=>'declaration_attachment_size', 'content'=>'declaration_attachment_content'),
                    array('name'=>'invoice_attachment_name', 'type'=>'invoice_attachment_type', 'size'=>'invoice_attachment_size', 'content'=>'invoice_attachment_content'),
                    array('name'=>'package_number_attachment_name', 'type'=>'package_number_attachment_type', 'size'=>'package_number_attachment_size', 'content'=>'package_number_attachment_content'),
                    array('name'=>'shipment_number_attachment_name', 'type'=>'shipment_number_attachment_type', 'size'=>'shipment_number_attachment_size', 'content'=>'shipment_number_attachment_content'),
                    array('name'=>'shipment_order_attachment_name', 'type'=>'shipment_order_attachment_type', 'size'=>'shipment_order_attachment_size', 'content'=>'shipment_order_attachment_content'));
    $arrname = array_column($fieldarr, 'name');
    $arrtype = array_column($fieldarr, 'type');
    $arrsize = array_column($fieldarr, 'size');
    $arrcontent = array_column($fieldarr, 'content');

    if ($_FILES["file"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }

    $query1 = mysqli_query($conn, "select SAP_order from declaration where SAP_order = $SAP_order limit 1");
    $query2 = mysqli_query($conn, "select SAP_order, declaration_number from declaration_attachment where SAP_order = '$SAP_order' limit 1");
    $queryrow1 = mysqli_num_rows($query1);
    $queryrow2 = mysqli_num_rows($query2);
    if ($queryrow1 == '' && $queryrow2 == '') {

        $res_text1 = mysqli_query($conn, "INSERT INTO declaration (SAP_order, declaration_number, invoice_number, package_number, shipment_number,
                                										shipment_order, shipment_fee, insurance_fee, other_fee, IncoTerm, declarant, modify_time)
                                							VALUES ('$SAP_order', '$declaration_number', '$invoice_number', '$package_number', '$shipment_number',
                                							        '$shipment_order', '$shipment_fee', '$insurance_fee', '$other_fee', '$IncoTerm', '$declarant', DATE_FORMAT(NOW(), '%Y-%m-%d %h:%i:%s'))");
        $res_attach1 = mysqli_query($conn, "INSERT INTO declaration_attachment (SAP_order, declaration_number,  modify_time)
                                                              VALUES ('$SAP_order', '$declaration_number', DATE_FORMAT(NOW(), '%Y-%m-%d %h:%i:%s'))");
        for($x=0; $x<$arr_len; $x++) {
            $vname = $arr_name[$x];
            $vtype = $arr_type[$x];
            $vsize = $arr_size[$x];
            $vtmp = $arr_tmp[$x];
            $fname = $arrname[$x];
            $ftype = $arrtype[$x];
            $fsize = $arrsize[$x];
            $fcontent = $arrcontent[$x];
            if ($vsize < 20480000 || $vtype == "image/jpg" || $vtype == "image/png" || $vtype == "image/jpeg" || $vtype == "application/pdf") {
                $fp = fopen($vtmp, 'r');
                $vcontent = fread($fp, $vsize);
                fclose($fp);
                $vcontent = addslashes($vcontent);
                $res_attach2 = mysqli_query($conn, "UPDATE declaration_attachment  SET $fname ='$vname', $ftype = '$vtype', $fsize = '$vsize', $fcontent = '$vcontent'
                                                              WHERE declaration_attachment.SAP_order = '$SAP_order'");
            }
            else {
                echo "文件类型或大小不符合要求(类型为JPG或PDF格式,文件大小低于20MB)";
            }
        }
    }
        if ($queryrow1 != '' && $queryrow2 != ''){
            echo '<script language="JavaScript">;alert("数据已存在，请检查后重新保存");history.back();</script>';
        }
        elseif (!$res_text1) {
            echo '<script language="JavaScript">;alert("数据保存失败,请通知管理员排查");history.back();</script>';
        }
        if ($res_text1 && $res_attach1 && $res_attach2) {
            echo '<script language="JavaScript">;alert("数据已保存成功");history.back();</script>';
        }
   mysqli_close($conn);
