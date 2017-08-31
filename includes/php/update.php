<?php
include_once'config.php';
include_once'nocInt.php';
include_once'memInt.php';
$NOC=new NOCface($nocAddr,$nocUser,$nocPass);
$cache=new Cache($memAddr,$memPort,$memExpi);
function getAllSeries(){
	global$NOC;
	global$cache;
	global$timeOffset;
	global$seriesNames;
	foreach($seriesNames as $graph => $pltfrm){
		foreach($pltfrm as $key => $value){
			if($graph=="expMan"){$timeOffset=24*60*60;}
			$temp=$NOC->mySeries($value['DN'],$timeOffset,$value['value'],$value['profile']);
			$cache->set($graph."_".$key,$temp);
			$NOC->allSeries=null;
		}
	}
}
function flood($dn,$tree,$depth){
	global$NOC;
	global$cache;
	$depth=$depth+1;
	if($depth<5){
	$result=$NOC->getChilds($dn);
	if(isset($result['DName'])){
		$tree=array("name"=>$result['displayName']);
		$tree+=array("condition"=>$result['condition']);
		$tree+=array("dname"=>$result['DName']);
		$childRight='rightRelationshipInfo';
		if(isset($result[$childRight]['item'])){
			if(isset($result[$childRight]['item']['relatedDName'])){
				$tree+=array("children"=>array(0=>""));
				$tree['children'][0]=flood($result[$childRight]['item']['relatedDName'],$tree['children'][0],$depth);
				if(empty($tree['children'][0])){unset($tree['children']);}
			}
			else{
				if($childRight == 'rightRelationshipInfo'){
					$tree+=array("children"=>array());
					foreach($result[$childRight]['item']as$key=>$value){
						$tree['children']+=array($key=>"");
						$tree['children'][$key]=flood($value['relatedDName'],$tree['children'][$key],$depth);
						if($tree['children'][$key]==''){unset($tree['children'][$key]);}
					}
					if(empty($tree['children'])){unset($tree['children']);}
				}
				else{
					$tree+=array("children"=>array());
					foreach($result[$childRight]['item']as$key=>$value){
						$tree['children']+=array($key=>"");
						$tree['children'][$key]=flood($value,$tree['children'][$key],$depth);
						if($tree['children'][$key]==''){unset($tree['children'][$key]);}
					}
					if(empty($tree['children'])){unset($tree['children']);}
				}
			}
		}
	}
		
	};
	return$tree;
}
$tree=array();
getAllSeries();
$tree=flood($root,$tree,0);
echo "tree<br>";
print_r($tree);
$cache->set("root",$tree);
$tree=array();
$tree=flood($expMan,$tree,0);
echo "<br>tree<br>";
print_r($tree);
$cache->set("expMan",$tree);
$NOC->untie_from_NOC();
//conexión a base de datos postgres en 10.57.220.193
$conn_string = "host=10.57.220.193 dbname=uif user=nocuser password=n0v3ll";
$dbconn4 = pg_connect($conn_string) or die('connection failed');

?>