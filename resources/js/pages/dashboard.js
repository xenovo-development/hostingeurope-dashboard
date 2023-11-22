/**
 * Theme: Attex - Responsive Bootstrap 5 Admin Dashboard
 * Author: Coderthemes - Edited by Ali Emin Çomoğlu
 * Module/App: Dashboard
 */


import 'daterangepicker/moment.min.js';
import 'daterangepicker/daterangepicker.js';
import ApexCharts from 'apexcharts/dist/apexcharts.min.js';

let formattedDates = reservationDates.map(function(date) {
    return new Date(date).toLocaleDateString('en-EN', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    });
});

let options = {
    series: [{
        name: 'Guests',
        type: 'column',
        data: seriesGuests,
    }, {
        name: 'Reserved Nights',
        type: 'column',
        data: reservationNights,
    }, {
        name: 'Net Revenue',
        type: 'line',
        data: seriesNetRevenue
    }],
    chart: {
        height: 500,
        type: 'line',
        stacked: false
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: [1, 1, 4]
    },
    title: {
        text: 'XYZ - Reservation Analysis (Total)',
        align: 'left',
        offsetX: 110
    },
    xaxis:
        {
            categories: formattedDates,
            type: 'categories',
        },
    yaxis: [
        {
            autoScaleYaxis: false,
            axisTicks: {
                show: true,
            },
            axisBorder: {
                show: true,
                color: '#008FFB'
            },
            labels: {
                style: {
                    colors: '#008FFB',
                }
            },
            title: {
                text: "Subtotal amount (without commissions)",
                style: {
                    color: '#008FFB',
                }
            },
            tooltip: {
                enabled: true,
            }
        },
        {
            seriesName: 'Income',
            opposite: true,
            axisTicks: {
                show: true,
            },
            axisBorder: {
                show: true,
                color: '#00E396'
            },
            labels: {
                style: {
                    colors: '#00E396',
                }
            },
            title: {
                text: "Reserved Nights",
                style: {
                    color: '#00E396',
                }
            },
        },
        {
            seriesName: 'Revenue',
            opposite: true,
            axisTicks: {
                show: true,
            },
            axisBorder: {
                show: true,
                color: '#FEB019'
            },
            labels: {
                style: {
                    colors: '#FEB019',
                },
            },
            title: {
                text: "Net Revenue (minus commissions)",
                style: {
                    color: '#FEB019',
                }
            }
        },
    ],
    tooltip: {
        fixed: {
            enabled: true,
            position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
            offsetY: 30,
            offsetX: 60,
        },
    },
    legend: {
        horizontalAlign: 'left',
        offsetX: 40
    }
};

let chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();


let pieOptions = {
    series: seriesPievals,
    chart: {
        width: 380,
        type: 'pie',
    },
    labels: ['Airbnb', 'Booking.com', 'Guest24 Services'],
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },
            legend: {
                position: 'bottom'
            }
        }
    }]
};

let pieChart = new ApexCharts(document.querySelector("#pie-chart"), pieOptions);
pieChart.render();

let dates = [];
for (let i = 29; i >= 0; i--) {
    let day = new Date();
    day.setDate(day.getDate() - i);
    dates.push(day.toISOString().split('T')[0]);
}

let cashflowOptions = {
    series: [{
        name: 'Income',
        data: seriesNetRevenue
    }],
    chart: {
        type: 'area',
        stacked: false,
        height: 225,
        zoom: {
            type: 'x',
            enabled: true,
            autoScaleYaxis: true
        },
        toolbar: {
            autoSelected: 'zoom'
        }
    },
    dataLabels: {
        enabled: false
    },
    markers: {
        size: 0,
    },
    title: {
        text: 'Revenue (Monthly)',
        align: 'left'
    },
    fill: {
        type: 'gradient',
        gradient: {
            shadeIntensity: 1,
            inverseColors: false,
            opacityFrom: 0.5,
            opacityTo: 0,
            stops: [0, 90, 100]
        },
    },
    yaxis: {
        labels: {
            // formatter: function (val) {
            //     return (val / 1000000).toFixed(0);
            // },
        },
        title: {
            text: 'Revenue'
        },
    },
    xaxis: {
        categories: reservationDates,
        type: 'datetime',
    },
    tooltip: {
        shared: false,
        y: {
            // formatter: function (val) {
            //     return (val / 1000000).toFixed(0)
            // }
        }
    }
};

var cashflowChart = new ApexCharts(document.querySelector("#cashflow-chart"), cashflowOptions);
cashflowChart.render();


//default date range picker
$('#dash-daterange').daterangepicker({
    singleDatePicker: true
});
