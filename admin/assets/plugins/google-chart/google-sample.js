$(function () {
	'use strict';

	// Bar Charts Starts
	google.charts.load('current', {
		packages: ['corechart', 'bar']
	});
	google.charts.setOnLoadCallback(drawMultSeries);

	function drawMultSeries() {
		var data = google.visualization.arrayToDataTable([
			['City', '2010 Population', '2000 Population'],
			['New York City, NY', 8175000, 8008000],
			['Los Angeles, CA', 3792000, 3694000],
			['Chicago, IL', 2695000, 2896000],
			['Houston, TX', 2099000, 1953000],
			['Philadelphia, PA', 1526000, 1517000]
		]);

		var options = {
			title: 'Population of Largest U.S. Cities',
			chartArea: {
				width: '50%'
			},
			hAxis: {
				title: 'Total Population',
				minValue: 0
			},
			vAxis: {
				title: 'City'
			},
			colors: ['#5D78FF', '#C9D5FA'],


			histogram: {
				bucketSize: 0.02,
				maxNumBuckets: 350,
				minValue: -1,
				maxValue: 1
			}
		};

		var chart = new google.visualization.BarChart(document.getElementById('barChart'));
		chart.draw(data, options);
	}


	// Column Chart 
	google.charts.load('current', {
		packages: ['corechart', 'bar']
	});
	google.charts.setOnLoadCallback(drawTrendlines);

	function drawTrendlines() {
		var data = new google.visualization.DataTable();
		data.addColumn('timeofday', 'Time of Day');
		data.addColumn('number', 'Motivation Level');
		data.addColumn('number', 'Energy Level');

		data.addRows([
			[{
				v: [8, 0, 0],
				f: '8 am'
			}, 1, .25],
			[{
				v: [9, 0, 0],
				f: '9 am'
			}, 2, .5],
			[{
				v: [10, 0, 0],
				f: '10 am'
			}, 3, 1],
			[{
				v: [11, 0, 0],
				f: '11 am'
			}, 4, 2.25],
			[{
				v: [12, 0, 0],
				f: '12 pm'
			}, 5, 2.25],
			[{
				v: [13, 0, 0],
				f: '1 pm'
			}, 6, 3],
			[{
				v: [14, 0, 0],
				f: '2 pm'
			}, 7, 4],
			[{
				v: [15, 0, 0],
				f: '3 pm'
			}, 8, 5.25],
			[{
				v: [16, 0, 0],
				f: '4 pm'
			}, 9, 7.5],
			[{
				v: [17, 0, 0],
				f: '5 pm'
			}, 10, 10],
		]);

		var options = {
			title: 'Motivation and Energy Level Throughout the Day',
			trendlines: {
				0: {
					type: 'linear',
					lineWidth: 5,
					opacity: .3
				},
				1: {
					type: 'exponential',
					lineWidth: 10,
					opacity: .3
				}
			},
			hAxis: {
				title: 'Time of Day',
				format: 'h:mm a',
				viewWindow: {
					min: [7, 30, 0],
					max: [17, 30, 0]
				}
			},
			vAxis: {
				title: 'Rating (scale of 1-10)'
			},
			colors: ['#5D78FF', '#C9D5FA'],
		};

		var chart = new google.visualization.ColumnChart(document.getElementById('columnChart'));
		chart.draw(data, options);
	}


	// Area Chart
	google.charts.load('current', {
		'packages': ['corechart']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Year', 'Sales', 'Expenses'],
			['2013', 1000, 400],
			['2014', 1170, 460],
			['2015', 660, 1120],
			['2016', 1030, 540]
		]);

		var options = {
			title: 'Company Performance',
			hAxis: {
				title: 'Year',
				titleTextStyle: {
					color: '#333'
				}
			},
			colors: ['#5D78FF', '#63CF72', '#C9D5FA', '#FABA66'],
			chartArea: {
				width: 500
			},
			vAxis: {
				minValue: 0
			}
		};

		var AreaChart = new google.visualization.AreaChart(document.getElementById('areaChart'));
		AreaChart.draw(data, options);
	}


	// Combo Chart
	google.charts.load('current', {
		'packages': ['corechart']
	});
	google.charts.setOnLoadCallback(drawVisualization);

	function drawVisualization() {
		// Some raw data (not necessarily accurate)
		var data = google.visualization.arrayToDataTable([
			['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua', 'Rwanda', 'Average'],
			['2004/05', 165, 938, 522, 998, 450, 614.6],
			['2005/06', 135, 1120, 599, 1268, 288, 682],
			['2006/07', 157, 1167, 587, 807, 397, 623],
			['2007/08', 139, 1110, 615, 968, 215, 609.4],
			['2008/09', 136, 691, 629, 1026, 366, 569.6]
		]);

		var options = {
			title: 'Monthly Coffee Production by Country',
			vAxis: {
				title: 'Cups'
			},
			hAxis: {
				title: 'Month'
			},
			colors: ['#63CF72', '#5D78FF', '#C9D5FA', '#FABA66', '#EE8CE5'],
			seriesType: 'bars',
			series: {
				5: {
					type: 'line'
				}
			}
		};

		var chart = new google.visualization.ComboChart(document.getElementById('comboChart'));
		chart.draw(data, options);
	}


	// Histogram Charts Starts
	(function ($) {

		google.charts.load("current", {
			packages: ["corechart"]
		});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Quarks', 'Leptons', 'Gauge Bosons', 'Scalar Bosons'],
				[2 / 3, -1, 0, 0],
				[2 / 3, -1, 0, null],
				[2 / 3, -1, 0, null],
				[-1 / 3, 0, 1, null],
				[-1 / 3, 0, -1, null],
				[-1 / 3, 0, null, null],
				[-1 / 3, 0, null, null]
			]);

			var options = {
				title: 'Charges of subatomic particles',
				legend: {
					position: 'top',
					maxLines: 2
				},
				colors: ['#5D78FF', '#63CF72', '#C9D5FA', '#FABA66'],
				interpolateNulls: false,
				chartArea: {
					width: 400
				},
			};

			var chart = new google.visualization.Histogram(document.getElementById('histogramChart'));
			chart.draw(data, options);
		}

	})(jQuery);


	//  Line Chart
	google.charts.load('current', {
		packages: ['corechart', 'line']
	});
	google.charts.setOnLoadCallback(drawCurveTypes);

	function drawCurveTypes() {
		var data = new google.visualization.DataTable();
		data.addColumn('number', 'X');
		data.addColumn('number', 'Dogs');
		data.addColumn('number', 'Cats');

		data.addRows([
			[0, 0, 0],
			[1, 10, 5],
			[2, 23, 15],
			[3, 17, 9],
			[4, 18, 10],
			[5, 9, 5],
			[6, 11, 3],
			[7, 27, 19],
			[8, 33, 25],
			[9, 40, 32],
			[10, 32, 24],
			[11, 35, 27],
			[12, 30, 22],
			[13, 40, 32],
			[14, 42, 34],
			[15, 47, 39],
			[16, 44, 36],
			[17, 48, 40],
			[18, 52, 44],
			[19, 54, 46],
			[20, 42, 34],
			[21, 55, 47],
			[22, 56, 48],
			[23, 57, 49],
			[24, 60, 52],
			[25, 50, 42],
			[26, 52, 44],
			[27, 51, 43],
			[28, 49, 41],
			[29, 53, 45],
			[30, 55, 47],
			[31, 60, 52],
			[32, 61, 53],
			[33, 59, 51],
			[34, 62, 54],
			[35, 65, 57],
			[36, 62, 54],
			[37, 58, 50],
			[38, 55, 47],
			[39, 61, 53],
			[40, 64, 56],
			[41, 65, 57],
			[42, 63, 55],
			[43, 66, 58],
			[44, 67, 59],
			[45, 69, 61],
			[46, 69, 61],
			[47, 70, 62],
			[48, 72, 64],
			[49, 68, 60],
			[50, 66, 58],
			[51, 65, 57],
			[52, 67, 59],
			[53, 70, 62],
			[54, 71, 63],
			[55, 72, 64],
			[56, 73, 65],
			[57, 75, 67],
			[58, 70, 62],
			[59, 68, 60],
			[60, 64, 56],
			[61, 60, 52],
			[62, 65, 57],
			[63, 67, 59],
			[64, 68, 60],
			[65, 69, 61],
			[66, 70, 62],
			[67, 72, 64],
			[68, 75, 67],
			[69, 80, 72]
		]);

		var options = {
			hAxis: {
				title: 'Time'
			},
			vAxis: {
				title: 'Popularity'
			},
			series: {
				1: {
					curveType: 'function'
				}
			},
			colors: ['#5D78FF', '#C9D5FA'],
		};

		var chart = new google.visualization.LineChart(document.getElementById('lineChart'));
		chart.draw(data, options);
	}


	//Region GeoCharts
	google.charts.load('current', {
		'packages': ['geochart'],
		// Note: you will need to get a mapsApiKey for your project.
		// See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
		'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
	});
	google.charts.setOnLoadCallback(drawRegionsMap);

	function drawRegionsMap() {
		var data = google.visualization.arrayToDataTable([
			['Country', 'Popularity'],
			['Germany', 200],
			['United States', 300],
			['Brazil', 400],
			['Canada', 500],
			['France', 600],
			['RU', 700]
		]);

		var options = {
			colors: ['#5D78FF', '#C9D5FA'],
		};

		var chart = new google.visualization.GeoChart(document.getElementById('regionGeoCharts'));

		chart.draw(data, options);
	}


	// Pie Chart
	(function ($) {
		google.charts.load('current', {
			'packages': ['corechart']
		});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {

			var data = google.visualization.arrayToDataTable([
				['Task', 'Hours per Day'],
				['Work', 11],
				['Eat', 9],
				['Commute', 7],
				['Watch TV', 8],
				['Sleep', 6]
			]);

			var options = {
				title: 'My Daily Activities',
				colors: ['#63CF72', '#5D78FF', '#C9D5FA', '#FABA66', '#EE8CE5'],
			};

			var chart = new google.visualization.PieChart(document.getElementById('pieChart'));

			chart.draw(data, options);
		}


	})(jQuery);


});