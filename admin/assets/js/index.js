$(function() {
    "use strict";

		  // chart1
		  var ctx = document.getElementById('chart1').getContext('2d');
		  var myChart = new Chart(ctx, {
			  type: 'line',
			  data: {
				  labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
				  datasets: [{
					  label: 'New Visitor',
					  data: [3, 3, 8, 5, 7, 4, 6, 4, 6, 3],
					  backgroundColor: [
						  '#5e72e4'
					  ],
					 fill: {
						  target: 'origin',
						  above: 'rgb(94 114 228)',   // Area will be red above the origin
						  below: 'rgb(94 114 228)'   // And blue below the origin
						}, 
					  tension: 0.4,
					  borderColor: [
						  '#5e72e4'
					  ],
					  pointRadius :"0",
					  borderWidth: 3
				  },
				  {
					  label: 'Old Visitor',
					  data: [7, 5, 14, 7, 12, 6, 10, 6, 11, 5],
					  backgroundColor: [
						  '#2dce89'
					  ],
					  fill: {
						  target: 'origin',
						  above: 'rgb(45 206 137)',   // Area will be red above the origin
						  below: 'rgb(45 206 137)'    // And blue below the origin
						},
					  tension: 0.4,
					  borderColor: [
						  '#2dce89'
					  ],
					  pointRadius :"0",
					  borderWidth: 1
				  }]
			  },
			  options: {
				  maintainAspectRatio: false,
				  plugins: {
					  legend: {
						  display: false,
					  }
				  },
				  scales: {
					  y: {
						  beginAtZero: true
					  }
				  }
			  }
		  });
		
	

  // chart2
  var ctx = document.getElementById('chart2').getContext('2d');
  var myChart = new Chart(ctx, {
	  type: 'bar',
	  data: {
		  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
		  datasets: [{
			  label: 'Direct',
			  data: [10, 15, 20, 25, 20, 15, 10],
			  backgroundColor: [
				  '#5e72e4'
			  ],
			  borderColor: [
				  '#5e72e4'
			  ],
			  borderWidth: 0
		  },
		  {
			  label: 'Affiliate',
			  data: [10, 15, 20, 25, 20, 15, 10],
			  backgroundColor: [
				  'rgb(94 114 228 / 32%)'
			  ],
			  borderColor: [
				  'rgb(94 114 228 / 32%)'
			  ],
			  borderWidth: 0
		  }]
	  },
	  options: {
		  maintainAspectRatio: false,
		  barPercentage: 0.35,
		  //categoryPercentage: 0.5,
		  plugins: {
			  legend: {
				position:'bottom',
				display: true,
			  }
		  },
		  scales: {
			  x: {
				stacked: true,
				beginAtZero: true
			  },
			  y: {
				stacked: true,
				beginAtZero: true
			  }
			}
	  }
  });


		
	// easy pie chart 
	
	 $('.easy-dash-chart1').easyPieChart({
		easing: 'easeOutBounce',
		barColor : '#3b5998',
		lineWidth: 10,
		trackColor : 'rgba(0, 0, 0, 0.08)',
		scaleColor: false,
		onStep: function(from, to, percent) {
			$(this.el).find('.w_percent').text(Math.round(percent));
		}
	 });	


	 $('.easy-dash-chart2').easyPieChart({
		easing: 'easeOutBounce',
		barColor : '#55acee',
		lineWidth: 10,
		trackColor : 'rgba(0, 0, 0, 0.08)',
		scaleColor: false,
		onStep: function(from, to, percent) {
			$(this.el).find('.w_percent').text(Math.round(percent));
		}
	 });


	 $('.easy-dash-chart3').easyPieChart({
		easing: 'easeOutBounce',
		barColor : '#e52d27',
		lineWidth: 10,
		trackColor : 'rgba(0, 0, 0, 0.08)',
		scaleColor: false,
		onStep: function(from, to, percent) {
			$(this.el).find('.w_percent').text(Math.round(percent));
		}
	 });
		
		
	 
// world map
jQuery('#dashboard-map').vectorMap(
{
    map: 'world_mill_en',
    backgroundColor: 'transparent',
    borderColor: '#818181',
    borderOpacity: 0.25,
    borderWidth: 1,
    zoomOnScroll: false,
    color: '#009efb',
    regionStyle : {
        initial : {
          fill : '#5e72e4'
        }
      },
    markerStyle: {
      initial: {
        r: 9,
        'fill': '#fff',
        'fill-opacity':1,
        'stroke': '#000',
        'stroke-width' : 5,
        'stroke-opacity': 0.4
                },
                },
    enableZoom: true,
    hoverColor: '#009efb',
    markers : [{
        latLng : [21.00, 78.00],
        name : 'Lorem Ipsum Dollar'
      
      }],
    hoverOpacity: null,
    normalizeFunction: 'linear',
    scaleColors: ['#b6d6ff', '#005ace'],
    selectedColor: '#c9dfaf',
    selectedRegions: [],
    showTooltip: true,
});
		
		
   $("#trendchart1").sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8], {
      type: 'bar',
      height: '20',
      barWidth: '2',
      resize: true,
      barSpacing: '3',
      barColor: '#eb5076'
    });
		

	$("#trendchart2").sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8], {
      type: 'bar',
      height: '20',
      barWidth: '2',
      resize: true,
      barSpacing: '3',
      barColor: '#14abef'
    });


    $("#trendchart3").sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8], {
      type: 'bar',
      height: '20',
      barWidth: '2',
      resize: true,
      barSpacing: '3',
      barColor: '#02ba5a'
    });


    $("#trendchart4").sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8], {
      type: 'bar',
      height: '20',
      barWidth: '2',
      resize: true,
      barSpacing: '3',
      barColor: '#d13adf'
    });	


     $("#trendchart5").sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8], {
      type: 'bar',
      height: '20',
      barWidth: '2',
      resize: true,
      barSpacing: '3',
      barColor: '#5e72e4'
    });	

	  



	// chart 3
     var ctx = document.getElementById('chart3').getContext('2d');
              
       var myChart = new Chart(ctx, {
        type: 'line',
		data: {
			labels: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
			datasets: [{
				label: 'Visitors',
				data: [12, 25, 13, 25, 14, 35, 10],
				backgroundColor: [
					'#009688'
				],
				 fill: {
					target: 'origin',
					above: 'rgb(0 150 136 / 12%)',   // Area will be red above the origin
					below: 'rgb(0 150 136 / 12%)'    // And blue below the origin
				  },
				tension: 0.4,
				borderColor: [
					'#009688'
				],
				borderWidth: 3,
				pointRadius :"0",
			}]
		},
		options: {
			maintainAspectRatio: false,
			barPercentage: 0.7,
			categoryPercentage: 0.45,
			plugins: {
				legend: {
					maxWidth: 20,
					boxHeight: 20,
					position:'bottom',
					display: false,
				}
			},
			scales: {
				x: {
				  stacked: false,
				  beginAtZero: true,
				  display: false,
				},
				y: {
				  stacked: false,
				  beginAtZero: true,
				  display: false,
				}
			  }
		}

    
      });




      // chart 4
     var ctx = document.getElementById('chart4').getContext('2d');
              
	 var myChart = new Chart(ctx, {
	  type: 'line',
	  data: {
		  labels: ['1', '2', '3', '4', '5', '6', '7'],
		  datasets: [{
			  label: 'Visitors',
			  data: [12, 17, 8, 25, 14, 27, 15],
			  backgroundColor: [
				  '#fb6340'
			  ],
			//   fill: {
			//   target: 'origin',
			// 	  above: 'rgb(251 99 64 / 17%)',   // Area will be red above the origin
			// 	  below: 'rgb(251 99 64 / 17%)'    // And blue below the origin
			//  	},
			  tension: 0.4,
			  borderColor: [
				  '#fb6340'
			  ],
			  borderWidth: 3,
			  pointRadius :"0",
		  }]
	  },
	  options: {
		  maintainAspectRatio: false,
		  barPercentage: 0.7,
		  categoryPercentage: 0.45,
		  plugins: {
			  legend: {
				  maxWidth: 20,
				  boxHeight: 20,
				  position:'bottom',
				  display: false,
			  }
		  },
		  scales: {
			  x: {
				stacked: false,
				beginAtZero: true,
				display: false,
			  },
			  y: {
				stacked: false,
				beginAtZero: true,
				display: false,
			  }
			}
	  }

  
	});


	  
    // chart 5
	var ctx = document.getElementById("chart5").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['1', '2', '3', '4', '5', '6', '7', '7', '7', '7', '7', '7'],
			datasets: [{
				label: 'Total Earning',
				data: [39, 19, 25, 16, 31, 39, 23, 20, 23, 18, 15, 20],
				backgroundColor: [
					'#2dce89'
				],
				borderColor: [
					'#2dce89'
				],
				borderWidth: 0,
				borderRadius: 20
			},
			{
				label: 'Total Sales',
				data: [27, 12, 26, 15, 21, 27, 13, 19, 32, 22, 18, 30],
				backgroundColor: [
					'rgb(45 206 137 / 25%)'
				],
				borderColor: [
					'rgb(45 206 137 / 25%)'
				],
				borderWidth: 0,
				borderRadius: 20
			}]
		},
		options: {
			maintainAspectRatio: false,
			barPercentage: 0.7,
			categoryPercentage: 0.45,
			plugins: {
				legend: {
					maxWidth: 20,
					boxHeight: 20,
					position: 'bottom',
					display: false,
				}
			},
			scales: {
				x: {
					stacked: true,
					beginAtZero: true,
					display: false,
				},
				y: {
					stacked: true,
					beginAtZero: true,
					display: false,
				}
			}
		}


	});
	
	
		
		
   });	 
   