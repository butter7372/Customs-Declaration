<html>
<header>
    <base href="" target="_parent" charset=utf-8"/>
</header>
</html>
<?php
/*            error_reporting(0);*/
            $SAP_order_data = $_POST['SAP_order'];
            $declaration_number_data = $_POST['declaration_number'];
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
            var_dump($arr_len);

            $mydbhost = "localhost";
		    $mydbuser = "zhangwei";
		    $mydbpass = 'tagal&2016';
		    $conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);
		    mysqli_select_db($conn, 'customs_declaration');
		    if(! $conn){
		        die("connect error: " . mysqli_error($conn));
		    }
			$queryR1 = mysqli_query($conn, "SELECT declaration.ID, declaration.SAP_order, declaration.declaration_number, declaration.invoice_number, 
												declaration.package_number, declaration.shipment_number, declaration.shipment_order,  declaration.shipment_fee, 
                                                declaration.insurance_fee, declaration.other_fee,declaration.IncoTerm, declaration.declarant,
												declaration_attachment.modify_time, 
                                                declaration_attachment.SAP_order_attachment_name, 
												declaration_attachment.declaration_attachment_name,
												declaration_attachment.invoice_attachment_name,
												declaration_attachment.package_number_attachment_name,
												declaration_attachment.shipment_number_attachment_name,
												declaration_attachment.shipment_order_attachment_name 
											FROM declaration LEFT JOIN declaration_attachment on declaration.SAP_order = declaration_attachment.SAP_order 
											WHERE declaration.SAP_order = '{$SAP_order_data}' ORDER BY declaration.modify_time desc");
            $row=mysqli_fetch_array($queryR1);

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

            $res_text = mysqli_query($conn, "UPDATE declaration SET invoice_number = '$invoice_number', package_number = '$package_number', shipment_number = '$shipment_number',
                                            								shipment_order = '$shipment_order', shipment_fee = '$shipment_fee', insurance_fee = '$insurance_fee',
                                                                            other_fee = '$other_fee', IncoTerm = '$IncoTerm', declarant = '$declarant' 
                                                                            WHERE declaration.SAP_order = '{$SAP_order_data}'" );
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
                    if($vcontent){
                        $res_attach = mysqli_query($conn, "UPDATE declaration_attachment  SET $fname ='$vname', $ftype = '$vtype', $fsize = '$vsize', $fcontent = '$vcontent'
                                                                          WHERE declaration_attachment.SAP_order = '{$SAP_order_data}'");
                    }
                }
                else {
                    echo "文件类型或大小不符合要求(类型为JPG或PDF格式,文件大小低于20MB)";
                }
                if ($res_text || $res_attach) {
                    echo '<script language="JavaScript">;alert("数据更新成功");location.href="index.php";</script>';
                }
            }
?>