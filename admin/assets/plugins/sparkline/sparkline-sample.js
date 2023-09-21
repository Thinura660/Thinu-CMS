$(function () {
	'use strict'

	////////////////////////////////
	// LINE CHARTS
	////////////////////////////////
	// LINE CHARTS 1
	$('#sparkline1').sparkline('html', {
		width: 250,
		height: 100,
		lineColor: '#5D78FF',
		fillColor: false
	});
	// LINE CHARTS 2
	$('#sparkline2').sparkline('html', {
		width: 250,
		height: 100,
		lineColor: '#63CF72',
		fillColor: false
	});

	////////////////////////////////
	//  CHARTS
	////////////////////////////////
	// AREA CHARTS 1
	$('#sparkline3').sparkline('html', {
		width: 250,
		height: 100,
		lineColor: '#5D78FF',
		fillColor: 'rgba(0,131,205,0.2)',
	});

	//AREA CHARTS 2
	$('#sparkline4').sparkline('html', {
		width: 250,
		height: 100,
		lineColor: '#fff',
		fillColor: '#5D78FF'
	});


	////////////////////////////////
	// BAR CHARTS
	////////////////////////////////
	// BAR CHARTS 1
	$('#sparkline5').sparkline('html', {
		type: 'bar',
		barWidth: 10,
		height: 100,
		barColor: '#5D78FF',
		chartRangeMax: 12
	});
	// BAR CHARTS 2
	$('#sparkline6').sparkline('html', {
		type: 'bar',
		barWidth: 10,
		height: 100,
		barColor: '#C9D5FA',
		chartRangeMax: 12
	});


	////////////////////////////////
	// STACKED CHARTS
	////////////////////////////////
	// STACKED CHARTS 1
	$('#sparkline7').sparkline('html', {
		type: 'bar',
		barWidth: 10,
		height: 100,
		barColor: '#C9D5FA',
		chartRangeMax: 12
	});

	$('#sparkline7').sparkline([4, 5, 6, 7, 4, 5, 8, 7, 6, 6, 4, 4, 5, 8, 7, 6, 6, 5, 7, 6, 8, 7], {
		composite: true,
		type: 'bar',
		barWidth: 10,
		height: 100,
		barColor: '#5D78FF',
		chartRangeMax: 12
	});

	// STACKED CHARTS 2
	$('#sparkline8').sparkline('html', {
		type: 'bar',
		barWidth: 10,
		height: 100,
		barColor: '#63CF72',
		chartRangeMax: 12
	});

	$('#sparkline8').sparkline([4, 5, 6, 7, 4, 5, 8, 7, 6, 6, 4, 7, 5, 8, 7, 6, 6, 5, 7, 6, 8, 7], {
		composite: true,
		type: 'bar',
		barWidth: 10,
		height: 100,
		barColor: '#5D78FF',
		chartRangeMax: 12
	});


	////////////////////////////////
	// PIE CHARTS
	////////////////////////////////
	// PIE CHARTS 1
	$('#sparkline9').sparkline('html', {
		type: 'pie',
		height: 200,
		sliceColors: ['#63CF72', '#5D78FF', '#C9D5FA']
	});
	// PIE CHARTS 2
	$('#sparkline10').sparkline('html', {
		type: 'pie',
		height: 200,
		sliceColors: ['#63CF72', '#5D78FF', '#C9D5FA', '#FABA66', '#EE8CE5','#29B0D0', '#CE85CE', '#F07124']
	});

});