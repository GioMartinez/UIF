<?php
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
ini_set('html_errors','1');
ini_set('log_errors','1');
//ini_set('max_input_time','60');
//ini_set('output_buffering','4096');
ini_set('track_errors','1');
ini_set('variables_order','GPCS');
error_reporting(E_ALL);
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
$expMan = "admin_consoles=Portales/admin_analyzer=DyP+Operacion/root=Organizations";
$timeOffset = 5*60*60;
$seriesNames=array(
	"login"=>array(
		"CFDI"=>array(
			"DN"=>"Plataforma=CFDI/IndicadoresDeSesion=IndicadoresDeSesion/TableroDeclaraciones=TableroDeclaraciones/root=Elements",
			"value"=>"InicioSesion",
			"profile"=>"Declaraciones"
		),
		"CNTC"=>array(
			"DN"=>"Plataforma=CNTC/IndicadoresDeSesion=IndicadoresDeSesion/TableroDeclaraciones=TableroDeclaraciones/root=Elements",
			"value"=>"InicioSesion",
			"profile"=>"Declaraciones"
		),
		"DYP"=>array(
			"DN"=>"Plataforma=DYP/IndicadoresDeSesion=IndicadoresDeSesion/TableroDeclaraciones=TableroDeclaraciones/root=Elements",
			"value"=>"InicioSesion",
			"profile"=>"Declaraciones"
		)
	),
	"conn"=>array(
		"CFDI"=>array(
			"DN"=>"platform=CFDI/Connections=Connections/Nagios=Adapter%3A+Nagios+%28Qro%29/formula%3A10.55.156.99=Elements/formula%3A10.55.156.99=Adapter%3A+NOC+-+InterConnection+Adapter/root=Elements",
			"value"=>"Description",
			"profile"=>"nagios"
		),
		"CONT"=>array(
			"DN"=>"platform=CONTENCION/Connections=Connections/Nagios=Adapter%3A+Nagios+%28Qro%29/formula%3A10.55.156.99=Elements/formula%3A10.55.156.99=Adapter%3A+NOC+-+InterConnection+Adapter/root=Elements",
			"value"=>"Description",
			"profile"=>"nagios"
		),
		"DYP"=>array(
			"DN"=>"platform=DYP_CONT/Connections=Connections/Nagios=Adapter%3A+Nagios+%28Qro%29/formula%3A10.55.156.99=Elements/formula%3A10.55.156.99=Adapter%3A+NOC+-+InterConnection+Adapter/root=Elements",
			"value"=>"Description",
			"profile"=>"nagios"
		)
	),
	"time"=>array(
		"CFDI"=>array(
			"DN"=>"SCENARIO_ROLLUP=010-CFDi_Portal_Cont_Welcome+%28Aggregate%29/server_file=CFDi_Portal_Contribuyente/mgmt_source=Protocol+Synthetic+Tests/admin_analyzer=End+User+Experience/BEM+Root+Element=Adapter%3A+Experience+Manager/formula%3A10.55.156.99=Elements/formula%3A10.55.156.99=Adapter%3A+NOC+-+InterConnection+Adapter/root=Elements",
			"value"=>"tqidnpronocfe01:6789.CFDi_Portal_Contribuyente.SCENARIO_ROLLUP.010-CFDi_Portal_Cont_Welcome (Aggregate).ResponseTime",
			"profile"=>"ElementProfile"
		),
		"DYP"=>array(
			"DN"=>"SCENARIO_ROLLUP=003-DyP-Cont-Welcome+%28Aggregate%29/server_file=test-DyPC/mgmt_source=Protocol+Synthetic+Tests/admin_analyzer=End+User+Experience/BEM+Root+Element=Adapter%3A+Experience+Manager/formula%3A10.55.156.99=Elements/formula%3A10.55.156.99=Adapter%3A+NOC+-+InterConnection+Adapter/root=Elements",
			"value"=>"tqidnpronocfe01:6789.test-DyPC.SCENARIO_ROLLUP.003-DyP-Cont-Welcome (Aggregate).ResponseTime",
			"profile"=>"ElementProfile"
		),
		"PTSC"=>array(
			"DN"=>"SCENARIO_ROLLUP=010-PTSC-SATAuth-Welcome+%28Aggregate%29/server_file=PTSC-SATAuthenticator/mgmt_source=Protocol+Synthetic+Tests/admin_analyzer=End+User+Experience/BEM+Root+Element=Adapter%3A+Experience+Manager/formula%3A10.55.156.99=Elements/formula%3A10.55.156.99=Adapter%3A+NOC+-+InterConnection+Adapter/root=Elements",
			"value"=>"tqidnpronocfe01:6789.PTSC-SATAuthenticator.SCENARIO_ROLLUP.010-PTSC-SATAuth-Welcome (Aggregate).ResponseTime",
			"profile"=>"ElementProfile"
		)
	),
	"auth"=>array(
		"CFDI"=>array(
			"DN"=>"Plataforma=CFDI/IndicadoresDeSesion=IndicadoresDeSesion/TableroDeclaraciones=TableroDeclaraciones/root=Elements",
			"value"=>"SesionesActivas",
			"profile"=>"Declaraciones"
		),
		"CNTC"=>array(
			"DN"=>"Plataforma=CNTC/IndicadoresDeSesion=IndicadoresDeSesion/TableroDeclaraciones=TableroDeclaraciones/root=Elements",
			"value"=>"SesionesActivas",
			"profile"=>"Declaraciones"
		),
		"CNTE"=>array(
			"DN"=>"Plataforma=CNTE/IndicadoresDeSesion=IndicadoresDeSesion/TableroDeclaraciones=TableroDeclaraciones/root=Elements",
			"value"=>"SesionesActivas",
			"profile"=>"Declaraciones"
		)
	),
	"expMan"=>array(
		"CFDI"=>array(
			"DN"=>"SCENARIO_ROLLUP=003-DyP-Cont-Welcome+%28Aggregate%29/server_file=test-DyPC/mgmt_source=Protocol+Synthetic+Tests/admin_analyzer=End+User+Experience/BEM+Root+Element=Adapter%3A+Experience+Manager/formula%3A10.55.156.99=Elements/formula%3A10.55.156.99=Adapter%3A+NOC+-+InterConnection+Adapter/root=Elements",
			"value"=>"tqidnpronocfe01:6789.test-DyPC.SCENARIO_ROLLUP.003-DyP-Cont-Welcome (Aggregate).ResponseTime",
			"profile"=>"ElementProfile"
		),
		"DYP"=>array(
			"DN"=>"SCENARIO_ROLLUP=010-CFDi_Portal_Cont_Welcome+%28Aggregate%29/server_file=CFDi_Portal_Contribuyente/mgmt_source=Protocol+Synthetic+Tests/admin_analyzer=End+User+Experience/BEM+Root+Element=Adapter%3A+Experience+Manager/formula%3A10.55.156.99=Elements/formula%3A10.55.156.99=Adapter%3A+NOC+-+InterConnection+Adapter/root=Elements",
			"value"=>"tqidnpronocfe01:6789.CFDi_Portal_Contribuyente.SCENARIO_ROLLUP.010-CFDi_Portal_Cont_Welcome (Aggregate).ResponseTime",
			"profile"=>"ElementProfile"
		),
		"DYP"=>array(
			"DN"=>"SCENARIO_ROLLUP=010-CFDi_Portal_Cont_Welcome+%28Aggregate%29/server_file=CFDi_Portal_Contribuyente/mgmt_source=Protocol+Synthetic+Tests/admin_analyzer=End+User+Experience/BEM+Root+Element=Adapter%3A+Experience+Manager/formula%3A10.55.156.99=Elements/formula%3A10.55.156.99=Adapter%3A+NOC+-+InterConnection+Adapter/root=Elements",
			"value"=>"tqidnpronocfe01:6789.CFDi_Portal_Contribuyente.SCENARIO_ROLLUP.010-CFDi_Portal_Cont_Welcome (Aggregate).ResponseTime",
			"profile"=>"ElementProfile"
		),
		"DYP"=>array(
			"DN"=>"SCENARIO_ROLLUP=010-CFDi_Portal_Cont_Welcome+%28Aggregate%29/server_file=CFDi_Portal_Contribuyente/mgmt_source=Protocol+Synthetic+Tests/admin_analyzer=End+User+Experience/BEM+Root+Element=Adapter%3A+Experience+Manager/formula%3A10.55.156.99=Elements/formula%3A10.55.156.99=Adapter%3A+NOC+-+InterConnection+Adapter/root=Elements",
			"value"=>"tqidnpronocfe01:6789.CFDi_Portal_Contribuyente.SCENARIO_ROLLUP.010-CFDi_Portal_Cont_Welcome (Aggregate).ResponseTime",
			"profile"=>"ElementProfile"
		),
		"DYP"=>array(
			"DN"=>"SCENARIO_ROLLUP=010-CFDi_Portal_Cont_Welcome+%28Aggregate%29/server_file=CFDi_Portal_Contribuyente/mgmt_source=Protocol+Synthetic+Tests/admin_analyzer=End+User+Experience/BEM+Root+Element=Adapter%3A+Experience+Manager/formula%3A10.55.156.99=Elements/formula%3A10.55.156.99=Adapter%3A+NOC+-+InterConnection+Adapter/root=Elements",
			"value"=>"tqidnpronocfe01:6789.CFDi_Portal_Contribuyente.SCENARIO_ROLLUP.010-CFDi_Portal_Cont_Welcome (Aggregate).ResponseTime",
			"profile"=>"ElementProfile"
		),
		"32D"=>array(
			"DN"=>"SCENARIO_ROLLUP=014-LoadMain+%28Aggregate%29/server_file=32d/mgmt_source=Protocol+Synthetic+Tests/admin_analyzer=End+User+Experience/BEM+Root+Element=Experience+Manager/root=Elements",
			"value"=>"tqidnpronocfe01:6789.CFDi_Portal_Contribuyente.SCENARIO_ROLLUP.010-CFDi_Portal_Cont_Welcome (Aggregate).ResponseTime",
			"profile"=>"ElementProfile"
		)
	)
);
?>