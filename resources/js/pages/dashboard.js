/**
 * Theme: Attex - Responsive Bootstrap 5 Admin Dashboard
 * Author: Coderthemes - Edited by Ali Emin Çomoğlu
 * Module/App: Dashboard
 */


import 'daterangepicker/moment.min.js';
import 'daterangepicker/daterangepicker.js';
import ApexCharts from 'apexcharts/dist/apexcharts.min.js';

var options = {
    series: [{
        name: 'Subtotal',
        type: 'column',
        data: seriesSubTotal,
    }, {
        name: 'Commision',
        type: 'column',
        data: seriesCommission,
    }, {
        name: 'Net Revenue',
        type: 'line',
        data: seriesNetRevenue
    }],
    chart: {
        height: 350,
        type: 'line',
        stacked: false
    },
    dataLabels: {
        enabled: true
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
            categories: reservationDates,
            type: 'datetime',
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
                text: "Subtotal amount (with commissions)",
                style: {
                    color: '#008FFB',
                }
            },
            tooltip: {
                enabled: true
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
                text: "Commissions",
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
            custom: function({series, seriesIndex, dataPointIndex, w}) {
                return '<div class="arrow_box">' +
                    '<span>' + series[seriesIndex][dataPointIndex] + '</span>' +
                    '</div>'
            }
        },
    },
    legend: {
        horizontalAlign: 'left',
        offsetX: 40
    }
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

//default date range picker
$('#dash-daterange').daterangepicker({
    singleDatePicker: true
});
