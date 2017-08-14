<?php
include_once('includes/php/config.php');
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
	<title>Dashboard</title>
	<link rel="icon" type="image/png" href="includes/img/SATIcon.png"/>
	<meta content="text/html" charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
	<link rel="stylesheet" href="includes/css/normalize.css"/>
	<link rel="stylesheet" href="includes/css/bootstrap.css"/>
	<link rel="stylesheet" href="includes/css/main.css"/>
	<link rel="stylesheet" href="includes/css/font-awesome.css"/>
</head>
<body>
	<header>
		<div class="branding">
			<a class="logo" href="http://www.gob.mx/hacienda"><img src="includes/img/SHCPLogo.svg" alt="SHCP - "></a>
			<a class="logo" href="http://www.sat.gob.mx/Paginas/Inicio.aspx"><img src="includes/img/SATLogo.svg" alt="SAT"></a>
		</div>
	</header>
	<div class="container-fluid">
		<div class="col-xs-12 col-sm-4">
			<div class="panel panel-medium white">
				<div class="panel-heading">Autenticaciones...</div>
				<div class="panel-body">
					<div class="col-xs-12">
						<div class="box" id="1"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4">
			<div class="panel panel-medium white">
				<div class="panel-heading" data-toggle="tooltip" data-placement="bottom" title="Conexiones TCP establecidas en el clúster que soporta la plataforma de declaraciones">Conexiones TCP Establecidas</div>
				<div class="panel-body">
					<div class="col-xs-12">
						<div class="box" id="2"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4">
			<div class="panel panel-medium white">
				<div class="panel-heading" data-toggle="tooltip" data-placement="bottom" title="Tiempo que tarda en Cargar el Contrato">Tiempo del Proceso de Autenticación</div>
				<div class="panel-body">
					<div class="col-xs-12">
						<div class="box" id="3"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-5">
			<div class="panel panel-medium white">
				<div class="panel-heading">Intentos de Autenticación</div>
				<div class="panel-body">
					<div class="col-xs-12">
						<div class="box" id="4"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-7">
			<div class="panel panel-medium white">
				<div class="panel-heading">Experiencia de Usuario</div>
				<div class="panel-body scroll">
					<div class="col-xs-12">
						<div class="box" id="8">
							<table class="table table-hover" id="userExpTbl">
								<tr>
									<td>32D: Opinión del cumplimiento</td>
									<td><button type="button" class="btn btn-success" id="exp-stat-32d" severity="1">OK</button></td>
									<td class="col-xs-5" id="curp-spark"></td>
								</tr>
								<tr>
									<td>CFDI</td>
									<td><button type="button" class="btn btn-success" id="exp-stat-cfdi" severity="1">OK</button></td>
									<td class="col-xs-5" id="cfdi-spark"></td>
								</tr>
								<tr>
									<td>Citas</td>
									<td><button type="button" class="btn btn-success" id="exp-stat-citas" severity="1">OK</button></td>
									<td class="col-xs-5" id="pre-pm-spark"></td>
								</tr>
								<tr>
									<td>Certisat</td>
									<td><button type="button" class="btn btn-success" id="exp-stat-certisat" severity="1">OK</button></td>
									<td class="col-xs-5" id="pre-pm2-spark"></td>
								</tr>
								<tr>
									<td>Declaración Anual PF Asalariados</td>
									<td><button type="button" class="btn btn-success" id="exp-stat-dapf" severity="1">OK</button></td>
									<td class="col-xs-5" id="pre-pm3-spark"></td>
								</tr>
								<tr>
									<td>DeclaraSAT</td>
									<td><button type="button" class="btn btn-success" id="exp-stat-dsat" severity="1">OK</button></td>
									<td class="col-xs-5" id="pre-pm4-spark"></td>
								</tr>
								<tr>
									<td>DyC</td>
									<td><button type="button" class="btn btn-success" id="exp-stat-dyc" severity="1">OK</button></td>
									<td class="col-xs-5" id="pre-pm5-spark"></td>
								</tr>
								<tr>
									<td>DyP</td>
									<td><button type="button" class="btn btn-success" id="exp-stat-dyp" severity="1">OK</button></td>
									<td class="col-xs-5" id="dyp-spark"></td>
								</tr>
								<tr>
									<td>Envío de Declaraciones Anuales PM</td>
									<td><button type="button" class="btn btn-success" id="exp-stat-dapm" severity="1">OK</button></td>
									<td class="col-xs-5" id="pre-pm7-spark"></td>
								</tr>
								<tr>
									<td>Mis Cuentas</td>
									<td><button type="button" class="btn btn-success" id="exp-stat-mcu" severity="1">OK</button></td>
									<td class="col-xs-5" id="pre-pm8-spark"></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4">
			<div class="panel panel-medium white">
				<div class="panel-heading">Servicios en la Nube de Microsoft</div>
				<div class="panel-body">
					<div class="col-xs-12">
						<div class="box" id="7">
							<table class="table table-hover">
								<tr>
									<td>Servicio 1</td>
									<td><button type="button" class="btn btn-success">OK</button></td>
									<td>Servicio 2</td>
									<td><button type="button" class="btn btn-success">OK</button></td>
									<td>Servicio 3</td>
									<td><button type="button" class="btn btn-success">OK</button></td>
								</tr>
								<tr>
									<td>Servicio 4</td>
									<td><button type="button" class="btn btn-success">OK</button></td>
									<td>Servicio 5</td>
									<td><button type="button" class="btn btn-success">OK</button></td>
									<td>Servicio 6</td>
									<td><button type="button" class="btn btn-success">OK</button></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-8">
			<div class="panel panel-medium white">
				<div class="panel-heading">Infraestructura</div>
				<div class="panel-body">
					<div class="col-xs-7">
						<div class="box" id="9">
							<table class="table table-hover">
								<tr>
									<th>Plataforma</th>
									<th>IDP's</th>
									<th>LAG's</th>
								</tr>
								<tr>
									<td>CFDI<i class="fa fa-server" aria-hidden="true"></i></td>
									<td data-toggle="modal" data-target="#modal-IDPS-CFDI" data-whatever="IDPS-CFDI">
										<button type="button" id="IDPS-CFDI-OK" class="btn btn-success">0</button>
										<button type="button" id="IDPS-CFDI-Wr" class="btn btn-warning">0</button>
										<button type="button" id="IDPS-CFDI-Cr" class="btn btn-danger">0</button>
										<button type="button" id="IDPS-CFDI-In" class="btn btn-info">0</button>
									</td>
									<td data-toggle="modal" data-target="#modal-LAGS-CFDI" data-whatever="LAGS-CFDI">
										<button type="button" id="LAGS-CFDI-OK" class="btn btn-success">0</button>
										<button type="button" id="LAGS-CFDI-Wr" class="btn btn-warning">0</button>
										<button type="button" id="LAGS-CFDI-Cr" class="btn btn-danger">0</button>
										<button type="button" id="LAGS-CFDI-In" class="btn btn-info">0</button>
									</td>
								</tr>
								<tr>
									<td>DYP<i class="fa fa-server" aria-hidden="true"></i></td>
									<td data-toggle="modal" data-target="#modal-IDPS-DYP" data-whatever="IDPS-DYP">
										<button type="button" id="IDPS-DYP-OK" class="btn btn-success">0</button>
										<button type="button" id="IDPS-DYP-Wr" class="btn btn-warning">0</button>
										<button type="button" id="IDPS-DYP-Cr" class="btn btn-danger">0</button>
										<button type="button" id="IDPS-DYP-In" class="btn btn-info">0</button>
									</td>
									<td data-toggle="modal" data-target="#modal-LAGS-DYP" data-whatever="LAGS-DYP">
										<button type="button" id="LAGS-DYP-OK" class="btn btn-success">0</button>
										<button type="button" id="LAGS-DYP-Wr" class="btn btn-warning">0</button>
										<button type="button" id="LAGS-DYP-Cr" class="btn btn-danger">0</button>
										<button type="button" id="LAGS-DYP-In" class="btn btn-info">0</button>
									</td>
								</tr>
								<tr>
									<td>CONT<i class="fa fa-server" aria-hidden="true"></i></td>
									<td data-toggle="modal" data-target="#modal-IDPS-CONTENCION" data-whatever="IDPS-CONTENCION">
										<button type="button" id="IDPS-CONTENCION-OK" class="btn btn-success">0</button>
										<button type="button" id="IDPS-CONTENCION-Wr" class="btn btn-warning">0</button>
										<button type="button" id="IDPS-CONTENCION-Cr" class="btn btn-danger">0</button>
										<button type="button" id="IDPS-CONTENCION-In" class="btn btn-info">0</button>
									</td>
									<td data-toggle="modal" data-target="#modal-LAGS-CONTENCION" data-whatever="LAGS-CONTENCION">
										<button type="button" id="LAGS-CONTENCION-OK" class="btn btn-success">0</button>
										<button type="button" id="LAGS-CONTENCION-Wr" class="btn btn-warning">0</button>
										<button type="button" id="LAGS-CONTENCION-Cr" class="btn btn-danger">0</button>
										<button type="button" id="LAGS-CONTENCION-In" class="btn btn-info">0</button>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-xs-5">
						<div class="box" id="9">
							<table class="table table-hover">
								<tr>
									<td>MIDC<i class="fa fa-database" aria-hidden="true"></i></td>
									<td data-toggle="modal" data-target="#modal-Directorios-MIDC" data-whatever="Directorios-MIDC">
										<button type="button" id="Directorios-MIDC-OK" class="btn btn-success">0</button>
										<button type="button" id="Directorios-MIDC-Wr" class="btn btn-warning">0</button>
										<button type="button" id="Directorios-MIDC-Cr" class="btn btn-danger">0</button>
										<button type="button" id="Directorios-MIDC-In" class="btn btn-info">0</button>
									</td>
								</tr>
								<tr>
									<td>DASI<i class="fa fa-database" aria-hidden="true"></i></td>
									<td data-toggle="modal" data-target="#modal-Directorios-DASI" data-whatever="Directorios-DASI">
										<button type="button" id="Directorios-DASI-OK" class="btn btn-success">0</button>
										<button type="button" id="Directorios-DASI-Wr" class="btn btn-warning">0</button>
										<button type="button" id="Directorios-DASI-Cr" class="btn btn-danger">0</button>
										<button type="button" id="Directorios-DASI-In" class="btn btn-info">0</button>
									</td>
								</tr>
								<tr>
									<td>Balanceos<i class="fa fa-server" aria-hidden="true"></i></td>
									<td data-toggle="modal" data-target="#modal-Balanceo" data-whatever="Balanceo">
										<button type="button" id="Balanceo-OK" class="btn btn-success">0</button>
										<button type="button" id="Balanceo-Wr" class="btn btn-warning">0</button>
										<button type="button" id="Balanceo-Cr" class="btn btn-danger">0</button>
										<button type="button" id="Balanceo-In" class="btn btn-info">0</button>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<header>
		<div class="footer">
			<a class="microfocus" href="https://www.microfocus.com"><img src="includes/img/mf_logo_blue.png" alt="MicroFocus Inc."></a>
		</div>
	</header>
	<div class="modal fade" id="modal-IDPS-CFDI" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">IDP's CFDI</h4>
				</div>
				<div class="modal-body">
					<div class="panel-group" id="accordion-IDPS-CFDI" role="tablist" aria-multiselectable="true">
						<!-- add each panel for the servers via javascript -->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-LAGS-CFDI" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">LAG's CFDI</h4>
				</div>
				<div class="modal-body">
					<div class="panel-group" id="accordion-LAGS-CFDI" role="tablist" aria-multiselectable="true">
						<!-- add each panel for the servers via javascript -->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-IDPS-DYP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">IDP's Declaraciones y Pagos</h4>
				</div>
				<div class="modal-body">
					<div class="panel-group" id="accordion-IDPS-DYP" role="tablist" aria-multiselectable="true">
						<!-- add each panel for the servers via javascript -->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-LAGS-DYP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">LAG's Declaraciones y Pagos</h4>
				</div>
				<div class="modal-body">
					<div class="panel-group" id="accordion-LAGS-DYP" role="tablist" aria-multiselectable="true">
						<!-- add each panel for the servers via javascript -->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-IDPS-CONTENCION" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">IDP's Contención</h4>
				</div>
				<div class="modal-body">
					<div class="panel-group" id="accordion-IDPS-CONTENCION" role="tablist" aria-multiselectable="true">
						<!-- add each panel for the servers via javascript -->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-LAGS-CONTENCION" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">LAG's Contención</h4>
				</div>
				<div class="modal-body">
					<div class="panel-group" id="accordion-LAGS-CONTENCION" role="tablist" aria-multiselectable="true">
						<!-- add each panel for the servers via javascript -->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-Directorios-MIDC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Directorios MIDC</h4>
				</div>
				<div class="modal-body">
					<div class="panel-group" id="accordion-Directorios-MIDC" role="tablist" aria-multiselectable="true">
						<!-- add each panel for the servers via javascript -->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-Directorios-DASI" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Directorios DASI</h4>
				</div>
				<div class="modal-body">
					<div class="panel-group" id="accordion-Directorios-DASI" role="tablist" aria-multiselectable="true">
						<!-- add each panel for the servers via javascript -->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-Balanceo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Balanceo</h4>
				</div>
				<div class="modal-body">
					<div class="panel-group" id="accordion-Balanceo" role="tablist" aria-multiselectable="true">
						<!-- add each panel for the servers via javascript -->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="includes/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="includes/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="includes/js/highstock.min.js"></script>
	<script type="text/javascript" src="includes/js/data.min.js"></script>
	<script type="text/javascript" src="includes/js/highcharts-more.min.js"></script>
	<script type="text/javascript" src="includes/js/highcharts.theme.js"></script>
	<script type="text/javascript" src="includes/js/exporting.min.js"></script>
	<script type="text/javascript" src="includes/js/export-csv.js"></script>
	<script type="text/javascript" src="includes/js/main.js"></script>
</body>
</html>