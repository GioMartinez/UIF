$(function(){
	var dateNow = new Date(); // objeto de fecha
	var timeOffset = dateNow.getTimezoneOffset(); // diferencia de zona horaria en minutos
	var threeMonths = new Date(); // se crea otra fecha para modificarla
	threeMonths.setMonth(threeMonths.getMonth()-3); // se restan 3 meses para pedir al memcache y al WS
	// se estableze la zona horario a Highcharts
	Highcharts.setOptions({
		global:{timezoneOffset:timeOffset}
	});
	// opciones globales para la construccion de las gráficas
	var normalOptions={
		chart:{type:'areaspline'},
		xAxis:{type:'datetime'},
		series:[{data:[]}]
	};
	// se prepara el contenedor de las gr'aficas
	testChart=Highcharts.stockChart("container",normalOptions);
	// función que correrá cada cierto tiempo para actualizar el dashboard
	function update(){
		if(typeof testChart.xAxis[0].getExtremes() !== 'undefined'){
			var lastTime = testChart.xAxis[0].getExtremes().dataMax;
			$.post('includes/php/testRender.php',{series:"login",property:"CFDI",offset:threeMonths.getTime()},function(data){
				testChart.series[0].setData(data);
				testChart.redraw();
			},"json");
		}
		else{
			$.post('includes/php/testRender.php',{series:"login",property:"CFDI",offset:threeMonths.getTime()},function(data){
				testChart.series[0].setData(data);
				testChart.redraw();
			},"json");
		}
	};
	update();
	window.setInterval(function(){
		update();
	},10*1000);
});
