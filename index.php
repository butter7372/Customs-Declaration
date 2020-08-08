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
		<base href="" target="_parent" />
		<script type="text/javascript">
			function input_enable(){
				document.getElementById('SAP_order').removeAttribute('disabled')
				document.getElementById('SAP_order_attachment').removeAttribute('disabled')
				document.getElementById('declaration_number').removeAttribute('disabled')
				document.getElementById('declaration_attachment').removeAttribute('disabled')
				document.getElementById('invoice_number').removeAttribute('disabled')
				document.getElementById('invoice_attachment').removeAttribute('disabled')
				document.getElementById('package_number').removeAttribute('disabled')
				document.getElementById('package_number_attachment').removeAttribute('disabled')
				document.getElementById('shipment_number').removeAttribute('disabled')
				document.getElementById('shipment_number_attachment').removeAttribute('disabled')
				document.getElementById('shipment_order').removeAttribute('disabled')
				document.getElementById('shipment_order_attachment').removeAttribute('disabled')
				document.getElementById('IncoTerm').removeAttribute('disabled')
				document.getElementById('declarant').removeAttribute('disabled')
				document.getElementById('shipment_fee').removeAttribute('disabled')
				document.getElementById('insurance_fee').removeAttribute('disabled')
				document.getElementById('other_fee').removeAttribute('disabled')
				document.getElementById('SAP_order').value=''
				document.getElementById('SAP_order_attachment').value=''
				document.getElementById('declaration_number').value=''
				document.getElementById('declaration_attachment').value=''
				document.getElementById('invoice_number').value=''
				document.getElementById('invoice_attachment').value=''
				document.getElementById('package_number').value=''
				document.getElementById('package_number_attachment').value=''
				document.getElementById('shipment_number').value=''
				document.getElementById('shipment_number_attachment').value=''
				document.getElementById('shipment_order').value=''
				document.getElementById('shipment_order_attachment').value=''
				document.getElementById('IncoTerm').value=''
				document.getElementById('declarant').value=''
				document.getElementById('shipment_fee').value=''
				document.getElementById('insurance_fee').value=''
				document.getElementById('other_fee').value=''
				jQuery('#').removeAttr('disabled')
                input_enable()
			}
		</script>
		<script>
			function input_disable(){
				document.getElementById('SAP_order').setAttribute('disabled',true)//
				document.getElementById('SAP_order_attachment').setAttribute('disabled',true)
				document.getElementById('declaration_number').setAttribute('disabled',true)
				document.getElementById('declaration_attachment').setAttribute('disabled',true)
				document.getElementById('invoice_number').setAttribute('disabled',true)
				document.getElementById('invoice_attachment').setAttribute('disabled',true)
				document.getElementById('package_number').setAttribute('disabled',true)
				document.getElementById('package_number_attachment').setAttribute('disabled',true)
				document.getElementById('shipment_number').setAttribute('disabled',true)
				document.getElementById('shipment_number_attachment').setAttribute('disabled',true)
				document.getElementById('shipment_order').setAttribute('disabled',true)
				document.getElementById('shipment_order_attachment').setAttribute('disabled',true)
				document.getElementById('IncoTerm').setAttribute('disabled',true)
				document.getElementById('declarant').setAttribute('disabled',true)
				document.getElementById('shipment_fee').setAttribute('disabled',true)
				document.getElementById('insurance_fee').setAttribute('disabled',true)
				document.getElementById('other_fee').setAttribute('disabled',true)
				jQuery('#').setAttribute('disabled')
			}
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
				width: 100%;
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
/* 				table-layout: fixed; */
			}
			.table_cell1{
				width: 60px;
				text-align: center;
				font-size: 12px;
				font-weight: bold;
				padding-top: 20px;
				vertical-align: top;
			}
			.table_cell2{
				width: 80px;
				text-align: center;				
				font-size: 12px;
				font-weight: bold;
				padding-top: 20px;
				vertical-align: top;
			}
			.table_cell3{
				width: 80px;
				text-align: center;				
				font-size: 12px;
				font-weight: bold;
				padding-right: 20px;
				padding-top: 20px;
				vertical-align: top;
			}
		</style>
	</head>
	<body>
		<script type="text/javascript">
		!function (e, t, a) {
		function r() {
		for (var e = 0; e < s.length; e++) s[e].alpha <= 0 ? (t.body.removeChild(s[e].el), s.splice(e, 1)) : (s[e].y--, s[e].scale += .004, s[e].alpha -= .013, s[e].el.style.cssText = "left:" + s[e].x + "px;top:" + s[e].y + "px;opacity:" + s[e].alpha + ";transform:scale(" + s[e].scale + "," + s[e].scale + ") rotate(45deg);background:" + s[e].color + ";z-index:99999");
		requestAnimationFrame(r)
		}
		function n() {
		var t = "function" == typeof e.onclick && e.onclick;
		e.onclick = function (e) {
		t && t(), o(e)
		}
		}
		function o(e) {
		var a = t.createElement("div");
		a.className = "heart", s.push({
		el: a,
		x: e.clientX - 5,
		y: e.clientY - 5,
		scale: 1,
		alpha: 1,
		color: c()
		}), t.body.appendChild(a)
		}
		function i(e) {
		var a = t.createElement("style");
		a.type = "text/css";
		try {
		a.appendChild(t.createTextNode(e))
		} catch (t) {
		a.styleSheet.cssText = e
		}
		t.getElementsByTagName("head")[0].appendChild(a)
		}
		function c() {
		return "rgb(" + ~~(255 * Math.random()) + "," + ~~(255 * Math.random()) + "," + ~~(255 * Math.random()) + ")"
		}
		var s = [];
		e.requestAnimationFrame = e.requestAnimationFrame || e.webkitRequestAnimationFrame || e.mozRequestAnimationFrame || e.oRequestAnimationFrame || e.msRequestAnimationFrame || function (e) {
		setTimeout(e, 1e3 / 60)
		}, i(".heart{width: 10px;height: 10px;position: fixed;background: #f00;transform: rotate(45deg);-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);}.heart:after,.heart:before{content: '';width: inherit;height: inherit;background: inherit;border-radius: 50%;-webkit-border-radius: 50%;-moz-border-radius: 50%;position: fixed;}.heart:after{top: -5px;}.heart:before{left: -5px;}"), n(), r()
		}(window, document);
		</script>
		<div class= "header">
			<a class="title">海关报关信息系统<img src="img/tagal_logo.png"  class="logo"></a>
		</div>
		<div class="menu">
			<a class="menu_list" >数据查询及录入</a>
		</div>
        <form action="search.php" method="post" target="_parent">
            <div class="search">
		    	<input type="text" name="SAP_order_search" id="SAP_order_search" value="请输入订单号" class="input_text1"
		    	onfocus="javascript:if(this.value=='请输入订单号'||this.value!='')this.value=''"
		    	onblur="javascript:if (this.value=='')this.value='请输入订单号'">
		    	<p class="search_condition">或</p>
		    	<input type="text" name="declaration_number_search" id="declaration_number_search" value="请输入报关单号" class="input_text2"
		    	onfocus="javascript:if(this.value=='请输入报关单号'||this.value!='')this.value=''"
		    	onblur="javascript:if (this.value=='')this.value='请输入报关单号'">

		    	<input type="submit" value="查询" class="input_button1">
		    </div>
        </form>
		<form enctype="multipart/form-data" action="data_save.php"  target="_parent" method="post" class="form1">
			<input type="submit" id="save" value="保存" class="input_button2">
			<input type="button" name="" id="" value="添加" class="input_button2" onclick="input_enable()"><br><br>
			<table class="table_text">
				<tr>
					<th>订单号</th><th>报关单号</th><th>发票号</th><th>箱单号</th><th>运单号/提单号</th><th>运费合同</th>
					<th>运费(境外)</th><th>保险费</th><th>杂费(境外)</th><th>贸易条款</th><th>报关人</th>
				</tr>
				<tr>
					<td><input type="text" id="SAP_order" name="SAP_order" class="input_text3" required="required" disabled='disabled' maxlength="10" ></td>
					<td><input type="text" id="declaration_number" name="declaration_number" class="input_text3" required="required" disabled='disabled'></td>
                    <td><input type="text" id="invoice_number" name="invoice_number" class="input_text3" disabled='disabled'></td>
                    <td><input type="text" id="package_number" name="package_number" class="input_text3" disabled='disabled'></td>
					<td><input type="text" id="shipment_number" name="shipment_number" class="input_text3" disabled='disabled'></td>
					<td><input type="text" id="shipment_order" name="shipment_order" class="input_text3" disabled='disabled'></td>
					<td><input type="number" id="shipment_fee" name="shipment_fee" class="input_text3"  disabled='disabled'></td>
					<td><input type="number" id="insurance_fee" name="insurance_fee" class="input_text3" disabled='disabled'></td>
					<td><input type="number" id="other_fee" name="other_fee" class="input_text3"  disabled='disabled'></td>
					<td><select id="IncoTerm" name="IncoTerm" class="select_option1" disabled='disabled'>
						    <option value=""></option>
						    <option>CFR</option>
						    <option>CIF</option>
						    <option>DTD</option>
                            <option>DDP</option>
                            <option>EXW</option>
                            <option>FCA</option>
                            <option>FOB</option>
                        </select></td>
					<td><select id="declarant" name="declarant" class="select_option1" disabled='disabled'>
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
				<tr>
				<tr>
					<td><input type="file" id="SAP_order_attachment" name="upload[]" class="openfile1" disabled='disabled' accept=".jpg,.png,.pdf"></td>
					<td><input type="file" id="declaration_attachment" name="upload[]" class="openfile1" disabled='disabled' accept=".jpg,.png,.pdf"></td>
					<td><input type="file" id="invoice_attachment" name="upload[]" class="openfile1" disabled='disabled' accept=".jpg,.png,.pdf"></td>
					<td><input type="file" id="package_number_attachment" name="upload[]" class="openfile1" disabled='disabled' accept=".jpg,.png,.pdf"></td>
					<td><input type="file" id="shipment_number_attachment" name="upload[]" class="openfile1" disabled='disabled' accept=".jpg,.png,.pdf"></td>
					<td><input type="file" id="shipment_order_attachment" name="upload[]" class="openfile1" disabled='disabled' accept=".jpg,.png,.pdf"></td>
				</tr>
			</table>
		</form>
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
					<td class="table_cell2">运单/提单扫描件</td>
					<td class="table_cell3">运费合同扫描件</td>
					
				<?php
					error_reporting(0);
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
													WHERE declaration.SAP_order = declaration_attachment.SAP_order ORDER BY declaration.modify_time desc
													LIMIT 6 ");
	
					while($row=mysqli_fetch_assoc($queryR1)){
						echo"<tr>
								<td style='color:#0055AA; width: 60px; font-size: 12PX; padding-left:34px'><a href='data_modify.php?ID={$row["ID"]}' >修改</a></td>
								<td style='color:#0055AA; width: 60px; font-size: 12PX; padding-left:34px''><a href='delete_confirm.php?ID={$row["ID"]}'>删除</a></td>
								<td style='color:#0055AA; font-size: 12PX; width: 80px; text-align: center;'><a href='webservice.php?ID={$row["SAP_order"]}' target='_blank'>".$row["SAP_order"]."</a></td>
								<td style='color:#0055AA; font-size: 12PX; width: 80px; text-align: center;'>".$row["declaration_number"]."</td>
								<td style='color:#0055AA; font-size: 12PX; width: 80px; text-align: center;'>".$row["invoice_number"]."</td>
								<td style='color:#0055AA; font-size: 12PX; width: 80px; text-align: center;'>".$row["package_number"]."</td>
								<td style='color:#0055AA; font-size: 12PX; width: 80px; text-align: center;'>".$row["shipment_number"]."</td>
								<td style='color:#0055AA; font-size: 12PX; width: 80px; text-align: center;'>".$row["shipment_order"]."</td>
								<td style='color:#0055AA; font-size: 12PX; width: 80px; text-align: center;'>".$row["shipment_fee"]."</td>
								<td style='color:#0055AA; font-size: 12PX; width: 80px; text-align: center;'>".$row["insurance_fee"]."</td>
								<td style='color:#0055AA; font-size: 12PX; width: 80px; text-align: center;'>".$row["other_fee"]."</td>
								<td style='color:#0055AA; font-size: 12PX; width: 80px; text-align: center;'>".$row["IncoTerm"]."</td>
								<td style='color:#0055AA; font-size: 12PX; width: 80px; text-align: center;'>".$row["declarant"]."</td>";
	
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
								<td style='color:#0055AA; width: 75px; text-align: center; font-size: 12PX;'><a href=$path$filename>附件</a></td>";
	
							}
							else{
								echo"
								<td style=' color:#0055AA;  width: 75px; text-align: center; font-size: 12PX;'><a>-</a></td>";
							}
						}
						echo "</tr>";
					}
				?>
		</table>
		
	</body>
</html>
