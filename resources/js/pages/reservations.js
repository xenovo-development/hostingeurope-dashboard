/**
 * Theme: Hosting Europe -  Dashboard
 * Author: Emin Çomoğlu
 * Module/App: Data tables
 */


import DataTable from "datatables.net";
$.fn.dataTable = DataTable;

import "datatables.net-bs5";
// import "datatables.net-buttons/js/buttons.flash";

$(document).ready(function () {
    "use strict";

    // Scroll Vertical Datatable
    new DataTable('#reservations-table', {
        "scrollX": false,
        "autoWidth":true,
        "language": {
            "paginate": {
                "previous": "<i class='ri-arrow-left-s-line'>",
                "next": "<i class='ri-arrow-right-s-line'>"
            }
        },
        "drawCallback": function () {
            $('#basic-datatable_paginate').addClass('pagination-rounded');
        }
    });
    // table.buttons().container()
    //   .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

    // new $.fn.dataTable.FixedHeader(table);

});
