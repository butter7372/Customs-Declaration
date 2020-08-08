<!DOCTYPE html>
<?php
    error_reporting(0);
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location:login.html");
        exit();
    }
 ?>
<html>
	<head>
		<meta charset="utf-8">
		<script type="text/javascript"></script>
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
			.search{
				width: 1800px;
				height: 40px;
				margin:0 auto;
				line-height: 40px;
				font-size: 20px;
			}
			.input_text1{
				float: left;
				height: 25px;
				margin-right: 25px;
				line-height: 20px;
				font-size: 20px;
				}
			.search_condition{
				float: left;
				height: 25px;
				margin-right: 25px;
				text-align: center;
				line-height: 30px;
				font-size: 20px;
			}
			.input_text2{
				float: left;
				height: 25px;
				line-height: 20px;
				font-size: 20px;
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
			.form2{
				width: 1800px;
				margin: 0 auto;
			}
			.openfile1{
				margin: 0 auto;
				border: solid 1px;
				width: 275px;
				text-align: center;
				height: 25px;
				font-size: 15px;
			}
			.table_display{
				width: 1800px;
				height: 400px;
				background-color: #f9f9f9;
				margin: 0 auto;
/* 				border-style: solid; */
				border-collapse: collapse;
				border-spacing: 0;
				table-layout: fixed;
			}
			.table_cell1{
				width: 90px;
				padding-left: 0px;
				padding-right: 5px;
				text-align: center;
				font-size: 12px;
				font-weight: bold;
				padding-top: 20px;
				display: table-cell;
				vertical-align: top;
			}
		</style>
	</head>
	<body>
		<div class= "header">
			<a class="title">海关报关信息系统<img src="img/tagal_logo.png"  class="logo"></a>
		</div>
		<div class="menu">
			<a class="menu_list" >数据查询</a>
		</div>
    	<br><br>
			<table class="table_display">
					<td class="table_cell1">修改</td>
					<td class="table_cell1">删除</td>
					<td class="table_cell1">订单号</td>
                    <td class="table_cell1">报关单号</td>
                    <td class="table_cell1">发票号</td>
                    <td class="table_cell1">箱单号</td>
                    <td class="table_cell1">运单号/提单号</td>
                    <td class="table_cell1">运费合同</td>
                    <td class="table_cell1">运费(境外)</td>
                    <td class="table_cell1">保险费</td>
                    <td class="table_cell1">杂费(境外)</td>
                    <td class="table_cell1">贸易条款</td>
                    <td class="table_cell1">报关人</td>
					<td class="table_cell1">订单扫描件</td>
					<td class="table_cell1">报关单扫描件</td>
					<td class="table_cell1">发票扫描件</td>
					<td class="table_cell1">箱单扫描件</td>
					<td class="table_cell1">运单/提单扫描件</td>
					<td class="table_cell1">运费合同扫描件</td>

			<?php
                $ID = $_GET{"ID"};
                $SAP_order_Str = $_POST{"SAP_order_search"};
                if(substr($SAP_order_Str,-2,2)=='45'){
                    $SAP_order_search=$SAP_order_Str;
                }
               if(strlen($SAP_order_Str)!=10){
                    $SAP_order_search=$SAP_order_Str;
                }
                $declaration_number_search = $_POST{"declaration_number_search"};
				$mydbhost = "localhost";
				$mydbuser = "zhangwei";
				$mydbpass = 'tagal&2016';
				$conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);
				mysqli_select_db($conn, 'customs_declaration');
				if(! $conn){
					die("connect error: " . mysqli_error($conn));
				}
				$queryR1 = mysqli_query($conn, "SELECT declaration.ID, declaration.SAP_order, declaration.declaration_number, declaration.invoice_number, 
													declaration.package_number, declaration.shipment_number, declaration.shipment_order, declaration.IncoTerm,
													declaration.declarant, declaration.shipment_fee, declaration.insurance_fee, declaration.other_fee,
													declaration_attachment.modify_time, declaration_attachment.SAP_order_attachment_name, 
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
												FROM declaration LEFT JOIN declaration_attachment on declaration.ID = declaration_attachment.ID
												WHERE declaration.SAP_order = '$SAP_order_search' OR declaration.declaration_number = '$declaration_number_search'");

				while($row=mysqli_fetch_assoc($queryR1)){
					echo"<tr>
							<td style='color:#0055AA; width: 65px; font-size: 14PX; padding-left:34px'><a href='data_modify.php?ID={$row["ID"]}'>修改</a></td>
							<td style='color:#0055AA; width: 65px; font-size: 14PX; padding-left:34px''><a href='delete_confirm.php?ID={$row["ID"]}'>删除</a></td>
						    <td style='color:#0055AA; font-size: 12PX; width: 80px; text-align: center;'><a href='webservice.php?ID={$row["SAP_order"]}'target='_blank' >".$row["SAP_order"]."</a></td>
							<td style='color:#0055AA; font-size: 14PX; width: 65px; text-align: center;'>".$row["declaration_number"]."</td>
							<td style='color:#0055AA; font-size: 14PX; width: 65px; text-align: center;'>".$row["invoice_number"]."</td>
							<td style='color:#0055AA; font-size: 14PX; width: 65px; text-align: center;'>".$row["package_number"]."</td>
							<td style='color:#0055AA; font-size: 14PX; width: 65px; text-align: center;'>".$row["shipment_number"]."</td>
							<td style='color:#0055AA; font-size: 14PX; width: 65px; text-align: center;'>".$row["shipment_order"]."</td>
							<td style='color:#0055AA; font-size: 14PX; width: 65px; text-align: center;'>".$row["shipment_fee"]."</td>
							<td style='color:#0055AA; font-size: 14PX; width: 65px; text-align: center;'>".$row["insurance_fee"]."</td>
							<td style='color:#0055AA; font-size: 14PX; width: 65px; text-align: center;'>".$row["other_fee"]."</td>
							<td style='color:#0055AA; font-size: 14PX; width: 65px; text-align: center;'>".$row["IncoTerm"]."</td>
							<td style='color:#0055AA; font-size: 14PX; width: 65px; text-align: center;'>".$row["declarant"]."</td>";

					$row_name = array('SAP_order_attachment_name', 'declaration_attachment_name', 'invoice_attachment_name', 'package_number_attachment_name',
					 'shipment_number_attachment_name', 'shipment_order_attachment_name');
					$row_content = array('SAP_order_attachment_content', 'declaration_attachment_content', 'invoice_attachment_content',
					 'package_number_attachment_content', 'shipment_number_attachment_content', 'shipment_order_attachment_content');
					for($x=0; $x<6; $x++){
						$filename = $row[$row_name[$x]];
						$filecontent = $row[$row_content[$x]];
						$path = "./tmp/";
						fopen($filename,'w');
						unlink($filename);
						$read = fopen($path.$filename, 'w');
						fwrite($read, $filecontent);
						$reader = fopen($filename, 'r');
						if($filename){
							echo"
							<td style='color:#0055AA; width: 65px; text-align: center; font-size: 14PX;'><a href=$path$filename>附件</a></td>";

						}
						else{
							echo"
							<td style=' color:#0055AA;  width: 65px; text-align: center; font-size: 14PX;'><a>-</a></td>";
						}
					}
					echo "</tr>";
				}
				?>
		</table>
	</body>
</html>
