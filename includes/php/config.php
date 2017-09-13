<?php
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
ini_set('html_errors','1');
ini_set('log_errors','1');
//ini_set('max_input_time','60');
//ini_set('output_buffering','4096');
ini_set('track_errors','1');
ini_set('variables_order','GPCS');
error_reporting(E_ALL ^ E_DEPRECATED);
// NOC connection parameters
date_default_timezone_set("America/Mexico_City");
$nocAddr = 'http://10.56.166.75:8084/wsapi/services/Moswsapi_1_1?wsdl';
$nocUser = 'admin';
$nocPass = 'formula';
$nocPass = base64_encode(hash('md5',$nocPass,true));
$memAddr = 'localhost';
$memPort = '11411';
$memExpi = 4;
$root = "admin_automation_server=Identidades/admin_analyzer=DyP+Operacion/root=Organizations";
$timeOffset = 30*24*60*60;
?>