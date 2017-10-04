<?php
if(isset($_POST)&&!empty($_POST)){
	include_once'config.php';
	include_once'memInt.php';
	$cache=new Cache($memAddr,$memPort,$memExpi);
	function getSeries($dn,$property,$offset){
		global$cache;
		$series=array();
		$series=$cache->get($dn."_".$property);
		foreach ($series as $key => $value) {
			$series[$key][0] = (strtotime($value['timestamp'])*1000);
			$series[$key][1] = intval($value['value']);
			unset($series[$key]['timestamp']);
			unset($series[$key]['value']);
		}
		function cmp($a,$b){return strcmp($a[0],$b[0]);}
		usort($series,"cmp");
		return json_encode($series);
	}
	if(isset($_POST['series'])&&!empty($_POST['series'])){
		echo getSeries($_POST['series'],$_POST['property'],$_POST['offset']);
	}
}
?>