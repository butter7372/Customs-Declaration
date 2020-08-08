<?php

phpinfo();
/*$obj = new COM("server.object");
$workbook = "D:\phpstudy_pro\WWW\1.xls";
$word = new COM("word.application") or die("Unable to instanciate Word");
print "ioaded Word, version {$word->Version}\n";
//将其置前
$word->Visible = 1;
//打开一个空文档
$word->Documents->Add();
//随便做些事情
$word->Selection->TypeText("This is a test...");
$word->Documents[1]->SaveAs("Useless test.doc");
//关闭 word
$word->Quit();
//释放对象
$word->Release();
$word = null;*/
/*
$sap = new COM("word.application");
/*$conn = objBAPIControl.Connection；*/
/*$sap = new saprfc(array(
    "logindata"=>array(
        "ASHOST"=>"10.112.6.4",		// 应用服务器地址
        "SYSNR"=>"00",				// 实例编号
        "CLIENT"=>"800",			// client
        "USER"=>"zhang05",			// 用户名
        "PASSWD"=>"wanghui&2016",   // 密码
        "CODEPAGE"=>"8300"
    ),
    "show_errors"=>false,
    "debug"=>false)) ;*/
/*function OrderInfo($param, &$client = null) {
    if (!isset($client)) {
        $options = array('exceptions' => true, 'trace' => true);
        $options['features'] = SOAP_SINGLE_ELEMENT_ARRAYS;
        $options['proxy_host'] = 'proxy'; $options['proxy_port'] = 8000;
        $options['login'] = 'zhang05'; $options['password'] = 'wanghui&2016';
        $client = new SoapClient('http://r3-ap-devqas.tagal.com.cn:8000/sap/bc/srt/wsdl/flv_10002A101AD1/bndg_url/sap/bc/srt/rfc/sap/zrfc_info001/800/zrfc_info001/zrfc_info001?sap-client=800', $options);
    }
    try{
        $res = $client->OrderInfo($param);
    }
    catch( SoapFault $e ){
        echo $e->faultstring;
    }
    return $res;
}*/
?>