<?php
if(isset($_POST)&&!empty($_POST)){
	include_once'config.php';
	include_once'memInt.php';
	$cache=new Cache($memAddr,$memPort,$memExpi);
	function fetchCache($data){
		global$cache;
		$test=array();
		$test=$cache->get($data);
		return json_encode($test);
	}
	function getSeries($dn,$property){
		global$cache;
		$series=array();
		$series=$cache->get($dn."_".$property);
		foreach ($series as $key => $value) {
			$series[$key][0] = (strtotime($value['timestamp'])*1000)-(6*60*60*1000);
			$series[$key][1] = intval($value['value']);
			unset($series[$key]['timestamp']);
			unset($series[$key]['value']);
		}
		function cmp($a,$b){return strcmp($a[0],$b[0]);}
		usort($series,"cmp");
		return json_encode($series);
	}
	if(isset($_POST['data'])&&!empty($_POST['data'])){
		echo fetchCache($_POST['data']);
	}
	elseif(isset($_POST['series'])&&!empty($_POST['series'])){
		echo getSeries($_POST['series'],$_POST['property']);
	}
}
?>