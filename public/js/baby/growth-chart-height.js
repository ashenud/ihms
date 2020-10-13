$(document).ready(function() {

    drawHeightChart();

    function drawHeightChart() {
        

        var chartData;
        
        if ($(window).width() <= 768) {
            var pRadius = 1;
            var bWidth = 1;
        }
        else {
            var pRadius = 2;
            var bWidth = 2;
        }
        
        var heights = JSON.parse(height);
        
        var childDataHeight = {
            label: ['උස'],
            yAxisID: 'A',
            data: heights.height_list,
            fill: false,
            backgroundColor: 'rgba(0, 16, 85, 1)',
            borderColor: 'rgba(0, 16, 85, 1)',
            lineTension: 0,
            borderWidth: bWidth,
            pointRadius: pRadius,
        };

        $.ajax({
            url: dataURL,
            method: "GET",
        }).done(function (json, status) {

            if (status === "success" && json.hasOwnProperty("data")) {

                if (heights.baby_gender == 'M') {
                    chartData = json.data.male;
                } else {
                    chartData = json.data.female;
                }

                var datasets = chartData.datasets;
                chartData.datasets.unshift(childDataHeight);

                Chart.defaults.global.defaultFontFamily = 'Helvetica';
                Chart.defaults.global.defaultFontFamily = 'abhaya';
                var growthChartHeight = {
                    type: ['line'],
                    data: chartData,
                    options: {
                        legend: {
                            display: false
                        },
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [ 
                                {
                                    id: 'A',
                                    type: 'linear',
                                    position: 'left',
                                    ticks: {
                                        fontSize: 10,
                                        beginAtZero: true,
                                        min: 40,
                                        max: 122,
                                        stepSize: 1,
                                        callback: function (value, index, values) {
                                            if (value % 2 === 0) {
                                                return value;
                                            } else {
                                                return ' ';
                                            }
                                        },
                                        fontFamily: 'Helvetica',
                                        fontColor: '#000',
                                    },
                                    gridLines: {
                                        lineWidth: 1,
                                        color: 'rgba(0, 0, 0, 0.2)',
                                        z: 1
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: "උස (සෙ.මි.)",
                                        fontColor: '#000',
                                        fontSize: 14,
                                    }
                                }
                            ],
                            xAxes: [ 
                                {
                                    ticks: {
                                        fontSize: 6,
                                        stepSize: 1,
                                        fontFamily: 'Helvetica',
                                        fontColor: '#000',
                                        maxRotation: 0,
                                    },
                                    gridLines: {
                                        lineWidth: 1,
                                        color: 'rgba(0, 0, 0, 0.2)',
                                        z: 1
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: "වයස (මාස)",
                                        fontColor: '#000',
                                        fontSize: 14,
                                    }
                                }]
                        },
                        tooltips: false,
                        responsive: true      
                    }
                }

                var ctxgrowthChartHeight = document.getElementById('growth-chart-height').getContext('2d');
                new Chart(ctxgrowthChartHeight, growthChartHeight);

            } else {
                console.error("data Failed");
            }

        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error("data Failed");
        });

    }

});
