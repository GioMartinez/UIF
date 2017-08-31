<?php
include_once'config.php';
include_once'nocInt.php';
include_once'memInt.php';
error_reporting(E_ALL);
$NOC=new NOCface($nocAddr,$nocUser,$nocPass);
$cache=new Cache($memAddr,$memPort,$memExpi);
function getAllSeries(){
	global$NOC;
	global$cache;
	global$timeOffset;
	global$seriesNames;
	foreach($seriesNames as $graph => $pltfrm){
		foreach($pltfrm as $key => $value){
			$last = $cache->get($graph."_".$key);
			$temp=$NOC->mySeries($value['DN'],$timeOffset,$value['value'],$value['profile']);
			$cache->set($graph."_".$key,$temp);
			$NOC->allSeries=null;
		}
	}
}
//getAllSeries();
$NOC->untie_from_NOC();
$conn_string = "host=10.57.220.193 dbname=uif user=nocuser password=n0v3ll";
$db1conn = pg_connect($conn_string) or die('connection failed');
$resultFiel = pg_query($db1conn, "select distinct 'FielCont' as nombre, now()::timestamp (0) as fechahora, 
(select count(tipomovimiento) as TipoMovimiento from detallefielcont where tipomovimiento = 'Activo' and TO_CHAR(fechahora, 'yyyy-mm-dd hh12:mi:ss') > TO_CHAR(now() - interval '40 min', 'yyyy-mm-dd hh12:mi:ss')) as Activo,
(select count(tipomovimiento) as TipoMovimiento from detallefielcont where tipomovimiento = 'Revocado' and TO_CHAR(fechahora, 'yyyy-mm-dd hh12:mi:ss') > TO_CHAR(now() - interval '40 min', 'yyyy-mm-dd hh12:mi:ss')) as Revocado,
(select count(tipomovimiento) as TipoMovimiento from detallefielcont where tipomovimiento = 'Caduco' and TO_CHAR(fechahora, 'yyyy-mm-dd hh12:mi:ss') > TO_CHAR(now() - interval '40 min', 'yyyy-mm-dd hh12:mi:ss')) as Caduco,
(select count(tipomovimiento) as TipoMovimiento from detallefielcont where tipomovimiento = 'Autenticado' and TO_CHAR(fechahora, 'yyyy-mm-dd hh12:mi:ss') > TO_CHAR(now() - interval '40 min', 'yyyy-mm-dd hh12:mi:ss')) as Autenticado,
(select count(tipomovimiento) as TipoMovimiento from detallefielcont where tipomovimiento = 'NO Autenticado' and TO_CHAR(fechahora, 'yyyy-mm-dd hh12:mi:ss') > TO_CHAR(now() - interval '40 min', 'yyyy-mm-dd hh12:mi:ss')) as NOAutenticado;");
$resultAuth = pg_query($db1conn, "select distinct 'ResumenAuth' as Nombre,now()::timestamp (0) as FechaHora,
SUM(Login) as Login,SUM(Logout) as Logout,SUM(Hits) as Intentos
from resumenauth where FechaHoraInicial > now()::timestamp (0) - interval '20 min';");
$resultFiel = pg_fetch_all($resultFiel);
$resultAuth = pg_fetch_all($resultAuth);
pg_close($db1conn);
$valActivo=$resultFiel[0]['activo']*1;
$valRevocado=$resultFiel[0]['revocado']*1;
$valCaduco=$resultFiel[0]['caduco']*1;
$valAut=$resultFiel[0]['autenticado']*1;
$valNOAut=$resultFiel[0]['noautenticado']*1;
$valLogin=$resultAuth[0]['login']*1;
$valLogout=$resultAuth[0]['logout']*1;
$valIntentos=$resultAuth[0]['intentos']*1;
//conect to local and save
$conn_string = "host=127.0.0.1 dbname=UIF user=dbuser";
$noc2conn = pg_connect($conn_string) or die('connection failed');
pg_query($noc2conn, "insert into activos(timestamp,value) values(now()::timestamp (0),$valActivo);");
pg_query($noc2conn, "insert into revocados(timestamp,value) values(now()::timestamp (0),$valRevocado);");
pg_query($noc2conn, "insert into caducos(timestamp,value) values(now()::timestamp (0),$valCaduco);");
pg_query($noc2conn, "insert into autenticados(timestamp,value) values(now()::timestamp (0),$valAut);");
pg_query($noc2conn, "insert into noautenticados(timestamp,value) values(now()::timestamp (0),$valNOAut);");
pg_query($noc2conn, "insert into logins(timestamp,value) values(now()::timestamp (0),$valLogin);");
pg_query($noc2conn, "insert into logouts(timestamp,value) values(now()::timestamp (0),$valLogout);");
pg_query($noc2conn, "insert into intentos(timestamp,value) values(now()::timestamp (0),$valIntentos);");

// consukltas de los historicos
$resultSeries = pg_query($noc2conn, "select timestamp,value from activos;");
$resultSeries = pg_fetch_all($resultSeries);
foreach ($resultSeries as $key => $value){$resultSeries[$key]['timestamp'] = strtotime($resultSeries[$key]['timestamp'])*1000;}
$cache->set('fiel_activos',$resultSeries);
$resultSeries = pg_query($noc2conn, "select timestamp,value from revocados;");
$resultSeries = pg_fetch_all($resultSeries);
foreach ($resultSeries as $key => $value){$resultSeries[$key]['timestamp'] = strtotime($resultSeries[$key]['timestamp'])*1000;}
$cache->set('fiel_revocados',$resultSeries);
$resultSeries = pg_query($noc2conn, "select timestamp,value from caducos;");
$resultSeries = pg_fetch_all($resultSeries);
foreach ($resultSeries as $key => $value){$resultSeries[$key]['timestamp'] = strtotime($resultSeries[$key]['timestamp'])*1000;}
$cache->set('fiel_caducos',$resultSeries);
$resultSeries = pg_query($noc2conn, "select timestamp,value from autenticados;");
$resultSeries = pg_fetch_all($resultSeries);
foreach ($resultSeries as $key => $value){$resultSeries[$key]['timestamp'] = strtotime($resultSeries[$key]['timestamp'])*1000;}
$cache->set('fiel_autenticados',$resultSeries);
$resultSeries = pg_query($noc2conn, "select timestamp,value from noautenticados;");
$resultSeries = pg_fetch_all($resultSeries);
foreach ($resultSeries as $key => $value){$resultSeries[$key]['timestamp'] = strtotime($resultSeries[$key]['timestamp'])*1000;}
$cache->set('fiel_noautenticados',$resultSeries);
$resultSeries = pg_query($noc2conn, "select timestamp,value from logins;");
$resultSeries = pg_fetch_all($resultSeries);
foreach ($resultSeries as $key => $value){$resultSeries[$key]['timestamp'] = strtotime($resultSeries[$key]['timestamp'])*1000;}
$cache->set('auth_logins',$resultSeries);
$resultSeries = pg_query($noc2conn, "select timestamp,value from logouts;");
$resultSeries = pg_fetch_all($resultSeries);
foreach ($resultSeries as $key => $value){$resultSeries[$key]['timestamp'] = strtotime($resultSeries[$key]['timestamp'])*1000;}
$cache->set('auth_logouts',$resultSeries);
$resultSeries = pg_query($noc2conn, "select timestamp,value from intentos;");
$resultSeries = pg_fetch_all($resultSeries);
foreach ($resultSeries as $key => $value){$resultSeries[$key]['timestamp'] = strtotime($resultSeries[$key]['timestamp'])*1000;}
$cache->set('auth_intentos',$resultSeries);
$fecha = new DateTime(null, new DateTimeZone('America/Mexico_City'));
echo gettype(date_offset_get($fecha));
pg_close($noc2conn);
?>