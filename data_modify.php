<!DOCTYPE html>
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
			$queryR1 = mysqli_query($conn, "SELECT declaration.ID, declaration.SAP_order, declaration.declaration_number, declaration.invoice_number, 
												declaration.package_number, declaration.shipment_number, declaration.shipment_order,  declaration.shipment_fee, 
                                                declaration.insurance_fee, declaration.other_fee,declaration.IncoTerm, declaration.declarant,
												declaration_attachment.modify_time, 
                                                declaration_attachment.SAP_order_attachment_name, 
													declaration_attachment.SAP_order_attachment_content, 
													declaration_attachment.declaration_attachment_name,
													declaration_attachment.declaration_attachment_content,
													declaration_attachment.invoice_attachment_name,
													declaration_attachment.invoice_attachment_content,
													declaration_attachment.package_number_attachment_name,
													declaration_attachment.package_number_attachment_content,
													declaration_attachment.shipment_number_attachment_name,
													declaration_attachment.shipment_number_attachment_content,
													declaration_attachment.shipment_order_attachment_name,
													declaration_attachment.shipment_order_attachment_content
											FROM declaration LEFT JOIN declaration_attachment on declaration.SAP_order = declaration_attachment.SAP_order 
											WHERE declaration.ID = '{$ID}' ORDER BY declaration.modify_time desc");
            $row_name = array('SAP_order_attachment_name', 'declaration_attachment_name', 'invoice_attachment_name', 'package_number_attachment_name',
                'shipment_number_attachment_name', 'shipment_order_attachment_name');
            $row_content = array('SAP_order_attachment_content', 'declaration_attachment_content', 'invoice_attachment_content',
                'package_number_attachment_content', 'shipment_number_attachment_content', 'shipment_order_attachment_content');

            $row=mysqli_fetch_array($queryR1);
            $SAP_order_data = $row["SAP_order"];
            $declaration_number_data = $row["declaration_number"];
            $invoice_number_data = $row["invoice_number"];
            $package_number_data = $row["package_number"];
            $shipment_number_data = $row["shipment_number"];
            $shipment_order_data = $row["shipment_order"];
            $shipment_fee_data = $row["shipment_fee"];
            $insurance_fee_data = $row["insurance_fee"];
            $other_fee_data = $row["other_fee"];
            $IncoTerm_data = $row["IncoTerm"];
            $declarant_data = $row["declarant"];

            $filename0 = $row[$row_name[0]];
            $filecontent0 = $row[$row_content[0]];
            $filename1 = $row[$row_name[1]];
            $filecontent1 = $row[$row_content[1]];
            $filename2 = $row[$row_name[2]];
            $filecontent2 = $row[$row_content[2]];
            $filename3 = $row[$row_name[3]];
            $filecontent3 = $row[$row_content[3]];
            $filename4 = $row[$row_name[4]];
            $filecontent4 = $row[$row_content[4]];
            $filename5 = $row[$row_name[5]];
            $filecontent5 = $row[$row_content[5]];
            $path = "./tmp/";

?>
	<html>
		<head>
			<meta charset="utf-8">
			<base href="" target="_parent" />
			<script type="text/javascript">
			</script>
			<title>TAGAL海关报关信息系统</title>
			<style type="text/css">
				*{
					margin: 0px;
					padding: 0px;
				}
				.header{
					width: 100%;
					height: 80px;
					background-color: #006cb7;
				}
				.title{
					font-size: 50px;
					margin-left: 10px;
					color: black;
					border: none;
					line-height: 80px;
				}
				.logo{
					float: right;
					width:80px;
					margin-right: 10px;
				}
				.menu{
					width: 1800px;
					height: 40px;
					margin:0 auto;
					background-color: #f9f9f9;
				}
				.menu_list{
					list-style: none;
					margin-left: 45%;
					line-height: 40px;
					font-size: 30px;
				}
				.input_button1{
					float: left;
					width: 100px;
					height: 30px;
					margin-left: 10px;
					line-height: 20px;
					font-size: 17.5px;
				}
				.input_button2{
					width: 90px;
					height: 30px;
					float: right;
					margin-left: 30px;
					text-align: center;
					font-size: 17px;
				}
				.form1{
					width: 1800px;
					margin: 0 auto;
				}
				table.table_text {
					width: 1800px;
					font-family: verdana,arial,sans-serif;
					font-size:16px;
					border-collapse: collapse;
					}
				table.table_text th {
					background: #AACC99;
					border-width: 2px;
					padding-top: 10px;
					padding-bottom: 10px;
					border-style:solid;
					border-color: black;
				}
				table.table_text td {
					border-width: 2px;
					padding: 10px;
					border-style: solid;
					border-color: black;
				}
				table.table_attach {
					width: 1800px;
					font-family: verdana,arial,sans-serif;
					font-size:16px;
					border-collapse: collapse;
					}
				table.table_attach th {
					background: #AACC99;
					border-width: 2px;
					padding-top: 10px;
					padding-bottom: 10px;
					border-style:solid;
					border-color: black;
				}
				table.table_attach td {
					border-width: 2px;
					padding: 10px;
					border-style: solid;
					border-color: black;
				}
				.input_text3{
					width: 150px;
					height: 20px;
					font-size: 16px;
				}
				.select_option1{
					position: relative;
					width: 80px;
					text-align: center;
					height: 22px;
				}
				.openfile1{
					margin: 0 auto;
					border: solid 1px;
					width: 275px;
					text-align: center;
					height: 25px;
					font-size: 15px;
				}
                a{
                    font-size: 10px;
                }
			</style>
		</head>
		<body>
			<div class= "header">
				<a class="title">海关报关信息系统<img src="img/tagal_logo.png"  class="logo"></a>
			</div>
			<div class="menu">
				<a class="menu_list" >数据修改</a>
			</div><br><br>
			<form enctype="multipart/form-data" action="data_modify_save.php" method="post" class="form1">
				<input type="submit" id="save" value="保存" class="input_button2"><br><br>
				<table class="table_text">
					<tr>
						<th>订单号</th><th>报关单号</th><th>发票号</th><th>箱单号</th><th>运单号/提单号</th><th>运费合同</th>
						<th>运费(境外)</th><th>保险费</th><th>杂费(境外)</th><th>贸易条款</th><th>报关人</th>
					</tr>
					<tr>
						<td><input type="text" id="SAP_order" name="SAP_order" class="input_text3" readonly  value="<?php echo $SAP_order_data;?>" ></td>
						<td><input type="text" id="declaration_number" name="declaration_number" class="input_text3" readonly value="<?php echo $declaration_number_data;?>"></td>
						<td><input type="text" id="invoice_number" name="invoice_number" class="input_text3" value="<?php echo $invoice_number_data;?>"></td>
						<td><input type="text" id="package_number" name="package_number" class="input_text3" value="<?php echo $package_number_data ;?>"></td>
						<td><input type="text" id="shipment_number" name="shipment_number" class="input_text3" value="<?php echo $shipment_number_data;?>"></td>
						<td><input type="text" id="shipment_order" name="shipment_order" class="input_text3" value="<?php echo $shipment_order_data;?>"></td>
						<td><input type="text" id="shipment_fee" name="shipment_fee" class="input_text3" value="<?php echo $shipment_fee_data;?>"></td>
						<td><input type="text" id="insurance_fee" name="insurance_fee" class="input_text3" value="<?php echo $insurance_fee_data;?>"></td>
						<td><input type="text" id="other_fee" name="other_fee" class="input_text3" value="<?php echo $other_fee_data;?>"></td>
						<td><select id="IncoTerm" name="IncoTerm" class="select_option1">
                                <option value="<?php echo $IncoTerm_data;?>" selected><?php echo $IncoTerm_data;?></option>
                                <option value=""></option>
                                <option>CFR</option>
                                <option>CIF</option>
                                <option>DTD</option>
                                <option>DDP</option>
                                <option>EXW</option>
                                <option>FCA</option>
                                <option>FOB</option>
						</select></td>
						<td><select id="declarant" name="declarant" class="select_option1" value="<?php echo $declarant_data;?>">
                            <option value="<?php echo $declarant_data;?>" selected><?php echo $declarant_data;?></option>
                                <option></option>
                                <option>DHL</option>
                                <option>辽宁通惠</option>
                                <option>金盛报关行</option>
                                <option>中外运辽宁</option>
                            </select></td>
					</tr>
				</table><br>
				<table class="table_attach">
					<tr>
						<th>订单扫描件</th><th>报关单扫描件</th><th>发票扫描件</th><th>箱单扫描件</th><th>运单/提单扫描件</th><th>运费合同扫描件</th>
					</tr>
					<tr>
						<td><input type="file" id="SAP_order_attachment" name="upload[]" class="openfile1" accept=".jpg,.png,.pdf"><a>原始附件:</a><a href='<?php echo $path.$filename0;?>'target="_blank"><?php echo $filename0;?></a></td>
						<td><input type="file" id="declaration_attachment" name="upload[]" class="openfile1" accept=".jpg,.png,.pdf"><a>原始附件:</a><a href='<?php echo $path.$filename1;?>'target="_blank"><?php echo $filename1;?></a></td>
						<td><input type="file" id="invoice_attachment" name="upload[]" class="openfile1" accept=".jpg,.png,.pdf"><a>原始附件:</a><a href='<?php echo $path.$filename2;?>'target="_blank"><?php echo $filename2;?></a></td>
						<td><input type="file" id="package_number_attachment" name="upload[]" class="openfile1" accept=".jpg,.png,.pdf"><a>原始附件:</a><a href='<?php echo $path.$filename3;?>'target="_blank"><?php echo $filename3;?></a></td>
						<td><input type="file" id="shipment_number_attachment" name="upload[]" class="openfile1" accept=".jpg,.png,.pdf"><a>原始附件:</a><a href='<?php echo $path.$filename4;?>'target="_blank"><?php echo $filename4;?></a></td>
						<td><input type="file" id="shipment_order_attachment" name="upload[]" class="openfile1"  accept=".jpg,.png,.pdf"><a>原始附件:</a><a href='<?php echo $path.$filename5;?>'target="_blank"><?php echo $filename5;?></a></td>
					</tr>
				</table>
			</form><br><br>
		</body>
	</html>