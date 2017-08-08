<?php
error_reporting(E_ALL);
if(isset($_POST)&&!empty($_POST)){
	include_once'config.php';
	include_once'nocInt.php';
	$NOC=new NOCface($nocAddr,$nocUser,$nocPass);
	function getServers($dn,$tree){
		global$NOC;
		$alarms=$NOC->getAlarms($dn);
		if(!empty($alarms)){
			foreach($alarms as$alarmKey=>$alarmValue){
				$tree+=array($alarmKey=>array("alarm"=>"","value"=>"","status"=>$alarmValue['severity']));
				foreach($alarmValue['fields']['item'] as$propertyKey=>$propertyValue){
					if($propertyValue['name']=="Description"){$tree[$alarmKey]['value']=$propertyValue['value'];}
					elseif($propertyValue['name']=="service-key"){$tree[$alarmKey]['alarm']=$propertyValue['value'];}
				}
			}
		}
		return$tree;
	}
	if(isset($_POST['dn'])&&!empty($_POST['dn'])){
		$tree=array();
		echo json_encode(getServers($_POST['dn'],$tree));
	}
	$NOC->untie_from_NOC();
}
?>