/**
 * Theme: Attex - Responsive Bootstrap 5 Admin Dashboard
 * Author: Coderthemes
 * Module/App: Dashboard Analytics
 */

import 'daterangepicker/moment.min.js';
import 'daterangepicker/daterangepicker.js';

import 'admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js';
import 'admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js';

import ApexCharts from 'apexcharts/dist/apexcharts.min.js';
import 'chart.js/dist/chart.min.js';

!function ($) {
    "use strict";

    var AnalyticsDashboard = function () {
        this.$body = $("body"),
            this.charts = []
    };

    AnalyticsDashboard.prototype.initCharts = function () {
        window.Apex = {
            chart: {
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            grid: {
                padding: {
                    left: 0,
                    right: 0
                }
            },
            colors: ["#16a7e9", "#47ad77", "#fa5c7c", "#ffbc00"],
        };

        // --------------------------------------------------
        var seriesMonthsJS = months.map(dateStr => new Date(dateStr));
        var monthNames = seriesMonthsJS.map(date => date.toLocaleString('en-US', {month: 'long'}));
        var colors = ["#16a7e9", "#47ad77", "#fa5c7c", "#ffbc00"];
        var dataColors = $("#reservation-lentgths").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }
        var options = {
            chart: {
                height: 216,
                type: 'bar',
                stacked: true
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    endingShape: "rounded",
                    columnWidth: "22%",
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                },
            },
            dataLabels: {
                enabled: true,
                offsetY: -24,
                style: {
                    fontSize: '12px',
                    colors: ["#8a969c"]
                }
            },
            series: [{
                name: 'Days',
                data: reservationLengths,
            }],
            zoom: {
                enabled: false
            },
            legend: {
                show: false
            },
            colors: colors,
            xaxis: {
                categories: monthNames,
                labels: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                axisBorder: {
                    show: false
                }
            },
            yaxis: {
                labels: {
                    show: false
                }
            },
            fill: {
                type: "gradient",
                gradient: {
                    inverseColors: !0,
                    shade: "light",
                    type: "horizontal",
                    shadeIntensity: .25,
                    gradientToColors: void 0,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                }
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val;
                    }
                },
            },
        }

        var chart2 = new ApexCharts(
            document.querySelector("#reservation-lentgths"),
            options
        );

        chart2.render();


        /* ------------- reservations by channel */
        let channelsVals = Object.values(channels);
        var colors = ["#16a7e9", "#47ad77", "#fa5c7c", "#ffbc00"];
        var dataColors = $("#sessions-os").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }
        var options = {
            chart: {
                height: 315,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            fontSize: '22px',
                        },
                        value: {
                            fontSize: '16px',
                        },
                        total: {
                            show: true,
                            label: 'Channel',
                            formatter: function (w) {
                                // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                return 3
                            }
                        }
                    }
                }
            },
            colors: colors,
            series: channelsVals,
            labels: ['Airbnb', 'Booking.com', 'Guest24 Services']
        }

        var chart = new ApexCharts(
            document.querySelector("#sessions-os"),
            options
        );

        chart.render();
    },
        //initializing various components and plugins
        AnalyticsDashboard.prototype.init = function () {
            var $this = this;
            // font
            // Chart.defaults.global.defaultFontFamily = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';

            //default date range picker
            $('#dash-daterange').daterangepicker({
                singleDatePicker: false,
                autoUpdateInput: false,
            });

            // init charts
            this.initCharts();
        },

        //init flotchart
        $.AnalyticsDashboard = new AnalyticsDashboard, $.AnalyticsDashboard.Constructor = AnalyticsDashboard
}(window.jQuery),

    //initializing Dashboard
    function ($) {
        "use strict";
        $.AnalyticsDashboard.init()
    }(window.jQuery);
$('#dash-daterange').daterangepicker({
    autoUpdateInput: false,
    singleDatePicker: false,
});

$('#dash-daterange').on('apply.daterangepicker', function(ev, picker) {
    var formattedDateRange = picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY');
    $(this).val(formattedDateRange);
    const currentUrl = new URL(window.location.href);
    currentUrl.searchParams.set('date', formattedDateRange);
    window.location.href = currentUrl.toString();
});

$('#dash-daterange').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});

//
// COLUMN CHART WITH DATALABELS
//
var colors = ["#3e60d5"];
var dataColors = $("#occupancy-chart").data('colors');
if (dataColors) {
    colors = dataColors.split(",");
}
var options = {
    chart: {
        height: 'auto',
        type: 'bar',
        toolbar: {
            show: false
        }
    },
    plotOptions: {
        bar: {
            borderRadius: 10,
            dataLabels: {
                position: 'top', // top, center, bottom
            },
        }
    },
    dataLabels: {
        enabled: true,
        formatter: function (val) {
            return val + "%";
        },
        offsetY: -25,
        style: {
            fontSize: '12px',
            colors: ["#304758"]
        }
    },
    colors: colors,
    legend: {
        show: true,
        horizontalAlign: "center",
        offsetX: 0,
        offsetY: -5,
    },
    series: [{
        name: 'Occupancy',
        data: occupancy
    }],
    xaxis: {
        categories: months,
        type: 'datetime',
        position: 'top',
        labels: {
            formatter: function (val) {
                return new Date(val).toLocaleDateString('en-EN', {month: 'short'});
            }
        },
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false
        },
        crosshairs: {
            fill: {
                type: 'gradient',
                gradient: {
                    colorFrom: '#D8E3F0',
                    colorTo: '#BED1E6',
                    stops: [0, 100],
                    opacityFrom: 0.4,
                    opacityTo: 0.5,
                }
            }
        },
        tooltip: {
            enabled: true,
            offsetY: -10,
        }
    },
    fill: {
        gradient: {
            enabled: false,
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [50, 0, 100, 100]
        },
    },
    yaxis: {
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false,
        },
        labels: {
            show: false,
            formatter: function (val) {
                return val + "%";
            }
        }

    },
    title: {
        text: 'Monthly Occupancy Rate for Property',
        floating: true,
        offsetY: 360,
        align: 'center',
        style: {
            color: '#444'
        }
    },
    grid: {
        row: {
            colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.2
        },
        borderColor: '#f1f3fa'
    }
}

var chart = new ApexCharts(
    document.querySelector("#occupancy-chart"),
    options
);

chart.render();

var roptions = {
    noData: {
        text: 'No data.',
        align: 'center',
        verticalAlign: 'middle',
        offsetX: 0,
        offsetY: 0,
        style: {
            color: undefined,
            fontSize: '14px',
            fontFamily: undefined
        }
    },
    series: [{
        name: 'Guests',
        type: 'column',
        data: seriesGuests,
    }, {
        name: 'Reserved Nights',
        type: 'area',
        data: seriesNights
    }, {
        name: 'Net Revenue',
        type: 'column',
        data: seriesNetRevenue
    }],
    chart: {
        height: 500,
        type: 'line',
        stacked: false,
    },
    dataLabels: {
        enabled: false
    },
    title: {
        text: 'XYZ - Reservation Analysis (Last 30)',
        align: 'left',
        offsetX: 110
    },
    xaxis:
        {
            categories: reservationDates,
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
                text: "Guest count (by booking)",
                style: {
                    color: '#008FFB',
                }
            },
            tooltip: {
                enabled: true,
            }
        },
        {
            seriesName: 'Revenue',
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
                color: '#fa5c7c'
            },
            labels: {
                style: {
                    colors: '#fa5c7c',
                },
            },
            title: {
                text: "Net Revenue (minus commissions)",
                style: {
                    color: '#fa5c7c',
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

var chart = new ApexCharts(document.querySelector("#listing-reservations-chart"), roptions);
chart.render();

document.addEventListener('DOMContentLoaded', function() {
    const currentUrl = new URL(window.location.href);
    const listingId = currentUrl.searchParams.get('listingId');

    if (listingId) {
        const refreshButton = document.getElementById('refreshButton');
        currentUrl.searchParams.delete('date');
        currentUrl.searchParams.set('listingId', listingId);
        refreshButton.href = currentUrl.toString();
    }
});
