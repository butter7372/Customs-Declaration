<?php
$method = "POST";
$url = "http://open.6api.net/isbns";
$headers = NULL;
$params = array(
    "appkey" => "56c9afc7884fc908",
        "sub" => "9787521706520"
);
$result = api_curl($method, $url, $headers, $params);
if ($result) {
    $body = json_decode($result["body"], TRUE);
    $status_code = $body["status"];
    if ($status_code == "200") {   //有个别接口计费状态码为其他;请注意甄别
        //状态码为200, 说明请求成功
        echo "请求成功：" . $result["body"];
    } else {
        //状态码非200, 说明请求失败
        echo "请求失败：" . $result["bod"];
    }
    } else {
        //返回内容异常，发送请求失败，以下可根据业务逻辑自行修改
        echo "发送请求失败";
    }

/**
* 转发请求到目的主机
* @param $method string 请求方法
* @param $URL string 请求地址
* @param null $headers 请求头
* @param null $param 请求参数
* @return array|bool
*/
function api_curl(&$method, &$URL, &$headers = NULL, &$param = NULL)
{
    $require = curl_init($URL);
    $isHttps = substr($URL, 0, 8) == "https://" ? TRUE : FALSE;
    switch ($method) {
        case "GET":
            curl_setopt($require, CURLOPT_CUSTOMREQUEST, "GET");
            break;
        case "POST":
            curl_setopt($require, CURLOPT_CUSTOMREQUEST, "POST");
            break;
        default:
            return FALSE;
    }
    if ($param) {
        curl_setopt($require, CURLOPT_POSTFIELDS, $param);
    }
    if ($isHttps) {
        curl_setopt($require, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($require, CURLOPT_SSL_VERIFYHOST, 2);
    }
    if ($headers) {
        curl_setopt($require, CURLOPT_HTTPHEADER, $headers);
    }

    curl_setopt($require, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($require, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($require, CURLOPT_HEADER, TRUE);
    $response = curl_exec($require);
    $headerSize = curl_getinfo($require, CURLINFO_HEADER_SIZE);
    curl_close($require);
    if ($response) {
        $header = substr($response, 0, $headerSize);
        $body = substr($response, $headerSize);
        $bodyTemp = json_encode(array(
        0 => $body));
    $bodyTemp = str_replace("﻿", "", $bodyTemp);
    $bodyTemp = json_decode($bodyTemp, TRUE);
    $body = trim($bodyTemp[0]);
    print_r(gettype($bodyTemp));
    print_r($bodyTemp);
    foreach ($bodyTemp as $key=>$value){
        print_r($value);
    }

    $respondHeaders = array();
    $header_rows = array_filter(explode(PHP_EOL, $header), "trim");
    foreach ($header_rows as $row) {
        $keylen = strpos($row, ":");
        if ($keylen) {
            $respondHeaders[] = array("key" => substr($row, 0, $keylen), "value" => trim(substr($row, $keylen + 1)));
        }
    }
    return array(
    "headers" => $respondHeaders,
    "body" => $body);
    }
    else {
    return FALSE;
    }
}

