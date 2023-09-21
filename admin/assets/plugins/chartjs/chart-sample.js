$(function () {
	'use strict';
	/////////////////////////////////////////////
	// Bar Chart
	/////////////////////////////////////////////

	// Bar Chart 1
	var ctx1 = document.getElementById('chartBar1').getContext('2d');
	var myChart1 = new Chart(ctx1, {
		type: 'bar',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			datasets: [{
				label: 'Values',
				data: [22, 39, 30, 20, 25, 28, 22, 39, 30, 30, 25, 38],
				backgroundColor: '#5D78FF'
			}]
		},
		options: {
			legend: {
				display: false,
				labels: {
					display: false
				}
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10,
						max: 50
					}
				}],
				xAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10
					}
				}]
			}
		}
	});


	// Bar Chart 2
	var ctx2 = document.getElementById('chartBar2').getContext('2d');
	var myChart2 = new Chart(ctx2, {
		type: 'bar',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			datasets: [{
				label: 'Values',
				data: [22, 49, 30, 25, 35, 38, 32, 39, 40, 25, 35, 38],
				
				backgroundColor: ['#63CF72', '#5D78FF', '#C9D5FA', '#FABA66', '#EE8CE5','#29B0D0', '#CE85CE', '#F07124', '#CE85CE', '#CFF2BC','#EC86AE', '#A997CE']
			}]
		},
		options: {
			legend: {
				display: false,
				labels: {
					display: false
				}
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10,
						max: 50
					}
				}],
				xAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10
					}
				}]
			}
		}
	});

	/////////////////////////////////////////////
	// Horizontal Chart
	/////////////////////////////////////////////

	// Horizontal Bar Chart 1
	var ctb3 = document.getElementById('chartBar3').getContext('2d');
	new Chart(ctb3, {
		type: 'horizontalBar',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			datasets: [{
				label: 'Values',
				data: [22, 39, 30, 35, 25, 38, 32, 40, 35, 30, 35, 38],
				backgroundColor: '#5D78FF'
			}]
		},
		options: {
			legend: {
				display: false,
				labels: {
					display: false
				}
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10,
					}
				}],
				xAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10,
						max: 50
					}
				}]
			}
		}
	});


	// Horizontal Bar Chart 2
	var ctb4 = document.getElementById('chartBar4').getContext('2d');
	new Chart(ctb4, {
		type: 'horizontalBar',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			datasets: [{
				label: 'Values',
				data: [12, 39, 20, 10, 25, 18, 32, 40, 35, 30, 35, 38],
				backgroundColor: ['#63CF72', '#5D78FF', '#C9D5FA', '#FABA66', '#EE8CE5','#29B0D0', '#CE85CE', '#F07124', '#CE85CE', '#CFF2BC','#EC86AE', '#A997CE']
			}]
		},
		options: {
			legend: {
				display: false,
				labels: {
					display: false
				}
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10
					}
				}],
				xAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10,
						max: 50
					}
				}]
			}
		}
	});

	/////////////////////////////////////////////
	//Stacked Chart
	/////////////////////////////////////////////

	// Stacked Bar Chart 1
	var ctx7 = document.getElementById('chartStacked1');
	new Chart(ctx7, {
		type: 'bar',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			datasets: [{
				data: [10, 24, 20, 25, 35, 50, 10, 24, 20, 25, 35, 50, ],
				backgroundColor: '#5D78FF',
				borderWidth: 1,
				fill: true
				
			}, {
				data: [10, 24, 20, 10, 24, 20, 25, 35, 50, 25, 35, 50],
				backgroundColor: '#63CF72',
				borderWidth: 1,
				fill: true
			}, {
				data: [20, 30, 28, 33, 10, 24, 20, 25, 35, 50, 45, 65],
				backgroundColor: '#C9D5FA',
				borderWidth: 1,
				fill: true
			}]
		},
		options: {
			legend: {
				display: false,
				labels: {
					display: false
				}
			},
			scales: {
				yAxes: [{
					stacked: true
				}],
				xAxes: [{
					stacked: true
				}]
			}
		}
	});


	// Stacked Bar Chart 2
	var ctx8 = document.getElementById('chartStacked2');
	new Chart(ctx8, {
		type: 'horizontalBar',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			datasets: [{
				data: [10, 24, 20, 25, 35, 50, 10, 24, 20, 25, 35, 50],
				backgroundColor: '#5D78FF',
				borderWidth: 1,
				fill: true
			}, {
				data: [10, 24, 20, 10, 24, 20, 25, 35, 50, 25, 35, 50],
				backgroundColor: '#63CF72',
				borderWidth: 1,
				fill: true
			}, {
				data: [20, 30, 28, 33, 45, 10, 24, 20, 25, 35, 50, 65],
				backgroundColor: '#C9D5FA',
				borderWidth: 1,
				fill: true
			}]
		},
		options: {
			legend: {
				display: false,
				labels: {
					display: false
				}
			},
			scales: {
				yAxes: [{
					stacked: true
				}],
				xAxes: [{
					stacked: true
				}]
			}
		}
	});

	/////////////////////////////////////////////
	// Line Chart
	/////////////////////////////////////////////

	// Line Chart 1
	var ctx3 = document.getElementById('chartLine1');
	var myChart3 = new Chart(ctx3, {
		type: 'line',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			datasets: [{
				label: 'Sales Report',
				data: [12, 39, 20, 10, 25, 18, 12, 39, 20, 10, 25, 18],
				borderColor: '#5D78FF',
				borderWidth: 1,
				fill: false
			}]
		},
		options: {
			legend: {
				display: true,
				labels: {
					display: true
				}
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10,
						max: 50
					}
				}],
				xAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10
					}
				}]
			}
		}
	});


	// Line Chart 2
	var ctx4 = document.getElementById('chartLine2');
	var myChart4 = new Chart(ctx4, {
		type: 'line',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			datasets: [{
				label: 'Total Profit',
				data: [12, 39, 20, 10, 25, 18, 12, 39, 20, 10, 25, 18],
				borderColor: '#5D78FF',
				borderWidth: 1,
				fill: false
			}, {
				label: 'Sales Report',
				data: [20, 10, 38, 28, 15, 12, 28, 10, 40, 28, 23, 25, 28],
				borderColor: '#C9D5FA',
				borderWidth: 1,
				fill: false
			}, {
				label: 'Annual Revenue',
				data: [28, 20, 10, 28, 38, 10, 40, 28, 23, 25, 15, 12, 28],
				borderColor: '#63CF72',
				borderWidth: 1,
				fill: false
			}]
		},
		options: {
			legend: {
				display: true,
				labels: {
					display: true
				}
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10,
						max: 50
					}
				}],
				xAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10
					}
				}]
			}
		}
	});

	/////////////////////////////////////////////
	// Area Chart
	/////////////////////////////////////////////

	// Area Chart 1
	var ctx5 = document.getElementById('chartArea1');
	var myChart5 = new Chart(ctx5, {
		type: 'line',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			datasets: [{
				label: 'Annual Revenue',
				data: [12, 39, 20, 10, 25, 18, 12, 39, 20, 10, 25, 18],
				backgroundColor: '#5D78FF',
				fill: true,
				borderWidth: 0,
				borderColor: '#fff'
			}]
		},
		options: {
			legend: {
				display: true,
				labels: {
					display: true
				}
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10,
						max: 50
					}
				}],
				xAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10
					}
				}]
			}
		}
	});


	// Area Chart 2
	var ctx6 = document.getElementById('chartArea2');
	new Chart(ctx6, {
		type: 'line',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			datasets: [{
				label: 'Sales Report',
				data: [12, 39, 20, 22, 25, 18, 28, 39, 20, 10, 25, 18],
				backgroundColor: '#5D78FF',
				borderWidth: 1,
				fill: true
			}, {
				label: 'Total Profit',
				data: [20, 30, 28, 33, 45, 40, 20, 30, 28, 33, 45, 40],
				backgroundColor: '#C9D5FA',
				borderWidth: 1,
				fill: true
			}]
		},
		options: {
			legend: {
				display: true,
				labels: {
					display: true
				}
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10,
						max: 50
					}
				}],
				xAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 10
					}
				}]
			}
		}
	});

	/////////////////////////////////////////////
	// Pie Chart
	/////////////////////////////////////////////

	// Pie Chart
	var randomScalingFactor = function () {
		return Math.round(Math.random() * 100);
	};

	var datapie = {
		datasets: [{
			data: [
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
			],
			backgroundColor: ['#63CF72', '#5D78FF', '#C9D5FA', '#FABA66', '#EE8CE5'],
		}]
	};

	var optionpie = {
		responsive: true,
		legend: {
			display: false,
		},
		animation: {
			animateScale: true,
			animateRotate: true
		}
	};

	// For a pie chart
	var ctx7 = document.getElementById('chartPie');
	var myPieChart7 = new Chart(ctx7, {
		type: 'pie',
		data: datapie,
		options: optionpie
	});

	// For a doughnut chart 
	var ctx6 = document.getElementById('chartDonut');
	var myPieChart6 = new Chart(ctx6, {
		type: 'doughnut',
		data: datapie,
		options: optionpie
	});


});