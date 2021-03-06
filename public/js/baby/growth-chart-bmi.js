$(document).ready(function() {
    
    $(".change-btn").click(function(e){
        e.preventDefault();

        var type = $(this).data("type");
        
        if(type == "f24m"){
            drawGrowthF24mChart();
        }else{
            drawGrowthL36mChart();
        }
        
    });
    
    var bmi = JSON.parse(bmi_data);
    console.log(bmi);

    var initialChart = bmi.initialChart;

    if(initialChart == "f24m"){
        drawGrowthF24mChart();
    }else{
        drawGrowthL36mChart();
    }


    function drawGrowthF24mChart() {

        var chartData;
        
        var scatterData = [];
        
        var i;
        for (i = 0; i < bmi.height_24.length; i++) {
            var scatterItem = {
                "x": bmi.height_24[i],
                "y": bmi.weight_24[i]
            };
            scatterData.push(scatterItem);
        }
        
        if ($(window).width() <= 768) {
            var pRadius = 1;
            var bWidth = 1;
        }
        else {
            var pRadius = 2;
            var bWidth = 2;
        }
        
        var childDataBmi = {
            type: 'scatter',
            label: [''],
            data: scatterData,
            backgroundColor: 'rgba(0, 16, 85, 1)',
            borderColor: 'rgba(0, 16, 85, 1)',
            lineTension: 0,
            borderWidth: bWidth,
            pointRadius: pRadius,
        };

        $.ajax({
            url: dataURLf24,
            method: "GET",
        }).done(function (json, status) {

            if (status === "success" && json.hasOwnProperty("data")) {

                if (bmi.baby_gender == 'M') {
                    chartData = json.data.male;
                } else {
                    chartData = json.data.female;
                }

                chartData.datasets.unshift(childDataBmi);

                Chart.defaults.global.defaultFontFamily = 'Helvetica';
                Chart.defaults.global.defaultFontFamily = 'abhaya';
                var growthChart24months = {
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
                                        max: 25,
                                        min: 1,
                                        beginAtZero: true,
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
                                        labelString: "?????? (??????. ???????????????.)",
                                        fontColor: '#000',
                                        fontSize: 14,
                                    }
                                }
                            ],
                            xAxes: [ 
                                {
                                    type: 'linear',
                                    ticks: {
                                        fontSize: 10,
                                        fontFamily: 'Helvetica',
                                        fontColor: '#000',
                                        max: 110,
                                        min: 45,
                                        beginAtZero: true,
                                        maxRotation: 0,
                                        stepSize: 5,
                                        callback: function (value, index, values) {
                                            if (value % 5 === 0) {
                                                return value;
                                            } else {
                                                return ' ';
                                            }
                                        },
                                    },
                                    gridLines: {
                                        lineWidth: 1,
                                        color: 'rgba(0, 0, 0, 0.2)',
                                        z: 1
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: "????????? (??????.??????.)",
                                        fontColor: '#000',
                                        fontSize: 14,
                                    }
                                }]
                        },
                        tooltips: false,
                        responsive: true      
                    }
                }

                var ctxgrowthChart24months = document.getElementById('growth-chart-bmi').getContext('2d');
                new Chart(ctxgrowthChart24months, growthChart24months);

            } else {
                console.error("data Failed");
            }

        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error("data Failed");
        });

    }

    function drawGrowthL36mChart(){

        var chartData;

        var scatterData = [];
        
        var i;
        for (i = 0; i < bmi.height_36.length; i++) {
            var scatterItem = {
                "x": bmi.height_36[i],
                "y": bmi.weight_36[i]
            };
            scatterData.push(scatterItem);
        }
        
        if ($(window).width() <= 768) {
            var pRadius = 1;
            var bWidth = 1;
        }
        else {
            var pRadius = 2;
            var bWidth = 2;
        }
        
        var childDataBmi = {
            type: 'scatter',
            label: [''],
            data: scatterData,
            backgroundColor: 'rgba(0, 16, 85, 1)',
            borderColor: 'rgba(0, 16, 85, 1)',
            lineTension: 0,
            borderWidth: bWidth,
            pointRadius: pRadius,
        };

        $.ajax({
            url: dataURLl36,
            method: "GET",
        }).done(function (json, status) {

            if (status === "success" && json.hasOwnProperty("data")) {

                if (bmi.baby_gender == 'M') {
                    chartData = json.data.male;
                } else {
                    chartData = json.data.female;
                }

                chartData.datasets.unshift(childDataBmi);

                Chart.defaults.global.defaultFontFamily = 'Helvetica';
                Chart.defaults.global.defaultFontFamily = 'abhaya';
                var growthChartL36months = {
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
                                        max: 31,
                                        min: 5,
                                        beginAtZero: true,
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
                                        labelString: "?????? (??????. ???????????????.)",
                                        fontColor: '#000',
                                        fontSize: 14,
                                    }
                                }
                            ],
                            xAxes: [ 
                                {
                                    type: 'linear',
                                    ticks: {
                                        fontSize: 10,
                                        fontFamily: 'Helvetica',
                                        fontColor: '#000',
                                        max: 120,
                                        min: 65,
                                        beginAtZero: true,
                                        maxRotation: 0,
                                        stepSize: 5,
                                        callback: function (value, index, values) {
                                            if (value % 5 === 0) {
                                                return value;
                                            } else {
                                                return ' ';
                                            }
                                        },
                                    },
                                    gridLines: {
                                        lineWidth: 1,
                                        color: 'rgba(0, 0, 0, 0.2)',
                                        z: 1
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: "?????? (??????.??????.)",
                                        fontColor: '#000',
                                        fontSize: 14,
                                    }
                                }]
                        },
                        tooltips: false,
                        responsive: true      
                    }
                }

                var ctxgrowthChartL36months = document.getElementById('growth-chart-bmi').getContext('2d');
                new Chart(ctxgrowthChartL36months, growthChartL36months);

            } else {
                console.error("data Failed");
            }

        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error("data Failed");
        });

    }
});
