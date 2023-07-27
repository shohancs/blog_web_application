$(function() {
	"use strict";

	$('#chart1').sparkline([ 1, 4, 5, 9, 8, 10, 5, 8, 4, 1, 0, 7, 5, 7, 9, 8, 10, 5], {
		type: 'bar',
		height: '40',
		barWidth: '3',
		resize: true,
		barSpacing: '4',
		barColor: '#5e72e4',
		spotColor: '#5e72e4',
		minSpotColor: '#5e72e4',
		maxSpotColor: '#5e72e4',
		highlightSpotColor: '#5e72e4',
		highlightLineColor: '#5e72e4'
	});
	
$("#chart2").sparkline([8,18,12,25,14,30,10], {
		type: 'line',
		width: '100',
		height: '40',
		lineWidth: '2',
		lineColor: '#f5365c',
		fillColor: 'transparent',
		spotColor: '#f5365c',
		minSpotColor: '#f5365c',
		maxSpotColor: '#f5365c',
		highlightSpotColor: '#f5365c',
		highlightLineColor: '#f5365c'
}); 	
	

	$('#chart3').sparkline([ 1, 4, 5, 9, 8, 10, 5, 8, 4, 1, 0, 7, 5, 7, 9, 8, 10, 5], {
	type: 'bar',
	height: '40',
	barWidth: '3',
	resize: true,
	barSpacing: '4',
	barColor: '#2dce89',
	spotColor: '#2dce89',
	minSpotColor: '#2dce89',
	maxSpotColor: '#2dce89',
	highlightSpotColor: '#2dce89',
	highlightLineColor: '#2dce89'
	});

				
	$("#chart4").sparkline([8,18,12,25,14,30,10], {
	type: 'line',
	width: '100',
	height: '40',
	lineWidth: '2',
	lineColor: '#11cdef',
	fillColor: '#11cdef',
	spotColor: '#11cdef',
	minSpotColor: '#11cdef',
	maxSpotColor: '#11cdef',
	highlightSpotColor: '#11cdef',
	highlightLineColor: '#11cdef'
	}); 	



 // chart5
 var ctx = document.getElementById('chart5').getContext('2d');
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
				 above: 'rgb(94 114 228 / 10%)',   // Area will be red above the origin
				 below: 'rgb(94 114 228 / 10%)'   // And blue below the origin
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
				 above: 'rgb(45 206 137 / 10%)',   // Area will be red above the origin
				 below: 'rgb(45 206 137 / 10%)'    // And blue below the origin
			   },
			 tension: 0.4,
			 borderColor: [
				 '#2dce89'
			 ],
			 pointRadius :"0",
			 borderWidth: 3
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





// chart6
var ctx = document.getElementById('chart6').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Organic', 'Direct', 'Referral', 'Others', 'Social'],
        datasets: [{
            data: [155, 120, 110, 150, 90],
            backgroundColor: [
                '#0dcaf0',
                '#f5365c',
                '#2dce89',
                '#5e72e4',
                '#fb6340',
            ],
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,
        cutout: 115,
        plugins: {
        legend: {
            display: false,
        }
    }
        
    }
});



   // chart7
   var ctx = document.getElementById('chart7').getContext('2d');
   var myChart = new Chart(ctx, {
	   type: 'bar',
	   data: {
		   labels: ['Chrome', 'Firefox', 'Safari', 'Opera', 'Edge', 'Mozila', 'Others'],
		   datasets: [{
			   label: 'Visits',
			   data: [60, 50, 40, 30, 20, 25, 15],
			   backgroundColor: [
				   '#5e72e4'
			   ],
			   borderColor: [
				   '#5e72e4'
			   ],
			   borderWidth: 0,
			   borderRadius: 0
		   }]
	   },
	   options: {
		   indexAxis: 'y',
		   maintainAspectRatio: false,
		   //barPercentage: 0.9,
		   categoryPercentage: 0.4,
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
				 beginAtZero: true
			   },
			   y: {
				 stacked: false,
				 beginAtZero: true
			   }
			 }
	   }
   });





// chart8
var ctx = document.getElementById('chart8').getContext('2d');

var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke1.addColorStop(0, '#005bea');
    gradientStroke1.addColorStop(1, '#00c6fb');

var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke2.addColorStop(0, '#ff6a00');  
    gradientStroke2.addColorStop(1, '#ee0979'); 

var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke3.addColorStop(0, '#17ad37');  
    gradientStroke3.addColorStop(1, '#98ec2d'); 

var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Desktop', 'Mobile', 'Tablet'],
        datasets: [{
            data: [155, 120, 110],
            backgroundColor: [
                gradientStroke1,
                gradientStroke2,
                gradientStroke3,
            ],
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,
        cutout: 90,
        plugins: {
        legend: {
            display: false,
        }
    }
        
    }
});









jQuery("#geographic-map").vectorMap({
	map: "world_mill_en",
	backgroundColor: "transparent",
	borderColor: "#818181",
	borderOpacity: .25,
	borderWidth: 1,
	zoomOnScroll: !1,
	color: "#009efb",
	regionStyle: {
		initial: {
			fill: "#6c757d"
		}
	},
	markerStyle: {
		initial: {
			r: 9,
			fill: "#fff",
			"fill-opacity": 1,
			stroke: "#000",
			"stroke-width": 5,
			"stroke-opacity": .4
		}
	},
	enableZoom: !0,
	hoverColor: "#009efb",
	markers: [{
		latLng: [21, 78],
		name: "I Love My India"
	}],
	// series: {
	// 	regions: [{
	// 		values: {
	// 			IN: "#fb6340",
	// 			US: "#15b70a",
	// 			RU: "#5e72e4",
	// 			AU: "#2dce89"
	// 		}
	// 	}]
	// },
	hoverOpacity: null,
	normalizeFunction: "linear",
	scaleColors: ["#b6d6ff", "#005ace"],
	selectedColor: "#c9dfaf",
	selectedRegions: [],
	showTooltip: !0,
	onRegionClick: function(e, t, o) {
		var r = 'You clicked "' + o + '" which has the code: ' + t.toUpperCase();
		alert(r)
	}
})




});