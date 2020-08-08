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
			.download{
				padding-top: 10px;
				float: right;
				width:120px;
				margin-right: 50px;
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
                width: 120px;
                padding-left: 0px;
                padding-right: 5px;
                text-align: center;
                font-size: 12px;
                font-weight: bold;
                padding-top: 20px;
                display: table-cell;
                vertical-align: top;
            }
            .table_cell2{
                width: 160px;
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
            <a class="menu_list" >SAP订单信息</a>
        </div>
		<a class="download" id="download-click">导出Excel表格</a>
        <br><br>
        <table class="table_display" id="download-content">
            <td class="table_cell1">订单号</td>
            <td class="table_cell2">供应商/客户名称</td>
            <td class="table_cell1">订单行项</td>
            <td class="table_cell1">物料号</td>
            <td class="table_cell2">物料描述</td>
            <td class="table_cell1">订量</td>
            <td class="table_cell1">单位</td>
            <td class="table_cell1">单价</td>
            <td class="table_cell1">总价</td>
            <td class="table_cell1">币种</td>

           <?php
               error_reporting(0);
               $SAP_Order = $_GET{"ID"};
               $SAP_Order_sub2=substr($SAP_Order, 0,2);
               $SAP_Order_len=strlen($SAP_Order);
               header("Content-Type: text/html;charset=utf-8");
               $wsdl = 'http://r3-ap-devqas.tagal.com.cn:8000/sap/bc/srt/wsdl/flv_10002A111AD1/bndg_url/sap/bc/srt/rfc/sap/zpo_so_display/800/zpo_so_display_web/zpo_so_display_web?sap-client=800';
               $SOAP_CONFIG = array(
                         'trace' =>true,
                         'soap_version'=>SOAP_1_2,
                         'connection_timeout' => 50,
                         'encoding' => 'UTF-8',
                         'cache_wsdl' => WSDL_CACHE_NONE,
                         'keep_alive' => false
                     );
               if($SAP_Order_sub2 =='45'){
                   $SAP_Order_PO=$SAP_Order;
                   $parameters=array('ET_DETAIL'=>'ET_DETAIL','ET_PO'=>'ET_PO','IM_VBELN'=>$SAP_Order_PO);
                    try {
                        $client = new SoapClient('SAPWebService.wsdl'); //调用sap里的接口
                        /*                    var_dump($client->__getFunctions());
                                            var_dump($client->__getTypes());*/

                        $resultobj = $client->Z_RFC_ORDERDISPLAY($parameters);
                        $currentresultobj = current(array($resultobj));
                        $resultarr = json_decode(json_encode($currentresultobj), true);
                        /*         print_r($resultarr);*/
                        $resultarrlen = count($resultarr['ET_DETAIL']['item']['VBELN']);
                        /*         print_r($resultarrlen);*/
                        foreach ($resultarr['ET_PO']['item'] as $v3) {
                            $PO = $v3['PO_NUMBER'];
                            $Vendor = $v3['VENDOR'];
                            $PO_Item = $v3['PO_ITEM'];
                            $Material_PO = trim($v3['MATERIAL'],'0');
                            $Description_PO = $v3['MAT_DESC'];
                            $Qty_PO = $v3['PO_QTY'];
                            $Unit_PO = $v3['MEINS'];
                            $Unit_price_PO = $v3['NETPR'];
                            $Total_price_PO = $v3['NETWR'];
                            $Currency_PO = $v3['WAERS'];
                            echo "<tr>
                                       <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$PO</a></td>
                                       <td style='color:#0055AA; font-size: 12PX; width: 160px text-align: center;'><a>$Vendor</a></td>
                                       <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$PO_Item</a></td>
                                       <td style='color:#0055AA; font-size: 12PX; width: 60px; text-align: center;'><a>$Material_PO</a></td>
                                       <td style='color:#0055AA; font-size: 12PX; width: 160px; text-align: center;'><a>$Description_PO</a></td>
                                       <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$Qty_PO</a></td>
                                       <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$Unit_PO</a></td>
                                       <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$Unit_price_PO</a></td>
                                       <td style='color:#0055AA; font-size: 12PX; width: 60px; text-align: center;'><a>$Total_price_PO</a></td>
                                       <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$Currency_PO</a></td>
                                   </tr>";
                        }
                    }
                    catch (Exception $e) {
                       print $e->getMessage();
                    }
               }

               if($SAP_Order_len!=10){
                   $SAP_Order_SO=sprintf('%010s',$SAP_Order);
                   $parameters=array('ET_DETAIL'=>'ET_DETAIL','ET_PO'=>'ET_PO','IM_VBELN'=>$SAP_Order_SO);
                   try {
                       $client = new SoapClient('SAPWebService.wsdl'); //调用sap里的接口
                       /*                    var_dump($client->__getFunctions());
                                           var_dump($client->__getTypes());*/

                       $resultobj = $client->Z_RFC_ORDERDISPLAY($parameters);
                       $currentresultobj = current(array($resultobj));
                       $resultarr = json_decode(json_encode($currentresultobj), true);
                       /*         print_r($resultarr);*/
                       $resultarrlen = count($resultarr['ET_DETAIL']['item']['VBELN']);
                       /*         print_r($resultarrlen);*/
                       if ($resultarrlen == '1') {
                           foreach ($resultarr['ET_DETAIL'] as $v1) {
                               $SO = trim($v1['VBELN'],'0');
                               $SO_Item = $v1['POSNR'];
                               $Customer = $v1['NAME1'];
                               $Material_SO = trim($v1['MATNR'],'0');
                               $Description_SO = $v1['ARKTX'];
                               $Qty_SO = $v1['KWMENG'];
                               $Unit_SO = $v1['VRKME'];
                               $Unit_price_SO = $v1['NETPR'];
                               $Total_price_SO = $v1['NETWR'];
                               $Currency_SO = $v1['WAERK'];
                               echo "<tr>
                                        <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$SO</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 160px; text-align: center;'><a>$Customer</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$SO_Item</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 60px; text-align: center;'><a>$Material_SO</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 160px; text-align: center;'><a>$Description_SO</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$Qty_SO</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$Unit_SO</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$Unit_price_SO</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 60px; text-align: center;'><a>$Total_price_SO</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$Currency_SO</a></td>
                                    </tr>";
                           }
                       }
                       if ($resultarrlen != '1') {
                           foreach ($resultarr['ET_DETAIL']['item'] as $v2) {
                               $SO = trim($v2['VBELN'],'0');
                               $SO_Item = $v2['POSNR'];
                               $Customer = trim($v2['NAME1'],'0');
                               $Material_SO = trim($v2['MATNR'],'0');
                               $Description_SO = $v2['ARKTX'];
                               $Qty_SO = $v2['KWMENG'];
                               $Unit_SO = $v2['VRKME'];
                               $Unit_price_SO = $v2['NETPR'];
                               $Total_price_SO = $v2['NETWR'];
                               $Currency_SO = $v2['WAERK'];
                               echo "<tr>
                                        <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$SO</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 160px text-align: center;'><a>$Customer</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$SO_Item</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 60px; text-align: center;'><a>$Material_SO</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 160px; text-align: center;'><a>$Description_SO</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$Qty_SO</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$Unit_SO</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$Unit_price_SO</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 60px; text-align: center;'><a>$Total_price_SO</a></td>
                                        <td style='color:#0055AA; font-size: 12PX; width: 50px; text-align: center;'><a>$Currency_SO</a></td>
                                    </tr>";
                           }
                       }
                   }
                   catch
                       (Exception $e) {
                           print $e->getMessage();
                       }
                   }
           ?>
		</table>
	<script type="text/javascript">
		var html = "<html><head><meta charset='utf-8' /></head><body>" + document.getElementById("download-content").outerHTML + "</body></html>";
		var blob = new Blob([html], {
			type: "application/vnd.ms-excel"
		});
		var a = document.getElementById("download-click");
		a.href = URL.createObjectURL(blob);
		a.download = "海关报关表.xls";
	</script>
	</body>
</html>